let paises = [];

function cargaInicial() {
    const url = "https://restcountries.com/v3.1/all";
    fetch(url)
        .then(response => {
            // Verificar que la respuesta fue exitosa
            if (!response.ok) {
                throw new Error('Error al cargar los datos de la API');
            }
            return response.json();
        })
        .then(data => {
            // Verificar la estructura de los datos
            console.log(data);
            obtenerPaises(data);
        })
        .catch(error => {
            console.error('Hubo un problema con la solicitud Fetch:', error);
        });
}

function obtenerPaises(data) {
    let index = 0;
    data.forEach(element => {
        // Verifica si el país está en América del Sur y no es un país excluido
        if (element.continents && element.continents.includes("South America") &&
            element.name.common !== "Suriname" && 
            element.name.common !== "French Guiana" && 
            element.name.common !== "Falkland Islands") {

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

    // Verifica si los países han sido agregados
    console.log(paises);

    // Accede a los elementos del DOM después de que se haya cargado la página
    let selectNacionalidad = document.getElementById("paisNacionalidad");
    let selectNacimiento = document.getElementById("paisNacimiento");
    let selectCorrespondencia = document.getElementById("paisCorrespondencia");

    if (selectNacionalidad && selectNacimiento && selectCorrespondencia) {
        paises.forEach(e => {
            let optionNacionalidad = new Option(e.name, e.name);
            let optionNacimiento = new Option(e.name, e.name);
            let optionCorrespondencia = new Option(e.name, e.name);
            selectNacionalidad.appendChild(optionNacionalidad);
            selectNacimiento.appendChild(optionNacimiento);
            selectCorrespondencia.appendChild(optionCorrespondencia);
        });
    } else {
        console.error("No se encontraron los elementos select en el DOM");
    }
}

// Llamar a la función de carga cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    cargaInicial();
});

