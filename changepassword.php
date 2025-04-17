<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current = $_POST['current_pin'];
    $new = $_POST['new_pin'];
    $confirm = $_POST['confirm_pin'];
    $acc = $_SESSION['user_id'];

    $res = mysqli_query($conn, "SELECT pin FROM users WHERE account_number = $acc");
    $row = mysqli_fetch_assoc($res);

    if ($row['pin'] != $current) {
        $msg = "Current PIN is incorrect!";
    } elseif ($new != $confirm) {
        $msg = "New PINs do not match!";
    } else {
        mysqli_query($conn, "UPDATE users SET pin = '$new' WHERE account_number = $acc");
        $msg = "PIN changed successfully!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change PIN</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include("navbar.php"); ?>
<div class="container">
    <h2>Change PIN</h2>
    <form method="POST">
        <input type="password" name="current_pin" placeholder="Current PIN" required>
        <input type="password" name="new_pin" placeholder="New PIN" required>
        <input type="password" name="confirm_pin" placeholder="Confirm New PIN" required>
        <button type="submit">Change PIN</button>
    </form>
    <p style="color:green;"><?php echo $msg; ?></p>
</div>
</body>
</html>
