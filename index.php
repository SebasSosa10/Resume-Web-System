<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('conexion.php');

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $entidad = isset($_POST['entidad']) ? trim($_POST['entidad']) : null;
    $primerApellido = isset($_POST['primerApellido']) ? $conn->real_escape_string($_POST['primerApellido']) : null;
    $segundoApellido = isset($_POST['segundoApellido']) ? $conn->real_escape_string($_POST['segundoApellido']) : null;
    $nombre = isset($_POST['nombre']) ? $conn->real_escape_string($_POST['nombre']) : null;
    $tipoDocumento = isset($_POST['tipoDocumento']) ? $conn->real_escape_string($_POST['tipoDocumento']) : null;
    $numeroDocumento = isset($_POST['numeroDocumento']) ? trim($_POST['numeroDocumento']) : null;
    $sexo = isset($_POST['sexo']) ? $conn->real_escape_string($_POST['sexo']) : null;
    $tipoNacionalidad = isset($_POST['tipoNacionalidad']) ? $conn->real_escape_string($_POST['tipoNacionalidad']) : null;
    $paisNacionalidad = isset($_POST['paisNacionalidad']) ? $conn->real_escape_string($_POST['paisNacionalidad']) : 'Desconocido';
    $tipoLibretaMilitar = isset($_POST['tipoLibreta']) ? $conn->real_escape_string($_POST['tipoLibreta']) : null;
    $numeroLibretaMilitar = isset($_POST['numeroLibretaMilitar']) ? $conn->real_escape_string($_POST['numeroLibretaMilitar']) : null;
    $dm = isset($_POST['dm']) ? $conn->real_escape_string($_POST['dm']) : null;
    $fechaNacimiento = isset($_POST['fechaNacimiento']) ? $conn->real_escape_string($_POST['fechaNacimiento']) : null;
    $paisNacimiento = isset($_POST['paisNacimiento']) ? $conn->real_escape_string($_POST['paisNacimiento']) : null;
    $departamentoNacimiento = isset($_POST['departamentoNacimiento']) ? $conn->real_escape_string($_POST['departamentoNacimiento']) : null;
    $municipioNacimiento = isset($_POST['municipioNacimiento']) ? $conn->real_escape_string($_POST['municipioNacimiento']) : null;
    $paisCorrespondencia = isset($_POST['paisCorrespondencia']) ? $conn->real_escape_string($_POST['paisCorrespondencia']) : null;
    $departamentoCorrespondencia = isset($_POST['departamentoCorrespondencia']) ? $conn->real_escape_string($_POST['departamentoCorrespondencia']) : null;
    $municipioCorrespondencia = isset($_POST['municipioCorrespondencia']) ? $conn->real_escape_string($_POST['municipioCorrespondencia']) : null;
    $telefono = isset($_POST['telefono']) ? $conn->real_escape_string($_POST['telefono']) : null;
    $email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : null;

    if (
        empty($primerApellido) || empty($segundoApellido) || empty($nombre) || empty($tipoDocumento) || empty($sexo)
        || empty($tipoNacionalidad) || empty($paisNacionalidad) || empty($tipoLibretaMilitar) || empty($numeroLibretaMilitar)
        || empty($dm) || empty($fechaNacimiento) || empty($paisNacimiento) || empty($departamentoNacimiento) || empty($municipioNacimiento)
        || empty($paisCorrespondencia) || empty($departamentoCorrespondencia) || empty($municipioCorrespondencia) || empty($telefono) || empty($email)
    ) {
        echo '<div class="alert alert-warning" role="alert">';
        echo 'Por favor, complete todos los campos requeridos.';
        echo '</div>';
    } else if (empty($numeroDocumento)) {
        echo '<div class="alert alert-warning" role="alert">';
        echo 'Ingrese el número de documento.';
        echo '</div>';
    } else if (empty($entidad)) {
        echo '<div class="alert alert-warning" role="alert">';
        echo 'Ingrese la entidad a la que va dirigida.';
        echo '</div>';
    } else {

        $sqlCheckDocumento = "SELECT * FROM persona WHERE numeroDocumento = '$numeroDocumento'";
        $resultDocumento = $conn->query($sqlCheckDocumento);

        $sqlCheckEntidad = "SELECT * FROM persona WHERE entidad = '$entidad'";
        $resultEntidad = $conn->query($sqlCheckEntidad);

        if ($resultDocumento->num_rows > 0) {
            echo '<div class="alert alert-danger" role="alert">';
            echo 'Ya existe un registro con este número de documento.';
            echo '</div>';
        } else if ($resultEntidad->num_rows > 0) {
            echo '<div class="alert alert-danger" role="alert">';
            echo 'Ya existe un registro con esta entidad.';
            echo '</div>';
        } else {
            $sql = "INSERT INTO persona 
                    (entidad, primerApellido, segundoApellido, nombre, tipoDocumento, numeroDocumento, sexo, 
                    tipoNacionalidad, paisNacionalidad, tipoLibretaMilitar, numeroLibretaMilitar, dm, fechaNacimiento, 
                    paisNacimiento, departamentoNacimiento, municipioNacimiento, paisCorrespondencia, departamentoCorrespondencia, 
                    municipioCorrespondencia, telefono, email)
                    VALUES 
                    ('$entidad', '$primerApellido', '$segundoApellido', '$nombre', '$tipoDocumento', '$numeroDocumento', 
                    '$sexo', '$tipoNacionalidad', '$paisNacionalidad', '$tipoLibretaMilitar', '$numeroLibretaMilitar', 
                    '$dm', '$fechaNacimiento', '$paisNacimiento', '$departamentoNacimiento', '$municipioNacimiento', 
                    '$paisCorrespondencia', '$departamentoCorrespondencia', '$municipioCorrespondencia', 
                    '$telefono', '$email')";

            if ($conn->query($sql) === TRUE) {
                header("Location: Formacion_Academica.php?entidad=" . urlencode($entidad) . "&numeroDocumento=" . urlencode($numeroDocumento));
                exit;
            } else {
                echo '<div class="alert alert-danger" role="alert">';
                echo 'Error al guardar los datos: ' . $conn->error;
                echo '</div>';
            }
        }
    }
    $conn->close();
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
    <script src="JavaScrpit/javaScript.js" defer></script>
</head>

<body>
    <div class="container">
        <form method="post" action="index.php">
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
                    <label for="entidad">ENTIDAD RECEPTORA:</label>
                    <input type="text" class="form-control" id="entidad" name="entidad">
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
                        1. DATOS PERSONALES
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="primerApellido">PRIMER APELLIDO:</label>
                        <input type="text" class="form-control" id="primerApellido" name="primerApellido">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="segundoApellido">SEGUNDO APELLIDO:</label>
                        <input type="text" class="form-control" id="segundoApellido" name="segundoApellido">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="nombre">NOMBRES:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-radio">
                        <label for="tipoDocumento" style="margin-right: 10px;"><strong>DOCUMENTO DE
                                IDENTIFICACIÓN:</strong></label>
                        <div class="radio-numero">
                            <input class="form-check-input" type="radio" name="tipoDocumento" id="C.C" value="C.C"
                                checked>
                            <label class="form-check-label" for="C.C">C.C</label>
                            <input class="form-check-input" type="radio" name="tipoDocumento" id="C.E" value="C.E">
                            <label class="form-check-label" for="C.E">C.E</label>
                            <input class="form-check-input" type="radio" name="tipoDocumento" id="pass" value="pass">
                            <label class="form-check-label" for="pass">PASS</label>
                        </div>
                        <div class="form-textnumero">
                            <label for="numeroDocumento" style="margin-right: 10px;">N°</label>
                            <input type="text" class="form-control" id="numeroDocumento" name="numeroDocumento"
                                style="width: 300px;" maxlength="16">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                    <div class="form">
                        <label for="sexo" style="margin-right: 10px;"><strong>GENERO:</strong></label>
                        <input class="form-check-input" type="radio" name="sexo" id="Masculino" value="Masculino"
                            checked>
                        <label class="form-check-label" for="m">MASCULINO</label>
                        <input class="form-check-input" type="radio" name="sexo" id="Femenino" value="Femenino">
                        <label class="form-check-label" for="f">FEMENINO</label>
                        <input class="form-check-input" type="radio" name="sexo" id="Binario" value="Binario">
                        <label class="form-check-label" for="binario">OTRO</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                    <div class="form">
                        <label for="nacionalidad" style="margin-right: 10px;"><strong>NACIONALIDAD:</strong></label>
                        <div class="radio">
                            <input class="form-check-input" type="radio" name="tipoNacionalidad" id="Colombia"
                                value="Colombia" checked>
                            <label class="form-check-label" for="col">COL.</label>
                            <input class="form-check-input" type="radio" name="tipoNacionalidad" id="extranjero"
                                value="extranjero">
                            <label class="form-check-label" for="extranjero">EXTRANJERO</label>
                        </div>
                        <div class="form-textnumero">
                            <label for="paisNacionalidad" style="margin-right: 10px;">PAÍS:</label>
                            <select id="paisNacionalidad" class="form-control" disabled>
                                <option disabled selected>Seleccione</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form">
                        <label for="tipoLibreta" style="margin-right: 10px;"><strong>LIBRETA MILITAR:</strong></label>
                        <div class="radio">
                            <input class="form-check-input" type="radio" name="tipoLibreta" id="primera Clase"
                                value="primera Clase" checked>
                            <label class="form-check-label" for="primeraClase">PRIMERA CLASE</label>
                            <input class="form-check-input" type="radio" name="tipoLibreta" id="segunda Clase"
                                value="segunda Clase">
                            <label class="form-check-label" for="segundaClase">SEGUNDA CLASE</label>
                        </div>
                        <div class="form-textnumero">
                            <label for="numeroLibretaMilitar" style="margin-right: 10px;">N°</label>
                            <input type="text" class="form-control" id="numeroLibretaMilitar"
                                name="numeroLibretaMilitar" style="width: 300px;" oninput="validarSoloNumeros(this)">
                        </div>
                        <div class="form-textnumero"></div>
                        <label for="dm" style="margin-right: 10px;">D.M</label>
                        <input type="text" class="form-control" id="dm" name="dm" style="width: 300px;">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="fechaNacimiento"><strong>FECHA DE NACIMIENTO:</strong></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                    <div class="form-group mt-3">
                        <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="usr"><strong>LUGAR DE NACIMIENTO:</strong></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                    <div class="for m-group">
                        <label for="paisNacimiento" style="margin-right: 10px;">PAÍS:</label>
                        <select id="paisNacimiento" class="form-control" name="paisNacimiento">
                            <option disabled selected>Seleccione</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="departamentoNacimiento" style="margin-right: 10px;">DEPARTAMENTO:</label>
                        <select class="form-control" id="departamentoNacimiento" name="departamentoNacimiento">
                            <option value="" disabled selected>Selecciona</option>
                            <option value="antioquia">Antioquia</option>
                            <option value="atlántico">Atlántico</option>
                            <option value="bolívar">Bolívar</option>
                            <option value="caldas">Caldas</option>
                            <option value="cauca">Cauca</option>
                            <option value="cesar">Cesar</option>
                            <option value="córdoba">Córdoba</option>
                            <option value="huila">Huila</option>
                            <option value="tolima">Tolima</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="municipioNacimiento" style="margin-right: 10px;">MUNICIPIO:</label>
                        <select class="form-control" id="municipioNacimiento" name="municipioNacimiento">
                            <option value="" disabled selected>Selecciona</option>
                            <option value="salento">Salento</option>
                            <option value="filandia">Filandia</option>
                            <option value="quimbaya">Quimbaya</option>
                            <option value="circasia">Circasia</option>
                            <option value="montenegro">Montenegro</option>
                            <option value="buenavista">Buenavista</option>
                            <option value="cordoba">Cordoba</option>
                            <option value="pijao">Pijao</option>
                            <option value="genova">Genova</option>
                            <option value="tebaida">La Tebaida</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="usr"><strong>DIRECCIÓN DE CORRESPONDENCIA:</strong></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="paisCorrespondencia" style="margin-right: 10px;">PAÍS:</label>
                        <select id="paisCorrespondencia" class="form-control" name="paisCorrespondencia">
                            <option disabled selected>Seleccione</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="departamentoCorrespondencia" style="margin-right: 10px;">DEPARTAMENTO:</label>
                        <select class="form-control" id="departamentoCorrespondencia"
                            name="departamentoCorrespondencia">
                            <option value="" disabled selected>Selecciona</option>
                            <option value="antioquia">Antioquia</option>
                            <option value="atlántico">Atlántico</option>
                            <option value="bolívar">Bolívar</option>
                            <option value="caldas">Caldas</option>
                            <option value="cauca">Cauca</option>
                            <option value="cesar">Cesar</option>
                            <option value="córdoba">Córdoba</option>
                            <option value="huila">Huila</option>
                            <option value="tolima">Tolima</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="municipioCorrespondencia" style="margin-right: 10px;">MUNICIPIO:</label>
                        <select class="form-control" id="municipioCorrespondencia" name="municipioCorrespondencia">
                            <option value="" disabled selected>Selecciona</option>
                            <option value="salento">Salento</option>
                            <option value="filandia">Filandia</option>
                            <option value="quimbaya">Quimbaya</option>
                            <option value="circasia">Circasia</option>
                            <option value="montenegro">Montenegro</option>
                            <option value="buenavista">Buenavista</option>
                            <option value="cordoba">Cordoba</option>
                            <option value="pijao">Pijao</option>
                            <option value="genova">Genova</option>
                            <option value="tebaida">La Tebaida</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="telefono">TELÉFONO:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono"
                            oninput="validarSoloNumeros(this)">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="email">EMAIL:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary">Siguiente</button>
                </div>
            </div>
        </form>
        <Script>
            const hoy = new Date();
            const fechaMaxima = new Date(hoy.getFullYear() - 18, hoy.getMonth(), hoy.getDate()).toISOString().split("T")[0];
            const fechaMinima = new Date(hoy.getFullYear() - 100, hoy.getMonth(), hoy.getDate()).toISOString().split("T")[0];
            const inputFecha = document.getElementById("fechaNacimiento");
            inputFecha.setAttribute("max", fechaMaxima);
            inputFecha.setAttribute("min", fechaMinima);

            function validarSoloNumeros(input) {
                input.value = input.value.replace(/[^0-9]/g, '');
            }
        </Script>
    </div>
</body>


</html>