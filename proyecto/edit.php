<?php
include("con_db.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar especialista</title>
	<link rel="stylesheet" href="stilos.css">
</head>
<body>
	<header class="header">
		<div class="container">
		<div class="btn-menu">
			<label for="btn-menu">☰</label>
		</div>
			<div class="logo">
				<h1><strong>Administrador</strong></h1>
			</div>
			<nav class="menu">
				<a href="#"><strong>Inicio</strong></a>
				<a href="#"><strong>cerrar sesion</strong></a>
			</nav>
		</div>
	</header>
	<div class="capa"></div>
<!--	--------------->
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
		<nav>
			<a href="#">Especialista</a>
			<a href="#">Especialidad</a>
			<a href="#">Lista de agendado</a>
		</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div>
<div class="table-container">
	<table border="1">
		<thead>
		<tr>
				<td>Nombre y Apellido</td>
				<td>Especialidad</td>
				<td>Cupos</td>
				<td>Accion</td>
			</tr>
		</thead>
			<tbody>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
	</table>
</div>
</body>
</html>