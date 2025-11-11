<?php
/**
 * Script untuk migrate file culture dari public/images/culture ke storage/app/public/images/culture
 *
 * Cara menjalankan:
 * php migrate-culture-images.php
 */

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\CultureItem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

echo "=== MIGRATE CULTURE IMAGES TO STORAGE ===\n\n";

// Get all culture items
$cultures = CultureItem::all();
$totalMigrated = 0;
$totalSkipped = 0;
$totalErrors = 0;

echo "Found " . $cultures->count() . " culture items.\n\n";

foreach ($cultures as $culture) {
    if (!$culture->image) {
        echo "[SKIP] {$culture->title} - No image\n";
        $totalSkipped++;
        continue;
    }

    $oldPath = public_path($culture->image);
    $newPath = 'images/culture/' . basename($culture->image);

    echo "Processing: {$culture->title}\n";
    echo "  Old path: {$oldPath}\n";
    echo "  New path: storage/app/public/{$newPath}\n";

    // Check if old file exists
    if (!file_exists($oldPath)) {
        echo "  [WARNING] Old file not found! Checking if already in storage...\n";

        // Check if file already in storage
        if (Storage::disk('public')->exists($newPath)) {
            echo "  [OK] File already in storage. Updating database...\n";
            $culture->update(['image' => $newPath]);
            $totalMigrated++;
        } else {
            echo "  [ERROR] File not found anywhere!\n";
            $totalErrors++;
        }
        echo "\n";
        continue;
    }

    // Create directory if not exists
    $storageDir = storage_path('app/public/images/culture');
    if (!File::exists($storageDir)) {
        File::makeDirectory($storageDir, 0755, true);
        echo "  [CREATE] Created directory: {$storageDir}\n";
    }

    // Copy file to storage
    try {
        $fileContents = file_get_contents($oldPath);
        Storage::disk('public')->put($newPath, $fileContents);

        // Verify file copied successfully
        if (Storage::disk('public')->exists($newPath)) {
            echo "  [OK] File copied to storage\n";

            // Update database
            $culture->update(['image' => $newPath]);
            echo "  [OK] Database updated\n";

            // Delete old file (optional - comment if you want to keep backup)
            // unlink($oldPath);
            // echo "  [OK] Old file deleted\n";

            $totalMigrated++;
        } else {
            echo "  [ERROR] Failed to verify copied file\n";
            $totalErrors++;
        }
    } catch (\Exception $e) {
        echo "  [ERROR] " . $e->getMessage() . "\n";
        $totalErrors++;
    }

    echo "\n";
}

echo "\n=== MIGRATION COMPLETE ===\n";
echo "Total items: " . $cultures->count() . "\n";
echo "Migrated: {$totalMigrated}\n";
echo "Skipped: {$totalSkipped}\n";
echo "Errors: {$totalErrors}\n";
echo "\nDon't forget to run: php artisan storage:link\n";
echo "Then upload the updated files to hosting!\n";
