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
$quantity_to_take_out = $_POST['quantity']; 
$date = date("Y-m-d H:i:s");

// Check if the material exists in the database
$sql = "SELECT * FROM materials WHERE name = '$material_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $current_quantity = $row['quantity'];
    

    // Check if there's enough quantity to take out
    if ($quantity_to_take_out <= $current_quantity) {
        $new_quantity = $current_quantity - $quantity_to_take_out;

        // Update the quantity in the database
        $update_sql = "UPDATE materials SET quantity = $new_quantity WHERE name = '$material_name'";
        if ($conn->query($update_sql) === TRUE) {
            echo "Material taken out successfully<br>";
        } else {
            echo "Error updating quantity: " . $conn->error;
        }
    } else {
        echo "Insufficient quantity available for this material<br>";
    }
} else {
    echo "Material not found";
}

//insert data into taken out material

if($quantity_to_take_out <= $current_quantity){
    $takeout_material ="INSERT INTO taken_out_materials (name, quantity,worker_id, Date) VALUES ('$material_name', '$quantity_to_take_out','','$date')";  

            if ($conn->query($takeout_material) ===TRUE){
                echo "New material added to taken_out_materials successfully";
            }
            else {
                echo "Error take out material";
            }
}else {}

$conn->close();
?>