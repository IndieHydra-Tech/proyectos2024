<?php
include("con_db.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Especialista</title>
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
                <a href="#"><strong>Cerrar sesión</strong></a>
            </nav>
        </div>
    </header>
    <div class="capa"></div>
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
                    <td>Nombre y Apellido</td>
                    <td>Nombre de especialidad</td>
                    <td>Cupos</td>
                    <td>Modificar</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM especialista"; // Cambia "registro" por "especialista"
                $resultadE = mysqli_query($conec, $sql);

                while ($mostrarE = mysqli_fetch_array($resultadE)) {
                ?>
                    <tr>
                        <td><?php echo $mostrarE['NombreC']; ?></td>
                        <td><?php echo $mostrarE['especialidad']; ?></td>
                        <td><?php echo $mostrarE['cupos']; ?></td>
                        <td><a>Modificar</a></td> <!-- Enlace para modificar -->
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

