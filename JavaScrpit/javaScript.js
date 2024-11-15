let paises = [];

document.addEventListener("DOMContentLoaded", function () {
    cargaInicial();
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
});

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
        let optionNacionalidad = new Option(e.name, e.name);
        let optionNacimiento = new Option(e.name, e.name);
        let optionCorrespondencia = new Option(e.name, e.name);
        selectNacionalidad.appendChild(optionNacionalidad);
        selectNacimiento.appendChild(optionNacimiento);
        selectCorrespondencia.appendChild(optionCorrespondencia);
    });
}
