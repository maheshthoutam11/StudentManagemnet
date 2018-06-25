<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mahesh Thoutam</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

  </head>
  <body>
   
  <?php  include "menu.html"; ?>
    
    <div class="slider-area" style="height:390px"> 
                                <div class="container" style="height:390px">
								
                                                <h3>Welcome to Mahesh Thoutam</h3>
												<h3 style="text-align:center;color:green">Registration Form</h3>
												<form name="reg" action="registration.php" method="post">											
												<table   border="2"  style="border-collapse:collapse;" align="center">
													<tr>
														<td align="center">User name:</td>                    
														<td style="color:black;font-weight: bold"><input type="text" name="name" placeholder="Enter Your name" /></td>    
													</tr>
													<tr>
														<td align="center">Password:</td>
														<td style="color:black;font-weight: bold"><input type="password" name="pass" placeholder="Enter Password"/></td>    
													</tr>
													<tr>
														<td align="center">Confirm Password:</td>
														<td style="color:black;font-weight: bold"><input type="password" name="confirmpass" placeholder="Confirm Password"/></td>    
													</tr>
													<tr>
														<td align="center">Email:</td>
														<td style="color:black;font-weight: bold"><input type="text" name="email" placeholder="Enter Email Id"/></td>    
													</tr>
													<tr>
														<td align="center">Role :</td>
														
														<td style="color:black;font-weight: bold"><input type="text" name="role" placeholder="Enter Role"/></td>    
													</tr>
												</table>
												<center><input type="submit" name="submit" value="Register" />
												<a href="login.php"><h3> Have an account already.. login here!</h3></a>
												</center>
											</form>
										
									
                                </div>
                            
                              
       
    </div>

  
	<?php

 $conn = mysqli_connect("localhost","root","","projectdb");
// mysql_select_db("projectdb");

   if(isset($_POST['submit'])){
       
     
      $user_name = $_POST['name'];
      $user_pass = $_POST['pass'];
	  $confirm_pass=$_POST['confirmpass'];
	  
      $user_email = $_POST['email'];
      $role= $_POST['role'];

     
      
      
      if($user_name==''){
          echo "<script>alert('please Enter ur name properly !')</script>";
          exit();
      }

      $arr = str_split($user_name);
      $i=0;
      while($i<strlen($user_name)){  
	$c=$arr[$i];
	if(!(($c >= 'a' && $c <= 'z') || ($c >= 'A' && $c <='Z') || $c == ' ' || $c == '.')){
         echo "<script>alert('InValid User name : $user_name ')</script>";
         
         exit();
	 }
        $i++;
      }
      
      
      
      if($user_pass==''){
          echo "<script>alert('please Enter ur password !')</script>";
          exit();

      }
	  if($confirm_pass!=$user_pass)
	  {
		  echo "<script>alert('passwords should be matched')</script>";
          exit(); 
	  }
      if($user_email==''){
          echo "<script>alert('please Enter ur email')</script>";
          exit();
      }
      if (! preg_match('/@/', $user_email)) {
          echo "<script>alert('This is not an Email')</script>";
          exit();
      }
      if (! preg_match('/.com/', $user_email)) {
          echo "<script>alert('This is not an Email')</script>";
          exit();
      }
      
     
      
      if($role==''  ){
           echo "<script>alert('please Enter the role !')</script>";
           exit();
      }   
      
      
      
      $check_email = "select * from users where stremail = '$user_email'";
      
      $run = mysqli_query($conn,$check_email);
      
      if(mysqli_num_rows($run)>0){
          echo "<script>alert('Email is $user_email Already exits in our DataBase please try another one')</script>";
          exit();
      }
      $query = "INSERT INTO `users` (`strusername`, `strpassword`, `stremail`, `boolactive`, `strcode`, `strdate`, `strRole`) VALUES	  
	  ('$user_name','$user_pass','$user_email','0','','','$role')";
	  
	   //$res=;
	   
      if(mysqli_query($conn,$query)){
		
          //echo "<script>window.open('registration.php','_self')</script>";
		  echo '<h4 style="text-align:center;color:green" >' ."you have been registered. You must activate your account from activation link sent to:".$user_email.'</h4>';
      
	 /*      //Set the hostname of the mail server
			$mail->Host = "smtp.gmail.com";

			//enable this if you are using gmail smtp, for mandrill app it is not required
			//$mail->SMTPSecure = 'tls';

			//Set the SMTP port number - likely to be 25, 465 or 587
			$mail->Port = 587;
			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;
			//Username to use for SMTP authentication
			$mail->Username = "yourmail@gmail.com";
			//Password to use for SMTP authentication
			$mail->Password = "pwd"; */
		    $actual_link = "localhost/assign-2-maheshthoutam(999990517)/activation.php?user=".$user_email."&code=". rand(1111111111,99999999999999);
				/* $toEmail = $_POST["email"];
				$subject = "User Registration Activation Email";
				$content = "Click this link to activate your account. <a href='" . $actual_link . "'>" . $actual_link . "</a>";
				$mailHeaders = "From: Admin\r\n";
				if(mail($toEmail, $subject, $content, $mailHeaders)) {
					$message = "You have registered and the activation mail is sent to your email. Click the activation link to activate you account.";	
				}
				unset($_POST); */
	      echo '<h3 style="text-align:center;color:red" >'.$actual_link.'</h3>' ; 
      }
      
      
   }                 
   
   ?>
                                         
      <?php  include "footer.html"; ?>
	    <?php  include "scripts.html"; ?>
  </body>
</html>