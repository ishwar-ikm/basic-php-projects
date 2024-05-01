<?php
    if($_SERVER["REQUEST_METHOD"]){
        include('dbconnect.php');

        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $error = "";

        $sql = "SELECT * FROM `users` WHERE `user_email`='$email'";
        $result = mysqli_query($conn, $sql);

        $numrow = mysqli_num_rows($result);

        if($numrow == 1){
            $row = mysqli_fetch_assoc($result);

            if(password_verify($pwd, $row['password'])){
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['useremail'] = $email;
                header("Location: ../index.php");
                exit();
            }
            else{
                $error = "Password doesn't match";
            }
        }
        else{
            $error = "Email doesn't exist";
        }

        header("Location: ../login.php?login=false&error=$error");
    }
?>