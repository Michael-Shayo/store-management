<?php
session_start(); // Start or resume a session

// Database connection details
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form inputs
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    

    // SQL query to insert user
    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        // If user is registered successfully
        ?>
        <script type="text/javascript">
            alert("User registered successfully");
            window.open("http://localhost/STORE PROJECT/index.php");
        </script>
        <?php
    } else {
        $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            margin: 20px;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Register</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role:</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="admin">Admin</option>
                                <option value="manager">Manager</option>
                                <option value="worker">Worker</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </form>
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo "<div class='alert alert-danger mt-3'>{$_SESSION['error']}</div>";
                        unset($_SESSION['error']);
                    }
                    ?>
                </div>
            </div>
        </div> 
    </div>
</div>

<br><br>

<div class="container">
    <div class="row justify-content-center ">
    <form action="<?php echo $_SERVER['HTTP_REFERER']; ?>" method="post">

        <input type="submit" value="Go Back" class="btn btn-primary mb-3">
     
    </form>
    </div>
</div>
</body>

</html>
