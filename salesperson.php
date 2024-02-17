<?php
 session_start();
 if (!isset($_SESSION['loggedin'])) {
    // User is not logged in, redirect to login page
    header('Location: login.php');
    exit();
}

// Retrieve user information from session
$name = $_SESSION['username'];
$email = $_SESSION['email'];
$designation=$_SESSION['designation'];
$image=$_SESSION['image'];

require 'connect.php';
$limit = 10; // Number of rows per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$sql = "SELECT * FROM sales_orders LIMIT $start, $limit";
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Administrator</title>

    <style>
        body{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        :root {
        --main_color: #087080;
        --hover-color:#0e98ad;
        }
        .bg-color{
          background-color: var(--main_color);
          width:100%;
          border: none;
          color: #ffffff;
          font-weight: 600;
          height: 100vh;
        }
        .separator{
            background-color: #ffffff;
        }
        
    </style>
</head>
<body>
    <div class="container-fluid " >
        <div class="row justify-content-center">
            <div class="col-md-2 bg-color text-center position-fixed" style="z-index: 1000; left: 0;">
                  <p class="my-4">User Profile</p>
                  <hr class="separator">
                  <div class="profile-image-container text-center">
                    <img src="images/<?php echo $image; ?>" alt="" class="rounded-circle" style="width: 100px; height: 100px; background-color: antiquewhite;"> 
                </div>
                <hr class="separator">
                <p><?php echo $name; ?></p>
                
                <p><?php echo $designation; ?></p>
                
                <p><?php echo $email; ?></p>
                <hr class="separator">
               

            </div>
            <div class="container col-md-9  " style="z-index: 1000; left: 100px;">
             
             <div class="card">
             <h2 class="mt-4 text-center text-danger">Sales Data</h2>
             <table class="table table-stripped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["item"]. "</td><td>" . $row["qty"]. "</td><td>" . $row["price"]. "</td><td>" . $row["status"]. "</td></tr>";
                    
                        }
                    } else {
                        echo "<tr><td colspan='5'>No data found</td></tr>";
                    }
                    ?>
        
                </tbody>
            </table>
             </div>
        
                   
                
               
                   
            
            </div>
                

            </div>
        </div>
    </div>
</body>
</html>