let paises = [];

document.addEventListener("DOMContentLoaded", function () {
    cargaInicial();
    const paisNacionalidad = document.getElementById("paisNacionalidad");
    const paisNacimiento = document.getElementById("paisNacimiento");
    const paisCorrespondencia = document.getElementById("paisCorrespondencia");
    cargaInicial().then(() => {
        cargarPaises(paisNacimiento);
        cargarPaises(paisCorrespondencia);
        cargarPaises(paisNacionalidad);
    });
});
async function cargaInicial() {
    const url = "https://restcountries.com/v3.1/all";
    try {
        const response = await fetch(url);
        const data = await response.json();
        obtenerPaises(data);
    } catch (error) {
        console.error("Error al obtener los países:", error);
    }
}
function obtenerPaises(data) {
    let index = 0;
    data.forEach(element => {
        if (element.continents.includes("South America") &&
            !["Suriname", "French Guiana", "Falkland Islands"].includes(element.name.common)) {
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
}
function cargarPaises(selectElement) {
    selectElement.innerHTML = '<option disabled selected>Seleccione</option>';
    paises.forEach(e => {
        let option = new Option(e.name, e.name);
        selectElement.appendChild(option);
    });
}

