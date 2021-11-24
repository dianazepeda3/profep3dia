<!DOCTYPE php>

<?php 
$an = "Anonimo";
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

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PROFEP3DIA &mdash; Profesor</title>
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
          
          <!--
          <ul>
						<li class="btn-cta" ><a<span>BUSCAR</span></a></li>
					</ul>	!-->

         
                            
					<ul>
						<li class="btn-cta" ><a href="index.php"><span>INICIO</span></a></li>
					</ul>	
				</div>
			</div>
			
		</div>
	</nav>
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/backgroundCentrado.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 colmd-offset-0 text-left">
					<div class="row row-mt-10em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<img src="images/iconoMaestro.png" align="left" width="200px" height="200px">
              				<div class="contenedor">
							  <!--<center><h2 class="cursive-font primary-color">
                        		<?php echo $uname = $_GET['profesor'];?></h2></center>-->
							  <?php
								include("conexion.php");

								$product = pg_query($conexion, "SELECT * FROM maestro where id_maestro = $uname");
								$row=pg_fetch_assoc($product)
								 
							?>
                				<!--<h2 style=" color:white">MICHEL DAVALOS BOITES</h2>-->
								<h2><?php echo $row['nombre']?>&nbsp;<?php echo $row['apellidos'] ?></h2>
								
            					<!-- Boton Evaluar profesor -->
                				<!--<button  type="button" id="search" style="background-color: #FF6900; border-color: #FF6900 ; color:white; font-size: 40px;"-->
			              </div>
		          		</div>
          				<div class="bandera">
                			<img src="images/banderaProfesor.png" width="140px" height="200px" aling="top">
                			<div class="texto-encima"></div>
                			<div class="centrado"><?php echo $row['calificacion_promedio'] ?>%</div>
              			</div>
					</div>
				</div>
        		<hr class="class-1">
				<div style="float: left; width: 20%"><h2 class="cursive-font primary-color">RESEÑAS</h2></div>
						<?php
							include("conexion.php");

							//$query = "SELECT * FROM tabla_imagen";
							//$resultado = $conn->query($query);
							//<?php $nombres = pg_query($conexion, "SELECT nombre FROM alumno WHERE nombre = 'Diana'");
		
							$product = pg_query($conexion, "SELECT * FROM reseña where id_maestro = $uname order by likes asc");
							while($row=pg_fetch_assoc($product)){
							//$row2 = $resultado->fetch_assoc()
						?>

						<div class="">
							<a class="fh5co-card-item">
								
								<div class="">
									<br><div style="float: left; width: 20%"><h2> &nbsp;&nbsp;&nbsp;&nbsp;Usuario:  
									<?php if($row['visibilidad'] == 1){ 
											echo $row['username'];
											}else{
											echo $an;
											}?></h2></div>
									<div style="float: right; width: 20%"><h2>Likes: <?php echo $row['likes'] ?> 
									&nbsp;&nbsp;Disikes: <?php echo $row['dislikes'] ?> </h2></div>
									<div style="float: right; width: 100%"><h2>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['clave_materia'] ?></h2></div>
									<div style="float: right; width: 100%"><h2>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['comentario'] ?></h2></div>
									<!--<p><span class="price cursive-font"><?php //echo $row['calificacion_promedio'] ?>%</span></p>-->
								</div>
							</a>
						</div>
						<?php
							}
						?>
						
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