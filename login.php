<!DOCTYPE php>

<?php
	include("conexion.php");
	$mensaje = false;
	if(isset($_POST['submit'])&&!empty($_POST['submit'])){
    
		$user=$_POST["user"];
		$pass=$_POST["pass"];
		
		$query = "SELECT * FROM alumno WHERE username='$user' AND contrasena='$pass'";
		$res = $conexion->query($query);
		$cant=mysqli_num_rows($res);
		if($cant == 1){ 
			?><meta http-equiv="refresh" content="0;url=Busqueda2.php?user=<?php echo $user?>"> <?php
			$mensaje = false;
		}else{
			//header("Location: index.php?ms=true"); 
			?><meta http-equiv="refresh" content="0;url=index.php?ms=1"> <?php
			$mensaje = true;
		}
	}
?>