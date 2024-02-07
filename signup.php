<?php
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
            <div class="login-container">
                <form action="signup_process.php" method="POST">
                    <h2 class="text-center my-8 text-color">Sign-up Here</h2>
                    <?php if (!empty($success_message)) : ?>
                     <div class="alert alert-success" role="alert">
                      <?php echo $success_message; ?>
                        </div>
                     <?php endif; ?>
                  <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" class="form-control" placeholder="enter your full name" id="name" name="name" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" placeholder="enter email address" id="email" name="email" required>
                  </div>
                  <div class="form-group">
                    <label for="designation">Designation</label>
                    <select name="designation" id="designation" class="form-control">
                        <option value="Admin">Admin</option>
                        <option value="Officer">Officer</option>
                        <option value="SalesPerson">SalesPerson</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="phone">Contact</label>
                    <input type="tel"  name="phone" id="phone" class="form-control" required>
                  </div>
                <div class="form-group">
                    <label for="picture">Picture</label>
                    <input class="form-control"  type="file" name="picture" id="picture" placeholder="select your photo" required>
                </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" placeholder="enter password" id="password" name="password" required>
                  </div>

                  <?php if (!empty($error_message)) : ?>
                     <div class="alert alert-danger" role="alert">
                      <?php echo $error_message; ?>
                        </div>
                     <?php endif; ?>
                  <div class="text-center">
                    <button class="btn bg-color" type="submit">Submit</button>
                 </div>
                    <p class="text-center">Already Have an Account? Log in <a href="login.php"> Here</a></p>
                
                </form>
            </div>
        </div>
     </div>
    </div>
</body>
</html>