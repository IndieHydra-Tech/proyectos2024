<?php
include("con_db.php");

if (isset($_POST['enviar'])) {

    if (strlen($_POST['paciente']) >= 1 && 
        strlen($_POST['cedula']) >= 1 && 
        strlen($_POST['especialidad']) >= 1 &&
        strlen($_POST['especialista']) >= 1 && 
        strlen($_POST['beneficiario']) >= 1 && 
        strlen($_POST['carnet']) >= 1) {
        
        $paciente = trim($_POST['paciente']);
        $cedula = trim($_POST['cedula']);
        $especialidad = trim($_POST['especialidad']);
        $especialista = trim($_POST['especialista']);
        $beneficiario = trim($_POST['beneficiario']);
        $carnet = trim($_POST['carnet']);

        // Verificar si ya existe una cita para el mismo paciente y especialista
        $check_stmt = $conec->prepare("SELECT * FROM registro WHERE paciente = ? AND especialista = ?");
        $check_stmt->bind_param("ss", $paciente, $especialista);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<h3 class="ok">Su cita ha sido agendada.</h3>'; // Mensaje si ya existe la cita
        } else {
            // Proceder a insertar
            $stmt = $conec->prepare("INSERT INTO registro (paciente, Cedula, Especialidad, Especialista, beneficiario, carnet) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $paciente, $cedula, $especialidad, $especialista, $beneficiario, $carnet);

            $resultado = $stmt->execute();

            if ($resultado) {
                echo '<h3 class="ok">Tu cita ha sido agendada.</h3>'; // Mensaje de éxito
            } else {
                echo '<h3 class="error">Ha ocurrido un error: ' . $stmt->error . '</h3>'; // Mensaje de error
            }
            $stmt->close();
        }

        $check_stmt->close();
    } else {
        // Mensaje si no se llenan todos los campos
        echo '<h3 class="error">Por favor, llenar todos los campos.</h3>';
    }
}
?>
