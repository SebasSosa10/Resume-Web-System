(function () {
    paises = new Array();
})();

function cargaInicial() {
    const url = "https://restcountries.com/v3.1/all";
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => obtenerPaises(data))
        .catch(error => console.error('Error fetching countries:', error));
}
function obtenerPaises(data) {
    console.log(data);
    console.log("tamaño: " + data.length);
    let index = 0;
    data.forEach(element => {
        let pais = {
            id: index,
            name: element.name.common,
            region: element.region,
            continente: element.continents[0]
        };
        paises.push(pais);
        index += 1;
    });
    console.log(`La cantidad de países son: ${paises.length}`);
    console.log(paises);
    const selectExperiencia = document.getElementById("paisExperiencia");
    const selectExperienciaFin = document.getElementById("paisExperienciaFin");
    paises.forEach(e => {
        let optionExperiencia = new Option(e.name, e.id);
        let optionExperienciaFin = new Option(e.name, e.id);
        selectExperiencia.appendChild(optionExperiencia);
        selectExperienciaFin.appendChild(optionExperienciaFin);
    });
}

function inicializarFecha(anioId, mesId, diaId) {
    const currentYear = new Date().getFullYear();
    const selectAnios = document.getElementById(anioId);
    const selectMeses = document.getElementById(mesId);
    const selectDias = document.getElementById(diaId);
    for (let year = currentYear; year >= 1940; year--) {
        let option = new Option(year, year);
        selectAnios.appendChild(option);
    }
    selectMeses.addEventListener('change', () => ajustarDias(selectMeses, selectAnios, selectDias));
    selectAnios.addEventListener('change', () => ajustarDias(selectMeses, selectAnios, selectDias));
}

function ajustarDias(selectMes, selectAnio, selectDias) {
    if (!selectMes.value || !selectAnio.value) return;
    selectDias.innerHTML = '<option value="" disabled selected>Seleccione</option>';
    let diasEnMes = 31; 
    switch (parseInt(selectMes.value)) {
        case 2: 
            diasEnMes = (selectAnio.value % 4 === 0 && (selectAnio.value % 100 !== 0 || selectAnio.value % 400 === 0)) ? 29 : 28;
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

window.onload = function () {
    cargaInicial();
    inicializarFecha('anio', 'mes', 'dia'); 
    inicializarFecha('anio2', 'mes2', 'dia2'); 
    inicializarFecha('anio3', 'mes3', 'dia3'); 
    inicializarFecha('anio4', 'mes4', 'dia4');
};
