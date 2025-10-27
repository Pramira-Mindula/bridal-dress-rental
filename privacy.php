<?php

require_once ('connect.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Privacy & Plicy</title>
        <link rel="icon" href="img/icon2.png" type="image/x-icon">
        <link rel="stylesheet" href="css/privacy.css">

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


        <br>
        <div class="privacy">
            <br>
            <h1>Privacy & Policy</h1>
            <br>
            <p>Ravii Bridal (Pvt) Ltd ("us", "we", or "our") operates the Ravii Bridal.com website & Ravii Bridal.com App (the "Service").</p>
            <p>This page informs you of our policies regarding the collection, use, and disclosure of personal data when you use our Service and the choices you have associated with that data.</p>
            <p>We use your data to provide and improve the Service. By using the Service, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, accessible from Ravii Bridal.com</p>
            <p>The privacy of our visitors to Ravii Bridal.com is important to us.</p>
            <p>At Ravii Bridal.com, we recognize that privacy of your personal information is important. Here is information on what types of personal information we receive and collect when you use and visit Ravii Bridal.com, and how we safeguard your information.  We never sell your personal information to third parties.</p>

            <br>
            <p><b>Cookies and Web Beacons</b></p>
            <p>We do use cookies to store information, such as your personal preferences when you visit our site. 
                This could include only showing you a popup once in your visit, or the ability to login to some of our features, 
                such as My Account.
            </p>

            <p>We also use third party advertisements on Ravii Bridal.com to support our site.  
                Some of these advertisers may use technology such as cookies and web beacons when they advertise on our site, 
                which will also send these advertisers (such as Google through the Google AdSense program) 
                information including your IP address, your ISP , the browser you used to visit our site, and in some cases, 
                whether you have Flash installed.  This is generally used for geotargeting purposes (showing Colombo real estate 
                ads to someone in Colombo, for example) or showing certain ads based on specific sites visited 
                (such as showing cooking ads to someone who frequents cooking sites).
            </p>

            <p>You can chose to disable or selectively turn off our cookies or third-party cookies in your browser settings.  
                However, this can affect how you are able to interact with our site as well as other websites.  
                This could include the inability to login to services or programs, such as logging into accounts.
            </p>
            <br>

            <h2>Information we collect from you</h2>
            <p>We may collect and process the following information about you:</p>
            <p><b>Information you provide to us</b><br>
                You may provide us with information in several ways, including by filling in forms on our websites or on our apps 
                or by corresponding with us by phone, email and live chat. This includes information you provide when you register 
                for an account or subscribe, Post ad ad, contact advertisers using forms or phone numbers available on our websites 
                or apps, post in our forums/comments, register for an event, enter a competition, promotion or survey, provide feedback 
                or report about an ad.
                This information may include any information you add to your profile (for example, your name, address, email address, 
                phone number, profile picture and user name). 
            </p>

            <p>
                <b>Information we collect about you</b><br>
                When you use our websites or apps, we may also collect information how the Service is accessed and used 
                ("Usage Data"). This Usage Data may include information such as your computer's Internet Protocol address 
                (e.g. IP address), browser type, browser version, the pages of our Service that you visit, the time and date 
                of your visit, the time spent on those pages, unique device identifiers and other diagnostic data.
            </p>
            <br>

            <h2>Use of Data</h2>
            <p>We use the collected data for various purposes:
            </p>
            <p>
                &nbsp;&nbsp;To provide and maintain the Service<br>
                &nbsp;&nbsp;To notify you about changes to our Service<br>
                &nbsp;&nbsp;To allow you to participate in interactive features of our Service when you choose to do so<br>
                &nbsp;&nbsp;To provide customer care and support<br>
                &nbsp;&nbsp;To provide analysis or valuable information so that we can improve the Service<br>
                &nbsp;&nbsp;To monitor the usage of the Service<br>
                &nbsp;&nbsp;To detect, prevent and address technical issues<br>
            </p>
            <br>

            <h2>Changes To This Privacy Policy</h2>
            <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>

            <p>We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update the "effective date" at the top of this Privacy Policy.</p>
                
            <p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>

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