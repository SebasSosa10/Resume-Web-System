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
                <a href="Formacion_Academica.html" class="menu">Formacion Academica</a>
                <a href="Experiencia_Laboral.html" class="menu">Experiencia Laboral</a>
                <a href="Tiempo_Total_De_Experiencia.html" class="menu">Tiempo Total De Experiencia</a>
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
                    <label for="usr">PRIMER APELLIDO:</label>
                    <input type="text" class="form-control" id="PrimerApellido">
                </div>
            </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="form-group">
                    <label for="usr">SEGUNDO APELLIDO:</label>
                    <input type="text" class="form-control" id="SegundoApellido">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="form-group">
                    <label for="usr">NOMBRES:</label>
                    <input type="text" class="form-control" id="Nombre">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <form>
                    <div class="form-radio">
                        <label for="document" style="margin-right: 10px;"><strong>DOCUMENTO DE IDENTIFICACIÓN:</strong></label>
                        <div class="radio-numero">
                            <label class="radio-inline"><input type="radio" name="optradio" checked>C.C</label>
                            <label class="radio-inline"><input type="radio" name="optradio">C.E</label>
                            <label class="radio-inline"><input type="radio" name="optradio">PASS</label>
                        </div>
                        <div class="form-textnumero">
                            <label for="usr" style="margin-right: 10px;">N°</label>
                            <input type="text" class="form-control" id="numerodocument" style="width: 300px;">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="form">
                    <label for="sexo" style="margin-right: 10px;"><strong>SEXO:</strong></label>
                    <div class="radio">
                        <label class="radio-inline"><input type="radio" name="sexo" checked>F</label>
                        <label class="radio-inline"><input type="radio" name="sexo">M</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-11">
                <div class="form">
                    <label for="nacionalidad" style="margin-right: 10px;"><strong>NACIONALIDAD:</strong></label>
                    <div class="radio">
                        <label class="radio-inline">
                        <input type="radio" name="naciona" id="col" checked>COL.
                        </label>
                        <label class="radio-inline">
                        <input type="radio" name="naciona" id="extranjero">EXTRANJERO
                        </label>
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
                    <label for="nacionalidad" style="margin-right: 10px;"><strong>LIBRETA MILITAR:</strong></label>
                    <div class="radio">
                        <label class="radio-inline"><input type="radio" name="libreta" checked>PRIMERA CLASE</label>
                        <label class="radio-inline"><input type="radio" name="libreta"> SEGUNDA CLASE</label>
                    </div>
                    <div class="form-textnumero">
                        <label for="pais" style="margin-right: 10px;">N°</label>
                        <input type="text" class="form-control" id="numero" style="width: 300px;">
                    </div>
                    <div class="form-textnumero"></div>
                    <label for="pais" style="margin-right: 10px;"> D.M</label>
                    <input type="text" class="form-control" id="deme" style="width: 300px;">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="form-group">
                    <label for="usr"><strong>FECHA Y LUGAR DE NACIMIENTO:</strong></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-3">
                <label for="ex3">AÑO:</label>
                <select class="form-control" id="anio">
                <option value="" disabled selected>Selecciona</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label for="ex2">MES:</label>
                <select class="form-control" id="mes">
                <option value="" disabled selected>Selecciona</option>
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
            <div class="col-sm-2">
                <label for="ex1">DIA:</label>
                <select class="form-control" id="dia">
                <option value="" disabled selected>Selecciona</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-11">
                <div class="for m-group">
                    <label for="paisNacimiento" style="margin-right: 10px;">PAÍS:</label>
                    <select id="paisNacimiento" class="form-control">
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
                    <select class="form-control" id="departamentoNacimiento">
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
                    <label for="muniN" style="margin-right: 10px;">MUNICIPIO:</label>
                    <select class="form-control" id="muniN">
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
                    <select id="paisCorrespondencia" class="form-control">
                    <option disabled selected>Seleccione</option>
                    </select>
                </div>
            </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-11">
                <div class="form-group">
                    <label for="departamentoC" style="margin-right: 10px;">DEPARTAMENTO:</label>
                    <select class="form-control" id="departamentoC" >
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
                    <label for="muniC" style="margin-right: 10px;">MUNICIPIO:</label>
                    <select class="form-control" id="muniC">
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
                    <label for="usr">TELÉFONO:</label>
                    <input type="text" class="form-control" id="telefono">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="form-group">
                    <label for="usr">EMAIL:</label>
                    <input type="text" class="form-control" id="email">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 offset-sm-3 text-center">
                <button id="ir" class="btn btn-primary">Previsualizar</button>
            </div>
        </div>
    </div>
</body>

</html>