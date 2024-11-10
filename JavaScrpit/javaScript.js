let paises = [];
let departamentos = [];
let municipios = {};

function cargaInicial() {
    const url = "https://restcountries.com/v3.1/all";
    fetch(url)
        .then(response => response.json())
        .then(data => obtenerPaises(data));
}
function obtenerPaises(data) {
    let index = 0;
    data.forEach(element => {
        if (element.continents.includes("South America") && element.name.common !== "Suriname" && element.name.common !== "French Guiana" && element.name.common !== "Falkland Islands") {
            let pais = {
                id: index,
                name: element.name.common,
                region: element.region,
                continente: element.continents[0]
            };
            paises.push(pais);
            index += 1;
        }
    });
    let selectNacionalidad = document.getElementById("paisNacionalidad");
    let selectNacimiento = document.getElementById("paisNacimiento");
    let selectCorrespondencia = document.getElementById("paisCorrespondencia");
    paises.forEach(e => {
        let optionNacionalidad = new Option(e.name, e.id);
        let optionNacimiento = new Option(e.name, e.name);
        let optionCorrespondencia = new Option(e.name, e.id);
        selectNacionalidad.appendChild(optionNacionalidad);
        selectNacimiento.appendChild(optionNacimiento);
        selectCorrespondencia.appendChild(optionCorrespondencia);
    });
}
document.getElementById("col").addEventListener("change", function () {
    if (this.checked) {
        document.getElementById("paisNacionalidad").disabled = true;
    }
});
document.getElementById("extranjero").addEventListener("change", function () {
    if (this.checked) {
        document.getElementById("paisNacionalidad").disabled = false;
    }
});
function inicializarFecha() {
    const currentYear = new Date().getFullYear();
    const selectAnios = document.getElementById('anio');
    const selectMeses = document.getElementById('mes');
    for (let year = currentYear; year >= 1940; year--) {
        let option = new Option(year, year);
        selectAnios.appendChild(option);
    }
    selectMeses.addEventListener('change', ajustarDias);
    selectAnios.addEventListener('change', ajustarDias);
}
function ajustarDias() {
    const selectDias = document.getElementById('dia');
    const selectMes = document.getElementById('mes').value;
    const selectAnio = document.getElementById('anio').value;
    if (!selectMes || !selectAnio) return;
    selectDias.innerHTML = '<option value="" disabled selected>Selecciona</option>';
    let diasEnMes = 31;
    switch (parseInt(selectMes)) {
        case 2:
            diasEnMes = (selectAnio % 4 === 0 && (selectAnio % 100 !== 0 || selectAnio % 400 === 0)) ? 29 : 28;
            break;
        case 4: case 6: case 9: case 11:
            diasEnMes = 30;
            break;
    }
    for (let dia = 1; dia <= diasEnMes; dia++) {
        let option = new Option(dia, dia);
        selectDias.appendChild(option);
    }
}
function mostrarDatos() {
    const primerApellido = document.getElementById("PrimerApellido").value;
    const segundoApellido = document.getElementById("SegundoApellido").value;
    const nombres = document.getElementById("Nombre").value;
    const numeroDocumento = document.getElementById("numerodocument").value;
    const numeroLibreta = document.getElementById("numero").value;
    const dmLibreta = document.getElementById("deme").value;
    const telefono = document.getElementById("telefono").value;
    const email = document.getElementById("email").value;
    const anio = document.getElementById("anio").value;
    const mes = document.getElementById("mes").value;
    const dia = document.getElementById("dia").value;
    const paisNacimiento = document.getElementById("paisNacimiento").value;
    const departamentoNacimiento = document.getElementById("departamentoNacimiento").value;
    const municipioNacimiento = document.getElementById("muniN").value;
    const paisCorrespondencia = document.getElementById("paisCorrespondencia").value;
    const departamentoCorrespondencia = document.getElementById("departamentoC").value;
    const municipioCorrespondencia = document.getElementById("muniC").value;
    const mensaje = `
    Primer Apellido: ${primerApellido}
    Segundo Apellido: ${segundoApellido}
    Nombres: ${nombres}
    Número de Documento: ${numeroDocumento}
    Número de Libreta Militar: ${numeroLibreta}
    D.M. Libreta Militar: ${dmLibreta}
    Teléfono: ${telefono}
    Email: ${email}
    Fecha de Nacimiento: ${anio}-${mes}-${dia}
    País de Nacimiento: ${paisNacimiento}
    Departamento de Nacimiento: ${departamentoNacimiento}
    Municipio de Nacimiento: ${municipioNacimiento}
    País de Correspondencia: ${paisCorrespondencia}
    Departamento de Correspondencia: ${departamentoCorrespondencia}
    Municipio de Correspondencia: ${municipioCorrespondencia}
    `;
    alert(mensaje);
}

window.onload = function () {
    inicializarFecha();
    cargaInicial();
    document.getElementById("ir").addEventListener("click", mostrarDatos);
};