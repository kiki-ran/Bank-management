<?php
include("db.php");

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $occupation = $_POST['occupation'];
    $fathers_name = $_POST['fathers_name'];
    $account_type = $_POST['account_type'];
    $pin = $_POST['pin'];

    $sql = "INSERT INTO users (name, age, sex, occupation, fathers_name, account_type, pin) 
            VALUES ('$name', $age, '$sex', '$occupation', '$fathers_name', '$account_type', '$pin')";
    
    if ($conn->query($sql)) {
        $msg = "Account created successfully! Your Account Number is: " . $conn->insert_id;
    } else {
        $msg = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Create Account</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="number" name="age" placeholder="Age" required>
        <select name="sex" required>
            <option value="">Select Gender</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
        </select>
        <input type="text" name="occupation" placeholder="Occupation" required>
        <input type="text" name="fathers_name" placeholder="Father's Name" required>
        <select name="account_type" required>
            <option value="">Account Type</option>
            <option>Savings</option>
            <option>Current</option>
        </select>
        <input type="password" name="pin" maxlength="4" placeholder="4-digit PIN" required>
        <button type="submit">Create Account</button>
    </form>
    <p style="color:green;"><?php echo $msg; ?></p>
    <a href="login.php">Already have an account? Login</a>
</div>
</body>
</html>
