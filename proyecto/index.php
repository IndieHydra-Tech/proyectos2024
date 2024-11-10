<?php
include("con_db.php");
$message = '';

if (isset($_POST['enviar'])) {
    if (strlen($_POST['paciente']) >= 1 && 
        strlen($_POST['cedula']) >= 1 && 
        strlen($_POST['especialidad']) > 0 && 
        strlen($_POST['especialista']) > 0 && 
        strlen($_POST['beneficiario']) > 0 && 
        strlen($_POST['carnet']) >= 1) {

        $paciente = trim($_POST['paciente']);
        $cedula = trim($_POST['cedula']);
        $especialidad = trim($_POST['especialidad']);
        $especialista = trim($_POST['especialista']);
        $beneficiario = trim($_POST['beneficiario']);
        $carnet = trim($_POST['carnet']);


        $stmt = $conec->prepare("INSERT INTO registro (paciente, Cedula, Especialidad, Especialista, beneficiario, carnet) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $paciente, $cedula, $especialidad, $especialista, $beneficiario, $carnet);


        if ($stmt->execute()) {
            $message = '<h3 class="ok">Tu cita ha sido agendada</h3>';
        } else {
            $message = '<h3 class="error">Ha ocurrido un error: ' . $stmt->error . '</h3>';
        }

        $stmt->close();
    } else {
        $message = '<h3 class="error">Por favor llenar todos los campos correctamente.</h3>';
    }
}

$conec->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda tu cita</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <a href="/login.php">
        <img src="/img/favicon-192-150x150.png" class="header-image" alt="siamtel">
        </a>
        "SERVICIO INTEGRAL DE ATENCION MEDICA AL TRABAJADOR DEL ESTADO LARA"(SIAMTEL)
    </div>
    <div class="sub-header">
        <span><strong>Ofrece: consulta de citas</strong></span>
        <span class="right"><strong>Lunes a Viernes de 8:00 am a 3:30 pm</strong></span>
    </div>
    <div class="form-wrapper">
        <img src="/img/grupo de doctor.jfif" class="doctor-image" alt="Doctor">
        <div class="container">
            <div class="title">Registro</div>
            <form method="post">
                <div class="form-group">
                    <span><strong>Paciente:</strong></span>
                    <input type="text" name="paciente" placeholder="Ingrese nombre...">
                </div>
                <div class="form-group">
                    <span><strong>Cedula:</strong></span>
                    <input type="text" name="cedula" placeholder="Ingrese su cedula...">
                </div>
                <div class="form-group">
                    <span><strong>Especialidad:</strong></span>
                    <select name="especialidad" id="especialidad" onchange="actualizarEspecialistas()">
                        <option value="">Seleccione especialidad...</option>
                        <option value="cardiologia">Cardiología</option>
                        <option value="ecografia">Ecografía</option>
                        <option value="urologia">Urología</option>
                        <option value="angiologia">Angiología</option>
                    </select>
                </div>
                <div class="form-group">
                    <span><strong>Especialista:</strong></span>
                    <select name="especialista" id="especialista">
                        <option value="">Seleccione especialista...</option>
                        <!-- Los especialistas se llenarán dinámicamente -->
                    </select>
                </div>
                <script>
                    const especialistas = {
                        "cardiologia": ["Nelson Araujo"],
                        "ecografia": ["Gregory Massiah", "Ana Torres"],
                        "urologia": ["Valeria Colmenarez"],
                        "angiologia": ["Alicia Medina"]
                    };

                    function actualizarEspecialistas() {
                        const especialidad = document.getElementById('especialidad').value;
                        const especialistaSelect = document.getElementById('especialista');

                        especialistaSelect.innerHTML = '<option value="">Seleccione especialista...</option>';

                        if (especialidad && especialistas[especialidad]) {
                            especialistas[especialidad].forEach(function(especialista) {
                                const option = document.createElement('option');
                                option.value = especialista;
                                option.textContent = especialista;
                                especialistaSelect.appendChild(option);
                            });
                        }
                    }
                </script>
                <div class="form-group">
                    <span><strong>Es Beneficiario:</strong></span>
                    <select name="beneficiario">
                        <option value="">Seleccione una opción...</option>
                        <option value="beneficiario">Beneficiario</option>
                        <option value="particular">Particular</option>
                    </select>
                </div>
                <div class="form-group">
                    <span><strong>Código de carnet:</strong></span>
                    <input type="text" name="carnet" placeholder="Ingrese su número...">
                </div>
                <div class="button-container">
                    <button type="submit" name="enviar" id="submitBtn"><strong>Aceptar</strong></button>
                </div>
            </form>
        </div>
    </div>
    <img src="/img/parte inferior.png" class="insignias-image" alt="Insignias" />

    <?php
    include("Registrar.php");
    ?>
</body>
</html>
