<?php

session_start();

//DB connection
require_once 'connect.php';

if ($_SERVER ['REQUEST_METHOD'] == 'POST'){

    $email = $_POST ["userEmail"];
    $password = $_POST ["userPassword"];

    // Check in customer table
    $sql_customer = "SELECT * FROM customers WHERE Cemail = '$email' AND Cpassword = '$password'";
    $result_customer = mysqli_query($conn, $sql_customer);

    // Check in staff table
    $sql_staff = "SELECT * FROM staff WHERE sEmail = '$email' AND sPassword = '$password'";
    $result_staff = mysqli_query($conn, $sql_staff);

    // Check if the email and password exist in any of the tables
    if (mysqli_num_rows($result_customer) == 1) {
        // Store session data
        $_SESSION['Cemail'] = $email;
        
        // Fetch customer name
        $customer = mysqli_fetch_assoc($result_customer);
        $_SESSION['Cname'] = $customer['Cname']; // Store customer name in session

        echo "<script> alert('Login Successful')</script>";
        echo "<script> window.history.go(-2);</script>"; // Redirect to seller dashboard
    } 
    elseif (mysqli_num_rows($result_staff) == 1) {
        // Store session data
        $_SESSION['sEmail'] = $email;
        
        // Fetch staff name
        $staff = mysqli_fetch_assoc($result_staff);
        $_SESSION['sName'] = $staff['sName']; // Store staff name in session

        echo "<script> alert('Staff Login Successful')</script>";
        echo "<script> window.history.go(-2);</script>"; // Redirect to staff dashboard
    } 
    else {
        echo "<script> alert('Invalid Email or Password')</script>";
        echo "<script> window.location.href = 'login.php';</script>"; // Redirect back to login page
    }


}
mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css">
        <link rel="icon" href="img/icon2.png" type="image/x-icon">

        <title>Login</title>
        
    </head>

    <body>

        <h1>Login</h1>
        <form id="form-container" action="" method="POST">
            <label>Email</label><br>
            <input type="email" name="userEmail"/><br>

            <label>Password</label><br>
            <input type="password" name="userPassword"/><br><br>

            <button type="submit" name="login">Login</button>
        </form>
        
    </body>
</html>