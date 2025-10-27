<?php

require_once ('connect.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Terms & Conditions</title>
        <link rel="icon" href="img/icon2.png" type="image/x-icon">
        <link rel="stylesheet" href="css/terms.css">

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

        <br><br>
        <div class="terms">
            
            <h1>Terms and Conditions</h1>
            
            <p>Ravii Bridal.com is an open venue for advertisers to post any advertisement related 
                to property sales/lettings in Sri Lanka. The website Ravii Bridal.com (the "Website") 
                is owned and operated by Ravii Bridal (Pvt) Ltd ("we" or "us"). We are not involved 
                in the content of the advertisements, the products or services being sold through the advertisements,
                or actual transactions between buyers and sellers through the advertisements. 
                Therefore, we have no control over the quality, safety or legality of the items offered, 
                the truth or accuracy of the listings.
                Our main service is listing the advertisements posted by advertisers. 
                Contacting an advertiser or reserving their services will be at your own discretion. 
                Once you have contacted the advertiser directly via email or telephone, 
                your contact with Ravii Bridal.com will cease to exist. 
            </p>
            <p>
                Ravii Bridal.com reserves the right (but not the obligation) in our sole discretion to 
                refuse/delete/remove any advert for any reason or no reason. Such action will be taken mainly 
                on adverts that violate the Terms and Conditions, use inappropriate language or spam the site. 
            </p>
            <p>
                Any dispute that arises in connection with the reservation/purchase or sale of services/products 
                which were displayed on Ravii Bridal.com is solely between the Buyer (person who purchased the 
                service directly from the Seller) and Seller (person who sold/offered the service directly to the Buyer).
                We will not mediate any such dispute between Buyer and Seller, and cannot be held liable for any claim of loss,
                damages or wrongdoing on behalf of either the Buyer or Seller. 
            </p>
            <p>
                Ravii Bridal.com does not vet the advertisers, guarantee their services or are responsible for services provided by the advertisers. 
            </p>
            <p>
                In no event will Ravii Bridal.com or its parent company be liable for any indirect / consequential / special / incidental 
                or punitive damages, including without limitation liability for negligence for any damages whatsoever resulting 
                from any use of or inability to use this web site, loss of profit, loss of data, arising out of, based on, 
                or resulting from this agreement or your use of the service, even if 
                Ravii Bridal.com has been advised of the possibility of such damages. 
                <b>Ravii Bridal.com cannot be held liable for any contents on the website. </b>
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