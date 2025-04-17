<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $acc = $_SESSION['user_id'];

    mysqli_query($conn, "UPDATE users SET balance = balance + $amount WHERE account_number = $acc");
    mysqli_query($conn, "INSERT INTO transactions (account_number, transaction_type, amount) VALUES ($acc, 'Deposit', $amount)");
    $msg = "₹$amount deposited successfully.";
}
$result = mysqli_query($conn, "SELECT balance FROM users WHERE account_number = ".$_SESSION['user_id']);
$row = mysqli_fetch_assoc($result);
$balance = $row['balance'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Deposit</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include("navbar.php"); ?>
<div class="container">
    <h2>Deposit Cash</h2>
    <p>Current Balance: ₹<?php echo $balance; ?></p>
    <form method="POST">
        <input type="number" name="amount" min="1" placeholder="Amount to deposit" required>
        <button type="submit">Deposit</button>
    </form>
    <p style="color:green;"><?php echo $msg; ?></p>
</div>
</body>
</html>
