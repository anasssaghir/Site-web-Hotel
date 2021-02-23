<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}

ob_start();
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SR-GL HOTEL</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
                <a class="navbar-brand" href="home.php">MENU</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
			
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i>Profil de l'utilisateur</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Paramètres</a>
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
                        <a class="active-menu" href="settings.php"><i class="fa fa-dashboard"></i>Tableau de bord utilisateur</a>
                    </li>
					
            </div>

        </nav>
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           ADMINISTRATEUR <small> comptes </small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <?php
						include ('../db_gl.php');
						$sql = "SELECT * FROM `login`";
						$re = mysqli_query($con,$sql)
				?>
                
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID d'utilisateur</th>
											<th>Nom d'utilisateur</th>
                                            <th>Mot de passe</th>
											<th>Modifier</th>
											<th>Supprimer</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
										while($row = mysqli_fetch_array($re))
										{
										
											$id = $row['id'];
											$us = $row['usname'];
											$ps = $row['pass'];
											if($id % 2 ==0 )
											{
												echo"<tr class='gradeC'>
													<td>".$id."</td>
													<td>".$us."</td>
													<td>".$ps."</td>
													
													<td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
															 Update 
													</button></td>
													<td><a href=usersettingdel.php?eid=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Supprimer</button></td>
												</tr>";
											}
											else
											{
												echo"<tr class='gradeU'>
													<td>".$id."</td>
													<td>".$us."</td>
													<td>".$ps."</td>
													
													<td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
                              Update 
                            </button></td>
													<td><a href=usersettingdel.php?eid=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Supprimer</button></td>
												</tr>";
											
											}
										
										}
										
									?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
					<div class="panel-body">
                            <button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal1">
															Ajouter un nouveau administrateur
													</button>
                            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Ajoutez le nom d'utilisateur et le mot de passe</h4>
                                        </div>
										<form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Ajouter un nouveau nom d'utilisateur</label>
                                            <input name="newus"  class="form-control" placeholder="Entrer nom d'utilisateur">
											</div>
										</div>
										<div class="modal-body">
                                            <div class="form-group">
                                            <label>Nouveau mot de passe</label>
                                            <input name="newps"  class="form-control" placeholder="Entrer mot de passe">
											</div>
                                        </div>
										
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
											
                                           <input type="submit" name="in" value="Ajouter" class="btn btn-primary">
										  </form>
										   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php
						if(isset($_POST['in']))
						{
							$newus = $_POST['newus'];
							$newps = $_POST['newps'];
							
							$newsql ="Insert into login (usname,pass) values ('$newus','$newps')";
							if(mysqli_query($con,$newsql))
							{
							echo' <script language="javascript" type="text/javascript"> alert("Nom dutilisateur et mot de passe ajoutés") </script>';
							
						
							}
						header("Location: usersetting.php");
						}
						?>
						
					<div class="panel-body">
                            
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Changer le nom d'utilisateur et le mot de passe</h4>
                                        </div>
										<form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Changer le nom d'utilisateur</label>
                                            <input name="usname" value="<?php echo $us; ?>" class="form-control" placeholder="Entrer nom d'utilisateur">
											</div>
										</div>
										<div class="modal-body">
                                            <div class="form-group">
                                            <label>Changer le mot de passe</label>
                                            <input name="pasd" value="<?php echo $ps; ?>" class="form-control" placeholder="Entrer mot de passe">
											</div>
                                        </div>
										
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
											
                                           <input type="submit" name="up" value="Modifier" class="btn btn-primary">
										  </form>
										   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
               
                <?php 
				if(isset($_POST['up']))
				{
					$usname = $_POST['usname'];
					$passwr = $_POST['pasd'];
					
					$upsql = "UPDATE `login` SET `usname`='$usname',`pass`='$passwr' WHERE id = '$id'";
					if(mysqli_query($con,$upsql))
					{
					echo' <script language="javascript" type="text/javascript"> alert("Mise à jour du nom dutilisateur et du mot de passe") </script>';
					
				
					}
				
				header("Location: usersetting.php");
				
				}
				ob_end_flush();
				
				
				
				
				?>
                                
            </div>
        </div>
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
