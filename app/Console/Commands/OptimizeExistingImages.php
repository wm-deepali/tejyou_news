<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class OptimizeExistingImages extends Command
{
    protected $signature = 'images:optimize-existing';
    protected $description = 'Optimize all existing images in storage';

    public function handle()
    {
        $directories = ['posts', 'epapersimage']; // Add your folders
        
        foreach ($directories as $dir) {
            $files = Storage::disk('public')->allFiles($dir);
            
            $this->info("Optimizing {$dir}... Found " . count($files) . " files");
            
            foreach ($files as $file) {
                $fullPath = storage_path('app/public/' . $file);
                
                if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'webp'])) {
                    $optimizerChain = OptimizerChainFactory::create();
                    $optimizerChain->optimize($fullPath);
                    
                    $size = filesize($fullPath) / 1024; // KB
                    $this->line("✅ {$file} ({$size}KB)");
                }
            }
        }
        
        $this->info('All images optimized!');
    }
}
