<?php
require 'connect.php';
  if(isset($_GET["success"]) && $_GET["success"] == "1"){
    $success_message="New worker added successfully";
  }else{
    $success_message="";
  }
  if(isset($_GET["error"]) && $_GET["error"] == "1"){
    $error_message="User with that email already exists";
  }else{
    $error_message="";
  }

  if (isset($_GET['id'])) {
    // Retrieve item details from the database based on the provided ID
    $itemId = $_GET['id'];
    // Perform database query to fetch item details
    $sql="SELECT * FROM sales_orders WHERE ID='$itemId'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }        
} else {
    // Redirect to homepage or display error message
    header("Location: index.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Furniture Store Management System-Login</title>

    <style>
      :root {
        --main_color: #087080;
        --hover-color:#0e98ad;
        }
        body{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .bg-color{
          background-color: var(--main_color);
          width:100%;
          border: none;
          color: #ffffff;
          font-weight: 600;
        }
         form .bg-color:hover{
          background-color: var(--hover-color);
          width:100%;
          border: none;
          color: #ffffff;
          font-weight: 600;
        }
        .login-container {
            max-width: 400px;
            margin: auto;
            padding: 5px;
            border: 1px solid var(--hover-color);
            border-radius: 5px;
            margin-top:10px;
        }
        .text-color{
            color:var(--main_color);
        }
    </style>
</head>
<body>
    <div class="container">
     <div class="row">
        <div class="col-md-6 offset-md-3">
                <form action="edit.php" method="POST" onsubmit="return confirmSubmit()">
                    <h2 class="text-center my-8 text-danger">Edit Profile</h2>
                    <?php if (!empty($success_message)) : ?>
                     <div class="alert alert-success" role="alert">
                      <?php echo $success_message; ?>
                        </div>
                     <?php endif; ?>
                     <div class="form-group">
    <label for="id">ID</label>
    <input type="text" class="form-control" placeholder="Enter ID" id="id" name="id"  value="<?php echo $row['id'];?>"  readonly>
</div>
<div class="form-group">
    <label for="itemName">Item Name</label>
    <input type="text" class="form-control" placeholder="Enter item name" id="itemName" name="itemName"  value="<?php echo $row['item'];?>" required>
</div>
<div class="form-group">
    <label for="price">Price</label>
    <input type="number" class="form-control" placeholder="Enter price" id="price" name="price"  value="<?php echo $row['price'];?>" required>
</div>
<div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="number" class="form-control" placeholder="Enter quantity" id="quantity" name="quantity"  value="<?php echo $row['qty'];?>" required>
</div>
<div class="form-group">
    <label for="status">Status</label>
    <input type="text" name="status" id="status" class="form-control" required  value="<?php echo $row['status'];?>" >

</div>


                  <?php if (!empty($error_message)) : ?>
                     <div class="alert alert-danger" role="alert">
                      <?php echo $error_message; ?>
                        </div>
                     <?php endif; ?>
                  <div class="text-center">
                    <button class="btn btn-primary container-fluid" type="submit">Save Changes</button>
                 </div>
                
                </form>

        </div>
     </div>
    </div>
    <script>
        function confirmSubmit() {
            // Prompt the user to confirm their action
            var confirmation = confirm("Are you sure you want to submit this form?");
            // If user confirms, return true to allow form submission
            // If user cancels, return false to prevent form submission
            return confirmation;
            
        }
    </script>
</body>
</html>