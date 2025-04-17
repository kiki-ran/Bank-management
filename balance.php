<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$acc = $_SESSION['user_id'];
$res = mysqli_query($conn, "SELECT balance FROM users WHERE account_number = $acc");
$row = mysqli_fetch_assoc($res);
$balance = $row['balance'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Balance Enquiry</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include("navbar.php"); ?>
<div class="container">
    <h2>Balance Enquiry</h2>
    <p>Account Number: <?php echo $acc; ?></p>
    <p>Available Balance: ₹<?php echo $balance; ?></p>
</div>
</body>
</html>
