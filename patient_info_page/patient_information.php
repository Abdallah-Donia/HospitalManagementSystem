<!DOCTYPE html>
<html >

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="patient information style.css">
        <link rel="stylesheet" media="screen and (max-width: 768px)" href="css/mobile.css">
        <link rel="stylesheet" media="screen and (min-width: 1100px)" href="css/widescreen.css">
        <title>My Information</title>
    </head>
    
    <body id="Home">
        <nav class="menu">
            
            <ul>
                <li><a href="#Home">My Information</a></li>
                <li><a href="#feedback">Feedback</a></li>
                <li><a href="#about">about</a></li>
                <li><a href="#contact">contact us</a></li>
            </ul>
            
            
            <h1 class="welcome">welcome this your information</h1>
            
            <a class="log-buttom" href="../admin_home/log_out.php">logout</a>
            
            <form class="search-form">
                <input type="search" placeholder="search">
                <button>search</button>
            </form>
        </nav>
    </body>
    
    <header id="showcase">
        
         <div class="showcase-content">
            <h1 class="head">With you every step of the way</h1>
            
            <P class="par">read more about us</P>
            <a href="#about" class="btn">from here</a>
        </div>
        
        
            
            <div class="new_box">
                <h1>Enter your Email</h1>
                <form action="" method="post">

                   <!-- <label>e-mail: </label>-->
                    <input type="name" name="email">
                    <input class="get" id="add_patient" type="submit" value="Submit" name="search" >

                </form>
            </div>
            <?php
                 $user = "root";
            $pass = "";
            $db = "hospital";
            $db = new mysqli("localhost",$user,$pass,$db); //or die("unable to connect");
            //$db_sel = mysqli_select_db($db, )
           // echo "great!";
            // Check connection
          /* if ($db->connect_error)
            {
                die("Connection failed: " . $conn->connect_error);
            }
            else
            {
                echo "Connected successfully <br>";
            }*/
            if(isset($_POST['search']))
            {
                $email = $_POST['email'];
               $query = "select * from patient_details where email='$email'";
               $query_run = mysqli_query($db, $query);
               while($row = mysqli_fetch_array($query_run))
               {
                   ?>
            <div class="box">
                   <form>
                
                        <div class="inputBox">
                             <h1>Your Information</h1>
                            <div class="left">
                                <input type="text" placeholder="First Name" disabled name="firstName" value="<?php echo 'First Name: '; echo $row['firstName']?>">
                                <input type="text" placeholder="ID" disabled name="country" value="<?php echo 'Country: '; echo $row['country']?>">
                                <input type="text" placeholder="Room No" disabled name="room" value="<?php echo 'Room: '; echo $row['room_no']?>">
                                <input type="text" placeholder="Doctor" disabled name="doctor" value="<?php echo 'Doctor: '; echo $row['doctor_name']?>">
                                <input type="text" placeholder="Doctor" disabled name="city" value="<?php  echo 'City: ';echo $row['city']?>">
                                
                            </div>

                            <div class="right">
                                <input type="text" placeholder="Last Name" disabled name="lastName" value="<?php echo 'Last Name: '; echo $row['lastName']?>">
                                <input type="text" placeholder="Phone No" disabled name="phone1" value="<?php echo 'Phone: '; echo $row['phone1']?>">
                                <input type="text" placeholder="date" disabled name="date" value="<?php echo 'Date: '; echo $row['date']?>">
                                <input type="text" placeholder="street" disabled name="street" value="<?php echo 'Street:'; echo $row['street']?>">
                                <input type="text" placeholder="Doctor" disabled name="status" value="<?php echo 'Status: '; echo $row['status']?>">
                            </div>

                        </div>
                
                   </form>
                   <?php
                   
               }
            }
            ?>
            
            
            
        </div>
        
    </header>
    
    
    


    
    
    <section id="about">
        
        
            <h1 class="about_head">about us</h1>
            <div class="about_main">
                
                <div class="items">
                    <div class="item">
                        <i class="fas fa-university fa-2x"></i>
                        <div>
                            <h2>Together as one</h2>
                            <p class="text-right">Find out how our dedication and know-how supports the clinical team, making it easier to do their job under the best possible conditions.</p>
                        </div>
                    </div>
                    <div class="item">
                        <i class="fas fa-book-reader fa-2x"></i>
                        <div>
                            <h2>Vision</h2>
                            <p class="text-right">Health Forward is an initiative of the innovative biopharmaceutical sector in the Middle East and North Africa.</p>
                        </div>
                    </div>
                    <div class="item">
                        <i class="fas fa-pencil-alt fa-2x"></i>
                        <div>
                            <h2>Our goal</h2>
                            <p class="text-right">we are working to make new medicines and better health care available to patients.</p>
                        </div>
                    </div>
                </div>
                
            </div>
        
    </section>
    
    
    
    <form action="/action_page.php">
        <section id="feedback">
            
            <h1 class="about_head">feedback</h1>
            <div class="contaner">
                
                <label><h2 >Write your feedback here</h2></label>
                <textarea class="textarea" rows="10" name="comment" form="usrform">
                    Enter text here...</textarea>
                <input type="submit" value="send">
            </div>
        </section>
    </form>
    
    
    
    <!-- Section: Contact -->
    <h1 class="about_head">contact us </h1>
    <section id="contact">
        
        <div class="contact-form bg-primary p-2">
            <p>Use the form below to contact us</p>
            <form>
                <div class="form-group">
                    <label for="name">your name:</label>
                    <input type="text" name="name" id="name" placeholder="enter your name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="enter your email">
                </div>
                <div class="form-group">
                    <label for="phone">phone number:</label>
                    <input type="text" name="phone" id="phone" placeholder="enter your phone">
                </div>
                <div class="form-group">
                    <label for="message">your massage:</label>
                    <textarea rows="5" cols="45"
                         name="message" id="message" placeholder="enter your massage here"></textarea>
                    
                </div>
                <input type="submit" value="send" class="btn">
            </form>
        </div>
        <div class="google-maps"></div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div>
            <p>Copyright &copy: 2020 All Right To Hospital.</p>
        </div>
    </footer>
    
    
    
    
    

</html>