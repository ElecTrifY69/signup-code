<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css'>
  <link rel="stylesheet" href="./style.css">
</head>
<body>

<div class="container">
  <header>Login Form</header>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> <!-- Updated form action -->
    <div class="field email-field">
      <div class="input-field">
        <input type="email" name="email" placeholder="Enter your email" class="email" required /> <!-- Added name attribute -->
      </div>
      <span class="error email-error">
        <i class="bx bx-error-circle error-icon"></i>
        <p class="error-text">Please enter a valid email</p>
      </span>
    </div>
    <div class="field create-password">
      <div class="input-field">
        <input type="password" name="password" placeholder="Password" class="password" required /> <!-- Added name attribute -->
        <i class="bx bx-hide show-hide"></i>
      </div>
      <span class="error password-error">
        <i class="bx bx-error-circle error-icon"></i>
        <p class="error-text">
          Please enter at least 8 characters with a number, symbol, small and
          capital letter.
        </p>
      </span>
    </div>
    <div class="links">
      <a href="#">Forgot Password</a>
      <a href="signup.php">Signup</a>
    </div>
    <div class="input-field button">
      <input type="submit" value="Login Now" />
    </div>
  </form>
</div>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HRMS";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Retrieve user from database
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, redirect to dashboard or other page
        $_SESSION['loggedin'] = true;
        header("Location: index.html"); // Change to the appropriate URL
        exit;
    } else {
        // No user found, display error message or redirect to login page
        echo "Invalid email or password";
    }
}

$conn->close();
?>

</body>
</html>
