<?php
session_start(); 


$conn = new mysqli('localhost', 'root', '', 'store_management');

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in as manager
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'manager') {
    header("Location: login.php"); // Redirect to login page if not logged in as manager
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Manager Dashboard</title>
    <link rel="shortcut icon" href="icons/cc_app32.png" type="image/x-icon">
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <link rel="stylesheet" href="manager.css">

</head>
<body>
<div class="container  mt-5">
    <div class="header"><h2>Manager Dashboard</h2></div>
     <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>




       <div class="container "> <br>   
            <h3>Insert Material</h3>
            <div class="col-5">
            <form method="post" action="insert_material.php">
                Material Name: 
                <div class="input-group">
                <span class="input-group-text">@</span>
                <input class="form-control" placeholder="Material name" type="text" name="material_name" required><br>
                </div><br>
                Quantity:
                <div class="input-group"> 
                <input class="form-control" type="number" name="quantity" min="1" required><br>
                </div><br>
                <input class="btn btn-secondary" type="submit" value="Insert">
                
               
            </form>
            </div>

           <br>

            <h3>Take Out Material</h3>
            <div class="col-5">
            <form method="post" action="take_out_material.php">
                Material Name:
                <div class="input-group">
                    <div class="input-group-text">@</div>
                 <input class="form-control" placeholder="Material name" type="text" name="material_name" required><br>
                 </div><br>
                Quantity: 
                <input class="form-control" type="number" name="quantity" min="1" required><br>
                <input class="btn btn-secondary" type="submit" value="Take Out">
            </form>
            </div>
            <br>
        </div> 




<br><br>
           
            <h3>Materials</h3>
            <a href="view_materials.php"><button class="btn btn-primary" type="button">MATERIAL TABLE</button></a>

            <br><br>

           
            <form method="post" action="logout.php">
                <a href="logout.php"><input class="btn btn-danger" type="submit" value="Logout"></a>
            </form>
</div>
</body>
</html>