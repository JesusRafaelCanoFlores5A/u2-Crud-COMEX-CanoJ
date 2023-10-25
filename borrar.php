<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciarsesion.php');
}
?>

<?php
//Incluir archivo de la conexion de base de datos
include("conexion.php");

//obtener id del URL
$id = $_GET['id'];

//Borrar la fila de la tabla
$result=mysqli_query($mysqli, "DELETE FROM pintura WHERE id=$id");
$sql=mysqli_query($mysqli,"ALTER TABLE pintura DROP COLUMN id");
$sql=mysqli_query($mysqli, "ALTER TABLE pintura ADD COLUMN id int AUTO_INCREMENT PRIMARY KEY");
//Redirigiendo a la página que se mostraba (vista.php en nuestro caso)
header("Location:vista.php");
?>

