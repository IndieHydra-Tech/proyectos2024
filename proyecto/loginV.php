<?php
if (!empty($_POST["ingresar"])) {
    if (empty($_POST["usuario"]) || empty($_POST["password"])) {
        echo '<div class="prueba">Los campos están vacíos</div>';
    } else {
        $usuario = $_POST["usuario"];
        $clave = $_POST["password"];
        
        // Consulta preparada para evitar inyección SQL
        $stmt = $conec->prepare("SELECT * FROM login WHERE usuario = ? AND password = ?");
        $stmt->bind_param("ss", $usuario, $clave);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($datos = $result->fetch_object()) {
            header("Location: admin.php");
            exit();
        } else {
            echo '<div>Acceso denegado</div>';
        }
        
        $stmt->close();
    }
}
?>