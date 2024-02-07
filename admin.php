<?php
 session_start();
 if (!isset($_SESSION['loggedin'])) {
    // User is not logged in, redirect to login page
    header('Location: login.php');
    exit();
}

// Retrieve user information from session
$username = $_SESSION['username'];
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
                <p><?php echo $username; ?></p>
                
                <p><?php echo $designation; ?></p>
                
                <p><?php echo $email; ?></p>
                <hr class="separator">
               

            </div>
            <div class="container col-md-9  " style="z-index: 1000; left: 100px;">
             
             <div class="card">
             <p class="mt-4 text-center text-success">Sales Data</p>
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
                $id=1;
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $id. "</td><td>" . $row["item"]. "</td><td>" . $row["qty"]. "</td><td>" . $row["price"]. "</td><td>" . $row["status"]. "</td></tr>";
                            $id++;
                        }
                    } else {
                        echo "<tr><td colspan='5'>No data found</td></tr>";
                    }
                    ?>
        
                </tbody>
            </table>
             </div>
        
                   
                
                <nav aria-label="Page navigation">
                  <ul class="pagination justify-content-center">
                   <?php
                      $sql_count = "SELECT COUNT(id) AS total FROM sales_orders";//query to count the number of rows in the table
                      $result_count = $con->query($sql_count);
                      $row_count = $result_count->fetch_assoc();// stores "total: values of the sql query result 
                      $total_pages = ceil($row_count['total'] / $limit);
                      if ($page > 1) {//check if the current page is greater than 1, and shown"previous>button linked the previous page($page-1)
                        echo '<li class="page-item"><a class="page-link" href="?page='.($page - 1).'">Previous</a></li>';
                    }
    
                    for ($i = 1; $i <= $total_pages; $i++) {// if the current page is no equal to the last page, then display current page and "next" button with links
                        echo '<li class="page-item '.($page == $i ? "active" : "").'"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
                    }
    
                    if ($page < $total_pages) {
                        echo '<li class="page-item"><a class="page-link" href="?page='.($page + 1).'">Next</a></li>';
                    }
                    ?>
                  </ul>
                </nav>
            
            </div>
                

            </div>
        </div>
    </div>
</body>
</html>