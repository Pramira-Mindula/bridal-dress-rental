<?php

session_start();

require_once 'connect.php';

//Fetch available dresses
$sql = "SELECT * FROM dresses";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="img/icon2.png" type="image/x-icon">
        <link rel="stylesheet" href="css/dresses.css">
        <title>Dresses</title>
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

        <section class="hero">
            <div class="hero-content">
                <h1>Find Your Perfect Bridal Dress</h1>
            </div>
        </section>


        <!--Available Dresses--> 

        <h1 style="text-align: center;">Available Dresses</h1>

        <div class="acontainer">
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                $count = 0;
                while ($row = $result->fetch_assoc()) {
                    if ($count >= 6) break; // Stop after 6 dresses (2 rows)

                    if ($count % 3 == 0 && $count > 0) {
                        // Start a new row after every 3 dresses
                        echo "</div><div class='acontainer'>";
                    }
                    echo "<div class='dress-card'>";
                    echo "<img src='" . $row["dressImage"] . "' class='dress-image'>";

                    echo "<div class='dress-detail'><br>";
                    echo "<p class='dress-title'> <strong>" . $row["dressName"] . "</strong></p>";
                    // echo "<p class='dress-description'>Dress Code: " . $row["dressCode"] . "</p>";
                    // echo "<p class='dress-description'>Dress Type: " . $row["dressType"] . "</p>";
                    echo "<p class='dress-price' style='color: #007bff; font-size: 18px; font-weight: bold; text-align: center;'> Price : LKR " . number_format($row["dressPrice"], 2) . "</p>";
                    echo "<div class='view-btn'>";
                    echo "<a href='view_dress.php?id=" . $row["dressCode"] . "'><button>View</button></a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    $count++;
                }
            } else {
                echo "<p>No available dresses.</p>";
            }
            ?>
        </div>

        <!-- Categories -->
		<center>
        <a href="#Gown"><button class="location-button" onclick="loadData('btn4')">Gowns</button></a>
        <a href="#Saree"><button class="location-button" onclick="loadData('btn1')">Sarees</button></a>
        <a href="#Frocks"><button class="location-button" onclick="loadData('btn2')">Frocks</button></a>
        <a href="#Shoes"><button class="location-button" onclick="loadData('btn3')">Shoes</button></a>
        <!-- <a href="#"><button class="location-button" onclick="loadData('btn5')">TEXT</button></a> -->
        </center>
		<br>


        <section id="Gown">
            <h2 class="listh2">Gown</h2>
            <div class="image-container">
                <ul>
                    <?php

                    //Query to fetch only Gown dresses
                    $sql = "SELECT dressCode, dressImage, dressName FROM dresses WHERE dressType = 'Gown' LIMIT 4";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<a href='view_dress.php?id=" . $row["dressCode"] . "'><li>";
                            echo "<img src='" . $row["dressImage"] . "' alt='Gown Image'>";
                            echo "<p><strong>" . $row["dressName"] . "</strong></p>";
                            // echo "<p><strong>" . $row["dressCode"] . "</strong></p>";

                            echo "</li></a>";
                        }
                    } else {
                        echo "<p>No Gown available.</p>";
                    }

                    ?>
                </ul>
            </div>
        </section>


        <section id="Saree">
            <h2 class="listh2">Saree</h2>
            <div class="image-container">
                <ul>
                    <?php

                    //Query to fetch only Saree dresses
                    $sql = "SELECT dressCode, dressImage, dressName FROM dresses WHERE dressType = 'Saree' LIMIT 4";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<a href='view_dress.php?id=" . $row["dressCode"] . "'><li>";
                            echo "<img src='" . $row["dressImage"] . "' alt='Saree Image'>";
                            echo "<p><strong>" . $row["dressName"] . "</strong></p>";
                            // echo "<p><strong>" . $row["dressCode"] . "</strong></p>";

                            echo "</li></a>";
                        }
                    } else {
                        echo "<p>No Sarees available.</p>";
                    }

                    ?>
                </ul>
            </div>
        </section>


        <section id="Frocks">
            <h2 class="listh2">Frocks</h2>
            <div class="image-container">
                <ul>
                    <?php

                    //Query to fetch only Frocks
                    $sql = "SELECT dressCode, dressImage, dressName FROM dresses WHERE dressType = 'Frock' LIMIT 4";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<a href='view_dress.php?id=" . $row["dressCode"] . "'><li>";
                            echo "<img src='" . $row["dressImage"] . "' alt='Frock Image'>";
                            echo "<p><strong>" . $row["dressName"] . "</strong></p>";
                            echo "</li></a>";
                        }
                    } else {
                        echo "<p>No Frocks available.</p>";
                    }

                    ?>
                </ul>
            </div>
        </section>



        <section id="Shoes">
            <h2 class="listh2">Shoes</h2>
            <div class="image-container">
                <ul>
                    <?php

                    //Query to fetch only Shoes
                    $sql = "SELECT dressCode, dressImage, dressName FROM dresses WHERE dressType = 'Shoe' LIMIT 4";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<a href='view_dress.php?id=" . $row["dressCode"] . "'><li>";
                            echo "<img src='" . $row["dressImage"] . "' alt='Shoe Image'>";
                            echo "<p><strong>" . $row["dressName"] . "</strong></p>";
                            echo "</li></a>";
                        }
                    } else {
                        echo "<p>No Shoes available.</p>";
                    }

                    mysqli_close($conn);
                    ?>
                </ul>
            </div>
        </section>



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