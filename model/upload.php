<?php
    require("./../config/connect.php");
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
                    $stmt = $connection->prepare("SELECT * FROM gallery");
                    $stmt->execute();
                    $count = rowCount($stmt);
                    $setImageOrder = $count + 1;

                    $stmt = $connection->prepare(
                        "INSERT INTO gallery(imgFullNameGallery, orderGallery)
                        VALUES(:imgNameGallery, :orderGallery)
                    ");
                    $stmt->bindParam(":imgNameGallery", $fileName );
                    $stmt->bindParam(":orderGallery", $setImageOrder);
                    $stmt->execute();
                    // $fileNameNew = uniqid('', true).".".$fileActualExt;
                    // $fileDest = "../img/uploads/".$fileNameNew;
                    // move_uploaded_file($fileTmp, $fileDest);
                    // echo "Upload success";
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