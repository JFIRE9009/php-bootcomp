<?php
    if (isset($_POST['gal_submit']))
    {
        $file = $_FILES['file'];
        
        $fileName = $file['name'];
        $fileType = $file['type'];
        $fileTmp = $file['tmp_name'];
        $fileSize= $file['size'];
        $fileError = $file['error'];
        
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $permittedExts = array('jpeg', 'jpg', 'png');
        if (in_array($fileActualExt, $permittedExts))
        {
            if ($fileError === 0)
            {
                if ($fileSize < 10000000)
                {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDest = "../img/uploads/".$fileNameNew;
                    move_uploaded_file($fileTmp, $fileDest);
                    echo "Upload success";
                }
                else
                    echo "Uploaded image is too big";
            }
            else
                "There was an error uploading your image x.x";
        }
        else
            echo "Unpermitted file tpye";
    }
?>