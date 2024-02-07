<?php
 
  require 'connect.php'; 
  if($_SERVER["REQUEST_METHOD"]=='POST'){

    $name= $_POST['name'];
    $email= $_POST['email'];
    $designation= $_POST['designation'];
    $phone= $_POST['phone'];
    $image= $_POST['picture'];
    $password= $_POST['password'];

    $check_email_query= "SELECT * FROM staff WHERE email='$email'";

    $result= $con->query($check_email_query);

    if($result->num_rows > 0){
        header('Location:signup.php?error=1');
        exit();
    }
    else{

        $sql= "INSERT INTO staff (name, email, designation, phone,password,image) VALUES ('$name', '$email', '$designation','$phone','$password','$image')";

        if($con->query($sql)==TRUE){
            header("Location:signup.php?success=1");
            exit();
        }
        else{
            echo "Error: " . $sql . "<br>" . $con->connect_error;
        }
    }


  }
?>