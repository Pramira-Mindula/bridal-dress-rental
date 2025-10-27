<?php

session_start();

require_once ('connect.php');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us</title>

        <link rel="stylesheet" href="css/contactUs.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <link rel="icon" href="img/icon2.png" type="image/x-icon">

        <style>
            .body {
                position: relative;
                margin: 0;
                padding: 0;
                height: 100vh;
                overflow-x: hidden;
            }

            /* Background Image with Overlay */
            body::before {
                content: "";
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: url(img/bg1.jpg) no-repeat center center/cover;
                opacity: 0.3; /* Adjust this for the desired transparency */
                z-index: -1;
            }

            /* Contact Container */
            .contact-container {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
                margin: 0 auto;
                padding: 20px;
                
            }

            /* Contact Box */
            .contact-box {
                width: 90%;
                max-width: 1200px;
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 30px;
                background: #f9f9f9;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.5);
            }

            /* Map Section */
            .left-forum {
                width: 100%;
                height: 100%;
                background: white;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            }

            .left-forum iframe {
                width: 100%;
                height: 400px;
                border-radius: 10px;
                border: none;
            }

            /* Inquiry Form Section */
            .forum {
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 20px;
                background: white;
                border-radius: 10px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            }

            /* Inquiry Form */
            .inquiryform {
                width: 100%;
                max-width: 500px;
                text-align: center;
            }

            .inquiryform h2 {
                font-size: 28px;
                font-weight: bold;
                margin-bottom: 20px;
            }

            .inquiryform form {
                display: flex;
                flex-direction: column;
            }

            .inquiryform label {
                text-align: left;
                font-size: 16px;
                font-weight: bold;
                margin-bottom: 5px;
            }

            .inquiryform input,
            .inquiryform textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
            }

            /* Submit Button */
            .inquiryform button {
                background-color: #e8184c;
                border: none;
                border-radius: 5px;
                padding: 12px;
                cursor: pointer;
                font-size: 16px;
                font-weight: bold;
                color: white;
                transition: 0.3s ease;
            }

            .inquiryform button:hover {
                background-color: #b3012e;
                transform: scale(1.05);
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                .contact-box {
                    grid-template-columns: 1fr;
                }

                .left-forum iframe {
                    height: 300px;
                }

                .inquiryform {
                    max-width: 100%;
                }
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

        <!-- CONTACT US -->
        <br>
        <center>
        <h1>Contact Us</h1>
        <br>
        <section id="contactw">
            <div class="container-contact">            
                <div class="methods">
                    <i id="icon" class="fa fa-home fa-4x"></i>
                    <h2>Visit Us</h2>
                    <p>Meegahakotuwa,<br> Kuliyapitiya</p>
                </div>
                <div class="methods">
                    <i class="fa fa-phone fa-4x"></i>
                    <h2>Call Us</h2>
                    <p>011-0102030<br>077-0102030</p>
                </div>
                <div class="methods">
                    <i class="fa fa-envelope fa-4x"></i>
                    <h2>E-mail Us</h2>
                    <p>raviibridal@gmail.com</p>
                </div>
                <div class="methods">
                    <i class="fa fa-file-text fa-4x"></i>
                    <h2>Fill the Form</h2>
                    <a href="#forum"><button>Fill the Form</button></a>
                </div>
            </div>

        </section></center>


        <!-- Map 2 -->
        <section id="forum">
        <div class="contact-container">
            <div class="contact-box">
                <div class="left">
                    <div class="left-forum">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.888855073993!2d79.95244007486083!3d6.903892793095456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2572db062437f%3A0xbba120ccc6fe1e2e!2sMalabe%20Junction!5e0!3m2!1sen!2slk!4v1685903233825!5m2!1sen!2slk"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>

                    </div>
                    
                </div>
                <div class="forum">
                    <div class="inquiryform">
                        <h2>Fill The Form</h2>
                        <form action="" method="POST" onsubmit="return validateForm()">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required>
        
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" required placeholder="example@example.com">
        
                            <label for="contactno">Contact Number</label>
                            <input type="text" id="contactno" name="contactno" required>
        
                            <label for="message">Message</label>
                            <textarea id="textarea" name="message" placeholder="Type here..." rows="3" required></textarea>
        
                            <button class="btn" type="submit">Submit</button>
                        </form>
                    </div>

                </div>
                

            </div>

        </div>
        </section>

        <script>
            function validateForm() {
            var phone = document.getElementById("contactno").value;
            var name = document.getElementById("name").value;

            if(!/^\d{10}$/.test(phone)) {
                alert("Contact number should have 10 numbers.");
                return false; // Prevent form submission
            } 
            else if(!/^[A-Za-z\s]+$/.test(name)) {
                alert("Invalid name");
                return false; // Prevent form submission
            }
            return true; // Allow form submission
            }
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

        <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['name']; 
                $email = $_POST['email']; 
                $Cno = $_POST['contactno']; 
                $message = $_POST['message']; 

                // Use prepared statements to avoid syntax errors
                $sql = "INSERT INTO inquiry (iname, iemail, icontactNo, imessage) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);

                if (!$stmt) {
                    die("Error preparing statement: " . $conn->error);
                }

                // Bind parameters
                $stmt->bind_param("ssss", $name, $email, $Cno, $message);

                // Execute query
                if ($stmt->execute()) {
                    echo "<script>alert('Message Sent Successfully');</script>";
                    echo "<script>window.location.href='contactUs.php';</script>"; // Redirect to contact page
                } else {
                    die("Error executing query: " . $stmt->error);
                }

                // Close statement and connection
                $stmt->close();
                $conn->close();
            }

        ?>
        
    </body>
</html>