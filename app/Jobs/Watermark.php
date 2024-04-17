<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Watermark implements ShouldQueue
{
    private $announcement_image_id;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id = $announcement_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $image = Image::find($this->announcement_image_id);
        if (!$image) {
            return;
        }

        $srcPath = storage_path('app/public/' . $image->path);
        $imageToWatermark = imagecreatefromjpeg($srcPath);

        $watermarkPath = base_path('resources/img/logo.presto.scontornato.2.png');
        $watermark = imagecreatefrompng($watermarkPath);

        // Set the watermark image transparent background
        imagecolortransparent($watermark, imagecolorallocatealpha($watermark, 0, 0, 0, 127));
        imagealphablending($watermark, false);
        imagesavealpha($watermark, true);

        // Rotate the watermark image by 45 degrees
        $watermark = imagerotate($watermark, 45, imageColorAllocateAlpha($watermark, 0, 0, 0, 127));

        // Get image dimensions
        $imageWidth = imagesx($imageToWatermark);
        $imageHeight = imagesy($imageToWatermark);

        // Get watermark dimensions
        $watermarkWidth = imagesx($watermark);
        $watermarkHeight = imagesy($watermark);

        // Define the scale factor for the watermark
        $scaleFactor = 0.2; // Adjust this value to scale down the watermark

        // Calculate the scaled watermark dimensions
        $scaledWatermarkWidth = $watermarkWidth * $scaleFactor;
        $scaledWatermarkHeight = $watermarkHeight * $scaleFactor;

        // Define the positions for the smaller watermarks
        $positions = [
            ['x' => $imageWidth * 0.2, 'y' => $imageHeight * 0.2],
            ['x' => $imageWidth * 0.5, 'y' => $imageHeight * 0.5],
            ['x' => $imageWidth * 0.8, 'y' => $imageHeight * 0.2],
            ['x' => $imageWidth * 0.2, 'y' => $imageHeight * 0.8],
            ['x' => $imageWidth * 0.8, 'y' => $imageHeight * 0.5],
            ['x' => $imageWidth * 0.5, 'y' => $imageHeight * 0.8],
        ];

        // Position the smaller watermarks
        foreach ($positions as $position) {
            $x = $position['x'] - $scaledWatermarkWidth / 2;
            $y = $position['y'] - $scaledWatermarkHeight / 2;

            // Merge the rotated and scaled watermark onto the image
            imagecopyresampled($imageToWatermark, $watermark, $x, $y, 0, 0, $scaledWatermarkWidth, $scaledWatermarkHeight, $watermarkWidth, $watermarkHeight);
        }

        // Save the modified image
        imagejpeg($imageToWatermark, $srcPath);
    }


}