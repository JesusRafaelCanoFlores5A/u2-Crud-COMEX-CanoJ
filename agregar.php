<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciarsesion.php');
}
?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//Incluir el archivo de la conexión de la base de datos
include_once("conexion.php");

if(isset($_POST['enviar'])) {	
	$id_pintura = $_POST['id_pintura'];
	$pintura_Nombre = $_POST['pintura_Nombre'];
	$precio = $_POST['precio'];
	$litros = $_POST['litros'];
	$esquema = $_POST['esquema'];
	$descuento = $_POST['descuento'];
	$proveedor = $_POST['proveedor'];
	$codigo = $_POST['codigo'];
	$loginId = $_SESSION['id'];
		
	//Revisar campos vacíos
	if(empty($id_pintura) || empty($pintura_Nombre) || empty($precio) || empty($litros) || empty($esquema) || empty($descuento) || empty($proveedor) || empty($codigo)) {
				
		if(empty($id_pintura)) {
			echo "<font color='red'>El campo id_pintura está vacío.</font><br/>";
		}
		
		if(empty($pintura_Nombre)) {
			echo "<font color='red'>El campo pintura_Nombre está vacío.</font><br/>";
		}
		
		if(empty($precio)) {
			echo "<font color='red'>El campo precio está vacío.</font><br/>";
		}
		
		if(empty($litros)) {
			echo "<font color='red'>El campo litros está vacío.</font><br/>";
		}

		if(empty($esquema)) {
			echo "<font color='red'>El campo esquema está vacío.</font><br/>";
		}
		
		if(empty($descuento)) {
			echo "<font color='red'>El campo descuento está vacío.</font><br/>";
		}
		
		if(empty($proveedor)) {
			echo "<font color='red'>El campo proveedor está vacío.</font><br/>";
		}
		
		if(empty($codigo)) {
			echo "<font color='red'>El campo codigo está vacío.</font><br/>";
		}
		//Link a la página anterior
		echo "<br/><a href='javascript:self.history.back();'>Regresar</a>";
	} else { 
		//Si todos los campos fueron llenados (no vacíos)
			
		//Insertar datos a la base de datos	
		$result = mysqli_query($mysqli, "INSERT INTO `pintura`(`id_pintura`, `pintura_nombre`, `precio`, `litros`, `esquema`, `descuento`, `proveedor`, `codigo`,`id_usuario`) VALUES ('$id_pintura','$pintura_Nombre','$precio','$litros','$esquema','$descuento','$proveedor','$codigo','$loginId')");
		$sql=mysqli_query($mysqli,"ALTER TABLE pintura DROP COLUMN id");
		$sql=mysqli_query($mysqli, "ALTER TABLE pintura ADD COLUMN id int AUTO_INCREMENT PRIMARY KEY");
		//Mostrar mensaje de que fue agregado
		echo "<font color='green'>Datos agregados correctamente.";
		echo "<br/><a href='vista.php'>Ver Resultados</a>";
	}
}
?>
</body>
</html>
