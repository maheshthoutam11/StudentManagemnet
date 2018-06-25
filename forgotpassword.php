<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mahesh</title>
    
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
    
    
     <div class="slider-area" style="height:380px"> 
        <div class="container" style="height:380px">
	<h3 style="text-align:center;color:green">WELCOME TO FORGOT PASSWORD</h3>
	
	<form name="fp" action="forgotpassword.php"   method="post">
            <table  align="center" style="border-collapse:collapse;" >
                     
                <tr>
                    <td align="left" style="color:black">Email Address:</td>
                    <td style="color:black"><input type="text" name="email" /></td>    
                </tr>
                
                              
                <tr>
                    <td align="left" style="color:black">Confirm Email:</td>
                    <td style="color:black"><input type="text" name="confirm" /></td>    
                </tr>
                
              
            </table>
			<br/>
            <center><input style="color:black" type="submit" name="send" value="send"/><center/>
        </form>
	
	<?php
	$conn = mysqli_connect("localhost","root","","projectdb");
// mysql_select_db("projectdb");

   if(isset($_POST['send'])){
       
     
      $email = $_POST['email'];
      $confirm = $_POST['confirm'];
	  
	  if($email==''){
          echo "<script>alert('please Enter ur Email address !')</script>";
          exit();

      }
	  if($confirm!=$email)
	  {
		  echo "<script>alert('Emails should be matched')</script>";
          exit(); 
	  }
	
	  
      $check_email = "select * from users where stremail = '$email' and boolactive=1";
      
      $run = mysqli_query($conn,$check_email);
      
      if(mysqli_num_rows($run)>0){
        
          //echo "<script>window.open('registration.php','_self')</script>";
		    echo '<h4 style="text-align:center;color:green" >' ."Recovery mail is sent to:".$email.'</h4>';
		  
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
		    $link = "localhost/assign-2-maheshthoutam(999990517)/recoverpassword.php?user=".$email."&code=". rand(20,30);
				/* $toEmail = $_POST["email"];
				$subject = "User Registration Activation Email";
				$content = "Click this link to activate your account. <a href='" . $actual_link . "'>" . $actual_link . "</a>";
				$mailHeaders = "From: Admin\r\n";
				if(mail($toEmail, $subject, $content, $mailHeaders)) {
					$message = "You have registered and the activation mail is sent to your email. Click the activation link to activate you account.";	
				}
				unset($_POST); */
	      echo '<h3 style="text-align:center;color:red" >'.$link.'</h3>' ; 
      
   }
}
		?>
		</div>
    </div>     
                                      
      <?php  include "footer.html"; ?>
	    <?php  include "scripts.html"; ?>
  </body>
</html>
