<!DOCTYPE PHP>
<?php
	include("conexion.php");
	$nocoincide = false;
	$userep = false;
	$validarcorreo = false;
	$valcorreo = false;
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
			$res = pg_query($conexion, $query);
			$cant=pg_num_rows($res);
			if($cant == 0){
				$validarcorreo = filter_var($correo, FILTER_VALIDATE_EMAIL);
				if($validarcorreo){
					$query = "INSERT INTO alumno VALUES ('$user','$nombre','$apellidos','$correo','$pass','$carrera')";
					pg_query($conexion, $query);
					header("Location: index.php"); 
				}else{
					$valcorreo = true;
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
					<div id="gtco-logo"><!--<a href="index.html">!-->Buscar Profesor<em></em></div>
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
		<div 
class="gtco-container">
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
														?>
													<div class="col-md-6">
														<label for="date-start">Nombre</label>
														<input type="text" id="nombre" name="nombre" REQUIRED class="form-control">
													</div>
                          							<div class="col-md-6">
														<label for="date-start">Apellidos</label>
														<input type="text" id="apellidos" name="apellidos" REQUIRED class="form-control">
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
															<option value="Otra" style="color:Black">Otra</option>
															
														</select>
													</div>
													
                         							 <div class="col-md-6">
														<label for="date-start">Username</label>
														<input type="text" id="user" name="user" REQUIRED class="form-control">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="date-start">Correo Institucional</label>
														<input type="text" id="correo" name="correo" REQUIRED class="form-control">
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
                            							<input type="password" id="pass" name="pass" REQUIRED class="form-control">
													</div>
                          							<div class="col-md-6">
														<label for="date-start">Confirmar contraseña</label>
                            							<input type="password" id="pass2" name="pass2" REQUIRED class="form-control">
													</div>
												</div>

												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" name="submit" class="btn btn-primary btn-block" value="Confirmar"></span></a>
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



	<footer id="gtco-footer" role="contentinfo" data-stellar-background-ratio="0.5">*\
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-pb-md">

				

				
				<div class="col-md-12 text-center">
					<div class="gtco-widget">
						<h3>SOPORTE</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +52 3313149161</a></li>
							<li><a href="#"><i class="icon-mail2"></i> soporte.profepedia@gmail.com</a></li>
						</ul>
					</div>
					<div class="gtco-widget">
						<h3>Get Social</h3>
						<ul class="gtco-social-icons">
							<li><a href="#"><i class="icon-facebook"></i></a></li>
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

