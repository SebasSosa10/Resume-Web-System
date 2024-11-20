<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/Stile.css">
</head>

<body>
    <div class="container">
        <form method="post" action="Buscar.php">
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-3">
                    <img class="img-responsive" src="imagen/logo.jpeg" width="200">
                </div>
                <div class="col-sm-4">
                    <p align="center">
                        FORMATO UNICO
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
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="bannermenu">
                    <a href="index.php" class="menu">Datos Personales</a>
                    <a href="Formacion_Academica.php" class="menu">Formacion Academica</a>
                    <a href="Experiencia_Laboral.php" class="menu">Experiencia Laboral</a>
                    <a href="Tiempo_Total_De_Experiencia.php" class="menu">Tiempo Total De Experiencia</a>
                    <a href="Buscar.php" class="menu">Buscar Registro Existente</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="text">
                        <h5>
                            INGRESE EL NUMERO DE CEDULA PARA VER SI TIENE UN REGISTRO EXISTENTE
                        </h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-radio">
                        <label for="tipoDocumento" style="margin-right: 10px;"><strong> DOCUMENTO DE
                                IDENTIFICACIÓN:</strong></label>
                        <div class="form-textnumero">
                            <label for="numeroDocumento" style="margin-right: 10px;">N°</label>
                            <input type="text" class="form-control" id="numeroDocumento" name="numeroDocumento"
                                style="width: 300px;" oninput="validarSoloNumeros(this)">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 offset-sm-3 text-center">
                    <button id="calcularBtn" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>
        <?php
        include('conexion.php');

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numeroDocumento = isset($_POST['numeroDocumento']) ? trim($_POST['numeroDocumento']) : null;

            if (empty($numeroDocumento)) {
                echo '<div class="alert alert-warning" role="alert">';
                echo 'Por favor ingrese un número de documento.';
                echo '</div>';
            } else {
                // Consulta de persona
                $stmt_persona = $conn->prepare("SELECT * FROM persona WHERE numeroDocumento = ?");
                $stmt_persona->bind_param("s", $numeroDocumento);
                $stmt_persona->execute();
                $resultado_persona = $stmt_persona->get_result();

                // Consulta de formación académica
                $stmt_formacion = $conn->prepare("SELECT * FROM formacion_academica WHERE idPersona = ?");
                $stmt_formacion->bind_param("s", $numeroDocumento);
                $stmt_formacion->execute();
                $resultado_formacion = $stmt_formacion->get_result();

                // Consulta de experiencia laboral
                $stmt_experiencia = $conn->prepare("SELECT * FROM experiencia_laboral WHERE idPersona = ?");
                $stmt_experiencia->bind_param("s", $numeroDocumento);
                $stmt_experiencia->execute();
                $resultado_experiencia = $stmt_experiencia->get_result();

                // Consulta de tiempo total de experiencia
                $stmt_tiempo = $conn->prepare("SELECT * FROM tiempo_total_de_experiencia WHERE idPersona = ?");
                $stmt_tiempo->bind_param("s", $numeroDocumento);
                $stmt_tiempo->execute();
                $resultado_tiempo = $stmt_tiempo->get_result();

                $informacionEncontrada = false;

                if ($resultado_persona->num_rows > 0) {
                    $informacionEncontrada = true;
                    echo '<div class="row mt-4">';
                    echo '    <div class="col-sm-1"></div>';
                    echo '    <div class="col-sm-11">';
                    echo '        <div class="card">';
                    echo '            <div class="card-header">';
                    echo '                <h4>Datos Personal</h4>';
                    echo '            </div>';
                    while ($persona = $resultado_persona->fetch_assoc()) {
                        echo '            <div class="card-body">';
                        echo '                <p><strong>Nombre:</strong> ' . htmlspecialchars($persona['nombre']) . '</p>';
                        echo '                <p><strong>Primer Apellido:</strong> ' . htmlspecialchars($persona['primerApellido']) . '</p>';
                        echo '                <p><strong>Segundo Apellido:</strong> ' . htmlspecialchars($persona['segundoApellido']) . '</p>';
                        echo '                <p>';
                        echo '                    <strong>Tipo de documento:</strong> ' . htmlspecialchars($persona['tipoDocumento']) . ' ';
                        echo '                    <strong>Nº:</strong> ' . htmlspecialchars($persona['numeroDocumento']);
                        echo '                </p>';
                        echo '                <p><strong>Genero:</strong> ' . htmlspecialchars($persona['sexo']) . '</p>';
                        echo '                <p>';
                        echo '                    <strong>Tipo de Nacionalidad:</strong> ' . htmlspecialchars($persona['tipoNacionalidad']) . ' ';
                        echo '                    <strong>Pais:</strong> ' . htmlspecialchars($persona['paisNacionalidad']);
                        echo '                </p>';
                        echo '                <p>';
                        echo '                    <strong>Tipo de Libreta Militar:</strong> ' . htmlspecialchars($persona['tipoLibretaMilitar']) . ' ';
                        echo '                    <strong>Nº:</strong> ' . htmlspecialchars($persona['numeroLibretaMilitar']);
                        echo '                    <strong>DM:</strong> ' . htmlspecialchars($persona['dm']);
                        echo '                </p>';
                        echo '                <p><strong>Fecha de Nacimiento:</strong> ' . htmlspecialchars($persona['fechaNacimiento']) . '</p>';
                        echo '                <h4>Lugar de Nacimiento</h4>';
                        echo '                <p><strong>Pais:</strong> ' . htmlspecialchars($persona['paisNacimiento']) . '</p>';
                        echo '                <p><strong>Departamento:</strong> ' . htmlspecialchars($persona['departamentoNacimiento']) . '</p>';
                        echo '                <p><strong>Municipio:</strong> ' . htmlspecialchars($persona['municipioNacimiento']) . '</p>';
                        echo '                <h4>Direccion de Correspondencia</h4>';
                        echo '                <p><strong>Pais:</strong> ' . htmlspecialchars($persona['paisCorrespondencia']) . '</p>';
                        echo '                <p><strong>Departamento:</strong> ' . htmlspecialchars($persona['departamentoCorrespondencia']) . '</p>';
                        echo '                <p><strong>Municipio:</strong> ' . htmlspecialchars($persona['municipioCorrespondencia']) . '</p>';
                        echo '                <p><strong>Telefono:</strong> ' . htmlspecialchars($persona['telefono']) . '</p>';
                        echo '                <p><strong>Email:</strong> ' . htmlspecialchars($persona['email']) . '</p>';
                        echo '            </div>';
                    }
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }

                if ($resultado_formacion->num_rows > 0) {
                    $informacionEncontrada = true;
                    echo '<div class="row mt-4">';
                    echo '    <div class="col-sm-1"></div>';
                    echo '    <div class="col-sm-11">';
                    echo '        <div class="card">';
                    echo '            <div class="card-header">';
                    echo '                <h4>Formación Académica</h4>';
                    echo '            </div>';
                    while ($formacion = $resultado_formacion->fetch_assoc()) {
                        echo '            <div class="card-body">';
                        echo '              <p><strong>Título:</strong> ' . htmlspecialchars($formacion['titulo']) . '</p>';
                        echo '                <p><strong>Tipo de educacion Basica:</strong> ' . htmlspecialchars($formacion['tipoEducacion']) . '</p>';
                        echo '                <p><strong>Nombre de titulo:</strong> ' . htmlspecialchars($formacion['titulo']) . '</p>';
                        echo '                <p>';
                        echo '                    <strong>Mes:</strong> ' . htmlspecialchars($formacion['mesEducacionBasica']) . ' ';
                        echo '                    <strong>Año:</strong> ' . htmlspecialchars($formacion['anioEducacionBasica']);
                        echo '                </p>';
                        echo '                <h4>Edecación superior</h4>';
                        echo '                <p><strong>Modalidad Academica:</strong> ' . htmlspecialchars($formacion['modalidad']) . '</p>';
                        echo '                <p>';
                        echo '                    <strong>Nº semestre:</strong> ' . htmlspecialchars($formacion['numeroSemestre']) . ' ';
                        echo '                    <strong>Esta Gaduado:</strong> ' . htmlspecialchars($formacion['graduado']);
                        echo '                </p>';
                        echo '                <p><strong>Nombre de los Titulos Obtenidos:</strong> ' . htmlspecialchars($formacion['nombreEstudio']) . '</p>';
                        echo '                <p>';
                        echo '                    <strong>Mes:</strong> ' . htmlspecialchars($formacion['mesEducacionSuperior']) . ' ';
                        echo '                    <strong>Año:</strong> ' . htmlspecialchars($formacion['anioEducacionSuperior']);
                        echo '                </p>';
                        echo '                <p><strong>Nº de tarjeta profesional:</strong> ' . htmlspecialchars($formacion['tarjetaProfesional']) . '</p>';
                        echo '                <p><strong>idioma:</strong> ' . htmlspecialchars($formacion['idioma']) . '</p>';
                        echo '                <p>';
                        echo '                    <strong>Lo Habla:</strong> ' . htmlspecialchars($formacion['loHabla']) . ' ';
                        echo '                    <strong>Lo Lee:</strong> ' . htmlspecialchars($formacion['loLee']);
                        echo '                    <strong>Lo Escribe:</strong> ' . htmlspecialchars($formacion['loEscribe']);
                        echo '                </p>';
                        echo '            </div>';
                    }
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }

                if ($resultado_experiencia->num_rows > 0) {
                    $informacionEncontrada = true;
                    echo '<div class="row mt-4">';
                    echo '    <div class="col-sm-1"></div>';
                    echo '    <div class="col-sm-11">';
                    echo '        <div class="card">';
                    echo '            <div class="card-header">';
                    echo '                <h4>Experiencia Laboral</h4>';
                    echo '            </div>';
                    while ($experiencia = $resultado_experiencia->fetch_assoc()) {
                        echo '            <div class="card-body">';
                        echo '                <p><strong>Empresa:</strong> ' . htmlspecialchars($experiencia['empresa']) . '</p>';
                        echo '                <p><strong>Tipo de Empresa:</strong> ' . htmlspecialchars($experiencia['tipo']) . '</p>';
                        echo '                <p><strong>Pais:</strong> ' . htmlspecialchars($experiencia['pais']) . '</p>';
                        echo '                <p><strong>Departamento:</strong> ' . htmlspecialchars($experiencia['departamento']) . '</p>';
                        echo '                <p><strong>Municipio:</strong> ' . htmlspecialchars($experiencia['ciudad']) . '</p>';
                        echo '                <p><strong>Correo:</strong> ' . htmlspecialchars($experiencia['correo']) . '</p>';
                        echo '                <p><strong>Teléfono:</strong> ' . htmlspecialchars($experiencia['telefono']) . '</p>';
                        echo '                <p><strong>Fecha de ingreso:</strong> ' . htmlspecialchars($experiencia['fechaIngreso']) . '</p>';
                        echo '                <p><strong>Fecha de retiro:</strong> ' . htmlspecialchars($experiencia['fechaRetiro']) . '</p>';
                        echo '                <p><strong>Cargo:</strong> ' . htmlspecialchars($experiencia['cargo']) . '</p>';
                        echo '                <p><strong>Dependecia:</strong> ' . htmlspecialchars($experiencia['dependencia']) . '</p>';
                        echo '                <p><strong>Dirección:</strong> ' . htmlspecialchars($experiencia['direccion']) . '</p>';
                        echo '            </div>';
                        }
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }

                if ($resultado_tiempo->num_rows > 0) {
                    $informacionEncontrada = true;
                    echo '<div class="row mt-4">';
                    echo '    <div class="col-sm-1"></div>';
                    echo '    <div class="col-sm-11">';
                    echo '        <div class="card">';
                    echo '            <div class="card-header">';
                    echo '                <h4>Tiempo de Experiencia</h4>';
                    echo '            </div>';
                    while ($tiempo = $resultado_tiempo->fetch_assoc()) {
                        echo '            <div class="card-body">';
                        echo '                <h5>Servidor público</h5>';
                        echo '                <p>';
                        echo '                    <strong>Año:</strong> ' . htmlspecialchars($tiempo['anioServidorPublico']) . ' ';
                        echo '                    <strong>Mes:</strong> ' . htmlspecialchars($tiempo['mesServidorPublico' ]);
                        echo '                </p>';
                        echo '                <h5>Empleado del sector privado</h5>';
                        echo '                <p>';
                        echo '                    <strong>Año:</strong> ' . htmlspecialchars($tiempo['anioEmpleadoPrivado']) . ' ';
                        echo '                    <strong>Mes:</strong> ' . htmlspecialchars($tiempo['mesEmpleadoPrivado']);
                        echo '                </p>';
                        echo '                <h5>Trabajador independiente</h5>';
                        echo '                <p>';
                        echo '                    <strong>Año:</strong> ' . htmlspecialchars($tiempo['anioIndependiente']) . ' ';
                        echo '                    <strong>Mes:</strong> ' . htmlspecialchars($tiempo['mesIndependiente']);
                        echo '                </p>';
                        echo '                <h5>Total tiempo experiencia</h5>';
                        echo '                <p>';
                        echo '                    <strong>Año:</strong> ' . htmlspecialchars($tiempo['total_anios']) . ' ';
                        echo '                    <strong>Mes:</strong> ' . htmlspecialchars($tiempo['total_meses']);
                        echo '                </p>';        
                        echo '            </div>';
                    }
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }

                if (!$informacionEncontrada) {
                    echo '<div class="alert alert-warning" role="alert">';
                    echo 'No se encontró información para el número de documento proporcionado.';
                    echo '</div>';
                }
            }
            $conn->close();
        }
        ?>

        <Script>
            function validarSoloNumeros(input) {
                input.value = input.value.replace(/[^0-9]/g, '');
            }
        </Script>
    </div>
</body>

</html>