<?php

//intialize session
session_start();

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
        <link rel="icon" href="img/icon2.png" type="image/x-icon">
        <title>Ravii Bridal</title>

        <style>
            /* Bridal Dresses Section */
            .bridal-dresses {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 40px;
                background-color: #f9f9f9;
                text-align: justify;
            }

            .bridal-dresses-content {
                flex: 1;
                padding-right: 20px;
            }

            .bridal-dresses-content h2 {
                font-size: 2rem;
                margin-bottom: 20px;
            }

            .bridal-dresses-content p {
                font-size: 1rem;
                line-height: 1.6;
                margin-bottom: 20px;
            }

            .bridal-btn {
                background-color: #ff4081;
                color: white;
                padding: 12px 24px;
                text-decoration: none;
                border-radius: 5px;
                font-size: 1rem;
            }

            .bridal-dresses-image {
                flex: 1;
                padding-left: 20px;
                
            }

            .bridal-dresses-image img {
                max-width: 100%;
                height: auto;
                border-radius: 10px;
            }

            /* Testimonials */
            .testimonial-container {
                max-width: 1200px;
                margin: 80px auto;
                text-align: center;
                color: #fff;
                background-color: #2C3E50;
                padding: 60px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            }

            .testimonial-title {
                font-size: 2rem;
                color: #FCA311;
                margin-bottom: 30px;
            }

            .testimonial-slider {
                position: relative;
                overflow: hidden;
            }

            .testimonial-slide {
                display: none;
                transition: opacity 0.6s ease;
            }

            .testimonial-slide.active {
                display: block;
            }

            .testimonial-quote {
                font-size: 1.5rem;
                font-style: italic;
                margin-bottom: 20px;
            }

            .testimonial-author {
                font-size: 1.2rem;
                font-weight: bold;
                color: #FCA311;
            }

            .testimonial-navigation {
                margin-top: 20px;
            }

            .testimonial-navigation .prev, .testimonial-navigation .next {
                background-color: #FCA311;
                color: #14213d;
                border: none;
                padding: 10px 20px;
                cursor: pointer;
                font-size: 1.5rem;
                border-radius: 5px;
                margin: 0 10px;
                transition: background-color 0.3s ease;
            }

            .testimonial-navigation .prev:hover, .testimonial-navigation .next:hover {
                background-color: #ffcc66;
            }

        </style>

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

        <!-- HERO -->
        <section class="hero">
            <div class="hero-content">
                <h2>Find Your Perfect Bridal Look</h2>
                <p>Rent elegant dresses for your special day with ease.</p>
                <a href="dresses.php" class="hero-btn">Explore Dresses</a>
            </div>
        </section>

        <br>

        <!-- Bridal Dresses Section -->
        <section class="bridal-dresses">
            <div class="bridal-dresses-content">
                <h2>Elegant Bridal Dresses for Every Occasion</h2>
                <p>Our collection of bridal dresses is designed to make you feel elegant and beautiful on your special day. 
                    Choose from a wide variety of styles and sizes to fit your perfect bridal look. Whether you prefer classic elegance, 
                    modern chic, or something unique, we have a dress that will make your wedding day unforgettable.</p>
                <a href="dresses.php" class="bridal-btn">Browse Bridal Dresses</a>
            </div>
            <div class="bridal-dresses-image">
                <img src="img/dress-shop1.webp" alt="Bridal Dress" class="img-fluid">
            </div>
        </section>
        

        <br>


        <!-- Testimonials -->
        <div class="testimonial-container">
            <h2 class="testimonial-title">What Our Customers Say</h2>
            <div class="testimonial-slider">
                <div class="testimonial-slide active">
                    <p class="testimonial-quote">"Best Bridal Dress Shop I found. Best customer service!"<br> &nbsp;</p>
                    <h4 class="testimonial-author"> - Niki Minaj</h4>
                </div>
                <div class="testimonial-slide">
                    <p class="testimonial-quote">"Absolutely loved my experience here! The staff were so helpful, and the dresses are gorgeous. I found my perfect gown!"<br> &nbsp;</p>
                    <h4 class="testimonial-author"> - Anya Joy</h4>
                </div>
                <div class="testimonial-slide">
                    <p class="testimonial-quote">"Incredible experience from start to finish! The dresses were beyond beautiful, and the customer service was amazing!"</p>
                    <h4 class="testimonial-author">- Parami Dias</h4>
                </div>
                <div class="testimonial-slide">
                    <p class="testimonial-quote">"A one-stop-shop for bridal dresses! Wonderful service, great selection, and the staff helped me every step of the way. Couldn't be happier!"<br> &nbsp;</p>
                    <h4 class="testimonial-author">- Mindy Silva</h4>
                </div>
                <div class="testimonial-slide">
                    <p class="testimonial-quote">"The best bridal dress shop I've ever visited! Exceptional customer service and a stunning collection. Highly recommend!"<br> &nbsp;</p>
                    <h4 class="testimonial-author">- Sarah Mitchelle</h4>
                </div>
                <div class="testimonial-slide">
                    <p class="testimonial-quote">"A beautiful selection of bridal dresses and top-notch service. The staff made the entire process smooth and enjoyable!"</p>
                    <h4 class="testimonial-author">- Nilanthi Peiris</h4>
                </div>
            </div>            
            <!-- <div class="testimonial-navigation">
                <button class="prev"> ❮ </button>
                <button class="next"> ❯ </button>
            </div> -->
        </div>

        <script>
            let currentIndex = 0;
            const slides = document.querySelectorAll('.testimonial-slide');
            const totalSlides = slides.length;
            
            // Auto slide every 5 seconds
            function showNextSlide() {
                slides[currentIndex].classList.remove('active');
                currentIndex = (currentIndex + 1) % totalSlides;
                slides[currentIndex].classList.add('active');
            }
        
            setInterval(showNextSlide, 5000); // 5000 ms = 5 seconds        
            
        </script>

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
