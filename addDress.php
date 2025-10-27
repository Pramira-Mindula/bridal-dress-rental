<?php

session_start();

require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dname = $_POST["name"];
    $dcode = $_POST["code"];
    $dtype = $_POST["type"];
    $dprice = $_POST["price"];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
        $dressImage = $_FILES['image']['name'];
        $dressImageTmp = $_FILES['image']['tmp_name'];


        $uniqueId = uniqid();
        $dressImageName = $uniqueId . '_' . $dressImage;


        $targetDirectory = "dress_image/";
        $targetFile = $targetDirectory . basename($dressImageName);


        if (move_uploaded_file($dressImageTmp, $targetFile)) {

            //insert data to DB
            $sql = "INSERT INTO dresses (dressCode, dressName, dressType, dressPrice, dressImage)
            VALUES ('$dcode','$dname','$dtype','$dprice','$targetFile')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Dress Added Successfully";
                header("Location: dresses.php");
            }
            else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }    
    } else {

        //insert data to DB
        $sql = "INSERT INTO dresses (dressCode, dressName, dressType)
        VALUES ('$dcode','$dname','$dtype','$dprice')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Dress Added Successfully";
            header("Location: dresses.php");
        }
        else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    }

    
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/addDress.css">
        <link rel="icon" href="img/icon2.png" type="image/x-icon">
        <title>Add Dress</title>
    </head>

    <body>
        <h2>Add Dress</h2>
        <form method="POST" action="" enctype="multipart/form-data">

            <div>
                <label for="code">Dress Code:</label>
                <input type="text" id="code" name="code" required>
            </div>
            <div>
                <label for="name">Dress Name:</label>
                <input type="text" id="name" name="name" required>
            </div>       
            <div>
                <label for="type">Dress Type:</label>
                <input type="text" id="type" name="type" required>
            </div>
            <div>
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" required placeholder="In LKR">
            </div>
            
            <div>
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            <input type="submit" value="Add Dress">
        </form>
    </body>
</html>