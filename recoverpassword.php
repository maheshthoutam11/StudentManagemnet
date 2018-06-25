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
	<h3 style="text-align:center;color:green">WELCOME TO RECOVER PASSWORD</h3>
	
	<form action="login.php" method="post">
              <table   border="2"  style="border-collapse:collapse;" align="center">
                          
                <tr>
                    <td align="center">Password:</td>
                    
                    <td><input type="password" name="password"  /></td>    
                </tr>
                
                <tr>
                    <td align="center">Confirm Password:</td>
                    <td><input type="password" name="confirmp" /></td>    
                </tr>
            </table>
			<br/>
            <center><input style="color:black" type="submit" name="submit" value="submit"/><center/>
        </form>
	
	<?php
	$conn = mysqli_connect("localhost","root","","projectdb");
// mysql_select_db("projectdb");

   if(isset($_POST['submit'])){
       
         if($_POST['password']==''){
          echo "<script>alert('please Enter ur password !')</script>";
          exit();
      }
	  if($_POST['confirmp']!=$_POST['password'])
	  {
		  echo "<script>alert('passwords should be matched')</script>";
          exit(); 
	  }
	   
     
	 
	  
	   
   }
	
		?>
		</div>
    </div>     
                                      
      <?php  include "footer.html"; ?>
	    <?php  include "scripts.html"; ?>
  </body>
</html>
