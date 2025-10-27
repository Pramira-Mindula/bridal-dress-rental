<?php

session_start();

require_once 'connect.php';

$sql = "SELECT * FROM dresses";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Dress</title>

        <link rel="icon" href="img/icon2.png" type="image/x-icon">
        <link rel="stylesheet" href="css/viewDress.css">
    </head>
    <body>

        <!------------------- NAVIGATION ------------------->
        <div id="header-placeholder"></div>
        <script>
            fetch('header.php')
                .then(Response => Response.text())
                .then(data => {
                    document.getElementById('header-placeholder').innerHTML = data;
                });
        </script>



        <?php
            
            if (isset($_GET['id'])) {
                $dress_id = $_GET['id']; // Get the dress code from URL

                // Fetch Dress details
                $sql = "SELECT * FROM dresses WHERE dressCode = '$dress_id'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $dress = $result->fetch_assoc();

                    // Display Dress details
                    echo "<div class='apartment-details'>";
                    echo "<div class='section1'>";
                    echo "<br>";
                    echo "<img src='" . $dress["dressImage"] . "' width='200'>";
                    echo "</div>";
                    echo "<div class='section2'>";
                    echo "<h2>" . $dress["dressName"] . "</h2>";
                    echo "<p style='font-weight: bold;'>Dress Code: " . $dress["dressCode"] . "</p>";
                    echo "<p style='font-weight: bold;'>Dress Type: " . $dress["dressType"] . "</p>";
                    echo "<p style='color: #007bff; font-size: 18px; font-weight: bold;'>Price : LKR " . number_format($dress["dressPrice"], 2) . "</p>";
                    echo "<div class='buy-back'>";
                    echo "<a href='booking.php?dressID=" . $dress["dressID"] . "'><button class='btn'>BOOK</button></a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";

                } else {
                    echo "<p>Dress not found.</p>";
                }
            } else {
                echo "<p>Dress ID not provided.</p>";
            }
        ?>

            <p style="color: #007bff;"></p>
        
        


        <!-- FOOTER -->
        <div id="footer-placeholder"></div>
        <script>
            fetch('footer.html')
                .then(Response => Response.text())
                .then(data => {
                    document.getElementById('footer-placeholder').innerHTML = data;
                });
        </script>


    </body>
</html>