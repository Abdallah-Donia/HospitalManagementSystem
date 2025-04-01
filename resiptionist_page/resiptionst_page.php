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
                
                    $sql = "INSERT INTO users (user_name,password,name,email,access)
                    VALUES ('$uname', '$pass', '$name', '$email','admin')";

                    if ($conn->query($sql) === TRUE) {
                      $error ="New record created successfully";
                    } else {
                      $error= "Error: " . $sql . "<br>" . $conn->error;
                    }

                    $conn->close();
                }
            }
            

        }else{
            
            $error='Have fields unset';
        }
        
} else {
    $error_flag=1;
}

?>





<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="resiptionst style.css" type="text/css" >
    </head>
    <body>
         <header class="main">
            <h1><img class="image" src="resptionist.png" >Welcome to Receptionist page</h1>
        </header>
        
        
        
        
        
        <div class="creat">
            <div class="head" id="view">View Doctor Profile</div>
        
        
            <section class="choise_update">
                <div class="who">
                    <legend class="leg">which Dr:</legend>
                    <form action="" method="post">
                        <label>ID: </label>
                        <input type="name" name="id"><br>

                        <br><input class="View" type="submit" value="View" name="search"><br>
                    </form>
                </div>
            </section>
                    <?php
                    $user = "root";
                    $pass = "";
                    $db = "hospital";
                    $db = new mysqli("localhost",$user,$pass,$db);
                    if(isset($_POST['search']))
                    {
                            $id = $_POST['id'];
                            $query = "select * from doctor_details where id='$id'";
                            $query_run = mysqli_query($db, $query);
                            ?>
                              <table id="patients">
                 
                                <tr>
                                  <th>ID</th>
                                  <th>Full Name </th>
                                  <th>gender</th>
                                  <th>address</th>
                                  <th>Phone_No</th>
                                  <th>Email</th>
                                  <th>Specialty</th>
                                  <th>Joining_date</th>
                                  <th>departure_date</th>
                                  <th>depart</th>
                                  
                                </tr>
                            <?php
                            while($row = mysqli_fetch_array($query_run))
                            {
                              ?>
                               <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['doctorName']?></td>
                               <td><?php echo $row['gender'] ?></td>
                                <td><?php echo $row['country'] . "-" . $row['city'] . "-" . $row['street']?></td>
                                <td><?php echo $row['phone1']?></td>
                                <td><?php echo $row['email']?></td>
                                <td><?php echo $row['specialization'] ?></td>
                                <td><?php echo $row['joining_date'] ?></td>
                                <td><?php echo $row['departure_date']?></td>
                                <td><?php echo $row['department']?></td>
                                
                              </tr>
                                <?php
                            }
                    }
                ?>
                              </table>
            
            
        </div>
        
        
         <div class="creat">
            <div class="head" id="Table2">All Doctor's profiles</div>
             <section class="choise_update">
                <div class="who">
                    <legend class="leg">All Profiles :</legend>
                    <form action="" method="post">
                       <input class="View" type="submit" value="View" name="search4">
                    </form>
                </div>
            </section>
             <?php
             $user = "root";
            $pass = "";
            $db = "hospital";
            $db = new mysqli("localhost",$user,$pass,$db);
            if(isset($_POST['search4']))
            {
               $query = "select * from doctor_details";
               $query_run = mysqli_query($db, $query);
               ?>
                <table id="patients">
                 
                                <tr>
                                   <th>ID</th>
                                  <th>Full Name </th>
                                  <th>gender</th>
                                  <th>address</th>
                                  <th>Phone_No</th>
                                  <th>Email</th>
                                  <th>Specialty</th>
                                  <th>Joining_date</th>
                                  <th>departure_date</th>
                                  <th>depart</th>
                                  
                                </tr>
                            <?php
                            while($row = mysqli_fetch_array($query_run))
                            {
                              ?>
                               <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['doctorName']?></td>
                               <td><?php echo $row['gender'] ?></td>
                                <td><?php echo $row['country'] . "-" . $row['city'] . "-" . $row['street']?></td>
                                <td><?php echo $row['phone1']?></td>
                                <td><?php echo $row['email']?></td>
                                <td><?php echo $row['specialization'] ?></td>
                                <td><?php echo $row['joining_date'] ?></td>
                                <td><?php echo $row['departure_date']?></td>
                                <td><?php echo $row['department']?></td>
                                
                              </tr>
                                <?php
                            }
                    }
                ?>
                             
                </table>
            
            
             
            
            
        </div>
        
        
        
        
        
        <div class="creat">
            <div class="head" id="search">View Patient Profile</div>
        
        
            <section class="choise_update">
                <div class="who">
                    <legend class="leg">Who Patient:</legend>
                    <form action="" method="post">
                        <label>ID: </label>
                        <input type="name" name="id"><br>

                        <br><input class="View" type="submit" value="View" name="search2"><br>
                    </form>
                </div>
            </section>
            <?php
            $user = "root";
            $pass = "";
            $db = "hospital";
            $db = new mysqli("localhost",$user,$pass,$db);
            //$db_sel = mysqli_select_db($db, )
            
            // Check connection
          /* if ($db->connect_error)
            {
                die("Connection failed: " . $conn->connect_error);
            }
            else
            {
                echo "Connected successfully <br>";
            }*/
            if(isset($_POST['search2']))
            {
               $id = $_POST['id'];
               $query = "select * from patient_details where id='$id'";
               $query_run = mysqli_query($db, $query);
                   ?>
                        <table id="patients">
                            <tr>
                                 <th>ID</th>
                                 <th>patient_Name</th>
                                 <th>Birth_of_date</th>
                                 <th>status</th>
                                 <th>gender</th>
                                 <th>address</th>
                                 <th>Phone_No</th>
                                 <th>Email</th>
                                 <th>Room No</th>
                                 <th>Doctor Name </th>
                            </tr>
                            <?php
                             while($row = mysqli_fetch_array($query_run))
                               {
                             ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['firstName'] ." " . $row['lastName'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td><?php echo $row['status'] ?></td>
                                <td><?php echo $row['gender'] ?></td>
                                <td><?php echo $row['country'] . "-" . $row['city'] . "-" . $row['street']?></td>
                                <td><?php echo $row['phone1']?></td>
                                <td><?php echo $row['email']?></td>
                                <td><?php echo $row['room_no'] ?></td>
                                 <td><?php echo $row['doctor_name']?></td>
                             
                            </tr>
                  <?php
            
               }
            }
            ?>
        
            </table>
            
   
            
        </div>
        
        
        
        <div class="creat">
            <div class="head" id="Table">All patient's profiles</div>
             <section class="choise_update">
                <div class="who">
                    <legend class="leg">All Profiles :</legend>
                    <form action="" method="post">
                        <br><input class="View" type="submit" value="View" name="search3" ><br>
                    </form>
                </div>
            </section>
             <?php
            $user = "root";
            $pass = "";
            $db = "hospital";
            $db = new mysqli("localhost",$user,$pass,$db);
            if(isset($_POST['search3']))
            {
               $query = "select * from patient_details";
               $query_run = mysqli_query($db, $query);
               ?>
                <table id="patients">
                            <tr>
                                 <th>ID</th>
                                 <th>patient_Name</th>
                                 <th>Birth_of_date</th>
                                 <th>status</th>
                                 <th>gender</th>
                                 <th>address</th>
                                 <th>Phone_No</th>
                                 <th>Email</th>
                                 <th>Room No</th>
                                 <th>Doctor Name </th>
                            </tr>
                            <?php
                             while($row = mysqli_fetch_array($query_run))
                               {
                             ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['firstName'] ." " . $row['lastName'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td><?php echo $row['status'] ?></td>
                                <td><?php echo $row['gender'] ?></td>
                                <td><?php echo $row['country'] . "-" . $row['city'] . "-" . $row['street']?></td>
                                <td><?php echo $row['phone1']?></td>
                                <td><?php echo $row['email']?></td>
                                <td><?php echo $row['room_no'] ?></td>
                                <td><?php echo $row['doctor_name']?></td>
                            </tr>


                  <?php
            
               }
            }
            ?>
                 
                     </table>
            
        </div>
       
        
  <div class="creat">
            <div class="head" id="admin">Add Administrator</div>
            <section class="choise_update">
                <div class="who">
                    <legend class="leg">Insert Administrator Information</legend>
                    
                    <div class="input_lable">
                        <form action="" method="post">
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
                        <label>*Password again:</label>
                        <?php
                            
                        ?>
                        <input type="password"  placeholder="password again" name="passag"><br>
                        <label>*Email</label>
                        <input type="email"  placeholder="anything@gmail.com" name="email"><br>
                        
                        <input type="Reset" class="View"><input type="submit" class="View" style="text-align:center"  value="Add" name="submit">
                        </form>
                      
                        
                    </div>
                </div>   
            </section>
  </div>
                    
                
           
       
        
        
        
        
        
        <aside>
            <section class="aside_buttons">
                <h2>operations</h2><hr>
                <a href="../admin_home/home.php"><input type="button" value="Home"><hr></a>
                <a href="#view"><input type="button" value="View Dr Profile"><hr></a>
                <a href="#search"><input type="button" value="View Patient Profile"><hr></a>
                <a href="#Table2"><input type="button" value="Table of Doctors"><hr></a>
                <a href="#Table"><input type="button" value="Table of patients"><hr></a>
                <a href="#admin"><input type="button" value="Add Admin"><hr></a>
            </section>
        </aside>
        <?php
        
        ?>
    </body>
</html>