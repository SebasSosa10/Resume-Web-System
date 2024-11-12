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
                <label for="entidad">ENTIDAD RECEPTORA:</label>
                <input type="text" class="form-control" id="entidad" name="entidad">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-1"></div>
            <div class="bannermenu">
                <a href="Formacion_Academica.php" class="menu">Formación Académica</a>
                <a href="index.php" class="menu">Datos Personales</a>
                <a href="Tiempo_Total_De_Experiencia.php" class="menu">Tiempo Total de Experiencia</a>
            </div>
        </div>

        <form method="post" action="Experiencia_Laboral.php">
            <div class="row mt-4">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                    <h3>3. EXPERIENCIA LABORAL</h3>
                    <p>RELACIONE SU EXPERIENCIA LABORAL O DE PRESTACIÓN DE SERVICIOS EN ESTRICTO ORDEN CRONOLÓGICO COMENZANDO POR EL ACTUAL.</p>
                </div>
            </div>

            <!-- Empleo Actual -->
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
                        <input class="form-check-input" type="radio" name="tipoEmpresaActual" id="publica" value="publica" checked>
                        <label class="form-check-label" for="publica">PÚBLICA</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipoEmpresaActual" id="privada" value="privada">
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
                        <label for="fechaIngresoActual">FECHA DE RETIRO:</label>
                        <input type="date" id="fechaRetiro" name="fechaRetiroX" class="form-control">
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

            <div class="row mt-4">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </form>
        <?php
        include('conexion.php');

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
            $fechaRetiro = $conn->real_escape_string($_POST['fechaRetiro']); // Nuevo campo

            $sql = "INSERT INTO experiencia_laboral (empresa, tipo, pais, departamento, ciudad, correo, telefono, cargo, dependencia, direccion, fechaIngreso, fechaRetiro)
            VALUES ('$empresa', '$tipo', '$pais', '$departamento', '$ciudad', '$correo', '$telefono', '$cargo', '$dependencia', '$direccion', '$fechaIngreso', '$fechaRetiro')";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>Datos guardados exitosamente.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error al guardar los datos: " . $conn->error . "</div>";
            }
        }

        $conn->close();
        ?>
    </div>
</body>

</html>