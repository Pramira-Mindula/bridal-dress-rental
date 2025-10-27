<?php
// Include Connection PHP File
require_once "connect.php";

// Initialize variables
$name = $email = $password = $DOB = $phone = $address = "";
$errorMsg = "";
$successMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $DOB = $_POST["DOB"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    // Check if email already in use
    $checkQuery = $conn->prepare("SELECT * FROM customers WHERE Cemail = ?");
    $checkQuery->bind_param("s", $email);
    $checkQuery->execute();
    $result = $checkQuery->get_result();

    if ($result->num_rows > 0) {
        $errorMsg = "This Email is already in use, Please use a different Email.";
    } else {
        // Insert data into the database based on account type
        $sql = $conn->prepare("INSERT INTO customers (Cname, Cemail, Cpassword, Cdob, Cmobile, Caddress) VALUES (?, ?, ?, ?, ?, ?)");
    

        if (isset($sql)) {
            $sql->bind_param("ssssss", $name, $email, $password, $DOB, $phone, $address);
            if ($sql->execute()) {
                $successMsg = "Registered Successfully!";
                header("Location: index.php");
                exit;
            } else {
                $errorMsg = "Error: " . $sql->error;
            }
            $sql->close();
        }
    }
    $checkQuery->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SignUp</title>
        <link rel="stylesheet" href="css/signup.css">
        <link rel="icon" href="img/icon2.png" type="image/x-icon">
        <script src="js/signup.js"></script>
        <style>
            
        </style>
    </head>
    <body>

    <br>
    <h1>Register Here</h1>

    <?php if ($errorMsg): ?>
        <div class="error"><?php echo $errorMsg; ?></div>
    <?php endif; ?>
    <?php if ($successMsg): ?>
        <div class="success"><?php echo $successMsg; ?></div>
    <?php endif; ?>
    <br>


    <form id="form-container" action="" method="post" onsubmit="return validateForm()">

        <label for="name"> Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Enter Password</label>
        <input type="password" id="password" name="password" required>

        <label for="repassword">Re-enter Password</label>
        <input type="password" id="repassword" required>

        <label for="DOB">Enter Date of Birth</label>
        <input type="date" id="DOB" name="DOB" required>

        <label for="phone">Enter Phone Number</label>
        <input type="text" id="phone" name="phone" required>

        <label for="address">Enter Address</label>
        <textarea id="address" name="address" required></textarea>

        <div class="terms-container">
            <input class="checkb" type="checkbox" id="terms" name="terms">
            <label for="terms">I agree to the <span class="terms-link" onclick="showModal()">Terms & Conditions</span></label>
        </div>
        <br>

        <button type="submit">Submit</button>

        <br>
    </form>

    <br><br>


        <!-- The Modal -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span><!--CLOSE X BUTTON-->
                <h2>Terms and Conditions</h2>
                <p>
                    Welcome to our website. By accessing or using our site, you agree to be bound by the following terms and conditions. 
                    These terms govern your use of the services provided by us. Please read them carefully. If you do not agree, you 
                    should not continue to use our site.
                </p>
                <ul>
                    <li>Respectful and lawful behavior is expected at all times.</li>
                    <li>Your data privacy is important, and we handle it with care.</li>
                    <li>Any breach of these terms may lead to account suspension or legal action.</li>
                    <li>We reserve the right to modify these terms at any time without notice.</li>
                </ul>
            </div>
        </div>    


    </body>
</html>
