<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "store_management"; 


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$material_name = $_POST['material_name']; 
$quantity = $_POST['quantity']; 
$date = date("Y-m-d H:i:s"); 

// Check if the material exists in the database
$sql = "SELECT * FROM materials WHERE name = '$material_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Material exists, update the quantity
    $row = $result->fetch_assoc();
    $new_quantity = $row['quantity'] + $quantity;
    $update_sql = "UPDATE materials SET quantity = $new_quantity WHERE name = '$material_name'";
    
    if ($conn->query($update_sql) === TRUE) {
       
        echo "<div class='alert alert-danger mt-3'>Quantity updated successfully</div><br>";
    } else {
        echo "Error updating quantity: " . $conn->error;
    }
} else {
    // Material does not exist, create a new record in materials table
    $insert_sql = "INSERT INTO materials (name, quantity, update_date) VALUES ('$material_name', '$quantity','$date')";
    
    if ($conn->query($insert_sql) === TRUE) {
        echo "New material added successfully to materials<br>";
    } else {
        echo "Error adding new material to materials: " . $conn->error;
    }
}

// Insert data into inserted_material table
$inserted_material_sql = "INSERT INTO inserted_materials (name, quantity, Date) VALUES ('$material_name', '$quantity', '$date')";

if ($conn->query($inserted_material_sql) === TRUE) {
    echo "New material added to inserted_material successfully";
} else {
    echo "Error adding new material to inserted_material table: " . $conn->error;
}

$conn->close();
?>
