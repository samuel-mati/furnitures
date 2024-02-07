<?php
  session_start();
  if(isset($_GET["error1"]) && $_GET["error1"] == "1"){
    $error_message="Wrong Password";
  }
  else if(isset($_GET["error"]) && $_GET["error"] == "1"){
    $error_message="User does not exist";
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
            padding: 20px;
            border: 1px solid var(--hover-color);
            border-radius: 5px;
            margin-top:30px;
        }
        .text-color{
          color: var(--main_color);
        }
    </style>
</head>
<body>
    <div class="container">
     <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="login-container">
                
                <h2 class="text-center my-6 text-color">Login Here</h2>
                <?php if (!empty($error_message)) : ?>
                     <div class="alert alert-danger" role="alert">
                      <?php echo $error_message; ?>
                        </div>
                     <?php endif; ?>
            <form action="login_process.php" method="POST">
                  <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" placeholder="enter email address" id="email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" placeholder="enter password" id="password" name="password">
                  </div>
                  <div class="text-center">
                    <button class="btn bg-color" type="submit">Submit</button>
                 </div>
                 <div class="text-center">
                    <p>No Account? Sign Up<a href="signup.php"> Here</a></p>
                 </div>
                
                </form>
            </div>
        </div>
     </div>
    </div>
</body>
</html>