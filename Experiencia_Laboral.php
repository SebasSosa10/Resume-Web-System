<?php
include('conexion.php');

$entidad = $_GET['entidad'] ?? null;
$numeroDocumento = $_GET['numeroDocumento'] ?? null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empresa = $conn->real_escape_string($_POST['empresaActual']);
    $tipo = $conn->real_escape_string($_POST['tipoEmpresaActual']);
    $pais = $conn->real_escape_string($_POST['paisActual']);
    $departamento = $conn->real_escape_string($_POST['departamentoActual']);
    $ciudad = $conn->real_escape_string($_POST['capitalActual']);
    $correo = $conn->real_escape_string($_POST['correoEntidadActual']);
    $telefono = $conn->real_escape_string($_POST['telefonoEntidadActual']);
    $cargo = $conn->real_escape_string($_POST['cargo']);
    $dependencia = $conn->real_escape_string($_POST['dependenciaActual']);
    $direccion = $conn->real_escape_string($_POST['direccionActual']);
    $fechaIngreso = $conn->real_escape_string($_POST['fechaIngresoActual']);
    $fechaRetiro = $conn->real_escape_string($_POST['fechaRetiroActual']);

    if (!$entidad || !$numeroDocumento) {
        echo "<script>
            alert('Debe llenar los Datos Personales primero.');
            window.location.href = 'Experiencia_Laboral.php';
        </script>";
        exit();
    }

    // Preparar la consulta
    $stmt = $conn->prepare("INSERT INTO experiencia_laboral (empresa, tipo, pais, departamento, ciudad, correo, telefono, cargo, dependencia, direccion, fechaIngreso, fechaRetiro, idPersona)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        echo "<div class='alert alert-danger'>Error en la preparación de la consulta: " . $conn->error . "</div>";
        exit();
    }

    // Vincular parámetros
    $stmt->bind_param("ssssssssssssi", $empresa, $tipo, $pais, $departamento, $ciudad, $correo, $telefono, $cargo, $dependencia, $direccion, $fechaIngreso, $fechaRetiro, $numeroDocumento);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        header("Location: Tiempo_Total_De_Experiencia.php?entidad=" . urlencode($entidad) . "&numeroDocumento=" . urlencode($numeroDocumento));
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error al guardar los datos: " . $stmt->error . "</div>";
    }

    $stmt->close();
}

$conn->close();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hoja de vida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/Stile.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-3">
                <img class="img-responsive" src="imagen/logo.jpeg" width="200">
            </div>
            <div class="col-sm-4 text-center">
                <p>FORMATO ÚNICO</p>
                <h1>HOJA DE VIDA</h1>
                <p>Persona Natural</p>
                <p>(Leyes 190 de 1995, 489 y 443 de 1998)</p>
            </div>
            <div class="col-sm-3">
                <label for="comment">ENTIDAD RECEPTORA:</label>
                <input type="text" class="form-control" id="entiti" name="entidadReceptora" readonly
                    value="<?php echo htmlspecialchars($entidad); ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="bannermenu">
                <a href="index.php" class="menu">Datos Personales</a>
                <a href="Formacion_Academica.php" class="menu">Formacion Academica</a>
                <a href="Experiencia_Laboral.php" class="menu">Experiencia Laboral</a>
                <a href="Tiempo_Total_De_Experiencia.php" class="menu">Tiempo Total De Experiencia</a>
            </div>
        </div>
        <form method="post" action="Experiencia_Laboral.php?entidad=<?php echo urlencode($entidad); ?>&numeroDocumento=<?php echo urlencode($numeroDocumento); ?>">
            <div class="row mt-4">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                    <h3>3. EXPERIENCIA LABORAL</h3>
                    <p>RELACIONE SU EXPERIENCIA LABORAL O DE PRESTACIÓN DE SERVICIOS EN ESTRICTO ORDEN CRONOLÓGICO
                        COMENZANDO POR EL ACTUAL.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                    <h5>EMPLEO ACTUAL O CONTRATO VIGENTE</h5>
                    <div class="form-group">
                        <label for="empresaActual">EMPRESA O ENTIDAD:</label>
                        <input type="text" class="form-control" id="empresaActual" name="empresaActual">
                    </div>
                    <label>TIPO DE EMPRESA:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipoEmpresaActual" id="publica"
                            value="publica" checked>
                        <label class="form-check-label" for="publica">PÚBLICA</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipoEmpresaActual" id="privada"
                            value="privada">
                        <label class="form-check-label" for="privada">PRIVADA</label>
                    </div>
                    <div class="form-group mt-3">
                        <label for="paisActual">PAÍS:</label>
                        <select id="paisActual" class="form-control" name="paisActual">
                            <option disabled selected>Seleccione</option>
                            <option value="colombia">Colombia</option>
                            <option value="mexico">México</option>
                            <option value="argentina">Argentina</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="departamentoActual">DEPARTAMENTO:</label>
                        <select class="form-control" id="departamentoActual" name="departamentoActual">
                            <option value="" disabled selected>Selecciona</option>
                            <option value="antioquia">Antioquia</option>
                            <option value="cundinamarca">Cundinamarca</option>
                            <option value="valle-del-cauca">Valle del Cauca</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="capitalActual">CAPITAL:</label>
                        <select class="form-control" id="capitalActual" name="capitalActual">
                            <option value="" disabled selected>Selecciona</option>
                            <option value="bogota">Bogotá</option>
                            <option value="medellin">Medellín</option>
                            <option value="cali">Cali</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="correoEntidadActual">CORREO ELECTRÓNICO ENTIDAD:</label>
                        <input type="email" class="form-control" id="correoEntidadActual" name="correoEntidadActual">
                    </div>
                    <div class="form-group mt-3">
                        <label for="telefonoEntidadActual">TELÉFONOS:</label>
                        <input type="tel" class="form-control" id="telefonoEntidadActual" name="telefonoEntidadActual">
                    </div>
                    <div class="form-group mt-3">
                        <label for="fechaIngresoActual">FECHA DE INGRESO:</label>
                        <input type="date" id="fechaIngresoActual" name="fechaIngresoActual" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="fechaRetiroActual">FECHA DE RETIRO:</label>
                        <input type="date" id="fechaRetiroActual" name="fechaRetiroActual" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="cargo">CARGO O CONTRATO ACTUAL:</label>
                        <input type="text" class="form-control" id="cargo" name="cargo">
                    </div>
                    <div class="form-group mt-3">
                        <label for="dependenciaActual">DEPENDENCIA:</label>
                        <input type="text" class="form-control" id="dependenciaActual" name="dependenciaActual">
                    </div>
                    <div class="form-group mt-3">
                        <label for="direccionActual">DIRECCIÓN:</label>
                        <input type="text" class="form-control" id="direccionActual" name="direccionActual">
                    </div>
                </div>
            </div>
            <input type="hidden" name="entidad" value="<?php echo htmlspecialchars($entidad); ?>">
            <input type="hidden" name="numeroDocumento" value="<?php echo htmlspecialchars($numeroDocumento); ?>">
            <div class="row mt-4">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary">Siguiente</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>