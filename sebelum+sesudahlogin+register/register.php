<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$err = "";

if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password != $confirm_password) {
        $err = "Password dan konfirmasi password harus sama!";
    } else {
        $query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
        if ($conn->query($query) === TRUE) {
            header("Location: login.php");
            exit();
        } else {
            $err = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
        if (!empty($err)) {
            echo '<div class="alert alert-danger" role="alert">';
            echo $err;
            echo '</div>';
            $err = "";
        }
        ?>
        <form id="registerForm" action="register.php" method="post">
            <div class="form-group">
                <input type="email" class="form-control" id="username" name="username" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
            </div>
            <button type="submit" name="register" class="btn btn-primary btn-block">Daftar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
