<?php session_start(); ?>
<html>
<head>
	<title>Iniciar Sesión</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['enviar'])) {
	$user = mysqli_real_escape_string($mysqli, $_POST['usu']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['contr']);

	if($user == "" || $pass == "") {
		echo "Usuario o Contraseña están vacíos.";
		echo "<br/>";
		echo "<a href='iniciarsesion.php'>Regresar</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
					or die("No se pudo ejecutar el query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['username'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['id'];
		} else {
			echo "Contraseña o Usuario Inválido";
			echo "<br/>";
			echo "<a href='iniciarsesion.php'>Regresar</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<p><font size="+2">Login</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Usuario</td>
				<td><input type="text" name="usu"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="password" name="contr"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="enviar" value="Enviar"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
