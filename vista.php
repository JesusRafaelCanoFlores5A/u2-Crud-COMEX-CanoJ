<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciarsesion.php');
}
?>

<?php
//Incluir achivo de la conexión de la base de datos
include_once("conexion.php");

//Ordenando los datos en orden descendente (el último agregado es el primero)
$result = mysqli_query($mysqli, "SELECT * FROM pintura WHERE id_usuario=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Inicio</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="agregar.html">Agregar Nuevo Producto</a> | <a href="cerrarsesion.php">Cerrar Sesion</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Id_Pintura</td>
			<td>Pintura_Nombre</td>
			<td>Precio</td>
			<td>Litros</td>
			<td>Esquema</td>
			<td>Descuento</td>
			<td>Proveedor</td>
			<td>Codigo</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['id_pintura']."</td>";
			echo "<td>".$res['pintura_nombre']."</td>";
			echo "<td>".$res['precio']."</td>";	
			echo "<td>".$res['litros']."</td>";
			echo "<td>".$res['esquema']."</td>";
			echo "<td>".$res['descuento']."</td>";
			echo "<td>".$res['proveedor']."</td>";
			echo "<td>".$res['codigo']."</td>";	
			echo "<td><a href=\"editar.php?id=$res[id]\">Editar</a> | <a href=\"borrar.php?id=$res[id]\" onClick=\"return confirm('¿Estás seguro de querer borrar el dato?')\">Borrar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
