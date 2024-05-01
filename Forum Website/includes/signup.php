<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include('dbconnect.php');
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $cpwd = $_POST['cpwd'];
        $error = "false";

        
        $existCheck = "SELECT * FROM `users` WHERE `user_email`='$email'";
        $result = mysqli_query($conn, $existCheck);
        
        if(mysqli_num_rows($result) <= 0){
            
            if($pwd == $cpwd){
                $hash = password_hash($pwd, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`user_email`, `password`) VALUES ('$email', '$hash')";
                mysqli_query($conn, $sql);
                header("Location: ../login.php?signup=true");
                exit();
            }   
            else{
                $error = "Password doesn't match";
            }
        }
        else{
            $error = "Email already exists";
        }
        
        header("Location: ../register.php?signup=false&error=$error");
        exit();
    }
?>