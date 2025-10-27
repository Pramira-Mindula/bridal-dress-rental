<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="img/icon2.png" type="image/x-icon">
        <link rel="stylesheet" href="css/aboutUs.css">
        <title>About Us</title>
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
        <div class="aboutus">
            <br>
            <h1>About Us</h1>
            <br>
            <p> 
                Welcome to Ravii Bridal, where every bride's dream dress is just a click away. We are dedicated to making your 
                wedding day as special as it deserves to be by providing a carefully curated selection of beautiful, 
                high-quality bridal gowns for rent. At Ravii Bridal, we believe that finding your perfect wedding dress should 
                be a joyful, stress-free experience. That's why we've created a seamless online platform that lets you explore, 
                choose, and rent the dress of your dreams — all from the comfort of your home.
            </p><br>

            <p><b>Our Story</b></p>
            <p>
                Founded with a passion for bridal fashion and a deep understanding of the wedding planning process, 
                Ravii Bridal was born out of a desire to offer a more affordable and sustainable alternative to traditional 
                wedding dress shopping. We know that wedding gowns can be expensive and may only be worn once, which is why we 
                provide brides-to-be with a smarter, more economical way to wear the gown they've always envisioned — without the 
                high price tag.
            </p><br>

            <p><b>What We Offer</b></p>
            <p>
                At Ravii Bridal, we offer a wide range of bridal dresses designed to cater to all tastes, preferences, 
                and body types. From elegant A-line gowns to glamorous ballgowns, contemporary sheaths to romantic mermaid styles, 
                we have something for every bride. Our dresses are sourced from top designers and renowned brands, ensuring the 
                highest quality and a timeless appeal. Whether you envision a classic, vintage-inspired look, or a modern, 
                minimalist design, we have the perfect dress waiting for you.
            </p><br>

            <p><b>Our Promise</b></p>
            <p>
                We are committed to making your bridal experience unforgettable by providing exceptional service and quality. 
                We understand how important this moment is, and we want to be a part of your journey. Our team is here to assist 
                you at every step of the process — from the moment you browse our collection to the moment you return your dress.

                At Ravii Bridal, we also value sustainability. Renting a wedding dress not only helps you save money, 
                but it also contributes to reducing the environmental impact of fast fashion. Our goal is to provide a solution 
                that's both fashionable and eco-friendly, giving you the chance to wear a stunning dress while making a positive 
                impact on the planet.
            </p><br>

            <p><b>Our Team</b></p>
            <p>
                The Ravii Bridal team is passionate about helping brides feel beautiful and confident on their wedding day. 
                We’re here to listen to your needs and offer expert guidance to help you select the perfect dress. Our team 
                is not just about business — we genuinely care about creating memorable experiences for our customers.
            </p><br>

            <p><b>Join Us in Making Your Day Perfect</b></p>
            <p>
                At Ravii Bridal, we believe that every bride deserves to feel radiant, confident, and gorgeous on her wedding day. 
                Let us help you bring your wedding vision to life with a stunning bridal gown that fits your budget, your style, 
                and your values. Trust us to provide you with the perfect dress for your once-in-a-lifetime moment.

                Thank you for choosing Ravii Bridal. We look forward to being part of your unforgettable journey!
            </p>
            

        </div>
        

        <!-- Staff -->

            <div class="staff">
                <h1>Our Staff</h1>
                <br>
                <div class="staff-grid">
    
                    <div class="staff-card2">
                        <img src="img/Dave Alan.jpg" alt="Marketing Manager">
                        <p>Mr. Dave Alan</p>
                        <h2>Marketing Manager</h2>
                    </div>
                    <div class="staff-card2">
                        <img src="img/sam walsh.jpg" alt="Property Manager">
                        <p>Mrs. Samantha Walsh</p>
                        <h2>Dress Manager</h2>
                    </div>
                    <div class="staff-card2">
                        <img src="img/Philiph.jpg" alt="Website Administrator">
                        <p>Mr. Philip Jason</p>
                        <h2>Website Administrator</h2>
                    </div>                  
                                    
                </div>
            </div>
        <!-- Staff End  -->

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