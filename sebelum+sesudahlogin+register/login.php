<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login"; // Ganti dengan nama database Anda

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Deklarasi variabel $err
$err = "";

// Form submission handling
// Form submission handling
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the user exists
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Fetch user details
        $user = $result->fetch_assoc();
        
        // Set session variables
        $_SESSION['username'] = $user['username'];
        $_SESSION['userid'] = $user['id'];
        
        // Redirect to home page
        header("Location: home.php");
        exit();
    } else {
        // Login failed, set error message
        $err = "Username atau Password tidak valid. Mohon coba lagi.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk atau Daftar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar untuk dekstop -->
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light d-none d-lg-block">
        <div class="container-fluid" style="background-image: url('navbar-background.jpg');">
            <a class="navbar-brand" href="#">Kopi Kenangan</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    Tombol untuk menampilkan form login -->
                    <!-- <li class="nav-item">
                        <button class="nav-link btn btn-link" id="showLoginFormBtn">Masuk</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->

    <!-- Form login (awalnya disembunyikan) -->
    <div class="container" id="loginFormContainer">
        <?php
        if (!empty($err)) {
            echo '<div class="alert alert-danger" role="alert">';
            echo 'Login failed:<br>';
            echo '<ul>' . $err . '</ul>';
            echo '</div>';
            // Kosongkan variabel $err setelah menampilkannya
            $err = "";
        }
        ?>
        <form id="loginForm" action="login.php" method="post">
            <div class="form-group">
                <input type="email" class="form-control" id="username" name="username" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <!-- <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="agree" name="agree" required>
                <label class="form-check-label" for="agree">Kami setuju dengan Ketentuan dan Layanan dan Kebijakan Privasi Kopi Kenangan</label>
            </div> -->
            <button type="submit" name="login" class="btn btn-primary btn-block">Masuk</button>
            <div class="text-center mt-3">
                <a href="register.php" class="btn btn-link">Daftar</a>
            </div>
        </form>
        
    </div>

    <!-- JavaScript untuk menampilkan/menyembunyikan formulir login
    <script>
        document.getElementById('showLoginFormBtn').addEventListener('click', function() {
            document.getElementById('loginFormContainer').style.display = 'block';
        });
    </script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
