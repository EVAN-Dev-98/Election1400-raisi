<?php
/* By EVAN */

$file = $_FILES['photo']['tmp_name'];
$sourceProperties = getimagesize($file);
$fileNewName = time();
$folderPath = "uploads/";
$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
$imageType = $sourceProperties[2];
$frame = __DIR__ . "/frame.png";
$uploadOk = 1;

if (!is_dir("uploads")){
    mkdir("uploads");
}

if ($_FILES["photo"]["size"] > 2000000) {
    echo "<p class='w-100 mt-3 mb-3'>اندازه تصویر بزرگتر از 2 مگابایت است!</p>";
    $uploadOk = 0;
}

// We want our final image to be 76x76 size
$x = $y = 512;
// dimensions of the final image
$final_img = imagecreatetruecolor($x, $y);

// Create user image resources from the files
switch ($imageType){

    case IMAGETYPE_PNG:
        $user_image = imagecreatefrompng($file);
        break;

    case IMAGETYPE_GIF:
        $user_image = imagecreatefromgif($file);
        break;

    case IMAGETYPE_JPEG:
        $user_image = imagecreatefromjpeg($file);
        break;

    default:
        echo "<p class='w-100 mt-3 mb-3'>نوع تصویر مناسب نیست!</p>";
        $uploadOk = 0;
        exit();
}
// Create frame image resources from the files
$frame_image = imagecreatefrompng($frame);
imagesavealpha($frame_image, true);

// resize user image to x,y size
$user_image = imageResize($user_image,$sourceProperties[0],$sourceProperties[1]);

// Enable blend mode and save full alpha channel
imagealphablending($final_img, true);
imagesavealpha($final_img, true);

// Copy our image onto our $final_img
imagecopy($final_img, $user_image, 0, 0, 0, 0, $x, $y);
imagecopy($final_img, $frame_image, 0, 0, 0, 0, $x, $y);

switch ($imageType){

    case IMAGETYPE_PNG:
        $imageSource = $folderPath . $fileNewName. "." . $ext;
        if ($uploadOk == 1 && imagepng($final_img,$imageSource,0)){
            echo "<p class='w-100 mt-3 mb-3'>تصویر با موفقیت آپلود شد</p>";
            echo "<img src='{$imageSource}' alt='image' class='img-fluid finaly'>";
        }
        else
            echo "<p class='w-100 mt-3 mb-3'>در هنگام آپلود تصویر خطایی رخ داده است!</p>";
        break;

    case IMAGETYPE_GIF:
        $imageSource = $folderPath . $fileNewName. "." . $ext;
        if ($uploadOk == 1 && imagegif($final_img,$imageSource)){
            echo "<p class='w-100 mt-3 mb-3'>تصویر با موفقیت آپلود شد</p>";
            echo "<img src='{$imageSource}' alt='image' class='img-fluid finaly'>";
        }
        else
            echo "<p class='w-100 mt-3 mb-3'>در هنگام آپلود تصویر خطایی رخ داده است!</p>";
        break;

    case IMAGETYPE_JPEG:
        $imageSource = $folderPath . $fileNewName. "." . $ext;
        if ($uploadOk == 1 && imagejpeg($final_img,$imageSource,100)){
            echo "<p class='w-100 mt-3 mb-3'>تصویر با موفقیت آپلود شد</p>";
            echo "<img src='{$imageSource}' alt='image' class='img-fluid finaly'>";
        }
        else
            echo "<p class='w-100 mt-3 mb-3'>در هنگام آپلود تصویر خطایی رخ داده است!</p>";
        break;

    default:
        echo "<p class='w-100 mt-3 mb-3'>نوع تصویر مناسب نیست!</p>";
        $uploadOk = 0;
        exit();
}

echo "<a class='d-block text-danger text-center p-2 my-3' href='$imageSource' download=''>( دانلود تصویر پروفایل )</a>";
echo "<p class='w-100 text-center mb-3 bg-dark text-white p-2 rounded-3'>تهیه شده توسط حمایت مردم</p>";

function imageResize($imageResourceId,$width,$height) {
    global $x , $y;
    $targetWidth = $x;
    $targetHeight = $y;
    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
    return $targetLayer;
}