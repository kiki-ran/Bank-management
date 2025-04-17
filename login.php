<?php
include("db.php");
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acc = $_POST['account_number'];
    $pin = $_POST['pin'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE account_number='$acc' AND pin='$pin'");
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['user_id'] = $user['account_number'];
        $_SESSION['username'] = $user['name'];
        header("Location: home.php");
    } else {
        $error = "Invalid account number or PIN!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Bank</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form method="POST">
        <input type="number" name="account_number" placeholder="Account Number" required>
        <input type="password" name="pin" maxlength="4" placeholder="PIN" required>
        <button type="submit">Login</button>
    </form>
    <p style="color:red;"><?php echo $error; ?></p>
    <a href="signup.php">New user? Sign up here</a>
</div>
</body>
</html>
