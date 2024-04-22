<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css'>
  <link rel="stylesheet" href="./style.css">
</head>
<body>

<div class="container">
  <header>Sign Up Form</header>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="field name-field">
      <div class="input-field">
        <input type="text" name="name" placeholder="Enter your Name" class="name" required />
      </div>
      <span class="error name-error">
        <i class="bx bx-error-circle error-icon"></i>
        <p class="error-text">Please enter a valid Name</p>
      </span>
    </div>
    <div class="field username-field">
      <div class="input-field">
        <input type="text" name="username" placeholder="Enter your Username" class="username" required />
      </div>
      <span class="error name-error">
        <i class="bx bx-error-circle error-icon"></i>
        <p class="error-text">Please enter a valid Username</p>
      </span>
    </div>
    <div class="field email-field">
      <div class="input-field">
        <input type="email" name="email" placeholder="Enter your email" class="email" required />
      </div>
      <span class="error email-error">
        <i class="bx bx-error-circle error-icon"></i>
        <p class="error-text">Please enter a valid email</p>
      </span>
    </div>
    <div class="field create-password">
      <div class="input-field">
        <input type="password" name="password" placeholder="Password" class="password" required />
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
    <div class="field confirm-password">
      <div class="input-field">
        <input type="password" name="cPassword" placeholder="Confirm Password" class="cPassword" required />
        <i class="bx bx-hide show-hide"></i>
      </div>
      <span class="error cPassword-error">
        <i class="bx bx-error-circle error-icon"></i>
        <p class="error-text">Password didn't match</p>
      </span>
    </div>
    <div class="links">
      <a href="#">Forgot Password</a>
      <a href="login.php">Login</a>
    </div>
    <div class="input-field button">
      <input type="submit" value="Signup Now" />
    </div>
  </form>
</div>

<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "HRMS"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $conn->real_escape_string($_POST['name']);
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    
    $sql = "INSERT INTO users (name, username, email, password) VALUES ('$name', '$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>

</body>
</html>
