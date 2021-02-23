<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?> 

<?php
		if(!isset($_GET["rid"]))
		{
				
			 header("location:home.php");
		}
		else {
				$curdate=date("Y/m/d");
				include ('../db_gl.php');
				$id = $_GET['rid'];
				
				
				$sql ="Select * from roombook where id = '$id'";
				$re = mysqli_query($con,$sql);
				while($row=mysqli_fetch_array($re))
				{
					$title = $row['Title'];
					$fname = $row['FName'];
					$lname = $row['LName'];
					$email = $row['Email'];
					$nat = $row['National'];
					$country = $row['Country'];
					$Phone = $row['Phone'];
					$troom = $row['TRoom'];
					$nroom = $row['NRoom'];
					$bed = $row['Bed'];
					$non = $row['NRoom'];
					$meal = $row['Meal'];
					$cin = $row['cin'];
					$cout = $row['cout'];
					$sta = $row['stat'];
					$days = $row['nodays'];

				}

	}
			?> 

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrateur	</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"> <?php echo $_SESSION["user"]; ?> </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> Gestion des administrateurs</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Gestion des chambres</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Se déconnecter</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a  href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                    <li>
                        <a href="messages.php"><i class="fa fa-desktop"></i> Messages</a>
                    </li>
					<li>
                        <a class="active-menu" href="roombook.php"><i class="fa fa-bar-chart-o"></i> Réservation de chambre</a>
                    </li>
                    <li>
                        <a href="payment.php"><i class="fa fa-qrcode"></i> Paiement</a>
                    </li>
					<li>
                        <a  href="profit.php"><i class="fa fa-qrcode"></i> Profit</a>
                    </li>
                    
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Se déconnecter</a>
                    </li>
                    


                    
					</ul>

            </div>

        </nav>
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Réservation de chambre<small>	<?php echo  $curdate; ?> </small>
                        </h1>
                    </div>
					
					
					<div class="col-md-8 col-sm-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           Confirmation de réservation
                        </div>
                        <div class="panel-body">
							
							<div class="table-responsive">
                                <table class="table">
                                    <tr>
                                            <th>DESCRIPTION</th>
                                            <th>INFORMATIONS</th>
                                            
                                        </tr>
                                        <tr>
                                            <th>Nom</th>
                                            <th><?php echo $title.$fname.$lname; ?> </th>
                                            
                                        </tr>
										<tr>
                                            <th>Email</th>
                                            <th><?php echo $email; ?> </th>
                                            
                                        </tr>
										<tr>
                                            <th>Nationalité </th>
                                            <th><?php echo $nat; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Pays </th>
                                            <th><?php echo $country;  ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Num de téléphone </th>
                                            <th><?php echo $Phone; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Type de la chambre </th>
                                            <th><?php echo $troom; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Nom de chambres </th>
                                            <th><?php echo $nroom; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Plan de repas </th>
                                            <th><?php echo $meal; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Literie </th>
                                            <th><?php echo $bed; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Date d'arrivée </th>
                                            <th><?php echo $cin; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Date de sortie</th>
                                            <th><?php echo $cout; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Nombre de jours</th>
                                            <th><?php echo $days; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Niveau de statut</th>
                                            <th><?php echo $sta; ?></th>
                                            
                                        </tr>
                                </table>
                            </div>

                        </div>
                        <div class="panel-footer">
                            <form method="post">
										<div class="form-group">
														<label>Sélectionnez la confirmation</label>
														<select name="conf"class="form-control" required>
															<option value selected>	</option>
															<option value="Confirmer">Confirmer</option>
															
															
														</select>
										 </div>
							<input type="submit" name="co" value="Confirmer" class="btn btn-success">
							
							</form>
                        </div>
                    </div>
					</div>
					
					<?php
						$rsql ="select * from room";
						$rre= mysqli_query($con,$rsql);
						$r =0 ;
						$cl =0;
						$sl = 0;
						$csr = 0;
						$su = 0;
						$ctd = 0;
						
						while($rrow=mysqli_fetch_array($rre))
						{
							$r = $r + 1;
							$s = $rrow['type'];
							$p = $rrow['place'];
							if($s=="Chambre de luxe" )
							{
								$cl = $cl+ 1;
							}
							
							if($s=="Suite luxueuse")
							{
								$sl = $sl + 1;
							}
							if($s=="Chambre standard" )
							{
								$csr = $csr + 1;
							}
							if($s=="Suite" )
							{
								$su = $su + 1;
							}
							if($s=="Chambre Twin Deluxe" )
							{
								$ctd = $ctd + 1;
							}							
						
						}
						?>
						
						<?php
						$csql ="select * from payment";
						$cre= mysqli_query($con,$csql);
						$cr =0 ;
						$ccl =0;
						$csl = 0;
						$csrr = 0;
						$csu = 0;
						$cctd = 0;
						while($crow=mysqli_fetch_array($cre))
						{
							$cr = $cr + 1;
							$cs = $crow['troom'];
							
							if($cs=="Chambre de luxe")
							{
								$ccl = $ccl + 1;
							}
							
							if($cs=="Suite luxueuse")
							{
								$csl = $csl + 1;
							}
							if($cs=="Chambre standard")
							{
								$csrr = $csrr + 1;
							}
							if($cs=="Suite")
							{
								$csu = $csu + 1;
							}
							if($cs=="Chambre Twin Deluxe")
							{
								$cctd = $cctd + 1;
							}							
						
						}
				
					?>
					<div class="col-md-4 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Détails des chambres disponibles
                        </div>
                        <div class="panel-body">
						<table width="200px">
							
							<tr>
								<td><b>Chambre de luxe</b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									$f1 =$cl - $ccl;
									if($f1 <=0 )
									{	$f1 = "NO";
										echo $f1;
									}
									else{
											echo $f1;
									}
								
								
								?> </button></td> 
							</tr>
							<tr>
								<td><b>Suite luxueuse</b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php 
								$f2 =  $sl -$csl;
								if($f2 <=0 )
									{	$f2 = "NO";
										echo $f2;
									}
									else{
											echo $f2;
									}

								?> </button></td> 
							</tr>
							<tr>
								<td><b>Chambre standard	 </b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php
								$f3 =$csr - $csrr;
								if($f3 <=0 )
									{	$f3 = "NO";
										echo $f3;
									}
									else{
											echo $f3;
									}

								?> </button></td> 
							</tr>
							<tr>
								<td><b>Suite</b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php 
								
								$f4 =$su - $csu; 
								if($f4 <=0 )
									{	$f4 = "NO";
										echo $f4;
									}
									else{
											echo $f4;
									}
								?> </button></td> 
							</tr>
							<tr>
								<td><b>Chambre Twin Deluxe</b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php 
								
								$f5 =$ctd - $cctd; 
								if($f5 <=0 )
									{	$f5 = "NO";
										echo $f5;
									}
									else{
											echo $f5;
									}
								?> </button></td> 
							</tr>
							<tr>
								<td><b>Total Chambre	</b> </td>
								<td> <button type="button" class="btn btn-danger btn-circle"><?php 
								
								$f6 =$r-$cr; 
								if($f6 <=0 )
									{	$f6 = "NO";
										echo $f6;
									}
									else{
											echo $f6;
									}
								 ?> </button></td> 
							</tr>
						</table>
						</div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
					</div>
                </div>
				
                </div>
         </div>
        </div>
    </div>
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>

<?php
						if(isset($_POST['co']))
						{	
							$st = $_POST['conf'];
							
							 
							
							if($st=="Confirmer")
							{
									$urb = "UPDATE `roombook` SET `stat`='$st' WHERE id = '$id'";
									
								if($f1=="NO" && $troom=="Chambre de luxe")
								{
									echo "<script type='text/javascript'> alert('Désolé! Non disponible Chambre de luxe ')</script>";
								}
								else if($f2 =="NO" && $troom=="Suite luxueuse")
								{
									echo "<script type='text/javascript'> alert('Désolé! Non disponible Suite luxueuse')</script>";	
								}
								else if ($f3 == "NO" && $troom=="Chambre standard")
								{
									echo "<script type='text/javascript'> alert('Désolé! Non disponible Chambre standard')</script>";
								}
								else if($f4=="NO" && $troom=="Suite")
								{
									echo "<script type='text/javascript'> alert('Désolé! Non disponible Suite')</script>";
								}
								else if($f5=="NO" && $troom=="Chambre Twin Deluxe")
								{
									echo "<script type='text/javascript'> alert('Désolé! Non disponible Chambre Twin Deluxe')</script>";
								}
								else if( mysqli_query($con,$urb))
											{	
												 $type_of_room = 0;       
														if($troom=="Chambre de luxe")
														{
															$type_of_room = 15000;
														
														}
														else if($troom=="Suite")
														{
															$type_of_room = 13000;
														}
														else if($troom=="Suite luxueuse")
														{
															$type_of_room = 16000;
														}
														else if($troom=="Chambre standard")
														{
															$type_of_room = 14000;
														}
														else if($troom=="Chambre Twin Deluxe")
														{
															$type_of_room = 120000;
														}														
														
														
														
														if($bed=="Single")
														{
															$type_of_bed = $type_of_room * 1/100;
														}
														else if($bed=="Double")
														{
															$type_of_bed = $type_of_room * 2/100;
														}
														else if($bed=="Triple")
														{
															$type_of_bed = $type_of_room * 3/100;
														}
														else if($bed=="Quad")
														{
															$type_of_bed = $type_of_room * 4/100;
														}
														else if($bed=="None")
														{
															$type_of_bed = $type_of_room * 0/100;
														}
														
														
														if($meal=="Room only")
														{
															$type_of_meal=$type_of_bed * 0;
														}
														else if($meal=="Breakfast")
														{
															$type_of_meal=$type_of_bed * 2;
														}else if($meal=="Half Board")
														{
															$type_of_meal=$type_of_bed * 3;
														
														}else if($meal=="Full Board")
														{
															$type_of_meal=$type_of_bed * 4;
														}
														
														$ttot = $type_of_room * $days * $nroom;
														$mepr = $type_of_meal * $days;
														$btot = $type_of_bed *$days;
														
														$fintot = $ttot + $mepr + $btot ;
															
															//echo "<script type='text/javascript'> alert('$count_date')</script>";
														$psql = "INSERT INTO `payment`(`id`, `title`, `fname`, `lname`, `troom`, `tbed`, `nroom`, `cin`, `cout`, `ttot`,`meal`, `mepr`, `btot`,`fintot`,`noofdays`) VALUES ('$id','$title','$fname','$lname','$troom','$bed','$nroom','$cin','$cout','$ttot','$meal','$mepr','$btot','$fintot','$days')";
														
														if(mysqli_query($con,$psql))
														{	$notfree="NotFree";
															$rpsql = "UPDATE `room` SET `place`='$notfree',`cusid`='$id' where bedding ='$bed' and type='$troom' ";
															if(mysqli_query($con,$rpsql))
															{
															echo "<script type='text/javascript'> alert('Réservation Confirmer')</script>";
															echo "<script type='text/javascript'> window.location='roombook.php'</script>";
															}
														}
											}
							}	
						}
						?>