<html>
<head>
	<title>Registrarse</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['enviar'])) {
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$usuario = $_POST['usu'];
	$contra = $_POST['contr'];

	if($usuario == "" || $contra == "" || $nombre == "" || $correo == "") {
		echo "Todos los campos deben estar llenos. Uno o más campos están vacíos.";
		echo "<br/>";
		echo "<a href='registrar.php'>Regresar</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$nombre', '$correo', '$usuario', md5('$contra'))")
			or die("No se pudo executar el query.");
			$sql=mysqli_query($mysqli,"ALTER TABLE login DROP COLUMN id");
			$sql=mysqli_query($mysqli, "ALTER TABLE login ADD COLUMN id int AUTO_INCREMENT PRIMARY KEY");
		echo "Se Registró correctamente";
		echo "<br/>";
		echo "<a href='iniciarsesion.php'>Iniciar Sesión</a>";
	}
} else {
?>
	<p><font size="+2">Registrarse</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nombre completo</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr> 
				<td>Correo</td>
				<td><input type="text" name="correo"></td>
			</tr>			
			<tr> 
				<td>Usuario</td>
				<td><input type="text" name="usu"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="password" name="contr"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="enviar" value="enviar"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
