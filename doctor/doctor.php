 <!-- insert data in database!-->
  <?php
                $conn = new mysqli('localhost','root','');
                $db= mysqli_select_db($conn, 'hospital');
                $text='';
                $text_flag=1;
                if(isset($_POST['create']))
                 { 
                    $firstName=$_POST['firstName'];
                    $lastName=$_POST['lastName'];
                    $doctorName=$firstName ." ". $lastName;
                    $date=$_POST['date'];
                    $status=$_POST['status'];
                    $gender = $_POST['gender'];
                    $country=$_POST['country'];
                    $city=$_POST['city'];
                    $street=$_POST['street'];
                    $phone1=$_POST['phone1'];
                    $phone2=$_POST['phone2'];
                    $email=$_POST['Email'];
                    $specialization=$_POST['specialization'];
                   $blood_group=$_POST['blood_group'];
                   $joining_date=$_POST['joining_date'];
                   $departure_date=$_POST['departure_date'];
                   $department=$_POST['department'];
                   $query= "insert into doctor_details(doctorName, date, status, gender, country, city, street, phone1, phone2, email,specialization,blood_group,joining_date,departure_date,department) values('$doctorName',' $date', '$status', '$gender', '$country', '$city', '$street', '$phone1', '$phone2' , '$email','$specialization','$blood_group','$joining_date','$departure_date','$department')";
                  $query_run= mysqli_query($conn, $query);
                 if($query_run) {
                    $text='Record inserted successfully';
                }
         else 
             {
              $text='Record not inserted successfully'; 
        }
                }
                 else {
                    $text_flag=1;
                    }
   ?>
  <!-- update data in database!-->
<?php
                $conn = new mysqli('localhost','root','');
                $db= mysqli_select_db($conn, 'hospital');
                 $error='';
                $error_flag=1;
                if(isset($_POST['update']))
                 { 
                 $doctorName=$_POST['doctorName'];
                 $date=$_POST['date'];
                 $status=$_POST['status'];
                 $gender = $_POST['gender'];
                 $country=$_POST['country'];
                 $city=$_POST['city'];
                 $street=$_POST['street'];
                 $phone1=$_POST['phone1'];
                 $phone2=$_POST['phone2'];
                 $email=$_POST['email'];  
                 $specialization=$_POST['specialization'];
                 $blood_group=$_POST['blood_group'];
                 $joining_date=$_POST['joining_date'];
                 $departure_date=$_POST['departure_date'];
                 $department=$_POST['department'];
                $query= "UPDATE doctor_details SET doctorName='$_POST[doctorName]',date='$_POST[date]',status='$_POST[status]',gender='$_POST[gender]',country='$_POST[country]',city='$_POST[city]',street='$_POST[street]',phone1='$_POST[phone1]',phone2='$_POST[phone2]',email='$_POST[email]',specialization='$_POST[specialization]',blood_group='$_POST[blood_group]',joining_date='$_POST[joining_date]',departure_date='$_POST[departure_date]',department='$_POST[department]' WHERE  id='$_POST[id]'";
                $query_run= mysqli_query($conn, $query);
                 if($query_run) {
                    $error='Data updated successfully';
                     
                }
                else { 
                       $error='Data not updated successfully';
                 }
          }
          else {
     $error_flag=1;
 }
             
                   
 ?>

     
<!-- delete data in database!-->
<?php
                $conn = new mysqli('localhost','root','');
                $db= mysqli_select_db($conn, 'hospital');
                 $print='';
                $print_flag=1;
                if(isset($_POST['delete']))
                 { 
                 $id=$_POST['id'];         
                $query= "DELETE FROM doctor_details  WHERE  id='$id'";
      
                $query_run= mysqli_query($conn, $query);
                 if($query_run) {
                    $print='Record deleted successfully'; 
                     
                }
                else { 
                        $print='Record not deleted successfully';  
                 }
          }
           else{
              $print_flag=1;
          }
             
 ?>         

<!DOCTYPE html>
<html>
    <head>
         <meta charset="UTF-8">
        <title>doctor page</title>
        <link rel="stylesheet" href="doctor style.css" type="text/css" >
    </head>
    <body>
        
        <header class="main">
            <h1><img class="image" src="doctor.png" >welcome to doctor page</h1>
        </header>
        
        
         <div class="creat">
            <div class="head" id="add" >Add Doctor:</div>
        
            <form action="" method="post">
                <p class="error" style="text-align: center;">
                <?php
                        if($text_flag){
                                echo $text;
                            } else {
                                echo $text ;
                            }
                ?>
            </p>
                <fieldset>
                    <legend class="leg">personal information</legend>
                    <label><span>*</span>first name: </label>
                    <input type="text" id="firstName" name="firstName">
                    <label><span>*</span>last name: </label>
                    <input type="text" id="lastName" name="lastName"><br>
                    <label><span>*</span>Date of Birth: </label>
                    <input type="Date" name="date" id="date"><br>
                    <label><span>*</span>martial status:</label>
                    <select name="status">
                        <option name="status" value="single">single</option>
                        <option name="status" value="married">married</option>
                    </select>
                    <label><span>*</span>Gender:</label>
                    <input type="radio" id="male" name="gender" value="male">male
                    <input type="radio" id="female" name="gender" value="female">female 
                    <br>
                </fieldset>
                <fieldset>
                    <legend class="leg">address information</legend>
                    <label><span>*</span>country: </label>
                    <input type="text" name="country" id="country">
                    <label><span>*</span>city: </label>
                    <input type="text" name="city" id="city">
                    <br>
                    <label><span>*</span>street: </label>
                    <input type="text" name="street" id ="street">
                </fieldset>
                <fieldset>
                    <legend class="leg">contact information</legend>
                    <label><span>*</span>phone1: </label>
                    <input type="number" id="phone1" name="phone1">
                    <label><span>*</span>phone2: </label>
                    <input type="number" id="phone2" name="phone2">
                    <br>
                    <label><span>*</span>email: </label>
                    <input type="email" name="Email" id="email">
                </fieldset>
                 <fieldset>
                    <legend class="leg">doctor information</legend>
                      
                     <label>Specialization: </label>
                     <input type="text" name="specialization">
                     <label>Blood Group: </label>
                      <input type="text" name="blood_group" ><br>
                                            
                      <label>Joining Date:</label>
                      <input type="Date" name="joining_date" >
                      <label>Departure Date: </label>
                      <input type="Date" name="departure_date" ><br>
                                            
                        <label>department: </label>
                        <input type="text" name="department" ><br>
                        
                </fieldset>
                <section class="choise_update">
                    <input type="submit" id="add_patient" name="create" value="Create">
                </section>
            </form>
           
        </div>
        
        
        
        
           <div class="creat">
            <div class="head" id="update">update:</div>
            <form action=""  method="post">
            <section class="choise_update">
                <p class="error" style="text-align: center;">
                <?php
                        if($error_flag){
                                echo $error;
                            } else {
                                echo $error ;
                            }
                ?>
            </p>
            <br>
                <h3>what do you want to update:</h3>
                <fieldset class="who" >
                    <legend class="leg">who person:</legend>
                    <label> ID: </label>
                    <input type="text" id="N_id" name="id"><br>
                    <br>
                    <input type="submit" id="add_patient" name="search" value="Search">
                </fieldset>
            </section>
                
           <section class="choise_update" name="choise_update" id="choise_update">
                <h3>what do you want to update:</h3>
                <a href="#fr1" ><input type="button" type="button" value="personal information" class="bt1" ></a>
                <a href="#fr2" ><input type="button" value="address information" class="bt2"></a>
                <br>
                <a href="#fr3" ><input type="button" value="contact information" class="bt3"></a>
                 <a href="#fr4" ><input type="button" value="doctor information" class="bt4"></a>
          </section>
            <br><hr><br>
            
            </form>
            <?php
            $conn = new mysqli('localhost','root','');
            $db= mysqli_select_db($conn, 'hospital');
            if(isset($_POST['search']))
            {
                $id =$_POST['id'];
                $query="SELECT * FROM doctor_details WHERE  id='$id'";
                $query_run= mysqli_query($conn, $query);
                
                $i=0;
                while ($row = mysqli_fetch_array($query_run)) {
                    ?>
                    <form action=""  method="post">
                     <section class="fr1" id="fr1">
                    <fieldset>
                    <legend class="leg">personal information</legend>
                    <input type="hidden" id="id" name="id" value="<?php echo $row['id'];?>" ><br>
                    <label><span>*</span>first name: </label>
                    <input type="text" id="firstName" name="doctorName" value="<?php echo $row['doctorName'];?>" >
                    <label><span>*</span>Date of Birth: </label>
                    <input type="Date" name="date" id="date" value="<?php echo $row['date'];?>"><br>
                    <label><span>*</span>martial status:</label>
                    <select name="status">
                        <?php
                        if($row['status']=='single')
                        {
                            ?>
                        <option> <?php echo $row['status']; ?></option>
                        <option name="status" value="married">married</option>
                        
                        <?php
                        
                        }
                    else {
                         ?>
                        <option> <?php echo $row['status']; ?></option>
                        <option name="status" value="single">single</option>
                        <?php
                        }
                    ?>
                        
                        </select>
                    <label><span>*</span>Gender:</label>
                    <input type="radio" name="gender"  value="male"<?php if($row['gender']=='male') {echo "checked";}?>/>male
                    <input type="radio" name="gender" value="female"<?php if($row['gender']=='female') {echo "checked";}?>/>female
                    
                    </fieldset>
                        </section>
                    <br>
                    
                     <section class="fr2" id="fr2">
                  <fieldset>
                    <legend class="leg">address information</legend>
                    <label><span>*</span>country: </label>
                    <input type="text" name="country" id="country" value="<?php echo $row['country'];?>">
                    <label><span>*</span>city: </label>
                    <input type="text" name="city" id="city" value="<?php echo $row['city'];?>">
                    <label><span>*</span>street: </label>
                    <input type="text" name="street" id="street" value="<?php echo $row['street'];?>">
                    <br>
                </fieldset>
                     </section>
                 <br>
                 
                  <section class="fr3" id="fr3">
                <fieldset>
                    <legend class="leg">contact information</legend>
                    <label><span>*</span>phone: </label>
                    <input type="text" name="phone1" id="phone1" value="<?php echo $row['phone1'];?>">
                    <label>phone2: </label>
                    <input type="text" name="phone2" id="phone2" value="<?php echo $row['phone2'];?>"><br>
                    <label><span>*</span>email: </label>
                    <input type="email" name="email" id="email" value="<?php echo $row['email'];?>"><br>
                </fieldset>
                  </section>
                    <br>
                    <section class="fr4" id="fr4">
                       <fieldset>
                     <legend class="leg">doctor information</legend>
                      
                     <label>Specialization: </label>
                     <input type="text" name="specialization" value="<?php echo $row['specialization'];?>">
                     <label>Blood Group: </label>
                      <input type="text" name="blood_group" value="<?php echo $row['blood_group'];?>" ><br>
                                            
                      <label>Joining Date:</label>
                      <input type="Date" name="joining_date" value="<?php echo $row['joining_date'];?>">
                      <label>Departure Date: </label>
                      <input type="Date" name="departure_date" value="<?php echo $row['departure_date'];?>"><br>
                                            
                        <label>department: </label>
                        <input type="text" name="department" value="<?php echo $row['department'];?>"><br>
                </fieldset>   
                    </section>
                     <section class="choise_update">
                    <input id="add_patient" type="submit"  name="update" value="Update" >
                    </section>
            </form>
             <?php
                }
            }
 ?>         
  
        </div>
        
        
        
        
        
         <div class="creat">
            <div class="head" id="delete">delete:</div>
            
            <section class="choise_update">
                 <p class="error" style="text-align: center;">
                <?php
                        if($print_flag){
                                echo $print;
                            } else {
                                echo $print ;
                            }
                ?>
            </p>
            <br>
                <h3>who do you want to delete:</h3>
                <fieldset class="who" >
                    <legend class="leg">who person:</legend>
                    <form action="" method="post">
                        <label>ID: </label>
                        <input type="name" name="id"><br>

                        <br>
                        <input class="get" id="add_patient" type="submit" value="Get" name="get" >
                    </form>
                   
                </fieldset>
            </section>
             <?php
            $conn = new mysqli('localhost','root','');
            $db= mysqli_select_db($conn, 'hospital');
            if(isset($_POST['get']))
            {
                $id =$_POST['id'];
                $query="SELECT * FROM doctor_details WHERE  id='$id'";
                $query_run= mysqli_query($conn, $query);
                
                $i=0;
                while ($row = mysqli_fetch_array($query_run)) {
                    ?>
                    <form action=""  method="post">
                     <section class="fr1" id="fr1">
                    <fieldset>
                    <legend class="leg">personal information</legend>
                    <input type="hidden" id="id" name="id" value="<?php echo $row['id'];?>" ><br>
                    <label><span>*</span>first name: </label>
                    <input type="text" id="firstName" name="doctorName" value="<?php echo $row['doctorName'];?>" >
                    <label><span>*</span>Date of Birth: </label>
                    <input type="Date" name="date" id="date" value="<?php echo $row['date'];?>"><br>
                    <label><span>*</span>martial status:</label>
                    <select name="status">
                        <?php
                        if($row['status']=='single')
                        {
                            ?>
                        <option> <?php echo $row['status']; ?></option>
                        <option name="status" value="married">married</option>
                        
                        <?php
                        
                        }
                    else {
                         ?>
                        <option> <?php echo $row['status']; ?></option>
                        <option name="status" value="single">single</option>
                        <?php
                        }
                    ?>
                        
                        </select>
                    <label><span>*</span>Gender:</label>
                     <input type="radio" name="gender"  value="male"<?php if($row['gender']=='male') {echo "checked";}?>/>male
                    <input type="radio" name="gender" value="female"<?php if($row['gender']=='female') {echo "checked";}?>/>female
                    </fieldset>
                  </section>
                        <section class="choise_update">
                   <input id="add_patient" type="submit" name="delete" value="delete" >
                        </section>
                 </form>
           <?php
              }
            }
            ?>
            
        </div>
        
        
        
        
        
        
        
        
        <aside>
            <section class="aside_buttons">
                <h2>operations</h2><hr>
                <a href="../admin_home/home.php"><input type="button" value="Home"><hr></a>
                <a href="#add"><input type="button" value="Add Doctor"><hr></a>
                <a href="#update"><input type="button" value="update"><hr></a>
                <a href="#delete"><input type="button" value="Delete Doctor"><hr></a>
                <a href="#Doctors"><input type="button" value="Doctors Profiles"><hr></a>
            </section>
        </aside>
        
        
        <div class="creat">
            
            <div class="head" id="Doctors">Doctors profiles</div>
            
            <div class="border">
                <div class="doc">
                    <img class="img" src="woman.png">
                     <h5>Dr.Foluso Olabisi Ademuyiwa</h5>
                     <p>Associate Professor, Medicine
                        Division of Medical Oncology</p>
                     <p class="Specialty"><span>Specialty:</span>Ophthalmology, Retina<br>
Retina<br>
Ophthalmology</p>
                </div>
                <div class="doc">
                    <img class="img" src="man.png">
                     <h5>Dr.Camille N. Abboud</h5>
                     <p>Professor, Medicine
                        Division of Oncology
                        Section of Bone Marrow Transplant</p>
                     <p class="Specialty"><span>Specialty:</span>Medical Oncology<br>
Breast Oncology</p>
                </div>
            </div>
            
            <div class="border">
                
                <div class="doc">
                    <img class="img" src="man.png">
                     <h5>Dr.Douglas R. Adkins</h5>
                     <p>Associate Professor, Internal Medicine</p>
                     <p class="Specialty"><span>Specialty:</span>Medical Oncology<br>
Sarcoma<br>
Head and Neck Oncology<br>
Thyroid Cancer</p>
                </div>
                <div class="doc">
                    <img class="img" src="woman.png">
                     <h5>Dr.Rebecca L. Aft</h5>
                     <p>Professor, Surgery
                        Division of General Surgery
                        Section of Surgical Oncology</p>
                     <p class="Specialty"><span>Specialty:</span>Breast Oncology<br>
Oncologic Surgery<br>
Sarcoma</p>
                </div>
                
            </div>
            
            <div class="border">
                <div class="doc">
                    <img class="img" src="woman.png">
                    <h5>Dr.Hilary M. Babcock</h5>
                    <p>Professor, Medicine
                        Division of Infectious Diseases Medical Director</p>
                    <p class="Specialty"><span>Specialty:</span>Melanoma<br>
Endocrine/Cancer Surgery</p>
                </div>
                <div class="doc">
                    <img class="img" src="man.png">
                     <h5>Dr.Muhammad Taher Al-Lozi</h5>
                     <p>Professor, Neurology
                        Division of Adult Neurology
                        Section Co-Chief</p>
                     <p class="Specialty"><span>Specialty:</span>Breast Health<br>
Breast Surgery</p>
                </div>
            </div>
            
            
                </div>
        
        
    </body>
</html>
        
   