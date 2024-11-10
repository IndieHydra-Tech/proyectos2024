<?php
include("con_db.php");
include("loginV.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="log_style.css">
</head>
<body>
    <div class="formulario">
        <h1>Inicio de Sesión</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="username"><strong>Nombre de usuario</strong></label>
                <input type="text" required placeholder="Ingrese su nombre de usuario" name="usuario">
            </div>
            <div class="form-group">
                <label for="password"><strong>Contraseña</strong></label>
                <input type="password" required placeholder="Ingrese su contraseña" name="password">
            </div>
            <input type="submit" value="Iniciar" name="ingresar">
        </form>
    </div>
</body>
</html>