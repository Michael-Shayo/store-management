
<?php
session_start(); 

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "store_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>



<!DOCTYPE html>
<html>
        <head>
            <title>Admin Dashboard</title>
            <link rel="shortcut icon" href="icons/cc_app32.png" type="image/x-icon">
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <script src="js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" href="Admin.css">
        </head>
        <body>
            <div class="container mt-5">
                    <div class="header"><h2>Admin Dashboard</h2></div>
                    <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
                    <div class="container "><br>
                
                            <h3>Insert Material</h3>
                            <div class="col-5">
                                    <form method="post" action="insert_material.php">
                                        Material Name: 
                                        <div class="input-group ">
                                            <span class="input-group-text">@</span>
                                            <input class="form-control"  placeholder="Material name" type="text" name="material_name" required>
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
                                            <input class="form-control" placeholder="Material name" type="text" name="material_name" required>
                                            </div><br>
                                            Quantity: 
                                            <input class="form-control" type="number" name="quantity" min="1" required><br>
                                            <input class="btn btn-secondary" type="submit" name="take_out_material" value="Take Out">
                                        </form>
                                </div>
                                <br>
                    </div>
                
<br><br>
                       
                        
                        <h3>Users</h3>
                        <table class="table table-bordered"  >
                            <thead class="thead-dark">
                                <tr>
                                    <th>User ID</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                                <?php
                                $sql = "SELECT * FROM users";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                <td>{$row['user_id']}</td>
                                                <td>{$row['username']}</td>
                                                <td>{$row['role']}</td>
                                              </tr>";
                                    }
                                } 
                                else {
                                    ?>
                                    <tr>
                                        <td colspan="5">No Records Found</td>
                                    </tr>
                                    <?php   
                                }
                                ?>
                        </table>


 <h3>Materials</h3>
                        <a href="view_materials.php"><button type="button" class="btn btn-primary mb-3">MATERIAL TABLE</button></a>
                        <br><br>
                        <a href="take_in&out_material.php"><button type="button" class="btn btn-secondary mb-3">IN AND OUT MATERIALS</button></a>
                        <br><br>
                        
                        <a href="register.php"> <button type="submit" class="btn btn-primary btn-block">Register new User</button></a>
                        <br><br>  


                        <form method="post" action="logout.php">
                            <a href="logout.php"><input type="submit" value="Logout" class="btn btn-danger"></a>
                        </form>
            </div>
        </body>
</html>