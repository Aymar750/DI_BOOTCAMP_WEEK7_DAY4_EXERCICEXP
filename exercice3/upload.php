<?php

    if(isset($_POST["submit"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is a PDF
        if($fileType != "pdf") {
            echo "Sorry, only PDF files are allowed.";
            $uploadOk = 0;
        }

        // Check if there were any errors during the file upload
        if ($_FILES["fileToUpload"]["error"] > 0) {
            echo "Error: " . $_FILES["fileToUpload"]["error"] . "<br>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        

        
    }
?>



<!DOCTYPE html>
<html>
  <head>
    <title>Uploader un fichier</title>
  </head>
  <body>
    
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>

  </body>
</html>
