<?php
    
    $myTempFile = $_FILES['imgFile']['tmp_name'];

    $fileName = $_FILES['imgFile']['name'];
    $fileTypeExtension = explode("/", $_FILES['imgFile']['type']);
    $fileType = $fileTypeExtension[0];
    $extention = $fileTypeExtension[1];

    $isExtGood = false;

    switch ($extention) {
      case 'jpeg':
      case 'bmp':
      case 'gif':
      case 'png':
        $isExtGood = true;
        break;
      default:
        echo "This file is not image file";
        exit;
        break;
    }
    

    
    if ($fileType  == 'image') {
      
      if ($isExtGood) {
      
        $myFile = "./img/{$fileName}";
        
      
        $imageUpload = move_uploaded_file($myTempFile, $myFile);

      
        if ($imageUpload == true) {
            echo "success";
        }
      }
      
      else {
        echo "This file is not image file";
        exit;
      }
    }
    else {
        echo "This file is not image file";
      exit;
    }
?>