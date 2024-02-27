<?php
// Get the image name and width from the query parameters
$imageName = $_GET['image'];
$imageWidth = isset($_GET['width']) ? $_GET['width'] : null;

// Path to the directory containing images
$imagePath = 'https://doc.tradersfind.com/images/';

// Full path to the image file
$imageFile = $imagePath . $imageName . '.webp';
//print_r($imageFile);
// Check if the image file exists
//if (file_exists($imageFile)) {
        //print_r("File exist");
    // Get the image file's MIME type
    //$imageMimeType = mime_content_type($imageFile);
    // Set the appropriate Content-Type header
    //header('Content-Type: ' . $imageMimeType);
    // If width is specified, resize the image
    if ($imageWidth !== null && is_numeric($imageWidth) && $imageWidth > 0) {
        // Load the image
        $image = imagecreatefromstring(file_get_contents($imageFile));
        // Get the current dimensions
        $oldWidth = imagesx($image);
        $oldHeight = imagesy($image);
        // Calculate the new height based on the given width
        $newHeight = ($imageWidth / $oldWidth) * $oldHeight;
        // Create a new image with the specified width and calculated height
        $newImage = imagecreatetruecolor($imageWidth, $newHeight);
        // Resize the image
        imagecopyresized($newImage, $image, 0, 0, 0, 0, $imageWidth, $newHeight, $oldWidth, $oldHeight);
        // Output the resized image
        switch ($imageMimeType) {
            case 'image/webp':
                imagejpeg($newImage);
                break;
            case 'image/jpg':
                imagepng($newImage);
                break;
            case 'image/png':
                imagegif($newImage);
                break;
            case 'image/gif':
                imagegif($newImage);
                break;    
            // Add support for other image types if needed
        }
        // Free up memory
        imagedestroy($image);
        imagedestroy($newImage);
    } else {
        // Output the original image
        readfile($imageFile);
    }
//} else {
    // Image not found, output a placeholder image or an error message
   // header('Content-Type: image/webp');
   // readfile('assets/images/TradersFind.webp');
   // print_r("File not exists"); 
//}
?>
