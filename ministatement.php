<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$acc = $_SESSION['user_id'];
$transactions = mysqli_query($conn, "SELECT * FROM transactions WHERE account_number = $acc ORDER BY transaction_date DESC LIMIT 10");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mini Statement</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include("navbar.php"); ?>
<div class="container">
    <h2>Mini Statement</h2>
    <table border="1" cellpadding="8" style="margin:auto;">
        <tr><th>Type</th><th>Amount</th><th>Date</th></tr>
        <?php while ($row = mysqli_fetch_assoc($transactions)): ?>
            <tr>
                <td><?php echo $row['transaction_type']; ?></td>
                <td>₹<?php echo $row['amount']; ?></td>
                <td><?php echo $row['transaction_date']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>
