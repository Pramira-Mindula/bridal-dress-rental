<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css">
        <link rel="icon" href="img/icon2.png" type="image/x-icon">

        <title>Common Header</title>
    </head>

    <body>

        <!---Common Header-->
        <header>
            <nav>
                <div class="logo">
                    <a href="index.php" ><img class="logo" src="img/RAVII BRIDAL1.png" alt="LOGO"></a>
                </div>

                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="dresses.php">Dresses</a></li>
                    <li><a href="contactUs.php">Contact Us</a></li>
                    <li><a href="aboutUs.php">About Us</a></li>
                </ul>

                <div class="sign">
                    <?php if (isset($_SESSION['Cname'])) : ?>
                        <!-- Display logged-in customer name -->
                        <p style="font-size: 18px; text-decoration: none; font-weight: bold"> <!-- Username styles -->
                            <i id="icon" class="fi fi-sr-user">&nbsp;</i>
                            <a href="profile.php"><span><?php echo $_SESSION['Cname']; ?></span></a>
                        </p>
                        
                    <?php elseif (isset($_SESSION['sName'])) : ?>
                        <!-- Display logged-in staff name -->
                        <p style="font-size: 18px; text-decoration: none; font-weight: bold"> <!-- Staff Username styles -->
                            <i id="icon" class="fi fi-sr-user">&nbsp;</i>
                            <a href="profile.php"><span><?php echo $_SESSION['sName']; ?></span></a>
                        </p>
                        
                    <?php else : ?>
                        <!-- Display Sign Up and Log In buttons when not logged in -->
                        <a href="signup.php"><button>Sign Up</button></a>
                        <a href="login.php"><button>Log In</button></a>
                    <?php endif; ?>
                </div>


            </nav>
        </header>

        <!--  #132122 green - rgb(19, 33, 34) / red - rgb(232, 24, 76)  -->
        
    </body>


</html>