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
        <form method="post" action="Formacion_Academica.php">
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-3">
                    <img class="img-responsive" src="imagen/logo.jpeg" width="200">
                </div>
                <div class="col-sm-4">
                    <p align="center">
                        FORMATO UNICO
                        hola
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
                    <a href="Formacion_Academica.php" class="menu">Formacion Academica</a>
                    <a href="Experiencia_Laboral.php" class="menu">Experiencia Laboral</a>
                    <a href="Tiempo_Total_De_Experiencia.php" class="menu">Tiempo Total De Experiencia</a>
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
                    <form>
                        <div class="form-radio">
                            <label for="tipoDocumento" style="margin-right: 10px;"><strong>DOCUMENTO DE
                                    IDENTIFICACIÓN:</strong></label>
                            <div class="radio-numero">
                                <select class="form-control" id="tipoDocumento" name="tipoDocumento">
                                    <option disabled selected>Seleccione</option>
                                    <option value="CC">C.C</option>
                                    <option value="CE">C.E</option>
                                    <option value="PASS">Pass</option>
                                </select>
                            </div>
                            <div class="form-textnumero">
                                <label for="numeroDocumento" style="margin-right: 10px;">N°</label>
                                <input type="text" class="form-control" id="numeroDocumento" name="numeroDocumento"
                                    style="width: 300px;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                    <div class="form">
                        <label for="sexo" style="margin-right: 10px;"><strong>SEXO:</strong></label>
                        <select class="form-control" id="sexo" name="sexo">
                            <option disabled selected>Seleccione</option>
                            <option value="F">F</option>
                            <option value="M">M</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                    <div class="form">
                        <label for="paisNacionalidad" style="margin-right: 10px;"><strong>NACIONALIDAD:</strong></label>
                        <div class="form-textnumero">
                            <select id="paisNacionalidad" class="form-control" name="paisNacionalidad">
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
                            <select class="form-control" id="tipoLibreta" name="tipoLibreta">
                                <option disabled selected>Seleccione</option>
                                <option value="primeraClase">PRIMERA CLASE</option>
                                <option value="segundaClase">SEGUNDA CLASE</option>
                            </select>
                        </div>
                        <div class="form-textnumero">
                            <label for="numeroLibretaMilitar" style="margin-right: 10px;">N°</label>
                            <input type="text" class="form-control" id="numeroLibretaMilitar"
                                name="numeroLibretaMilitar" style="width: 300px;">
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
                            <option value="1">Antioquia</option>
                            <option value="2">Atlántico</option>
                            <option value="3">Bolívar</option>
                            <option value="4">Caldas</option>
                            <option value="5">Cauca</option>
                            <option value="6">Cesar</option>
                            <option value="7">Córdoba</option>
                            <option value="8">Huila</option>
                            <option value="9">Tolima</option>
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
                            <option value="1">Salento</option>
                            <option value="2">Filandia</option>
                            <option value="3">Quimbaya</option>
                            <option value="1">Circasia</option>
                            <option value="2">Montenegro</option>
                            <option value="3">Buenavista</option>
                            <option value="1">Cordoba</option>
                            <option value="2">Pijao</option>
                            <option value="3">Genova</option>
                            <option value="1">La Tebaida</option>
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
                    <div class="for m-group">
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
                            <option value="1">Antioquia</option>
                            <option value="2">Atlántico</option>
                            <option value="3">Bolívar</option>
                            <option value="4">Caldas</option>
                            <option value="5">Cauca</option>
                            <option value="6">Cesar</option>
                            <option value="7">Córdoba</option>
                            <option value="8">Huila</option>
                            <option value="9">Tolima</option>
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
                            <option value="1">Salento</option>
                            <option value="2">Filandia</option>
                            <option value="3">Quimbaya</option>
                            <option value="1">Circasia</option>
                            <option value="2">Montenegro</option>
                            <option value="3">Buenavista</option>
                            <option value="1">Cordoba</option>
                            <option value="2">Pijao</option>
                            <option value="3">Genova</option>
                            <option value="1">La Tebaida</option>
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
                        <input type="text" class="form-control" id="telefono" name="telefono">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="email">EMAIL:</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary">Siguiente</button>
                </div>
            </div>
        </form>
        <?php
        include('conexion.php');
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $entidad = $conn->real_escape_string($_POST['entidad']);
            $primerApellido = $conn->real_escape_string($_POST['primerApellido']);
            $segundoApellido = $conn->real_escape_string($_POST['segundoApellido']);
            $nombre = $conn->real_escape_string($_POST['nombre']);
            $tipoDocumento = $conn->real_escape_string($_POST['tipoDocumento']);
            $numeroDocumento = $conn->real_escape_string($_POST['numeroDocumento']);
            $sexo = $conn->real_escape_string($_POST['sexo']);
            $paisNacionalidad = $conn->real_escape_string($_POST['paisNacionalidad']);
            $tipoLibretaMilitar = $conn->real_escape_string($_POST['tipoLibreta']);
            $numeroLibretaMilitar = $conn->real_escape_string($_POST['numeroLibretaMilitar']);
            $dm = $conn->real_escape_string($_POST['dm']);
            $fechaNacimiento = $conn->real_escape_string($_POST['fechaNacimiento']);
            $paisNacimiento = $conn->real_escape_string($_POST['paisNacimiento']);
            $departamentoNacimiento = $conn->real_escape_string($_POST['departamentoNacimiento']);
            $municipioNacimiento = $conn->real_escape_string($_POST['municipioNacimiento']);
            $paisCorrespondencia = $conn->real_escape_string($_POST['paisCorrespondencia']);
            $departamentoCorrespondencia = $conn->real_escape_string($_POST['departamentoCorrespondencia']);
            $municipioCorrespondencia = $conn->real_escape_string($_POST['municipioCorrespondencia']);
            $telefono = $conn->real_escape_string($_POST['telefono']);
            $email = $conn->real_escape_string($_POST['email']);
            $sql = "INSERT INTO persona (
        entidad, primerApellido, segundoApellido, nombre, tipoDocumento, 
        numeroDocumento, sexo, paisNacionalidad, tipoLibretaMilitar, 
        numeroLibretaMilitar, dm, fechaNacimiento, paisNacimiento, 
        departamentoNacimiento, municipioNacimiento, paisCorrespondencia, 
        departamentoCorrespondencia, municipioCorrespondencia, telefono, email
    ) VALUES (
        '$entidad', '$primerApellido', '$segundoApellido', '$nombre', '$tipoDocumento', 
        '$numeroDocumento', '$sexo', '$paisNacionalidad', '$tipoLibretaMilitar', 
        '$numeroLibretaMilitar', '$dm', '$fechaNacimiento', '$paisNacimiento', 
        '$departamentoNacimiento', '$municipioNacimiento', '$paisCorrespondencia', 
        '$departamentoCorrespondencia', '$municipioCorrespondencia', '$telefono', '$email'
    )";
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