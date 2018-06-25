<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eElectronics - HTML eCommerce Template</title>
    
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
			<h3 style="text-align:center;color:green">Login </h3>
			<h5 style="text-align:center;color:blue">Please fill the following details :</h5>
			<br/>
			<form action="login.php" method="post">
				<table border="2"  style="border-collapse:collapse;" align="center" >                     
					<tr>
						<td align="center">Username:</td>
						<td><input type="text" name="username" placeholder="Enter Username"/></td>    
					</tr>       
					<tr>
						<td align="center">Password:</td>
						<td><input type="password" name="password" placeholder="Enter your pwd"/></td>    
					</tr>
				</table>
			<br/>
            <center><input type="submit" name="login" value="Login"/>
			<a href="forgotpassword.php"><h4>Forgot password</h4></a></center>
			</form>
			<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			$username = $_POST["username"];
			$password = $_POST["password"];
			
			
			$conn = mysqli_connect("localhost","root","","projectdb");
			$sql = "select strRole from users where strusername= '$username' and strpassword='$password'";
      
            $result = mysqli_query($conn,$sql);
      
            while($row = mysqli_fetch_array($result,MYSQLI_BOTH)) {
			if($row["strRole"]=="admin")
			{
				//Admin login
				  header( "Location: manageusers.php" );
			}
			else if($row["strRole"]=="developer")
			{
				//Developer login
				 header( "Location: manageadmins.php" );
			}
			else if($row["strRole"]=="professor")
			{     
				//professor login
				 header( "Location: managestudents.php" );
			}
			}
			
		}

		?>
		</div>
    </div>     
                                      
      <?php  include "footer.html"; ?>
	    <?php  include "scripts.html"; ?>
  </body>
</html>
