<!DOCTYPE php>

<?php 
if (isset($_POST['profe'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['profe']);
	$uname = strtoupper($uname);
}else{
    $uname = null;
}
?>

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PROFEP3DIA &mdash; Evaluación de maestros CUCEI</title>
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
						<li class="btn-cta" ><a href="index.php"><span>INICIO</span></a></li>
					</ul>
				</div>	
			</div>
			
		</div>
	</nav>
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 colmd-offset-0 text-left">
					<div class="row row-mt-15em">
                    
						<center><h2 class="cursive-font primary-color">
                        <?php// echo $uname;?></h2></center>
						<?php
							include("conexion.php");

							
							if(empty($uname)){
								$product = $conexion->query("SELECT * FROM maestro order by calificacion_promedio desc limit 15") ;
							}else{
								$product = $conexion->query("SELECT * FROM maestro where nombre like '%$uname%' or apellidos like '%$uname%' or concat(nombre,' ',apellidos) like '%$uname%' order by nombre asc");
								$var = false;
							}
							
    							while($row=$product->fetch_assoc()){
    							//$row2 = $resultado->fetch_assoc()
    							$var = true;
                                $idP = $row['id_maestro'];
						?>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<a href="Profesor.php?profesor=<?php echo $idP ?>" class="fh5co-card-item">
								<figure>
									<div class="overlay"></div>
									<img src="images/iconoMaestro.png" alt="Image" class="img-responsive">
								</figure>
								<div class="fh5co-text">
									<h2><?php echo $row['nombre'] ?></h2>
									<h2><?php echo $row['apellidos'] ?></h2>
									<p><span class="price cursive-font"><?php echo $row['calificacion_promedio'] ?>%</span></p>
								</div>
							</a>
						</div>
						<?php
							    }
							    if($var == false){
							        ?>
							        <center><h1>NO EXISTEN COINCIDENCIAS
							        <img src="images/bola4.png" height="70%"></h1>
							        </center><?php
							    }
						?>
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

