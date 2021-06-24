<?php
   include("config.php");	/*for db connection*/
   session_start(); 		/*to store valid username into session instance*/
   $error="";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $sql = "SELECT * FROM admin WHERE username = '$myusername' and password = '$mypassword'";
      $sql= str_replace("\'","'",$sql);		/*to escape blanks and spaces from input*/
      $result = mysqli_query($db,$sql);		
      $count = mysqli_num_rows($result);
      $username_find_flag=false;
      $password_correct_flag=false;
      $query_result=array();
      while( $rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
				  foreach($rows as $row)
			  {		
					   $query_result[]=$row;
					if(strcmp($row,$myusername))
					  {
					  $username_find_flag=true;
					  }
					  if(strcmp($row,$mypassword))
					  {
					  $password_correct_flag=true;
					  }
			  }
			
	  }


      if($username_find_flag and $password_correct_flag)
      {
		  $_SESSION['login_user'] = $myusername;
		  $_SESSION['sql_query'] = $sql;
		  $_SESSION['count'] = $count;
		  $_SESSION['query_result'] = $query_result;
		  if($count == 1) {                                    //40 46 comment sql injection code
			//session_register("myusername");
			$_SESSION['login_user'] = $myusername;
			header("location: welcome.php");
		 }else {
			$error = "Your Login Name or Password is invalid";
		 }
          //header("location: welcome.php");                      //open
	  }
	  else{
		  $error = "Your Login Name or Password is invalid";
		  }

      // sql injection proof code
	
   }
?>
<html>

   <head>
      <title>Login Page</title>

	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<body>
		<div class="container-fluid" id='container' style="margin:0;padding:0;">
			<div class="row">
			<div  class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="height:180px;color:82B1FF;">
					<p style="font-size:80px;text-align:center;">LOGIN PAGE</p>
				</div>
				<div  class="col-md-3 col-lg-3"></div>
				<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6" style="background-color:E1BEE7;border-radius:10px;">
						<br/>
						<br/>
					   <form action="" name="loginform"  method="POST">
							  <p style="text-align:center;font-size:24px;"><span class="fa fa-user-circle"></span> <input type="text" name="username"  placeholder="your username" class="form-group input-lg" required></p>
							  <br/>
							  <p style="text-align:center;font-size:24px;"><span class="fa fa-key"></span> <input type="password" name="password"  placeholder="your password" class="form-group input-lg" required></p>
							  <button type="submit" id="submit"  class="btn  btn-lg text-dark form-group" style="color:4CAF50;"  >
								<span style="font-size:24px;"> Login </span>
								<span style="font-size:24px;" class="fa fa-sign-in"></span>
							  </button>
							  <br/>
							  <br/>
						</form>
						<div style = "font-size:24px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
				</div>
				<div style="" class="col-md-3 col-lg-3"></div>

			</div>
		</div>
		<script type='text/javascript'>
		</script>
   </body>
</html>