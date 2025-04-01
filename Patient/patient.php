   <!-- insert data in database!-->
  <?php
                $conn = new mysqli('localhost','root','','hospital');
              //  $db= mysqli_select_db($conn, 'hospital');
                $text='';
                $text_flag=1;
                if(isset($_POST['create']))
                 { 
                    $firstName=$_POST['firstName'];
                    $lastName=$_POST['lastName'];
                    $date=$_POST['date'];
                    $status=$_POST['status'];
                    $gender = $_POST['gender'];
                    $country=$_POST['country'];
                    $city=$_POST['city'];
                    $street=$_POST['street'];
                    $phone1=$_POST['phone1'];
                    $phone2=$_POST['phone2'];
                    $email=$_POST['Email'];
                    $date1=$_POST['date1'];
                   $date2=$_POST['date2'];
                   $depart=$_POST['department'];
                    $room_no=$_POST['room'];
                    $doctor=$_POST['doctor'];
                    if(empty($firstName||$lastName||$date||$status||$gender||$country||$city||$street||$phone1||$email||$date1||$depart||$room_no||$doctor))
                    {
                        $text='Please Enter the required fields';
                    }
                    elseif(empty($firstName and $lastName and $date and $status and $gender and $country and $city and $street and $phone1 and $phone2 and $email and $date1 and $date2 and $depart and $room_no and $doctor))
                    {
                        $text='Please Enter the required fields';
                    }
                    else
                    {
                   $query= "insert into patient_details(firstName, lastName, date, status, gender, country, city, street, phone1, phone2, email,entry_date,checkout_date,department,room_no,doctor_name) values('$firstName', '$lastName',' $date', '$status', '$gender', '$country', '$city', '$street', '$phone1', '$phone2' , '$email','$date1','$date2','$depart','$room_no','$doctor')";
                  $query_run= mysqli_query($conn, $query);
                 if($query_run) {
                     $text='Record inserted successfully';
                }
               else 
             {
             $text='Record not inserted successfully';
            }
                    }
                 } 
                 else {
                    $text_flag=1;
                    }
                 
                 $conn->close();
                
   ?>


<!-- update data in database!-->
<?php
                $conn = new mysqli('localhost','root','');
                $db= mysqli_select_db($conn, 'hospital');
                $error='';
                $error_flag=1;
                if(isset($_POST['update']))
                 { 
                $query= "UPDATE patient_details SET firstName='$_POST[firstName]',lastName='$_POST[lastName]',date='$_POST[date]',status='$_POST[status]',gender='$_POST[gender]',country='$_POST[country]',city='$_POST[city]',street='$_POST[street]',phone1='$_POST[phone1]',phone2='$_POST[phone2]',email='$_POST[email]',entry_date='$_POST[date1]',checkout_date='$_POST[date2]',department='$_POST[department]',room_no='$_POST[room]',doctor_name='$_POST[doctor]' WHERE  id='$_POST[id]'";
      
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
          $conn->close();
             
                   
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
                $query= "DELETE FROM patient_details  WHERE  id='$id'";
      
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
          $conn->close();
             
 ?>         
 
<!DOCTYPE html>
<html>
    <head>
         <meta charset="UTF-8">
        <title>patient page</title>
        <link rel="stylesheet" href="patient style.css"/> 
    </head>
    <body>
        
        <header class="main">
            <h1><img class="image" src="patient.png" >welcome to patient page</h1>
        </header>
        
        
        
        
        
        
        
        <div class="creat">
            <div class="head" id="create">Create account:</div>
            <form action="" method="post">
                <p class="error" style="text-align: center; color: red;">
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
                        <option name="status"value="single">single</option>
                        <option name="status" value="married">married</option>
                    </select>
                    <label><span>*</span>Gender:</label>
                    <input type="radio" id="male" name="gender" checked="checked" value="male">male
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
                    <legend class="leg">hospital information</legend>
                    
                    <label><span>*</span>Date of entry : </label>
                    <input type="Date" id="date1" name="date1">
                     <label><span>*</span>Checkout date : </label>
                     <input type="Date" id="date2" name="date2"><br>
                    <label><span>*</span>Department : </label>
                     <select name="department">
                          <option name="department" value="Surgery">Surgery</option>
                        <option name="department" value="Internal Medicine">Internal Medicine</option>
                        <option name="department" value="Nephrology">Nephrology</option>
                        <option name="department" value="Neurology"> Neurology</option>
                        <option name="department" value="Pediatric">Pediatric</option>
                        <option name="department" value="Oncology">Oncology</option>
                        <option name="department" value="Cardiology">Cardiology </option>
                        <option name="department" value="Obstetrics & Gynaecology"> Obstetrics & Gynaecology</option>
                        <option name="department" value="Ophthalmologist"> Ophthalmologist</option> 
                    </select>
                    <label><span>*</span>room no: </label>
                    <input type="number" id="phone1" name="room"><br>
                    <label><span>*</span> Doctor Name : </label>
                     <select name="doctor">
                        <option name="doctor" value="Magdy Yacoub">Dr. Magdy Yacoub</option>
                        <option name="doctor" value="Mohamed Mashally">Dr. Mohamed Mashally</option>
                        <option name="doctor" value="Mohamed Ghonaim">Dr. Mohamed Ghonaim </option>
                        <option name="doctor" value="Mohamed TaherAl-lozi">Dr. Mohamed Taher Al-lozi</option>
                        <option name="doctor" value="Magdy Shaban">Dr. Magdy Shaban</option>
                        <option name="doctor" value="Ali Hassan">Dr. Ali Hassan</option>
                        <option name="doctor" value="Ahmed Elsayed">Dr. Ahmed Elsayed</option>
                        <option name="doctor" value="Mohamed Kotb">Dr. Mohamed Kotb</option>
                        <option name="doctor" value="Omar Ali">Dr. Omar ALi</option>
                    </select>
                </fieldset>
                <section class="choise_update">
                <input   type="submit" id="add_patient" name="create" value="Create">
                </section>
            </form>


            
            <br><hr><br>
            
        </div>
        
        
        
        
        
        
        
        
        
        
        
        <div class="creat">
            <div class="head" id="update">update:</div>
            <form action=""  method="post">
                 <section class="choise_update">
                     <p class="error" style="text-align: center; color:red;">
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
                <a href="#fr3" ><input type="button" value="contact information" class="bt3"></a>
                 <a href="#fr4" ><input type="button" value="hospital information" class="bt4"></a>
                 
          </section>
            <br><hr><br>
            
            </form>
            <?php
            $conn = new mysqli('localhost','root','');
            $db= mysqli_select_db($conn, 'hospital');
            if(isset($_POST['search']))
            {
                $id =$_POST['id'];
                $query="SELECT * FROM patient_details WHERE  id='$id'";
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
                    <input type="text" id="firstName" name="firstName" value="<?php echo $row['firstName'];?>" >
                    <label><span>*</span>last name: </label>
                    <input type="text" id="lastName" name="lastName" value="<?php echo $row['lastName'];?>"><br>
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
                    <input type="radio" name="gender" value="male" <?php if($row['gender']=='male') {echo "checked";}?>/>male
                    <input type="radio" name="gender"  value="female"<?php if($row['gender']=='female') {echo "checked";}?>/>female
                        
                        
                    
                    </fieldset>
                        </section>
                    <br>
                    
                     <section class="fr2" id="fr2">
                  <fieldset>
                    <legend class="leg">address information</legend>
                    <label><span>*</span>country: </label>
                    <input type="text" name="country" id="country" value="<?php echo $row['country'];?>">
                    <label><span>*</span>city: </label>
                    <input type="text" name="city" id="city" value="<?php echo $row['city'];?>"><br>
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
                    <input type="email" name="email" id="email" value="<?php echo $row['email'];?>">
                </fieldset>
                  </section>
                    <br>
                    <section class="fr4" id="fr4">
                       <fieldset>
                    <legend class="leg">hospital information</legend>
                    
                    <label><span>*</span>Date of entry : </label>
                    <input type="Date" id="date1" name="date1" value="<?php echo $row['entry_date'];?>">
                     <label><span>*</span>Checkout date : </label>
                     <input type="Date" id="date2" name="date2" value="<?php echo $row['checkout_date'];?>"><br>
                    <label><span>*</span>Department : </label>
                     <select name="department">
                         <?php
                         if($row['department']=='Internal Medicine')
                         {
                             ?>
                         <option><?php echo $row['department'];?></option>
                        <option name="department" value="Pediatric">Pediatric</option>
                        <option name="department" value="Cardiology">Cardiology </option>
                        <option name="department" value="Nephrology">Nephrology</option>
                        <option name="department" value="Oncology">Oncology</option>
                        <option name="department" value="Surgery">Surgery</option>
                        <option name="department" value="Obstetrics & Gynaecology"> Obstetrics & Gynaecology</option>
                        <option name="department" value="Ophthalmologist"> Ophthalmologist</option>
                        <option name="department" value="Neurology"> Neurology</option>
                        <?php
                        }
                        else if($row['department']=='Pediatric')
                             {
                             ?>
                         
                        <option ><?php echo $row['department'];?></option>
                        <option name="department" value="Internal Medicine">Internal Medicine</option>
                        <option name="department" value="Cardiology">Cardiology </option>
                        <option name="department" value="Nephrology">Nephrology</option>
                        <option name="department" value="Oncology">Oncology</option>
                        <option name="department" value="Surgery">Surgery</option>
                        <option name="department" value="Obstetrics & Gynaecology"> Obstetrics & Gynaecology</option>
                        <option name="department" value="Ophthalmologist"> Ophthalmologist</option>
                        <option name="department" value="Neurology"> Neurology</option>
                        <?php
                        }
                        
                        else if($row['department']=='Cardiology')
                        {
                             ?>
                        <option><?php echo $row['department'];?></option>
                        <option name="department" value="Internal Medicine">Internal Medicine</option>
                        <option name="department" value="Pediatric">Pediatric </option>
                        <option name="department" value="Nephrology">Nephrology</option>
                        <option name="department" value="Oncology">Oncology</option>
                        <option name="department" value="Surgery">Surgery</option>
                        <option name="department" value="Obstetrics & Gynaecology"> Obstetrics & Gynaecology</option>
                        <option name="department" value="Ophthalmologist"> Ophthalmologist</option>
                        <option name="department" value="Neurology"> Neurology</option>
                        <?php
                        }
                        else if($row['department']=='Nephrology')
                            {
                             ?>
                        <option><?php echo $row['department'];?></option>
                        <option name="department" value="Internal Medicine">Internal Medicine</option>
                        <option name="department" value="Pediatric">Pediatric </option>
                        <option name="department" value="Cardiology">Cardiology</option>
                        <option name="department" value="Oncology">Oncology</option>
                        <option name="department" value="Surgery">Surgery</option>
                        <option name="department" value="Obstetrics & Gynaecology"> Obstetrics & Gynaecology</option>
                        <option name="department" value="Ophthalmologist"> Ophthalmologist</option>
                        <option name="department" value="Neurology"> Neurology</option>
                        <?php
                        }
                        
                        else if($row['department']=='Oncology')
                             {
                             ?>
                        <option><?php echo $row['department'];?></option>
                        <option name="department" value="Internal Medicine">Internal Medicine</option>
                        <option name="department" value="Pediatric">Pediatric </option>
                        <option name="department" value="Cardiology">Cardiology</option>
                        <option name="department" value="Nephrology">Nephrology</option>
                        <option name="department" value="Surgery">Surgery</option>
                        <option name="department" value="Obstetrics & Gynaecology"> Obstetrics & Gynaecology</option>
                        <option name="department" value="Ophthalmologist"> Ophthalmologist</option>
                        <option name="department" value="Neurology"> Neurology</option>
                        <?php
                        }
                        else if($row['department']=='Surgery')
                             {
                             ?>
                        <option><?php echo $row['department'];?></option>
                        <option name="department" value="Internal Medicine">Internal Medicine</option>
                        <option name="department" value="Pediatric">Pediatric </option>
                        <option name="department" value="Cardiology">Cardiology</option>
                        <option name="department" value="Nephrology">Nephrology</option>
                        <option name="department" value="Oncology">Oncology</option>
                        <option name="department" value="Obstetrics & Gynaecology"> Obstetrics & Gynaecology</option>
                        <option name="department" value="Ophthalmologist"> Ophthalmologist</option>
                        <option name="department" value="Neurology"> Neurology</option>
                        <?php
                        }
                        else if($row['department']=='Obstetrics & Gynaecology')
                             {
                             ?>
                        <option><?php echo $row['department'];?></option>
                        <option name="department" value="Internal Medicine">Internal Medicine</option>
                        <option name="department" value="Pediatric">Pediatric </option>
                        <option name="department" value="Cardiology">Cardiology</option>
                        <option name="department" value="Nephrology">Nephrology</option>
                        <option name="department" value="Oncology">Oncology</option>
                        <option name="department" value="Surgery"> Surgery</option>
                        <option name="department" value="Ophthalmologist"> Ophthalmologist</option>
                        <option name="department" value="Neurology"> Neurology</option>
                        <?php
                        }
                        else if($row['department']=='Ophthalmologist')
                             {
                             ?>
                        <option><?php echo $row['department'];?></option>
                        <option name="department" value="Internal Medicine">Internal Medicine</option>
                        <option name="department" value="Pediatric">Pediatric </option>
                        <option name="department" value="Cardiology">Cardiology</option>
                        <option name="department" value="Nephrology">Nephrology</option>
                        <option name="department" value="Oncology">Oncology</option>
                        <option name="department" value="Surgery"> Surgery</option>
                        <option name="department" value="Obstetrics & Gynaecology"> Obstetrics & Gynaecology</option>
                        <option name="department" value="Neurology"> Neurology</option>
                        <?php
                        }
                        else 
                        {
                           
                             ?>
                        <option><?php echo $row['department'];?></option>
                        <option name="department" value="Internal Medicine">Internal Medicine</option>
                        <option name="department" value="Pediatric">Pediatric </option>
                        <option name="department" value="Cardiology">Cardiology</option>
                        <option name="department" value="Nephrology">Nephrology</option>
                        <option name="department" value="Oncology">Oncology</option>
                        <option name="department" value="Surgery"> Surgery</option>
                        <option name="department" value="Obstetrics & Gynaecology"> Obstetrics & Gynaecology</option>
                        <option name="department" value="Ophthalmologist"> Ophthalmologist</option>
                         
                        <?php
                        }
                          ?>  
                            
                    </select>
                    <label><span>*</span>room no: </label>
                    <input type="number" id="phone1" name="room" value="<?php echo $row['room_no'];?>"><br>
                    <label><span>*</span> Doctor Name : </label>
                     <select name="doctor">
                         <?php
                         if($row['doctor_name']=='Magdy Yacoub')
                         {
                             ?>
                         
                        <option><?php echo $row['doctor_name'];?></option>
                        <option name="doctor" value="Mohamed Mashally">Dr. Mohamed Mashally</option>
                        <option name="doctor" value="Mohamed Ghonaim">Dr. Mohamed Ghonaim </option>
                        <option name="doctor" value="Mohamed TaherAl-lozi">Dr. Mohamed Taher Al-lozi</option>
                        <option name="doctor" value="Magdy Shaban">Dr. Magdy shaban</option>
                        <option name="doctor" value="Ali Hassan">Dr. Ali Hassan</option>
                        <option name="doctor" value="Ahmed Elsayed">Dr. Ahmed Elsayed</option>
                        <option name="doctor" value="Mohamed Kotb">Dr. Mohamed Kotb</option>
                         <option name="doctor" value="Omar Ali">Dr. Omar ALi</option>
                         <?php
                        }
                        else if($row['doctor_name']=='Mohamed Mashally')
                             {
                             ?>
                         <option><?php echo $row['doctor_name'];?></option>
                        <option name="doctor" value="Magdy Yacoub">Dr. Magdy Yacoub</option>
                        <option name="doctor" value="Mohamed Ghonaim">Dr. Mohamed Ghonaim </option>
                        <option name="doctor" value="Mohamed TaherAl-lozi">Dr. Mohamed Taher Al-lozi</option>
                        <option name="doctor" value="Magdy Shaban">Dr. Magdy shaban</option>
                        <option name="doctor" value="Ali Hassan">Dr. Ali Hassan</option>
                        <option name="doctor" value="Ahmed Elsayed">Dr. Ahmed Elsayed</option>
                        <option name="doctor" value="Mohamed Kotb">Dr. Mohamed Kotb</option>
                         <option name="doctor" value="Omar Ali">Dr. Omar ALi</option>
                         <?php
                        }
                        else if($row['doctor_name']=='Mohamed Ghonaim')
                             {
                             ?>
                        <option><?php echo $row['doctor_name'];?></option>
                        <option name="doctor" value="Magdy Yacoub">Dr. Magdy Yacoub</option>
                        <option name="doctor" value="Mohamed Mashally">Dr. Mohamed Mashally</option>
                        <option name="doctor" value="Mohamed TaherAl-lozi">Dr. Mohamed Taher Al-lozi</option>
                        <option name="doctor" value="Magdy Shaban">Dr. Magdy shaban</option>
                        <option name="doctor" value="Ali Hassan">Dr. Ali Hassan</option>
                        <option name="doctor" value="Ahmed Elsayed">Dr. Ahmed Elsayed</option>
                        <option name="doctor" value="Mohamed Kotb">Dr. Mohamed Kotb</option>
                         <option name="doctor" value="Omar Ali">Dr. Omar ALi</option>
                         <?php
                        }
                        else if($row['doctor_name']=='Mohamed TaherAl-lozi')
                             {
                             ?>
                          <option><?php echo $row['doctor_name'];?></option>
                        <option name="doctor" value="Magdy Yacoub">Dr. Magdy Yacoub</option>
                        <option name="doctor" value="Mohamed Mashally">Dr. Mohamed Mashally</option>
                        <option name="doctor" value="Mohamed Ghonaim">Dr. Mohamed Ghonaim</option>
                        <option name="doctor" value="Magdy Shaban">Dr. Magdy shaban</option>
                        <option name="doctor" value="Ali Hassan">Dr. Ali Hassan</option>
                        <option name="doctor" value="Ahmed Elsayed">Dr. Ahmed Elsayed</option>
                        <option name="doctor" value="Mohamed Kotb">Dr. Mohamed Kotb</option>
                         <option name="doctor" value="Omar Ali">Dr. Omar ALi</option>
                         <?php
                        }
                        else if($row['doctor_name']=='Magdy Shaban')
                             {
                             ?>
                         <option><?php echo $row['doctor_name'];?></option>
                        <option name="doctor" value="Magdy Yacoub">Dr. Magdy Yacoub</option>
                        <option name="doctor" value="Mohamed Mashally">Dr. Mohamed Mashally</option>
                        <option name="doctor" value="Mohamed Ghonaim">Dr. Mohamed Ghonaim</option>
                        <option name="doctor" value="Mohamed TaherAl-lozi">Dr. Mohamed Taher Al-lozi</option>
                        <option name="doctor" value="Ali Hassan">Dr. Ali Hassan</option>
                        <option name="doctor" value="Ahmed Elsayed">Dr. Ahmed Elsayed</option>
                        <option name="doctor" value="Mohamed Kotb">Dr. Mohamed Kotb</option>
                         <option name="doctor" value="Omar Ali">Dr. Omar ALi</option>
                         <?php
                        }
                        else if($row['doctor_name']=='Ali Hassan')
                             {
                             ?>
                         <option><?php echo $row['doctor_name'];?></option>
                        <option name="doctor" value="Magdy Yacoub">Dr. Magdy Yacoub</option>
                        <option name="doctor" value="Mohamed Mashally">Dr. Mohamed Mashally</option>
                        <option name="doctor" value="Mohamed Ghonaim">Dr. Mohamed Ghonaim</option>
                        <option name="doctor" value="Mohamed TaherAl-lozi">Dr. Mohamed Taher Al-lozi</option>
                        <option name="doctor" value="Magdy Shaban">Dr. Magdy shaban</option>
                        <option name="doctor" value="Ahmed Elsayed">Dr. Ahmed Elsayed</option>
                        <option name="doctor" value="Mohamed Kotb">Dr. Mohamed Kotb</option>
                         <option name="doctor" value="Omar Ali">Dr. Omar Ali</option>
                         <?php
                        }
                        else if($row['doctor_name']=='Ahmed Elsayed')
                             {
                             ?>
                         <option><?php echo $row['doctor_name'];?></option>
                        <option name="doctor" value="Magdy Yacoub">Dr. Magdy Yacoub</option>
                        <option name="doctor" value="Mohamed Mashally">Dr. Mohamed Mashally</option>
                        <option name="doctor" value="Mohamed Ghonaim">Dr. Mohamed Ghonaim</option>
                        <option name="doctor" value="Mohamed TaherAl-lozi">Dr. Mohamed Taher Al-lozi</option>
                        <option name="doctor" value="Magdy Shaban">Dr. Magdy shaban</option>
                        <option name="doctor" value="Ali Hassan">Dr. Ali Hassan</option>
                        <option name="doctor" value="Mohamed Kotb">Dr. Mohamed Kotb</option>
                         <option name="doctor" value="Omar Ali">Dr. Omar ALi</option>
                         <?php
                        }
                        else if($row['doctor_name']=='Mohamed Kotb') {
                            ?>
                         <option><?php echo $row['doctor_name'];?></option>
                        <option name="doctor" value="Magdy Yacoub">Dr. Magdy Yacoub</option>
                        <option name="doctor" value="Mohamed Mashally">Dr. Mohamed Mashally</option>
                        <option name="doctor" value="Mohamed Ghonaim">Dr. Mohamed Ghonaim</option>
                        <option name="doctor" value="Mohamed TaherAl-lozi">Dr. Mohamed Taher Al-lozi</option>
                        <option name="doctor" value="Magdy Shaban">Dr. Magdy shaban</option>
                        <option name="doctor" value="Ali Hassan">Dr. Ali Hassan</option>
                        <option name="doctor" value="Ahmed Elsayed">Dr. Ahmed Elsayed</option>
                        <option name="doctor" value="Omar Ali">Dr. Omar ALi</option>
                         <?php
                        }
                        else {
                            ?>
                         <option><?php echo $row['doctor_name'];?></option>
                        <option name="doctor" value="Magdy Yacoub">Dr. Magdy Yacoub</option>
                        <option name="doctor" value="Mohamed Mashally">Dr. Mohamed Mashally</option>
                        <option name="doctor" value="Mohamed Ghonaim">Dr. Mohamed Ghonaim</option>
                        <option name="doctor" value="Mohamed TaherAl-lozi">Dr. Mohamed Taher Al-lozi</option>
                        <option name="doctor" value="Magdy Shaban">Dr. Magdy shaban</option>
                        <option name="doctor" value="Ali Hassan">Dr. Ali Hassan</option>
                        <option name="doctor" value="Ahmed Elsayed">Dr. Ahmed Elsayed</option>
                        <option name="doctor" value="Mohamed Kotb">Dr. Mohammed Kotb</option>
                         <?php
                        }
                        ?>
                    </select>
                </fieldset>
                    </section>
                    <br>
                    <input id="add_patient" type="submit"  name="update" value="Update" >
            </form>
             <?php
                }
            }
 ?>         
  
        </div>
   
        
        
   
        
        
        <div class="creat">
            <div class="head" id="delete">delete:</div>
            <form action=""  method="post">
            <section class="choise_update">
                 <p class="error" style="text-align: center; color:red">
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
                    <label> ID: </label>
                    <input type="text" id="N_id" name="id"><br>
                    <br>
                    <input type="submit" id="add_patient" name="get" value="Get">
                </fieldset>
            </section>
            
            </form>
            <?php
            $conn = new mysqli('localhost','root','');
            $db= mysqli_select_db($conn, 'hospital');
            if(isset($_POST['get']))
            {
                $id =$_POST['id'];
                $query="SELECT * FROM patient_details WHERE  id='$id'";
                $query_run= mysqli_query($conn, $query);
                
                $i=0;
                while ($row = mysqli_fetch_array($query_run)) {
                    ?>
            <form  action="" method="post">
                     <section class="fr1" id="fr1">
                    <fieldset>
                    <legend class="leg">personal information</legend>
                    <input type="hidden" id="id" name="id" value="<?php echo $row['id'];?>" ><br>
                    <label><span>*</span>first name: </label>
                    <input type="text" id="firstName" name="firstName" value="<?php echo $row['firstName'];?>" >
                    <label><span>*</span>last name: </label>
                    <input type="text" id="lastName" name="lastName" value="<?php echo $row['lastName'];?>"><br>
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
                <a href="#create"><input type="button" value="Create Account"><hr></a>
                <a href="#update"><input type="button" value="Update Account"><hr></a>
                <a href="#delete"><input type="button" value="Delete Account"><hr></a>
                
            </section>
        </aside>
        
       
            
    </body>
</html>
 




























