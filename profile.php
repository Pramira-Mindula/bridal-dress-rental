<?php

session_start();

require_once "connect.php";

// Redirect to login if no one is logged in
if (!isset($_SESSION['Cemail']) && !isset($_SESSION['sEmail'])) {
    header("Location: login.php");
    exit;
}

// Check if the logged-in user is a customer
if (isset($_SESSION['Cemail'])) {
    $email = $_SESSION['Cemail'];
    $query = $conn->prepare("SELECT Cname AS name, Cemail AS email, Cdob AS dob, Cmobile AS mobile, Caddress AS address FROM customers WHERE Cemail = ?");
    $query->bind_param("s", $email);
    $userType = "Customer";
} 
// Check if the logged-in user is staff
elseif (isset($_SESSION['sEmail'])) {
    $email = $_SESSION['sEmail'];
    $query = $conn->prepare("SELECT sName AS name, sEmail AS email, sDob AS dob, sMobile AS mobile, sAddress AS address FROM staff WHERE sEmail = ?");
    $query->bind_param("s", $email);
    $userType = "Staff";
}

$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();

$query->close();
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="icon" href="img/icon2.png" type="image/x-icon">

    <!-- Style for Modal -->
    <style>
        /* Modal Background */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* Center the modal */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
            max-width: 600px;
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* Input Fields */
        input[type="text"], input[type="email"], input[type="date"], textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="date"]:focus, textarea:focus {
            border-color: #4CAF50;
            outline: none;
        }

        /* Button Styling */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Textarea */
        textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* Responsiveness */
        @media screen and (max-width: 600px) {
            .modal-content {
                width: 90%; /* Make the modal content take more space on smaller screens */
            }
        }

        .add-dress-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .add-dress-btn:hover {
            background-color: #0056b3;
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

    <div class="profile-container">
        <h2><?php echo $userType; ?> Profile</h2><br>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($user['dob']); ?></p>
        <p><strong>Mobile:</strong> <?php echo htmlspecialchars($user['mobile']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p><br>

        <!-- Edit Details Button -->
        <button id="edit-btn" class="edit-btn">Edit Details</button>

        <!-- If the logged-in user is staff, show Add Dress button -->
        <?php if ($userType === "Staff") : ?>
            <a href="addDress.php"><button class="add-dress-btn">Add Dress</button></a>
        <?php endif; ?>

        <!-- Edit Details Modal -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h3>Edit Details</h3><br>
                <form id="editForm" method="POST" action="updateProfile.php">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>">
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                    
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($user['dob']); ?>">
                    
                    <label for="mobile">Mobile:</label>
                    <input type="text" id="mobile" name="mobile" value="<?php echo htmlspecialchars($user['mobile']); ?>">
                    
                    <label for="address">Address:</label>
                    <textarea id="address" name="address"><?php echo htmlspecialchars($user['address']); ?></textarea>

                    <button type="submit">Update</button>
                </form>
            </div>
        </div>

        <a href="logout.php"><button class="logout-btn">Logout</button></a>
    </div>



    <!-- JavaScript for Modal -->
    <script>
        // Get the modal
        var modal = document.getElementById("editModal");

        // Get the button that opens the modal
        var btn = document.getElementById("edit-btn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
