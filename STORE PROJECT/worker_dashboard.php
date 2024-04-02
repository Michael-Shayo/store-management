<?php
session_start(); 


$conn = new mysqli('localhost', 'root', '', 'store_management');

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in as worker
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'worker') {
    header("Location: login.php"); // Redirect to login page if not logged in as worker
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Worker Dashboard</title>
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <link rel="stylesheet" href="worker.css">
   
</head>
<body>
<div class="container mt-5">
                     <div class="header"><h2>Worker Dashboard</h2></div>   
                        <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>



                <div class="container"><br>
                        <h3>Insert Material</h3>
                        <div class="col-5">
                        <form method="post" action="insert_material.php">
                            Material Name:
                            <div class="input-group">
                                <span class="input-group-text">@</span>
                             <input class="form-control" placeholder="Material name" type="text" name="material_name" required><br>
                             </div><br>
                            Quantity:
                             <input class="form-control" type="number" name="quantity" min="1" required><br>
                            <input class="btn btn-secondary" type="submit" name="insert_material" value="Insert">
                        </form>
                        </div>

                        <br>

                        
                        <h3>Take Out Material</h3>
                        <div class="col-5">
                        <form method="post" action="take_out_material.php">
                            Material Name: 
                            <div class="input-group">
                                <span class="input-group-text">@</span>
                            <input class="form-control" placeholder="Material name" type="text" name="material_name" required><br>
                            </div><br>
                            Quantity: 
                            <input class="form-control" type="number" name="quantity" min="1" required><br>
                            <input  class="btn btn-secondary" type="submit" name="take_out_material" value="Take Out">
                        </form>
                        </div><br>
                </div>



<br><br>

                            <!-- Add logout button -->
                            <form method="post" action="logout.php">
                                <input class="btn btn-danger" type="submit" value="Logout">
                            </form>
                        </div>
</div>
</body>
</html>
