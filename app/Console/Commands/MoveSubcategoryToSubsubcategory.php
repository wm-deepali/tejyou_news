<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Subcategory;
use App\Subsubcategory;
use App\Postsubcategory;
use App\Postsubsubcategory;
use App\Postcategory;

class MoveSubcategoryToSubsubcategory extends Command
{
    protected $signature = 'subcategory:move-to-subsubcategory {parent_subcategory_id} {subcategory_ids*}';
    protected $description = 'Move subcategories to sub-subcategory table under a parent subcategory and update related posts';

    public function handle()
    {
        $parentSubcategoryId = $this->argument('parent_subcategory_id');
        $subcategoryIds = $this->argument('subcategory_ids');

        DB::beginTransaction();
        try {
            $parentSubcategory = Subcategory::findOrFail($parentSubcategoryId);
            $parentCategoryId = $parentSubcategory->category_id; // parent category of the parent subcategory

            foreach ($subcategoryIds as $subcatId) {
                $subcategory = Subcategory::find($subcatId);
                if (!$subcategory) {
                    $this->warn("Subcategory ID $subcatId not found, skipping.");
                    continue;
                }

                // Create new sub-subcategory under parent subcategory
                $subsubcategory = Subsubcategory::create([
                    'subcategory_id' => $parentSubcategoryId,
                    'name' => $subcategory->name,
                    'slug' => $subcategory->slug,
                    'metatitle' => $subcategory->metatitle,
                    'metadescription' => $subcategory->metadescription,
                    'metakeyword' => $subcategory->metakeyword,
                    'status' => $subcategory->status ?? 'active',
                ]);

                $this->info("Subcategory ID {$subcatId} moved to Sub-subcategory ID {$subsubcategory->id} under parent Subcategory {$parentSubcategoryId}");

                // Fetch all posts linked to old subcategory
                $postSubcategories = Postsubcategory::where('subcategory_id', $subcatId)->get();

                foreach ($postSubcategories as $postSubcat) {
                    $postId = $postSubcat->post_id;

                    // Attach post to new sub-subcategory
                    Postsubsubcategory::firstOrCreate([
                        'post_id' => $postId,
                        'subsubcategory_id' => $subsubcategory->id,
                    ]);

                    // Check if post is already attached to parent subcategory
                    $exists = Postsubcategory::where('post_id', $postId)
                        ->where('subcategory_id', $parentSubcategoryId)
                        ->exists();

                    if (!$exists) {
                        // Update old Postsubcategory to parent subcategory
                        $postSubcat->update(['subcategory_id' => $parentSubcategoryId]);
                        $this->info("Post ID {$postId} updated to Parent Subcategory ID {$parentSubcategoryId}");
                    } else {
                        // If already attached, delete the old relation to avoid duplicates
                        $postSubcat->delete();
                        $this->info("Post ID {$postId} already attached to Parent Subcategory, old subcategory relation deleted");
                    }

                    // Ensure post is attached to parent category of the parent subcategory
                    Postcategory::firstOrCreate([
                        'post_id' => $postId,
                        'category_id' => $parentCategoryId,
                    ]);

                    $this->info("Post ID {$postId} ensured attached to Parent Category ID {$parentCategoryId}");
                }

                // Optionally mark old subcategory as moved
                // $subcategory->update(['status' => 'moved']);
            }

            DB::commit();
            $this->info("All subcategories moved, posts updated, and parent category assigned successfully!");
        } catch (\Exception $ex) {
            DB::rollBack();
            $this->error("Error: " . $ex->getMessage());
        }
    }
}
