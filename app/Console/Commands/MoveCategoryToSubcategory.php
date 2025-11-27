<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Subcategory;
use App\Postcategory;
use App\Postsubcategory;

class MoveCategoryToSubcategory extends Command
{
    protected $signature = 'category:move-to-subcategory {parent_category_id} {category_ids*}';
    protected $description = 'Move categories to subcategory table under a parent category and update related posts';

    public function handle()
    {
        $parentCategoryId = $this->argument('parent_category_id');
        $categoryIds = $this->argument('category_ids');

        DB::beginTransaction();
        try {
            foreach ($categoryIds as $catId) {
                $category = Category::find($catId);
                if (!$category) {
                    $this->warn("Category ID $catId not found, skipping.");
                    continue;
                }

                // Create new subcategory under parent
                $subcategory = Subcategory::create([
                    'category_id' => $parentCategoryId,
                    'name' => $category->name,
                    'slug' => $category->slug,
                    'metatitle' => $category->metatitle,
                    'metadescription' => $category->metadescription,
                    'metakeyword' => $category->metakeyword,
                    'status' => $category->status ?? 'active',
                    'hassubsubcategory' => $category->hassubcategory ?? 'no',
                    'showonheader' => $category->showonheader ?? 'no',
                ]);

                $this->info("Category ID {$catId} moved to Subcategory ID {$subcategory->id} under parent {$parentCategoryId}");

                // Fetch all posts linked to old category
                $postCategories = Postcategory::where('category_id', $catId)->get();

                foreach ($postCategories as $postCat) {
                    $postId = $postCat->post_id;

                    // Attach post to new subcategory
                    Postsubcategory::firstOrCreate([
                        'post_id' => $postId,
                        'subcategory_id' => $subcategory->id,
                    ]);

                    // Update the old Postcategory to parent category
                    $postCat->update(['category_id' => $parentCategoryId]);

                    $this->info("Post ID {$postId} assigned to Subcategory ID {$subcategory->id} and updated Postcategory to Parent Category ID {$parentCategoryId}");
                }

                // Optionally mark old category as moved
                // $category->update(['status' => 'moved']);
            }

            DB::commit();
            $this->info("All categories moved and posts updated successfully!");
        } catch (\Exception $ex) {
            DB::rollBack();
            $this->error("Error: " . $ex->getMessage());
        }
    }
}
