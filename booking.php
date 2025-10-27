<?php
session_start();
require_once 'connect.php';

// Check if the user is logged in
if (!isset($_SESSION['Cname'])) {
    echo "<script> alert('You must be logged in to book a dress'); window.history.back(); </script>";
    exit();
}

$customerName = $_SESSION['Cname'];

// Fetch the customer's customerID from the database
$query = "SELECT customerID FROM customers WHERE Cname = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $customerName);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $customerID = $row['customerID'];
} else {
    echo "<script> alert('Customer not found.'); window.history.back(); </script>";
    exit();
}

// Check if dressID is passed in the URL
if (!isset($_GET['dressID'])) {
    echo "<p>Dress ID not provided.</p>";
    exit();
}

$dressID = $_GET['dressID'];

// Fetch dress details
$sql = "SELECT dressID, dressCode, dressImage, dressName, dressPrice FROM dresses WHERE dressID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $dressID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<p>Dress not found.</p>";
    exit();
}

$dress = $result->fetch_assoc();
$dressCode = $dress['dressCode'];
$dressImage = $dress['dressImage'];
$dressName = $dress['dressName'];
$dressPrice = $dress['dressPrice'];

$bookingSuccess = false;
$billGenerated = false;

// Handle form submission for booking
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmBooking'])) {
    $bookingID = rand(10000000, 99999999);
    $bookedDate = $_POST['bookingDate'];
    $returnDate = $_POST['returnDate'];

    $sql = "INSERT INTO bookeddress (bookingID, Cname, dressCode, bookedDate, returnDate) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $bookingID, $customerName, $dressCode, $bookedDate, $returnDate);

    if ($stmt->execute()) {
        $_SESSION['bookingID'] = $bookingID;
        $bookingSuccess = true;
    }
}

$billedDate = date('Y-m-d');
// Handle form submission for generating bill
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['getBill'])) {
    if (!isset($_SESSION['bookingID'])) {
        die("Error: Booking ID not found in session.");
    }

    $bookingID = $_SESSION['bookingID'];
    $billedDate = date('Y-m-d');

    // Debugging: Print values before inserting
    echo "Booking ID: " . $bookingID . "<br>";
    echo "Customer ID: " . $customerID . "<br>";
    echo "Billed Date: " . $billedDate . "<br>";
    echo "Total Amount: " . $dressPrice . "<br>";

    // Insert bill into database
    $sql = "INSERT INTO bills (bookingID, customerID, billedDate, totalAmount) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if statement was prepared successfully
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("iisi", $bookingID, $customerID, $billedDate, $dressPrice);

    // Execute and check if successful
    if ($stmt->execute()) {
        echo "Bill inserted successfully!";
        $billGenerated = true;
    } else {
        die("Error executing query: " . $stmt->error);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>

    <link rel="icon" href="img/icon2.png" type="image/x-icon">
    <link rel="stylesheet" href="css/booking.css">
    <script src="js/booking.js"></script>

    <style>
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border-radius: 10px;
            width: 40%;
            text-align: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }
        .close {
            float: right;
            font-size: 24px;
            cursor: pointer;
        }
        .close:hover {
            color: red;
        }
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 20px;
            border-radius: 10px;
            width: 50%;
            text-align: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        }

        /* Close button */
        .close {
            float: right;
            font-size: 24px;
            cursor: pointer;
        }
        .close:hover {
            color: red;
        }

        /* Logo */
        .bill-logo {
            width: 30%;
            margin-bottom: 10px;
        }

        /* Bill Sections */
        .bill-header, .bill-details, .bill-summary, .bill-total {
            text-align: left;
            padding: 10px;
        }
        .bill-header h2 {
            margin: 5px 0;
        }
        .bill-summary, .bill-total, .bill-details {
            font-size: 17px;
        }
        hr {
            border: 0.5px solid #ccc;
            width: 100%;
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

        <!-- <?php
            echo "Booking ID: " . $bookingID . "<br>";
            echo "Customer ID: " . $customerID . "<br>";
            echo "Billed Date: " . $billedDate . "<br>";
            echo "Total Amount: " . $dressPrice . "<br>";
        ?> -->

    <div class="booking-container">
        <div class="dress-info">
            <img src="<?php echo $dressImage; ?>" alt="Dress Image">
            <p><strong>Dress Name:</strong> <?php echo $dressName; ?></p>
            <p><strong>Dress Code:</strong> <?php echo $dressCode; ?></p>
            <p><strong>Customer Name:</strong> <?php echo $customerName; ?></p>
            <p><strong style="color: black;">Price: </strong><strong style="color: #007bff;">LKR <?php echo number_format($dressPrice, 2); ?></strong></p>
            </div>

        <div class="booking-form">
            <?php if (!$bookingSuccess): ?>
                <form method="post" onsubmit="return validateForm()">
                    <label for="bookingDate">Booking Date:</label>
                    <input type="date" id="bookingDate" name="bookingDate" required>
                    <label for="returnDate">Return Date:</label>
                    <input type="date" id="returnDate" name="returnDate" required>
                    <button type="submit" name="confirmBooking">Confirm Booking</button>
                </form>
            <?php else: ?>
                <p style="color: green;">Booking Confirmed! Booking ID: <?php echo $_SESSION['bookingID']; ?></p>
                <form method="post">
                    <button type="submit" name="getBill" id="generateBill">Get Bill</button>
                </form>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bill Modal -->
    <div id="billModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            
            <!-- Bill Header with Logo -->
            <div class="bill-header">
                <img src="img/RAVII BRIDAL1.png" alt="Website Logo" class="bill-logo">
                <h2>Rental Invoice</h2>
                <p>Ravii Bridal Dress Store</p>
                <hr>
            </div>

            <!-- Customer & Booking Info -->
            <div class="bill-details">
                <p><strong>Customer Name:</strong> <?php echo $customerName; ?></p>
                <p><strong>Booking ID:</strong> <?php echo $_SESSION['bookingID'] ?? ''; ?></p>
                <p><strong>Billed Date:</strong> <?php echo date('Y-m-d'); ?></p>
            </div>

            <!-- Rental Summary -->
            <div class="bill-summary">
                <p><strong>Dress Name:</strong> <?php echo $dressName; ?></p>
                <p><strong>Dress Code:</strong> <?php echo $dressCode; ?></p>
                <p><strong>Rental Price:</strong> LKR <?php echo number_format($dressPrice, 2); ?></p>
            </div>

            <hr>

            <!-- Payment Summary -->
            <div class="bill-total">
                <p style="font-size: 20px;"><strong>Total Amount:</strong> LKR <?php echo number_format($dressPrice, 2); ?></p>
                <p>Thank you for choosing us!</p>
            </div>
        </div>
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
