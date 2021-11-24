<!DOCTYPE php>

<?php 
$user=$_GET['user'];
if (isset($_POST['profesor'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['profesor']);
}else{
    $uname = "error";
}
?>

<?php
	include("conexion.php");

	if(isset($_POST['submit'])&&!empty($_POST['submit'])){
		$profe = $_GET['profesor'];
		$user = $_GET['user'];
		if(!empty($_POST['my_checkbox'])) {			
			$visible = true;// user checked the box
		} else {
			$visible = false;// user did not check the box
		}
		$calificacion=$_POST["cal"];
		$clave=$_POST["clave"];
		$reseña=$_POST["rese"];
		if($visible == 1){
			$query = "INSERT INTO reseña (id_maestro, username, calificacion, clave_materia, comentario, visibilidad) 
			VALUES ($profe,'$user',$calificacion,'$clave','$reseña',$visible)";
		}else{
			$query = "INSERT INTO reseña (id_maestro, username, calificacion, clave_materia, comentario, visibilidad) 
			VALUES ($profe,'$user',$calificacion,'$clave','$reseña',0)";
		}
		pg_query($conexion, $query);

		$query = "SELECT * FROM reseña WHERE id_maestro = $profe";
		$result = pg_query($conexion, $query);

		$suma = 0;
		$cant=pg_num_rows($result);
		while($row=pg_fetch_assoc($result)){
			//$row2 = $resultado->fetch_assoc()
			$suma = $suma + $row['calificacion'];
		}
		$promedio = $suma / $cant;

		$query = "UPDATE maestro SET calificacion_promedio = $promedio WHERE id_maestro = $profe";
		$result = pg_query($conexion, $query);
		
		$user=$_GET['user'];
		$profesor=$_GET['profesor'];
		header("Location: Profesor2.php?profesor=$profesor&user=$user"); 
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
					
              	  <form action="Busqueda2.php?user=<?php echo $user?>" method="post">
						<input type="text" name="profe" REQUIRED class="" id="Busqueda" size="60" maxlength="50" style="float: left; background-color:white; color:Black;">
						<button  type="submit"  class="" style="float: left; background-color: #FF6900; border-color: #FF6900 ; color:white; font-size: 16px; width: 12%;">Buscar</button>
					</form>
					</div>
                    
					<ul>
						<li class="btn-cta" ><a href="index.php"><span>CERRAR SESION</span></a></li>
					</ul>
				</div>                            
			</div>   
		</div>
	</nav>
	<?php	
	 	$uname = $_GET['profesor'];
		$product = pg_query($conexion, "SELECT * FROM maestro where id_maestro = $uname");
		$row=pg_fetch_assoc($product)
		?>
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
											<center><h3 class="center">RESEÑA</h3></center>
											<form method="POST">	
												<center><h2><?php echo $row['nombre']?>&nbsp;<?php echo $row['apellidos'] ?></h2></center>																							
												<div class="row form-group">
													<div class="col-md-12">
                            							<div class="switch-conteiner">
															<center> <label for="date-start">Nombre Visible</label> </center>
                             		 						<input type="checkbox" id="switch" value='1'name='my_checkbox' />
                              								<label for="switch" class="lbl"></label>
                            							</div>
													</div>
												</div>
                        						<div class="row form-group">
													<div class="col-md-12">
														<center> <label for="date-start">Calificación</label> </center>
                              							<center><input type="number" id="cal" name="cal" min="1" max="100" step="1" value="50" required> </center>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<center><label for="date-start">Clave de materia</label></center>
														<center><input type="text" id="clave" name="clave" class="form-control" ></center>
													</div> 
												</div>
                        						<div class="row form-group">
													<div class="col-md-12">
														<label for="date-start">Escribe tu reseña...</label>
														<input type="text" id="rese" name="rese" class="form-control">
													</div> 
												</div>
                        
                        						<div class="row form-group">
													<div class="col-md-12">
                            							<a href="Profesor2.html"><span>
														<input type="submit" name="submit" class="btn btn-primary btn-block" value="Guardar"></span></a>
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

