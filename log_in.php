<?php

    session_start();
    $sname= "localhost";
    $unmae= "root";
    $password = "";

    $db_name = "hospital";

    $conn = mysqli_connect($sname, $unmae, $password, $db_name);

    $error='';
    $error_flag=1;
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        $error='Connection to database failed...!';
    }

    

    if(isset($_POST['submit'])){
        
        if (isset($_POST['username']) and isset($_POST['pass'])) {
            $u_name = $_POST['username'];
            $pass = $_POST['pass'];

            if (empty($u_name)) {
                $error='username is not set';
                if(empty($pass)){
                   $error='username and password are not set';
                }

            }elseif (empty($pass)) {
                $error='password is not set';
            }else{

                $sql = "SELECT * FROM users WHERE user_name='$u_name' AND password='$pass'";

                /*$result = mysqli_query($conn, $sql);*/
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['user_name'] === $u_name && $row['password'] === $pass) {
                        $_SESSION['user_name'] = $row['user_name'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['id'] = $row['id'];
                        $name=$row['name'];
                        
                        
                        if($row['access']=="admin"){
                            /*$error='welcome ' . $name . '  in home page';*/
                            header("Location:admin_home/home.php");
                        } else {
                                                
                            /*$error='welcome ' . $name . '  in information page';*/
                            header("Location: patient_info_page/patient_information.php");                        
                            
                        }
                    }else{
                        
                        $error='Incorect User name or password';
                    }
                }
                else{
                    
                    $error='Incorect User name or password..!';
                }
            }

        }else{
            
            $error='uname and pass are not set';
        }
        
    } else {
        $error_flag=1;
    }





?>







<!DOCTYPE html>
<html>
    <head>
        <title>log_in page</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="login_style.css" type="text/css" >
    </head>
    <body>
        
        
        <nav class="welcome">
            <div class="box1">
                <h1>Welcome To Our Page</h1>
            </div>
        </nav>
        
        <div class="box">
            <h2>Log-in</h2>
            <form action="" method="post">
                <div class="inputBox">
                    <p class="error">
                        <?php 
                            if($error_flag){
                                echo $error;
                            } else {
                                echo $error;
                            }
                        ?>
                    </p>
                    <input type="name" placeholder="User name" name="username">
                    <input type="password" placeholder="password" name="pass">
                    
                </div>
                <label>Don't have an account yet? </label>
                <a href="sign_up/sign_up.php">Create an account. </a>
                <input type="submit" name="submit" value="Login">
           
        </div>
        
    </body>
</html>




