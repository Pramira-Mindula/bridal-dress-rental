<?php

session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>FAQ</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/faq.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <link rel="icon" href="img/icon2.png" type="image/x-icon">

        
    </head>

    <body>
        <div id="header-placeholder"></div>

        <script>
            // to include the header   
            fetch('header.php')
                .then(response => response.text())
                .then(data => {
                     document.getElementById('header-placeholder').innerHTML = data;
                });   
        </script>

        
        <br>
        <div class="box">
            
            <h1>FAQ</h1>

            <h2>How To Register ?</h2>
                <p>
                    Go to sign in and register using the form.<br><a href="signup.php">Sign Up</a>
                </p><br>

            <h2>How To Contact ?</h2>
                <p>
                    You can find our contact information through below link!<br><a href="contactUs.php">Contact Us!</a>
                </p>
                        
        </div>

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