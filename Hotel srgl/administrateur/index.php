
<?php 
session_start();
error_reporting(1);
require('../db_gl.php');
extract($_REQUEST);
if(isset($login))
{
	if($eid=="" || $pass=="")
	{
	$error= "<h3 style='color:red'>Rempli tout les détails</h3>";	
	}		
	else
	{
				$con = mysqli_connect("localhost","root","","db_hotel_gl") or die(mysql_error());
	$sql=mysqli_query($con,"select * from login where usname='$eid' && pass='$pass' ");
		if(mysqli_num_rows($sql))
		{
		$_SESSION['user']=$eid;	
		header('location:home.php');	
		}
		else
		{
		$error= "<h3 style='color:red'>Informations incorrectes</h3>";	
		}	
	}
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Administrateur SRGL</title>

      <link rel="stylesheet" href="css/style.css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Akronim|Libre+Baskerville" rel="stylesheet">
</head>
	  	  	  <div class="bottom"><h3><a href="../index.php">ACCUEIL SRGL</a></h3></div>

<body id="primary">

  <div id="clouds">
	<div class="cloud x1"></div>
	<div class="cloud x2"></div>
	<div class="cloud x3"></div>
	<div class="cloud x4"></div>
	<div class="cloud x5"></div>
</div>
<div class="container-fluid"> <!-- Primary Id-->
  <div class="container">
    <div class="row"><br>

      <div class="col-sm-4"></div>

		<div class="col-sm-4 text-center"style="background-color:orange;">
			<h1 align="center"><b><font style="color:white, serif;text-shadow:WHITE;">Connexion administrateur</font></b></h1>

          <img src="../images/user.png"alt="user.png" width="200" height="170"style="padding-top:30px;">

			<?php echo @$error;?>
          <form action="#" method="post"><br>
              <div class="form-group">
                <input type="text" class="form-control"name="eid" placeholder="Email"required>
              </div>
            <div class="form-group">
                <center><input type="Password" class="form-control"name="pass" style="background-color:white;" placeholder="Mot de passe"required></center>
            </div>
          <input type="submit" value="Login" name="login" class="btn btn-primary btn-group btn-group-justified"required>
      	</form><br>  
        </div>
    </div><br>
  </div>
</div>
</body>
</html>