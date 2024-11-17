<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('conexion.php');

$entidad = $_GET['entidad'] ?? null;
$numeroDocumento = $_GET['numeroDocumento'] ?? null;

// Función para verificar si existe la persona
function verificarPersona($conn, $numeroDocumento)
{
    try {
        $stmt = $conn->prepare("SELECT numeroDocumento FROM persona WHERE numeroDocumento = ?");
        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }

        $stmt->bind_param("s", $numeroDocumento);
        if (!$stmt->execute()) {
            throw new Exception("Error executing statement: " . $stmt->error);
        }

        $result = $stmt->get_result();
        return $result->num_rows > 0;
    } catch (Exception $e) {
        error_log("Error en verificarPersona: " . $e->getMessage());
        throw $e;
    }
}

// Función para validar los datos del formulario
function validarDatos($data)
{
    $camposRequeridos = [
        'servidorPublicoAnios',
        'servidorPublicoMeses',
        'empleadoPrivadoAnios',
        'empleadoPrivadoMeses',
        'independienteAnios',
        'independienteMeses',
        'totalAnios',
        'totalMeses'
    ];

    foreach ($camposRequeridos as $campo) {
        if (!isset($data[$campo]) || !is_numeric($data[$campo])) {
            throw new Exception("El campo $campo es inválido o está vacío");
        }

        if (strpos($campo, 'Meses') !== false && ($data[$campo] < 0 || $data[$campo] > 11)) {
            throw new Exception("Los meses deben estar entre 0 y 11");
        }

        if (strpos($campo, 'Anios') !== false && $data[$campo] < 0) {
            throw new Exception("Los años no pueden ser negativos");
        }
    }
}

// Función para guardar o actualizar los datos
function guardarTiempoExperiencia($conn, $numeroDocumento, $data)
{
    try {
        // Validar datos
        validarDatos($data);

        // Iniciar transacción
        $conn->begin_transaction();

        // Insertar nuevo registro
        $sql = "INSERT INTO tiempo_total_de_experiencia
                (mesServidorPublico, anioServidorPublico,
                    mesEmpleadoPrivado, anioEmpleadoPrivado,
                    mesIndependiente, anioIndependiente,
                    total_anios, total_meses, idPersona)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";


        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }

        $stmt->bind_param(
            "iiiiiiiss",
            $data['servidorPublicoMeses'],
            $data['servidorPublicoAnios'],
            $data['empleadoPrivadoMeses'],
            $data['empleadoPrivadoAnios'],
            $data['independienteMeses'],
            $data['independienteAnios'],
            $data['totalAnios'],
            $data['totalMeses'],
            $numeroDocumento
        );

        if (!$stmt->execute()) {
            throw new Exception("Error executing statement: " . $stmt->error);
        }

        $conn->commit();
        return true;
    } catch (Exception $e) {
        $conn->rollback();
        error_log("Error en guardarTiempoExperiencia: " . $e->getMessage());
        throw $e;
    }
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!$numeroDocumento) {
            throw new Exception("Debe llenar los Datos Personales primero.");
        }

        // Verificar si la persona existe
        if (!verificarPersona($conn, $numeroDocumento)) {
            throw new Exception("La persona no existe en la base de datos.");
        }

        // Guardar los datos
        $result = guardarTiempoExperiencia($conn, $numeroDocumento, $_POST);

        if ($result) {
            echo "<script>
                alert('Datos guardados exitosamente');
                window.location.href = 'index.php';
            </script>";
            exit();
        }
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hoja de vida - Tiempo Total de Experiencia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/Stile.css">
    <script>
        function calcularExperienciaTotal() {
            const ocupaciones = ['servidorPublico', 'empleadoPrivado', 'independiente'];
            let totalAnios = 0;
            let totalMeses = 0;

            ocupaciones.forEach(ocupacion => {
                const anios = parseInt(document.getElementById(`${ocupacion}Anios`).value) || 0;
                const meses = parseInt(document.getElementById(`${ocupacion}Meses`).value) || 0;

                totalAnios += anios;
                totalMeses += meses;
            });

            // Convertir meses excedentes a años
            totalAnios += Math.floor(totalMeses / 12);
            totalMeses = totalMeses % 12;

            document.getElementById('totalAnios').value = totalAnios;
            document.getElementById('totalMeses').value = totalMeses;
        }

        function validarMeses(input) {
            let valor = parseInt(input.value) || 0;
            if (valor < 0) valor = 0;
            if (valor > 11) valor = 11;
            input.value = valor;
            calcularExperienciaTotal();
        }

        function validarAnios(input) {
            let valor = parseInt(input.value) || 0;
            if (valor < 0) valor = 0;
            input.value = valor;
            calcularExperienciaTotal();
        }

        document.addEventListener('DOMContentLoaded', function() {
            const camposAnios = document.querySelectorAll('input[type="number"]:not([max="11"])');
            const camposMeses = document.querySelectorAll('input[type="number"][max="11"]');

            camposAnios.forEach(campo => {
                campo.addEventListener('input', function() {
                    validarAnios(this);
                });
            });

            camposMeses.forEach(campo => {
                campo.addEventListener('input', function() {
                    validarMeses(this);
                });
            });

            // Calcular totales iniciales
            calcularExperienciaTotal();
        });
    </script>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-3">
                <img class="img-responsive" src="imagen/logo.jpeg" width="200" alt="Logo">
            </div>
            <div class="col-sm-4 text-center">
                <p>FORMATO ÚNICO</p>
                <h1>HOJA DE VIDA</h1>
                <p>Persona Natural</p>
                <p>(Leyes 190 de 1995, 489 y 443 de 1998)</p>
            </div>
            <div class="col-sm-3">
                <label for="entiti">ENTIDAD RECEPTORA:</label>
                <input type="text" class="form-control" id="entiti" value="<?php echo htmlspecialchars($entidad); ?>" readonly>
            </div>
        </div>

        <!-- Navigation -->
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="bannermenu">
                <a href="index.php" class="menu">Datos Personales</a>
                <a href="Formacion_Academica.php" class="menu">Formación Académica</a>
                <a href="Experiencia_Laboral.php" class="menu">Experiencia Laboral</a>
                <a href="Tiempo_Total_De_Experiencia.php" class="menu">Tiempo Total De Experiencia</a>
            </div>
        </div>

        <!-- Form -->
        <form method="post" action="Tiempo_Total_De_Experiencia.php?entidad=<?php echo urlencode($entidad); ?>&numeroDocumento=<?php echo urlencode($numeroDocumento); ?>">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                    <h2>4. TIEMPO TOTAL DE EXPERIENCIA</h2>
                    <label>Indique el tiempo total de su experiencia laboral en número de años y meses</label>
                </div>
            </div>

            <div class="container mt-4">
                <!-- Servidor Público -->
                <div class="row mt-3">
                    <div class="col-6">Servidor público</div>
                    <div class="col-2">
                        <input type="number" class="form-control" name="servidorPublicoAnios" id="servidorPublicoAnios"
                            min="0" style="width: 100px" value="<?php echo $existingData['anioServidorPublico'] ?? '0'; ?>">
                    </div>
                    <div class="col-3">
                        <input type="number" class="form-control" name="servidorPublicoMeses" id="servidorPublicoMeses"
                            min="0" max="11" style="width: 100px" value="<?php echo $existingData['mesServidorPublico'] ?? '0'; ?>">
                    </div>
                </div>

                <!-- Empleado Privado -->
                <div class="row mt-3">
                    <div class="col-6">Empleado del sector privado</div>
                    <div class="col-2">
                        <input type="number" class="form-control" name="empleadoPrivadoAnios" id="empleadoPrivadoAnios"
                            min="0" style="width: 100px" value="<?php echo $existingData['anioEmpleadoPrivado'] ?? '0'; ?>">
                    </div>
                    <div class="col-3">
                        <input type="number" class="form-control" name="empleadoPrivadoMeses" id="empleadoPrivadoMeses"
                            min="0" max="11" style="width: 100px" value="<?php echo $existingData['mesEmpleadoPrivado'] ?? '0'; ?>">
                    </div>
                </div>

                <!-- Independiente -->
                <div class="row mt-3">
                    <div class="col-6">Trabajador independiente</div>
                    <div class="col-2">
                        <input type="number" class="form-control" name="independienteAnios" id="independienteAnios"
                            min="0" style="width: 100px" value="<?php echo $existingData['anioIndependiente'] ?? '0'; ?>">
                    </div>
                    <div class="col-3">
                        <input type="number" class="form-control" name="independienteMeses" id="independienteMeses"
                            min="0" max="11" style="width: 100px" value="<?php echo $existingData['mesIndependiente'] ?? '0'; ?>">
                    </div>
                </div>

                <!-- Totales -->
                <div class="row mt-3">
                    <div class="col-6"><strong>Total tiempo experiencia</strong></div>
                    <div class="col-2">
                        <input type="number" class="form-control" name="totalAnios" id="totalAnios"
                            style="width: 100px" readonly value="<?php echo $existingData['total_anios'] ?? '0'; ?>">
                    </div>
                    <div class="col-3">
                        <input type="number" class="form-control" name="totalMeses" id="totalMeses"
                            style="width: 100px" readonly value="<?php echo $existingData['total_meses'] ?? '0'; ?>">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row mt-4">
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>