<?php

session_start();
    $sname= "localhost";
    $unmae= "root";
    $password = "";

    $db_name = "hospital";

    
    
    
$error_flag=1;
$error='';

    
    
    

if(isset($_POST['submit'])){
        
        if ( isset($_POST['name']) and isset($_POST['pass']) and isset($_POST['passag']) )  {
            $name = $_POST['name'];
            $uname = $_POST['uname'];
            $pass = $_POST['pass'];
            $passag = $_POST['passag'];
            $email = $_POST['email'];
            
            if ( empty($name) || empty($uname)  || empty($pass)|| empty($passag) ) {
                $error='any * unset';
            } else {
                if($passag != $pass)
                    $error='pass and pass again arenot the same';
                else {
                    $conn = mysqli_connect($sname, $unmae, $password, $db_name);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        $error='Connection to database failed...!';
                    }
                
                    $sql = "INSERT INTO users (user_name,password,name,email)
                    VALUES ('$uname', '$pass', '$name', '$email')";

                    if ($conn->query($sql) === TRUE) {
                      $error ="New record created successfully";
                    }
                    else {
                      $error= "Error: " . $sql . "<br>" . $conn->error;
                    }
                     
                      
                    $conn->close();
                    header("Location: ../patient_info_page/patient_information.php");
                }
            }
            

        }else{
            
            $error='Have fields unset';
        }
        
} 
else {
    $error_flag=1;
}
 

?>




<!DOCTYPE html>
<html>
    <head>
        <title>sign_up page</title>
        <link rel="stylesheet" href="signup_style.css" type="text/css" >
    </head>
    <body>
        <nav class="menu">
            <h1 class="head">welcome to our page</h1>
        </nav>
        
        <div class="box">
            <form class="sign" action="" method="post">
                <fieldset>
                    <legend class="legend">sign_up</legend>
                    
                    <div class="input_lable">
                        
                        <p class="error">
                            
                            <?php 
                            
                                if($error_flag){
                                    echo $error;
                                } 
                             
                            ?>
                            
                        </p>
                        
                        <label>*your name:</label>
                        <input type="name"  placeholder="Enter your username" name="name"><br>
                        <label>*Username:</label>
                        <input type="name"  placeholder="Enter your username" name="uname"><br>
                        <label>*Password:</label>
                        <input type="password"  placeholder="password" name="pass"><br>
                        <?php
                        
                        ?>
                        <label>*Password again:</label>
                        <input type="password"  placeholder="password again" name="passag"><br>
                        <label>Email</label>
                        <input type="email"  placeholder="anything@gmail.com" name="email"><br>
                        <input type="Reset">
                        
                        
                    </div>
                    
                    <input type="submit" value="sign_up" name="submit">
                    
                </fieldset>
            </form>
        </div>
        
    </body>
</html>








