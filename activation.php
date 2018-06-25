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
			<h4 style="text-align:left;color:green">Please fill the following details to get activate :</h4>
			<form  action="login.php" method="post">
				<table   border="2"  style="border-collapse:collapse;" align="center">
					<tr>
						<td align="center">Email:</td>
						
						<td style="color:black;font-weight: bold"><input type="text" name="user name" placeholder="Enter username" /></td>    
					</tr>
					
					<tr>
						<td align="center">Activation Code:</td>
						<td style="color:black;font-weight: bold"><input type="text" name="actcode" placeholder="Enter activation code"/></td>    
					</tr>
				</table>
				<br/>
				<center><input type="submit" name="submit" value="Activate" /></center>
          </form>
    
		</div>
	</div>    
	<?php

 $conn = mysqli_connect("localhost","root","","projectdb");
// mysql_select_db("projectdb");

   if(isset($_GET['user'])){
        echo $_GET['user'];
	   $user_email = $_GET['user'];
     
	  
	   if($_POST['actcode']=$_GET['code'])
	   {
		  
            
     
      
      $sql = "update users
                      set boolactive=1
					  where stremail = '$user_email' ";
      $res = mysqli_query($conn,$sql);
      
      if(mysqli_affected_rows($conn)>0){
           echo "<script>window.open('success')</script>";
      }
      else
	  {
		   echo "<script>window.open('wrong input')</script>";
	  }



		  
	   }
     else
	 {
		 echo "<script>alert('You have typed a wrong code.Try again!')</script>"; 
	 }
      
	  
      
      
      
      
   }                 
          
   
   ?>
                                          
      <?php  include "footer.html"; ?>
	    <?php  include "scripts.html"; ?>
  </body>
</html>