<?php
include('conexion.php');

$entidad = $_GET['entidad'] ?? null;
$numeroDocumento = $_GET['numeroDocumento'] ?? null;

$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoEducacion = $_POST['tipoEducacion'] ?? '';
    $titulo = $_POST['nombreTitulo'] ?? '';
    $mesEducacionBasica = $_POST['mesTitulo'] ?? '';
    $anioEducacionBasica = $_POST['anioTitulo'] ?? '';
    $modalidad = $_POST['modalidad'] ?? '';
    $numeroSemestre = $_POST['semestre'] ?? '';
    $graduado = $_POST['graduado'] ?? '';
    $nombreEstudio = $_POST['nombreEstudios'] ?? '';
    $mesEducacionSuperior = $_POST['mesEstudio'] ?? '';
    $anioEducacionSuperior = $_POST['anioEstudio'] ?? '';
    $tarjetaProfesional = $_POST['numeroTarjeta'] ?? '';
    $idioma = $_POST['idioma'] ?? '';
    $loHabla = $_POST['loHabla'] ?? '';
    $loLee = $_POST['loLee'] ?? '';
    $loEscribe = $_POST['loEscribe'] ?? '';

    if (!$entidad || !$numeroDocumento) {
        $errorMessage = '<div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">¡Atención!</h4>
            <p>Antes de continuar con la formación académica, es necesario completar los datos personales.</p>
            <hr>
            <p class="mb-0">Por favor, complete primero la sección de datos personales.</p>
            <div class="mt-3">
                <a href="index.php" class="btn btn-primary">Ir a Datos Personales</a>
            </div>
        </div>';
    }

    elseif (
        empty($tipoEducacion) || empty($titulo) || empty($anioEducacionBasica) ||
        empty($modalidad) || empty($graduado) || empty($nombreEstudio) ||
        empty($idioma) || empty($loHabla) || empty($loLee) || empty($loEscribe)
    ) {

        $errorMessage = '<div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Campos Incompletos</h4>
            <p>Por favor, complete todos los campos requeridos del formulario.</p>
        </div>';
    } else {

        $checkSql = "SELECT 1 FROM formacion_academica WHERE idPersona = ? AND entidad = ?";
        if ($stmt = $conn->prepare($checkSql)) {
            $stmt->bind_param("ss", $numeroDocumento, $entidad);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {

                $errorMessage = '<div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Error</h4>
                    <p>Ya existe un registro con este número de identificación y entidad.</p>
                </div>';
            } else {

                $stmt->close();

                $sql = "INSERT INTO formacion_academica (
                    tipoEducacion, titulo, mesEducacionBasica, anioEducacionBasica, 
                    modalidad, numeroSemestre, graduado, nombreEstudio, 
                    mesEducacionSuperior, anioEducacionSuperior, tarjetaProfesional, 
                    idioma, loHabla, loLee, loEscribe, idPersona
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param(
                        "ssssssssssssssss",
                        $tipoEducacion,
                        $titulo,
                        $mesEducacionBasica,
                        $anioEducacionBasica,
                        $modalidad,
                        $numeroSemestre,
                        $graduado,
                        $nombreEstudio,
                        $mesEducacionSuperior,
                        $anioEducacionSuperior,
                        $tarjetaProfesional,
                        $idioma,
                        $loHabla,
                        $loLee,
                        $loEscribe,
                        $numeroDocumento
                    );

                    if ($stmt->execute()) {
                        header("Location: Experiencia_Laboral.php?entidad=" . urlencode($entidad) .
                            "&numeroDocumento=" . urlencode($numeroDocumento));
                        exit();
                    } else {
                        $errorMessage = '<div class="alert alert-danger">
                            <h4 class="alert-heading">Error</h4>
                            <p>Error al guardar los datos: ' . $stmt->error . '</p>
                        </div>';
                    }
                    $stmt->close();
                } else {
                    $errorMessage = '<div class="alert alert-danger">
                        <h4 class="alert-heading">Error</h4>
                        <p>Error en la preparación de la consulta: ' . $conn->error . '</p>
                    </div>';
                }
            }
        } else {
            $errorMessage = '<div class="alert alert-danger">
                <h4 class="alert-heading">Error</h4>
                <p>Error en la validación de duplicados: ' . $conn->error . '</p>
            </div>';
        }
    }
}

$conn->close();

if (!empty($errorMessage)) {
    echo $errorMessage;
}
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
    <script src="JavaScrpit/javaScript2.js" defer></script>
</head>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-3">
                <img class="img-responsive" src="imagen/logo.jpeg" width="200">
            </div>
            <div class="col-sm-4">
                <p align="center">
                    FORMATO ÚNICO
                </p>
                <h1 align="center">
                    HOJA DE VIDA
                </h1>
                <p align="center">
                    Persona Natural
                </p>
                <p align="center">
                    (Leyes 190 de 1995, 489 y 443 de 1998)
                </p>
            </div>
            <div class="col-sm-3">
                <label for="comment">ENTIDAD RECEPTORA:</label>
                <input type="text" class="form-control" id="entiti" name="entidadReceptora" readonly
                    value="<?php echo htmlspecialchars($entidad); ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="bannermenu">
                <a href="index.php" class="menu">Datos Personales</a>
                <a href="Formacion_Academica.php" class="menu">Formación Académica</a>
                <a href="Experiencia_Laboral.php" class="menu">Experiencia Laboral</a>
                <a href="Tiempo_Total_De_Experiencia.php" class="menu">Tiempo Total De Experiencia</a>
                <a href="buscar.php" class="menu">Buscar Registro</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-5">
                <h3>
                    2. FORMACION ACADEMICA
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="text2">
                    <h5>
                        EDUCACIÓN BÁSICA Y MEDIA
                    </h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="text2">
                    <p>
                        MARQUE CON UNA X EL ÚLTIMO GRADO APROBADO ( LOS GRADOS DE 1° A 6° DE BACHILLERATO EQUIVALEN A
                        LOS
                        GRADOS 6° A 11° DE
                        EDUCACIÓN BÁSICA SECUNDARIA Y MEDIA )
                    </p>
                </div>
            </div>
        </div>
        <form method="POST"
            action="Formacion_Academica.php?entidad=<?php echo urlencode($entidad); ?>&numeroDocumento=<?php echo urlencode($numeroDocumento); ?>">
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="text2">
                        <h5>
                            EDUCACIÓN BÁSICA
                        </h5>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-1"></div>
                <div class="col-sm-3 text-center">
                    <h6>PRIMARIA</h6>
                    <div>
                        <label class="radio-inline">1</label>
                        <input type="radio" name="tipoEducacion" id="tipoEducacion" value="1">
                        <label class="radio-inline">2</label>
                        <input type="radio" name="tipoEducacion" id="tipoEducacion" value="2">
                        <label class="radio-inline">3</label>
                        <input type="radio" name="tipoEducacion" id="tipoEducacion" value="3">
                        <label class="radio-inline">4</label>
                        <input type="radio" name="tipoEducacion" id="tipoEducacion" value="4">
                        <label class="radio-inline">5</label>
                        <input type="radio" name="tipoEducacion" id="tipoEducacion" value="5">
                    </div>
                </div>
                <div class="col-sm-3 text-center">
                    <h6>SECUNDARIA</h6>
                    <div>
                        <label class="radio-inline">6</label>
                        <input type="radio" name="tipoEducacion" id="tipoEducacion" value="6">
                        <label class="radio-inline">7</label>
                        <input type="radio" name="tipoEducacion" id="tipoEducacion" value="7">
                        <label class="radio-inline">8</label>
                        <input type="radio" name="tipoEducacion" id="tipoEducacion" value="8">
                        <label class="radio-inline">9</label>
                        <input type="radio" name="tipoEducacion" id="tipoEducacion" value="9">
                    </div>
                </div>
                <div class="col-sm-3 text-center">
                    <h6>MEDIA</h6>
                    <div>
                        <label class="radio-inline">10</label>
                        <input type="radio" name="tipoEducacion" id="tipoEducacion" value="10">
                        <label class="radio-inline">11</label>
                        <input type="radio" name="tipoEducacion" id="tipoEducacion" value="11">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="usr">TÍTULO OBTENIDO:</label>
                        <input type="text" class="form-control" id="nombreTitulo" name="nombreTitulo">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                    <label for="mesTitulo">MES:</label>
                    <select class="form-control" id="mesTitulo" name="mesTitulo">
                        <option value="" disabled selected>Selecciona</option>
                        <option value="Enero">Enero</option>
                        <option value="Febrero">Febrero</option>
                        <option value="Marzo">Marzo</option>
                        <option value="Abril">Abril</option>
                        <option value="Mayo">Mayo</option>
                        <option value="Junio">Junio</option>
                        <option value="Julio">Julio</option>
                        <option value="Agosto">Agosto</option>
                        <option value="Septiembre">Septiembre</option>
                        <option value="Octubre">Octubre</option>
                        <option value="Noviembre">Noviembre</option>
                        <option value="Diciembre">Diciembre</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="anioTitulo">AÑO:</label>
                    <select class="form-control" id="anioTitulo" name="anioTitulo">
                        <option value="" disabled selected>Selecciona</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="text2">
                        <h5>
                            EDUCACION SUPERIOR (PREGRADO Y POSTGRADO)
                        </h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="text2">
                        <p>
                            DILIGENCIE ESTE PUNTO EN ESTRICTO ORDEN CRONOLÓGICO, EN MODALIDAD ACADÉMICA ESCRIBA:
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="text2">
                        <p>
                            <strong>TC</strong> (TÉCNICA), <strong>TL</strong> (TECNOLÓGICA), <strong>TE</strong>
                            (TECNOLÓGICA ESPECIALIZADA), <strong>UN</strong> (UNIVERSITARIA),
                            <strong>ES</strong> (ESPECIALIZACIÓN), <strong>MG</strong> (MAESTRÍA O MAGISTER),
                            <strong>DOC</strong> (DOCTORADO O PHD),
                            RELACIONE AL FRENTE EL NÚMERO DE LA TARJETA PROFESIONAL (SI ÉSTA HA SIDO PREVISTA EN UNA
                            LEY).
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="formatodate">
                        <div class="date">
                            <div class="col-xs-2">
                                <label for="modalidad" style="margin-right: 5px;">MODALIDAD ACADÉMICA</label>
                                <select class="form-control" id="modalidad" name="modalidad">
                                    <option value="" disabled selected>Selecciona</option>
                                    <option value="tecnica">TC</option>
                                    <option value="tecnologica">TL</option>
                                    <option value="tecnologica especial">TE</option>
                                    <option value="tecnologico">TL</option>
                                    <option value="tecnologico especializada">TE</option>
                                    <option value="universitario">UN</option>
                                    <option value="especializacion">ES</option>
                                    <option value="magister">MG</option>
                                    <option value="doctorado">DOC</option>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <label for="semestre" style="margin-right: 5px;">No.SEMESTRES APROBADOS</label>
                                <select class="form-control" id="semestre" name="semestre">
                                    <option value="" disabled selected>Selecciona</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <label for="graduado" style="margin-right: 5px;">GRADUADO</label>
                                <select class="form-control" id="graduado" name="graduado">
                                    <option value="" disabled selected>Selecciona</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="nombreEstudios"> NOMBRE DE LOS ESTUDIOS O TÍTULO OBTENIDO:</label>
                        <input type="text" class="form-control" id="nombreEstudios" name="nombreEstudios">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                    <label for="mesEstudio">MES:</label>
                    <select class="form-control" id="mesEstudio" name="mesEstudio">
                        <option value="" disabled selected>Selecciona</option>
                        <option value="Enero">Enero</option>
                        <option value="Febrero">Febrero</option>
                        <option value="Marzo">Marzo</option>
                        <option value="Abril">Abril</option>
                        <option value="Mayo">Mayo</option>
                        <option value="Junio">Junio</option>
                        <option value="Julio">Julio</option>
                        <option value="Agosto">Agosto</option>
                        <option value="Septiembre">Septiembre</option>
                        <option value="Octubre">Octubre</option>
                        <option value="Noviembre">Noviembre</option>
                        <option value="Diciembre">Diciembre</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="anioEstudio">AÑO:</label>
                    <select class="form-control" id="anioEstudio" name="anioEstudio">
                        <option value="" disabled selected>Selecciona</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="numeroTarjeta">No. DE TARJETA PROFESIONAL:</label>
                        <input type="text" class="form-control" id="numeroTarjeta" name="numeroTarjeta"
                            oninput="validarSoloNumeros(this)">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="text2">
                        <label for="usr"> ESPECÍFIQUE LOS IDIOMAS DIFERENTES AL ESPAÑOL QUE: HABLA, LEE, ESCRIBE DE
                            FORMA,
                            REGULAR <strong>(R)</strong>, BIEN <strong>(B)</strong> O MUY BIEN
                            <strong>(MB)</strong></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="idioma">IDIOMA</label>
                        <input type="text" class="form-control" id="idioma" name="idioma">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="formatodate">
                        <label for="fecha"
                            style="margin-right: 10px; margin-top: 10px;"><strong>TERMINACION:</strong></label>
                        <div class="date">
                            <div class="col-xs-2">
                                <label for="loHabla" style="margin-right: 5px; text-align: center;">LO HABLA:</label>
                                <select class="form-control" id="loHabla" name="loHabla">
                                    <option value="" disabled selected>Selecciona</option>
                                    <option value="REGULAR">R</option>
                                    <option value="BIEN">B</option>
                                    <option value="MUY BIEN">MB</option>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <label for="loLee" style="margin-right: 5px; text-align: center;">LO LEE:</label>
                                <select class="form-control" id="loLee" name="loLee">
                                    <option value="" disabled selected>Selecciona</option>
                                    <option value="REGULAR">R</option>
                                    <option value="BIEN">B</option>
                                    <option value="MUY BIEN">MB</option>
                                </select>
                            </div>
                            <div class="col-xs-2">
                                <label for="loEscribe" style="margin-right: 5px; text-align: center;"> LO
                                    ESCRIBE:</label>
                                <select class="form-control" id="loEscribe" name="loEscribe">
                                    <option value="" disabled selected>Selecciona</option>
                                    <option value="REGULAR">R</option>
                                    <option value="BIEN">B</option>
                                    <option value="MUY BIEN">MB</option>
                                </select>
                            </div>
                        </div>
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
        <Script>
            function validarSoloNumeros(input) {
                input.value = input.value.replace(/[^0-9]/g, '');
            }
        </Script>
    </div>
</body>

</html>