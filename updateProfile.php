<?php
session_start();
require_once "connect.php";

// Check if the user is logged in
if (!isset($_SESSION['Cemail']) && !isset($_SESSION['sEmail'])) {
    header("Location: login.php");
    exit;
}

// Get the user details from the session
if (isset($_SESSION['Cemail'])) {
    $email = $_SESSION['Cemail'];
    $userType = "Customer";
} elseif (isset($_SESSION['sEmail'])) {
    $email = $_SESSION['sEmail'];
    $userType = "Staff";
}

// Get the updated details from the form
$name = $_POST['name'];
$dob = $_POST['dob'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];

// Update the user details in the database
if ($userType === "Customer") {
    $query = $conn->prepare("UPDATE customers SET Cname = ?, Cdob = ?, Cmobile = ?, Caddress = ? WHERE Cemail = ?");
    $query->bind_param("sssss", $name, $dob, $mobile, $address, $email);
} elseif ($userType === "Staff") {
    $query = $conn->prepare("UPDATE staff SET sName = ?, sDob = ?, sMobile = ?, sAddress = ? WHERE sEmail = ?");
    $query->bind_param("sssss", $name, $dob, $mobile, $address, $email);
}

$query->execute();

// Check if the update was successful
if ($query->affected_rows > 0) {
    // Update the session with the new name
    $_SESSION['Cname'] = $name;  // For customers
    $_SESSION['sName'] = $name;  // For staff (if applicable)
}

// Close the connection
$query->close();
$conn->close();

// Redirect back to the profile page
header("Location: profile.php");
exit;
?>
