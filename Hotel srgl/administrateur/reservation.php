<?php
include('../db_gl.php')
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RESERVATION - HOTEL SRGL</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a  href="../index.php"><i class="fa fa-home"></i>Page d'accueil</a>
                    </li>
                    
				</ul>

            </div>

        </nav>
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            RESERVATION <small></small>
                        </h1>
                    </div>
                </div> 
 <style>
.alert {
  padding: 20px;
  background-color: #3399ff
;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Warning!</strong> En cas de succès de la réservation une alert sera afficher sinon veuillez réessayer
</div>                           
            <div class="row">
                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            INFORMATIONS PERSONNELLES
                        </div>
                        <div class="panel-body">
						<form name="form" method="post">
                            <div class="form-group">
                                            <label>Civilité*</label>
                                            <select name="title" class="form-control" required >
												<option value selected ></option>
													<option value="Mr.">Mr.</option>
													<option value="Mlle.">Mlle.</option>
													<option value="Mme.">Mme.</option>
													<option value="Vve.">Vve.</option>
                                            </select>
                              </div>
							  <div class="form-group">
                                            <label>Prénom*</label>
                                            <input name="fname" class="form-control" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>Nom*</label>
                                            <input name="lname" class="form-control" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>Email*</label>
                                            <input name="email" type="email" class="form-control" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>Nationalité*</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="nation"  value="" checked="Marocain">Marocain(e)
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="nation"  value="Non Marocain">Non Marocain(e)
                                            </label>
                         
                                </div>
								<?php

								$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", 
								"Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", 
								"Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", 
								"Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", 
								"Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", 
								"China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", 
								"Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", 
								"Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", 
								"Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", 
								"French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", 
								"Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", 
								"Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", 
								"Iran (Islamic Republic of)", "Iraq", "Ireland" , "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", 
								"Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", 
								"Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", 
								"Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands",
								"Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", 
								"Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", 
								"Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", 
								"Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", 
								"Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", 
								"Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", 
								"Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", 
								"Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", 
								"St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", 
								"Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", 
								"Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", 
								"United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", 
								"Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Yemen", "Yugoslavia", "Zambia", 
								"Zimbabwe");

								?>
								<div class="form-group">
                                            <label>Passeport du Pays*</label>
                                            <select name="country" class="form-control" required>
												<option value selected ></option>
                                                <?php
												foreach($countries as $key => $value):
												echo '<option value="'.$value.'">'.$value.'</option>'; //fermeture des balises
												endforeach;
												?>
                                            </select>
								</div>
								<div class="form-group">
                                            <label>Numéro de téléphone</label>
                                            <input name="phone" type ="text" class="form-control" required>
                                            
                               </div>
							   
                        </div>
                        
                    </div>
                </div>
                
                  
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            INFORMATIONS DE RÉSERVATION
                        </div>
                        <div class="panel-body">
								<div class="form-group">
                                            <label>Type de chambre *</label>
                                            <select name="troom"  class="form-control" required>
												<option value selected ></option>
                                                <option value="Chambre de luxe">Chambre de luxe</option>
                                                <option value="Suite luxueuse">Suite luxueuse</option>
												<option value="Chambre standard">Chambre standard</option>
												<option value="Suite">Suite</option>
												<option value="Chambre Twin Deluxe">Chambre Twin Deluxe</option>
                                            </select>
                              </div>
							  <div class="form-group">
                                            <label>Type de literie*</label>
                                            <select name="bed" class="form-control" required>
												<option value selected ></option>
                                                <option value="Single">Single</option>
                                                <option value="Double">Double</option>
												<option value="Triple">Triple</option>
                                                <option value="Quad">Quad</option>
												<option value="None">None</option>
                                            </select>
                              </div>
							  <div class="form-group">
                                            <label>Nombre de chambres *</label>
                                            <select name="nroom" class="form-control" required>
												<option value selected ></option>
                                                <option value="1">1</option>
                                            </select>
                              </div>
							  <div class="form-group">
                                            <label>Plan de repas*</label>
                                            <select name="meal" class="form-control"required>
												<option value selected ></option>
                                                <option value="Chambre seulement">Chambre seulement</option>
                                                <option value="Petit déjeuner">Petit déjeuner</option>
												<option value="La moitié du tableau">La moitié du tableau</option>
												<option value="Pension complète">Pension complète</option>
                                            </select>
                              </div>
							  <div class="form-group">
                                            <label>Date d'entrée*</label>
                                            <input name="cin" type ="date" class="form-control" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>Date de sortie*</label>
                                            <input name="cout" type ="date" class="form-control" required>
                                            
                               </div>
                       </div>
                        
                    </div>
                </div>
				
				
                <div class="col-md-12 col-sm-12">
                    <div class="well">
                        <h3 style="color:red;">VÉRIFICATION HUMAINE</h3>
                        <p>Retapez ce code : <span style="color:green;background-color: lightgrey;"><?php $Random_code=rand(); echo$Random_code; ?></span> </p>
							<input  type="text" name="code1" title="random code" required>
							<input type="hidden" name="code" value="<?php echo $Random_code; ?>" >
						<input type="submit" name="submit" class="btn btn-primary">
						<?php
							if(isset($_POST['submit']))
							{
							$code1=$_POST['code1'];
							$code=$_POST['code']; 
							if($code1!="$code")
							{
							$msg="Invalide code"; 
							}
							else
							{
								$dif1=date_diff($_POST['cout'],$_POST['cin']);
								$dif2=date_diff($_POST['cout'],date("Y-m-d"));
								
								
									$con=mysqli_connect("localhost","root","","db_hotel_gl");
									$check="SELECT * FROM roombook WHERE email = '$_POST[email]'";
									$rs = mysqli_query($con,$check);
									$data = mysqli_fetch_array($rs, MYSQLI_NUM);
									//Chaque utilisateur peut faire une seule reservation 
									if(isset($data[0]) >= 1) {
										echo "<script type='text/javascript'> alert('Vous avez deja une reservation.Vous ne pouvez pas faire plus qu'une!!')</script>";
										
									}else if($dif1<0 || $dif2 <0){
										echo "<script type='text/javascript'> alert('Erreur des dates!!')</script>";										
									}else
									{
										$new ="Non Confirmer";
										$newUser="INSERT INTO `roombook`(`Title`, `FName`, `LName`, `Email`, `National`, `Country`, `Phone`, `TRoom`, `Bed`, `NRoom`, `Meal`, `cin`, `cout`,`stat`,`nodays`) VALUES ('$_POST[title]','$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[nation]','$_POST[country]','$_POST[phone]','$_POST[troom]','$_POST[bed]','$_POST[nroom]','$_POST[meal]','$_POST[cin]','$_POST[cout]','$new',datediff('$_POST[cout]','$_POST[cin]'))";
										if (mysqli_query($con,$newUser))
										{
											echo "<script type='text/javascript'> alert('Votre reservation envoyé avec succes')</script>";
											
										}
										else
										{
											echo "<script type='text/javascript'> alert('Erreur dans le systeme! réessaye à nouveau')</script>";
											
										}
									}
							$msg="Votre code est vrai";
							}
							}
							?>
						</form>
							
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
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>