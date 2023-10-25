<?php session_start(); ?>
<html>
<head>
	<title>Comex</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		¡Bienvenidos a Comex!
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("conexion.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Bienvenid@ <?php echo $_SESSION['name'] ?> ! <a href='cerrarsesion.php'>Cerrar Sesión</a><br/>
		<br/>
		<a href='vista.php'>Vista y Productos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Debes iniciar sesión para poder ver el contenido.<br/><br/>";
		echo "<a href='iniciarsesion.php'>Iniciar Sesión</a> | <a href='registrar.php'>Registrarse</a>";
	}
	?>
	<div id="footer">
		Created by <a href="https://jesusrafaelcanoflores5a.github.io/DaWeb-CanoJ-Tienda-De-Pintura/WebMaster.html" title="Jesús Rafael Cano Flores 5J">Jesús Rafael Cano Flores 5J</a>
	</div>
</body>
</html>
