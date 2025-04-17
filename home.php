<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include("navbar.php"); ?>
<div class="container">
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p>Select a service:</p>
    <a href="deposit.php">Deposit Cash</a>
    <a href="withdraw.php">Withdraw Cash</a>
    <a href="balance.php">Balance Enquiry</a>
    <a href="ministatement.php">Mini Statement</a>
    <a href="changepassword.php">Change Password</a>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>
