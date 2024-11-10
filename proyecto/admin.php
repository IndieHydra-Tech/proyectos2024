<?php
	$inc =include("con_db.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="stilos.css">
</head>
<body>
	<header class="header">
		<div class="container">
		<div class="btn-menu">
			<label for="btn-menu">☰</label>
		</div>
			<div class="logo">
				<h1>Administrador</h1>
			</div>
			<nav class="menu">
				<a href="admin.php">Inicio</a>
				<a href="login.php">cerrar sesion</a>
			</nav>
		</div>
	</header>
	<div class="capa"></div>
<!--	--------------->
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
		<nav>
			<a href="/especialista.php">Especialista</a>
			<a href="/especialidades.php">Especialidad</a>
			<a href="/admin.php">Lista de agendado</a>
		</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div>
<div class="table-container">
	<table border="1">
		<thead>
		<tr>
				<td>Paciente</td>
				<td>Cedula</td>
				<td>Especialidad</td>
				<td>Especialista</td>
				<td>beneficiario</td>
				<td>carnet</td>
				<td>Acciones</td>
			</tr>
		</thead>
		<?php
			$sql = "SELECT * from registro";
			$resultad = mysqli_query($conec, $sql);

			while ($mostrar = mysqli_fetch_array($resultad)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $mostrar['paciente'] ?></td>
						<td><?php echo $mostrar['Cedula'] ?></td>
						<td><?php echo $mostrar['Especialidad'] ?></td>
						<td><?php echo $mostrar['Especialista'] ?></td>
						<td><?php echo $mostrar['beneficiario'] ?></td>
						<td><?php echo $mostrar['carnet'] ?></td>
						<td>
						<?php echo "<a href='eliminar.php?IDagendar=" . $mostrar['IDagendar'] . "'
						onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\");'>ELIMINAR</a>"; ?>
						</td>
					</tr>
				</tbody>
			<?php
			}
			?>
	</table>
</div>
</body>
</html>