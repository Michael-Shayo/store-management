<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>material table</title>
    <style>
        .header{
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'algerian';
          }

    </style>
</head>
<body>
  <div class="container mt-5">  

               <div class="header"><h3>Taken Out Materials</h3></div> 
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "store_management";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                ?>
                <table  class="table table-bordered">
                    <thead class="thead-dark">
                    
                        <th >Material ID</th>
                        <th >Name</th>
                        <th >Quantity</th>
                        <th >Time & Date</th>
                    </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM taken_out_materials";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['material_id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['quantity']}</td>
                                    <td>{$row['Date']}</td>
                                  </tr>";
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="3">No Records Found</td>
                        </tr>
                        <?php  
                    }
                    ?>
                </table>

                <br><br>

                <div class="header"><h3>Inserterd Materials</h3></div> 
                <table  class="table table-bordered">
                    <thead class="thead-dark">
                    
                        <th >Material ID</th>
                        <th >Name</th>
                        <th >Quantity</th>
                        <th >Time & Date</th>
                    </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM inserted_materials";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['material_id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['quantity']}</td>
                                    <td>{$row['Date']}</td>
                                  </tr>";
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="3">No Records Found</td>
                        </tr>
                        <?php  
                    }
                    ?>
                </table>
                <br><br>
                <form action="<?php echo $_SERVER['HTTP_REFERER']; ?>" method="post">
                    <input type="submit" value="Go Back" class="btn btn-primary mb-3">
     
                </form>


    </div>           
</body>
</html>
