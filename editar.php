<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciarsesion.php');
}
?>

<?php
//Incluir archivo de la conexion de base de datos
include_once("conexion.php");

if(isset($_POST['actualizar']))
{	
	$id = $_POST['id'];
	
	$id_pintura = $_POST['id_pintura'];
	$pintura_Nombre = $_POST['pintura_Nombre'];
	$precio = $_POST['precio'];
	$litros = $_POST['litros'];
	$esquema = $_POST['esquema'];
	$descuento = $_POST['descuento'];
	$proveedor = $_POST['proveedor'];
	$codigo = $_POST['codigo'];	
	
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
	} else {	
		//Actualizando la tabla
		$result = mysqli_query($mysqli, "UPDATE `pintura` SET `id_pintura`='$id_pintura',`pintura_nombre`='$pintura_Nombre',`precio`='$precio',`litros`='$litros',`esquema`='$esquema',`descuento`='$descuento',`proveedor`='$proveedor',`codigo`='$codigo' WHERE id =$id");
		
		//Redirigiendo a la página que se mostraba. En nuestro caso, es vista.php
		header("Location: vista.php");
	}
}
?>
<?php
//Obtener id de URL
$id = $_GET['id'];

//Seleccionar elos datos asociados con ese id
$result = mysqli_query($mysqli, "SELECT * FROM pintura WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$id_pintura = $res['id_pintura'];
	$pintura_Nombre = $res['pintura_nombre'];
	$precio = $res['precio'];
	$litros = $res['litros'];
	$esquema = $res['esquema'];
	$descuento = $res['descuento'];
	$proveedor = $res['proveedor'];
	$codigo = $res['codigo'];
}
?>
<html>
<head>	
	<title>Editar Datos</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="vista.php">Ver Productos</a> | <a href="cerrarsesion.php">Cerrar Sesión</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr> 
				<td>Id_Pintura</td>
				<td><input type="text" name="id_pintura" value="<?php echo $id_pintura;?>"></td>
			</tr>
			<tr> 
				<td>pintura_Nombre</td>
				<td><input type="text" name="pintura_Nombre" value="<?php echo $pintura_Nombre;?>"></td>
			</tr>
			<tr> 
				<td>Precio</td>
				<td><input type="text" name="precio" value="<?php echo $precio;?>"></td>
			</tr>
			<tr> 
				<td>Litros</td>
				<td><input type="text" name="litros" value="<?php echo $litros;?>"></td>
			</tr>
			<tr> 
				<td>Esquema</td>
				<td><input type="text" name="esquema" value="<?php echo $esquema;?>"></td>
			</tr>
			<tr> 
				<td>Descuento</td>
				<td><input type="text" name="descuento" value="<?php echo $descuento;?>"></td>
			</tr>
			<tr> 
				<td>Proveedor</td>
				<td><input type="text" name="proveedor" value="<?php echo $proveedor;?>"></td>
			</tr>
			<tr> 
				<td>Codigo</td>
				<td><input type="text" name="codigo" value="<?php echo $codigo;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="actualizar" value="Actualizar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
