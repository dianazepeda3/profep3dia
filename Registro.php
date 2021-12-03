<!DOCTYPE PHP>
<?php
	include("conexion.php");
	$nocoincide = false;
	$userep = false;
	$validarcorreo = false;
	$valcorreo = false;
	$correorep = false;
	if(isset($_POST['submit'])&&!empty($_POST['submit'])){
    
		$nombre=$_POST["nombre"];
		$apellidos=$_POST["apellidos"];
		$carrera=$_POST["carrera"];
		$user=$_POST["user"];
		$correo=$_POST["correo"];
		$pass=$_POST["pass"];
		$pass2=$_POST["pass2"];

		if($pass == $pass2){
			$query = "SELECT * FROM alumno WHERE username='$user'";
			//$res = pg_query($conexion, $query);
			$res=$conexion->query($query);
			$cant=mysqli_num_rows($res);
			$query = "SELECT * FROM alumno WHERE correo='$correo'";
			//$res = pg_query($conexion, $query);
			$res=$conexion->query($query);
			$cant2=mysqli_num_rows($res);
			if($cant == 0){
			    if($cant2 == 0){
    				$validarcorreo = filter_var($correo, FILTER_VALIDATE_EMAIL);
    				if($validarcorreo){
    					$query = "INSERT INTO alumno VALUES ('$user','$nombre','$apellidos','$correo','$pass','$carrera')";
    					//pg_query($conexion, $query);
    					$conexion->query($query);
    					?><meta http-equiv="refresh" content="0;url=index.php"> <?php
    				}else{
    					$valcorreo = true;
    				}
			    }else{
			        $correorep = true;
			    }
			}else{
				$userep = true;
			}
			$nocoincide = false;
		}else{
			$nocoincide = true;
			$userep = false;
		}
	}
	
	?>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PROFEP3DIA &mdash; Registro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="GetTemplates.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Bootstrap DateTimePicker -->
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mystery+Quest">

<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Rubik+Beastly&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Faster+One&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-3 col-xs-12">
					<div id="gtco-logo"><b><a href="Busqueda.php" style="font-size: 22px">Buscar Profesor<em></em></a></b></div>
				</div>
        
				<div class="col-xs-9 text-right menu-1">
				<div class id="barra_busqueda">
						<form action="Busqueda.php" method="post">
							<input type="text" name="profe" REQUIRED class="" id="Busqueda" size="60" maxlength="50" style="float: left; background-color:white; color:Black;">
							<button  type="submit"  class="" style="float: left; background-color: #FF6900; border-color: #FF6900 ; color:white; font-size: 16px; width: 12%;">Buscar</button>
						</form>
						
					</div>
        
					<ul>
						<li class="btn-cta" ><a href="index.php"><span>INICIAR SESION</span></a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/backgroundCentrado.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-15 colmd-offset-0 text-left">
					
					<div class="row row-mt-10em">
						<div class="col-md-10 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
									
									<div class="tab-content">
										<div class="tab-content-inner active" data-content="signup">
											<center><h3 class="center">REGISTRO</h3></center>
											<form method="POST">													
												<div class="row form-group">
													<?php 
														if($userep == true){ ?>
															<center><label style="color:red">El username ya existe</label></center>
														<?php
														}
														if($valcorreo == true){ ?>
															<center><label style="color:red">El correo no es valido</label></center>
														<?php
														}
														if($correorep == true){ ?>
															<center><label style="color:red">Correo ya registrado</label></center>
														<?php
														}
														?>
													<div class="col-md-6">
														<label for="date-start">Nombre</label>
														<input type="text" maxlength="20" id="nombre" name="nombre" REQUIRED class="form-control">
													</div>
                          							<div class="col-md-6">
														<label for="date-start">Apellidos</label>
														<input type="text" maxlength="40" id="apellidos" name="apellidos" REQUIRED class="form-control">
													</div>
												</div>
                        						<div class="row form-group">
													<div class="col-md-6">
                            							<label for="date-start">Clave de la carrera</label>
														<select id="carrera" name="carrera" REQUIRED class="form-control">
															<option value="" style="color:Black">Seleccionar</option>
															<option value="INCO" style="color:Black">INCO</option>
															<option value="INNI" style="color:Black">INNI</option>
															<option value="ICOM" style="color:Black">ICOM</option>
															<option value="TOP" style="color:Black">TOP</option>
                                                            <option value="MEL" style="color:Black">MEL</option>
                                                            <option value="MIET" style="color:Black">MIET</option>
                                                            <option value="MIPF" style="color:Black">MIPF</option>
                                                            <option value="MIQI" style="color:Black">MIQI</option>
                                                            <option value="DUPR" style="color:Black">DUPR</option>
                                                            <option value="MILI" style="color:Black">MILI</option>
                                                            <option value="MITE" style="color:Black">MITE</option>
                                                            <option value="MIMC" style="color:Black">MIMC</option>
                                                            <option value="QFB" style="color:Black">QFB</option>
                                                            <option value="IND" style="color:Black">IND</option>
                                                            <option value="MCM" style="color:Black">MCM</option>
                                                            <option value="DCM" style="color:Black">DCM</option>
                                                            <option value="DDCM" style="color:Black">DDCM</option>
                                                            <option value="PEL" style="color:Black">PEL</option>
                                                            <option value="MICQ" style="color:Black">MICQ</option>
                                                            <option value="IIE" style="color:Black">IIE</option>
                                                            <option value="MIEC" style="color:Black">MIEC</option>
                                                            <option value="QUI" style="color:Black">QUI</option>
                                                            <option value="ICT" style="color:Black">ICT</option>
                                                            <option value="MIPR" style="color:Black">MIPR</option>
                                                            <option value="DCPB" style="color:Black">DCPB</option>
                                                            <option value="MIHD" style="color:Black">MIHD</option>
                                                            <option value="CIV" style="color:Black">CIV</option>
                                                            <option value="RMEM" style="color:Black">RMEM</option>
                                                            <option value="MIFI" style="color:Black">MIFI</option>
                                                            <option value="CEL" style="color:Black">CEL</option>
                                                            <option value="IQU" style="color:Black">IQU</option>
                                                            <option value="IIP" style="color:Black">IIP</option>
                                                            <option value="IPF" style="color:Black">IPF</option>
                                                            <option value="XVA" style="color:Black">XVA</option>
                                                            <option value="ICI" style="color:Black">ICI</option>
                                                            <option value="PIP" style="color:Black">PIP</option>
                                                            <option value="PIN" style="color:Black">PIN</option>
                                                            <option value="PRC" style="color:Black">PRC</option>
                                                            <option value="DVIT" style="color:Black">DVIT</option>
                                                            <option value="MIPB" style="color:Black">MIPB</option>
                                                            <option value="MIIG" style="color:Black">MIIG</option>
                                                            <option value="PME" style="color:Black">PME</option>
                                                            <option value="XEF" style="color:Black">XEF</option>
                                                            <option value="MIFM" style="color:Black">MIFM</option>
                                                            <option value="MIQC" style="color:Black">MIQC</option>
                                                            <option value="DUCF" style="color:Black">DUCF</option>
															
														</select>
													</div>
													
                         							 <div class="col-md-6">
														<label for="date-start">Username</label>
														<input type="text" minlength="5" maxlength="20" id="user" name="user" REQUIRED class="form-control">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="date-start">Correo</label>
														<input type="text" maxlength="40" id="correo" name="correo" REQUIRED class="form-control">
													</div> 
												</div>
                        						<div class="row form-group">
													<?php 
														if($nocoincide == true){ ?>
															<center><label style="color:red">Las contraseñas no coinciden</label></center>
														<?php
														}
														?>
													<div class="col-md-6">
														<label for="date-start">Contraseña</label>
                            							<input type="password" minlength="7" maxlength="10" id="pass" name="pass" REQUIRED class="form-control">
													</div>
                          							<div class="col-md-6">
														<label for="date-start">Confirmar contraseña</label>
                            							<input type="password" minlength="7" maxlength="10" id="pass2" name="pass2" REQUIRED class="form-control">
													</div>
													<div class="col-md-6">
													<label><input type="checkbox" required id="cbox1" value="first_checkbox"> Acepto <a href="TerminosCondiciones.txt" target="_blank">Términos y Condiciones</a></label><br>
													</div>
												</div>

												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" name="submit" class="btn btn-primary btn-block" value="Registrar"></span></a>
													</div>
												</div>
											</form>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</header>



	<footer id="gtco-footer" role="contentinfo" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-pb-md">

				

				
				<div class="col-md-12 text-center">
					<div class="gtco-widget">
						<h3>SOPORTE</h3>
						<ul class="gtco-quick-contact">
							<li><a><i class="icon-mail2"></i> soporte.profepedia@gmail.com</a></li>
						</ul>
					</div>
					<div class="gtco-widget">
						<h3>Get Social</h3>
						<ul class="gtco-social-icons">
							<li><a href="https://www.facebook.com/Profep3dia-101972772325777/" target="_blank"><i class="icon-facebook"></i> Profep3dia</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-12 text-center copyright">
					<p><small class="block">&copy; 2021 Gorilovers Industries.   All Rights Reserved.</small> 
				</div>

			</div>

			

		</div>
	</footer>
	<!-- </div> -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	
	<script src="js/moment.min.js"></script>
	<script src="js/bootstrap-datetimepicker.min.js"></script>


	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

