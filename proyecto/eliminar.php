<?php
$id = $_GET['IDagendar'];
include("con_db.php");

// Cambia 'paciente' por 'registro' si es la tabla correcta
$sql = "DELETE FROM registro WHERE IDagendar='" . $id . "'";
$resultado = mysqli_query($conec, $sql);

if ($resultado) {
    echo "<script language='JavaScript'>
        alert('Los datos se eliminaron correctamente');
        location.assign('admin.php');
        </script>";
} else {
    echo "<script language='JavaScript'>
        alert('Los datos no se eliminaron');
        location.assign('admin.php');
        </script>";
}
?>