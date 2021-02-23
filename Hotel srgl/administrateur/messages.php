<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HOTEL SRGL</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="home.php"><?php echo $_SESSION["user"]; ?> </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> Gestion des administrateurs</a></li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Gestion des chambres</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Se déconnecter</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                    <li>
                        <a class="active-menu" href="messages.php"><i class="fa fa-desktop"></i> Messages</a>
                    </li>
                    <li>
                        <a href="Payment.php"><i class="fa fa-qrcode"></i> Paiement</a>
                    </li>
                    <li>
                        <a  href="profit.php"><i class="fa fa-qrcode"></i> Profit</a>
                    </li>
                    <li>
                        <a href="logout.php" ><i class="fa fa-sign-out fa-fw"></i> Se Déconnecter</a>
                    </li>
                    
            </div>

        </nav>
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           <small>Panneau</small> Messages
                        </h1>
                    </div>
                </div> 
				 <?php
				include('../db_gl.php');
				$mail = "SELECT * FROM `contact`";
				$rew = mysqli_query($con,$mail);
				
			   ?>
				 <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h3>Envoyer des newsletters aux abonnés</h3>
						<?php
						while($rows = mysqli_fetch_array($rew))
						{
								$app=$rows['approval'];
								if($app=="Autoriser")
								{
									
								}
						}
						?>
                        <p></p>
                        <p>
						<div class="panel-body">
                            <button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal">
                              Envoyer une nouvelle newsletter
                            </button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Rédiger la newsletter</h4>
                                        </div>
										<form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Titre</label>
                                            <input name="title" class="form-control" placeholder="Entrer titre">
											</div>
										</div>
										<div class="modal-body">
                                            <div class="form-group">
                                            <label>Sujet</label>
                                            <input name="subject" class="form-control" placeholder="Entrer le sujet">
											</div>
                                        </div>
										<div class="modal-body">
										<div class="form-group">
										  <label for="comment">Nouvelles</label>
										  <textarea name="news" class="form-control" rows="5" id="comment" placeholder="Messages ..."></textarea>
										</div>
										 </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
											
                                           <input type="submit" name="log" value="Envoyer" class="btn btn-primary">
										  </form>
										   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
							<?php
							if(isset($_POST['log']))
							{	
								$log ="INSERT INTO `newsletterlog`(`title`, `subject`, `news`) VALUES ('$_POST[title]','$_POST[subject]','$_POST[news]')";
								if(mysqli_query($con,$log))
								{
									echo '<script>alert("Nouvelle lettre ajouter") </script>' ;
											
								}
								
							}
							
								
							?>
                          
                        </p>
						
                    </div>
                </div>
            </div>
               <?php
				
				$sql = "SELECT * FROM `contact`";
				$re = mysqli_query($con,$sql);
				
			   ?>
            <div class="row">
                <div class="col-md-12">
                    <!-- Tables avancées -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
											<th>Numéro de téléphone</th>
                                            <th>Email</th>
                                            <th>Date</th>
											<th>Status</th>
											<th>Acceptation</th>
											<th>Supprimer</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
										while($row = mysqli_fetch_array($re))
										{
										
											$id = $row['id'];
											
											if($id % 2 ==1 )
											{
												echo"<tr class='gradeC'>
													<td>".$row['fullname']."</td>
													<td>".$row['phoneno']."</td>
													<td>".$row['email']."</td>
													<td>".$row['cdate']."</td>
													<td>".$row['approval']."</td>
													<td><a href=newsletter.php?eid=".$id ."<button class='btn btn-primary'> <i class='fa fa-edit' ></i> Permission</button></td>
													<td><a href=newsletterdel.php?eid=".$id ." <button class='btn btn-danger'> <i class='fa fa-trash-o' ></i> Supprimer</button></td>
												</tr>";
											}
											else
											{
												echo"<tr class='gradeU'>
													<td>".$row['fullname']."</td>
													<td>".$row['phoneno']."</td>
													<td>".$row['email']."</td>
													<td>".$row['cdate']."</td>
													<td>".$row['approval']."</td>
													<td><a href=newsletter.php?eid=".$id ." <button class='btn btn-primary'> <i class='fa fa-edit' ></i> Permission</button></td>
													<td><a href=newsletterdel.php?eid=".$id ." <button class='btn btn-danger'> <i class='fa fa-trash-o' ></i> Supprimer</button></td>
												</tr>";
											}
										}
									?>
                                    </tbody>
                                </table>
                            </div>
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
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
</body>
</html>