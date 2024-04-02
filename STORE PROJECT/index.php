<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "store_management";

// Establish a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted (POST request)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check user credentials
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    // If there is a single matching user, log them in
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['username'] = $username;

        // Redirect to appropriate dashboard based on user role
        if ($row['role'] == 'admin') {
            header("Location: admin_dashboard.php");
        } elseif ($row['role'] == 'manager') {
            header("Location: manager_dashboard.php");
        } else {
            header("Location: worker_dashboard.php");
        }
    } else {
        // Set error message for incorrect credentials
        $error = "Invalid username or password";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="shortcut icon" href="icons/around-the-world.gif" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .card {
            width: 300px;
        }
    </style>
</head>
<body>

<div class="card p-3">
    <h2 class="text-center mb-4">Login</h2>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
 <?php
    if (isset($error)) {
        echo "<p class='text-danger mt-3'>$error</p>"; 
    }
    ?>

</div>

</body>
</html>
