<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hoja de vida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/Stile.css">
    <script src="JavaScrpit/javaScript3.js" defer></script>
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
                <label for="comment">ENTIDAD RECEPTORA:</label>
                <input type="text" class="form-control" id="entiti">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="bannermenu">
                <a href="Formacion_Academica.php" class="menu">Formacion Academica</a>
                <a href="index.php" class="menu">Datos Personales</a>
                <a href="Tiempo_Total_De_Experiencia.php" class="menu">Tiempo Total De Experiencia</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-5">
                <h3>
                    3. EXPERIENCIA LABORAL
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="text">
                    <p>
                        RELACIONE SU EXPERIENCIA LABORAL O DE PRESTACIÓN DE SERVICIOS EN ESTRICTO ORDEN CRONOLÓGICO
                        COMENZANDO POR EL ACTUAL.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="text">
                    <h5>
                        EMPLEO ACTUAL O CONTRATO VIGENTE
                    </h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="form-group">
                    <label for="usr">EMPRESA O ENTIDAD:</label>
                    <input type="text" class="form-control" id="SegunApellido">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="form-radio">
                    <div class="radio-numero">
                        <label class="radio-inline"><input type="radio" name="optradio" checked>PÚBLICA</label>
                        <label class="radio-inline"><input type="radio" name="optradio">PRIVADA</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-11">
                <div class="for m-group">
                    <label for="paisExperiencia" style="margin-right: 10px;">PAÍS:</label>
                    <select id="paisExperiencia" class="form-control">
                    <option disabled selected>Seleccione</option>
                    </select>
                </div>
            </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="form-group">
                    <label for="usr">DEPARTAMENTO:</label>
                    <select class="form-control" id="PAIS">
                        <option value="" disabled selected>Selecciona</option>
                        <option value="1">Antioquia</option>
                        <option value="2">Buenos Aires</option>
                        <option value="3">Lima</option>
                        <option value="4">Sao Paulo</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="form-group">
                    <label for="usr">CAPITAL:</label>
                    <select class="form-control" id="PAIS">
                        <option value="" disabled selected>Selecciona</option>
                        <option value="1">Medellín</option>
                        <option value="2">La Plata</option>
                        <option value="3">Miraflores</option>
                        <option value="4">Campinas</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="form-group">
                    <label for="usr">CORREO ELECTRÓNICO ENTIDAD:</label>
                    <input type="text" class="form-control" id="SegunApellido">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="form-group">
                    <label for="usr">TELÉFONOS:</label>
                    <input type="text" class="form-control" id="SegunApellido">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-11">
                <div class="formatodate">
                <h6>FECHA DE INGRESO:</h6>
                    <div class="date">
                        <div class="col-xs-4">
                            <label for="anio">AÑO:</label>
                            <select id="anio" name="anio" class="form-control">
                            <option value="" disabled selected>Seleccione</option>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <label for="mes">MES:</label>
                            <select id="mes" name="mes" class="form-control">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                            </select>
                        </div>
                        <div class="col-xs-2">
                        <label for="dia">DIA:</label>
                        <select id="dia" name="dia" class="form-control">
                            <option value="" disabled selected>Seleccione</option>
                        </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-11">
        <div class="formatodate">
            <h6>FECHA DE RETIRO:</h6>
            <div class="date">
                <div class="form-group col-xs-4">
                    <label for="anio2">AÑO:</label>
                    <select id="anio2" name="anio2" class="form-control">
                        <option value="" disabled selected>Seleccione</option>
                    </select>
                </div>
                <div class="form-group col-xs-4">
                    <label for="mes2">MES:</label>
                    <select id="mes2" name="mes2" class="form-control">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </div>
                <div class="form-group col-xs-4">
                    <label for="dia2">DIA:</label>
                    <select id="dia2" name="dia2" class="form-control">
                        <option value="" disabled selected>Seleccione</option>
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
                    <label for="usr">CARGO O CONTRATO ACTUAL:</label>
                    <input type="text" class="form-control" id="SegunApellido">
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="usr"> DEPENDENCIA:</label>
                        <input type="text" class="form-control" id="SegunApellido">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="usr"> DIRECCIÓN:</label>
                        <input type="text" class="form-control" id="SegunApellido">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="text">
                    <h5>
                        EMPLEO O CONTRATO ANTERIOR
                    </h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="form-group">
                    <label for="usr">EMPRESA O ENTIDAD:</label>
                    <input type="text" class="form-control" id="SegunApellido">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="form-radio">
                    <div class="radio-numero">
                        <label class="radio-inline"><input type="radio" name="optradio2" checked>PÚBLICA</label>
                        <label class="radio-inline"><input type="radio" name="optradio2">PRIVADA</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-11">
                <div class="for m-group">
                    <label for="paisExperienciaFin" style="margin-right: 10px;">PAÍS:</label>
                    <select id="paisExperienciaFin" class="form-control">
                    <option disabled selected>Seleccione</option>
                    </select>
                </div>
            </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="form-group">
                    <label for="usr">DEPARTAMENTO:</label>
                    <select class="form-control" id="PAIS">
                        <option value="" disabled selected>Selecciona</option>
                        <option value="1">Antioquia</option>
                        <option value="2">Buenos Aires</option>
                        <option value="3">Lima</option>
                        <option value="4">Sao Paulo</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="form-group">
                    <label for="usr">CAPITAL:</label>
                    <select class="form-control" id="PAIS">
                        <option value="" disabled selected>Selecciona</option>
                        <option value="1">Medellín</option>
                        <option value="2">La Plata</option>
                        <option value="3">Miraflores</option>
                        <option value="4">Campinas</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="form-group">
                    <label for="usr">CORREO ELECTRÓNICO ENTIDAD:</label>
                    <input type="text" class="form-control" id="SegunApellido">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="form-group">
                    <label for="usr">TELÉFONOS:</label>
                    <input type="text" class="form-control" id="SegunApellido">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-11">
                <div class="formatodate">
                <h6>FECHA DE INGRESO:</h6>
                    <div class="date">
                        <div class="col-xs-4">
                            <label for="anio3">AÑO:</label>
                            <select id="anio3" name="anio3" class="form-control">
                            <option value="" disabled selected>Seleccione</option>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <label for="mes3">MES:</label>
                            <select id="mes3" name="mes3" class="form-control">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                            </select>
                        </div>
                        <div class="col-xs-2">
                        <label for="dia3">DIA:</label>
                        <select id="dia3" name="dia" class="form-control">
                            <option value="" disabled selected>Seleccione</option>
                        </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-11">
                <div class="formatodate">
                <h6>FECHA DE RETIRO:</h6>
                    <div class="date">
                        <div class="col-xs-4">
                            <label for="anio4">AÑO:</label>
                            <select id="anio4" name="anio4" class="form-control">
                            <option value="" disabled selected>Seleccione</option>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <label for="mes4">MES:</label>
                            <select id="mes4" name="mes4" class="form-control">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                            </select>
                        </div>
                        <div class="col-xs-2">
                        <label for="dia4">DIA:</label>
                        <select id="dia4" name="dia4" class="form-control">
                            <option value="" disabled selected>Seleccione</option>
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
                        <label for="usr">CARGO O CONTRATO ACTUAL:</label>
                        <input type="text" class="form-control" id="SegunApellido">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="usr"> DEPENDENCIA:</label>
                        <input type="text" class="form-control" id="SegunApellido">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="usr"> DIRECCIÓN:</label>
                        <input type="text" class="form-control" id="SegunApellido">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>