<?php
    // session_start();
    // if (isset($_POST['gal_submit']))
    // {
    //     $file = $_FILES['file'];
        
    //     $fileName = $file['name'];
    //     $fileType = $file['type'];
    //     $fileTmp = $file['tmp_name'];
    //     $fileSize= $file['size'];
    //     $fileError = $file['error'];
        
    //     $fileExt = explode('.', $fileName);
    //     $fileActualExt = strtolower(end($fileExt));

    //     $permittedExts = array('jpeg', 'jpg', 'png');
    //     if (in_array($fileActualExt, $permittedExts))
    //     {
    //         if ($fileError === 0)
    //         {
    //             if ($fileSize < 10000000)
    //             {
    //                 require_once("./../config/connect.php");
    //                 $fileNameNew = uniqid('', true).".".$fileActualExt;
    //                 $fileDest = "../img/uploads/".$fileNameNew;

    //                 $stmt = $connection->prepare("SELECT * FROM gallery");
    //                 $stmt->execute();
    //                 $count = $stmt->rowCount();
    //                 $uid = $_SESSION['uid'];
    //                 $username = $_SESSION['username'];

    //                 $stmt = $connection->prepare(
    //                     "INSERT INTO gallery(uid, username, imgFullNameGallery)
    //                     VALUES(:uid, :username, :imgNameGallery)
    //                 ");
    //                 $stmt->bindParam(":uid", $uid);
    //                 $stmt->bindParam(":username", $username);
    //                 $stmt->bindParam(":imgNameGallery", $fileNameNew );
    //                 $stmt->execute();
    //                 move_uploaded_file($fileTmp, $fileDest);
    //                 echo "Upload success";
    //             }
    //             else
    //                 echo "Uploaded image is too big";
    //         }
    //         else
    //             "There was an error uploading your image x.x";
    //     }
    //     else
    //         echo "Unpermitted file tpye";
    // }
    // remove front part;
    $img = $_POST['canvas'];
    $img = base64_decode($img);
    $image = createimagefromstring($img);
    imagepng($image, "path.png");
?>