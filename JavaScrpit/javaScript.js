/* let paises = [];

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
 */

// Función para cargar los países
async function loadCountries() {
    const paisSelects = [
        'paisNacionalidad',
        'paisNacimiento',
        'paisCorrespondencia',
        'paisActual'
    ];
    try {
        const response = await fetch('paises.php?action=getCountries');
        const countries = await response.json();

        paisSelects.forEach(selectId => {
            const select = document.getElementById(selectId);
            if (select) { // Verificar que el elemento existe
                // Limpiar las opciones existentes
                select.innerHTML = '<option value="" disabled selected>Seleccione un país</option>';
                // Ordenar países alfabéticamente
                countries.sort().forEach(country => {
                    select.innerHTML += `<option value="${country}">${country}</option>`;
                });
            }
        });
    } catch (error) {
        console.error('Error cargando países:', error);
    }
}

// Función para cargar los departamentos
async function loadDepartments(country, targetSelectId) {
    try {
        const response = await fetch(`paises.php?action=getDepartments&country=${encodeURIComponent(country)}`);
        const departments = await response.json();

        const select = document.getElementById(targetSelectId);
        if (select) { // Verificar que el elemento existe
            // Limpiar las opciones existentes
            select.innerHTML = '<option value="" disabled selected>Seleccione un departamento</option>';
            // Ordenar departamentos alfabéticamente
            departments.sort().forEach(department => {
                select.innerHTML += `<option value="${department}">${department}</option>`;
            });

            // Limpiar el selector de municipios correspondiente
            const municipalitySelectId = targetSelectId.replace('departamento', 'municipio');
            const municipalitySelect = document.getElementById(municipalitySelectId);
            if (municipalitySelect) {
                municipalitySelect.innerHTML = '<option value="" disabled selected>Seleccione un municipio</option>';
            }
        }
    } catch (error) {
        console.error('Error cargando departamentos:', error);
    }
}

// Función para cargar los municipios
async function loadMunicipalities(country, department, targetSelectId) {
    try {
        const response = await fetch(`paises.php?action=getMunicipalities&country=${encodeURIComponent(country)}&department=${encodeURIComponent(department)}`);
        const municipalities = await response.json();

        const select = document.getElementById(targetSelectId);
        if (select) { // Verificar que el elemento existe
            // Limpiar las opciones existentes
            select.innerHTML = '<option value="" disabled selected>Seleccione un municipio</option>';
            // Ordenar municipios alfabéticamente
            municipalities.sort().forEach(municipality => {
                select.innerHTML += `<option value="${municipality}">${municipality}</option>`;
            });
        }
    } catch (error) {
        console.error('Error cargando municipios:', error);
    }
}

// Inicializar los event listeners cuando el DOM esté cargado
document.addEventListener('DOMContentLoaded', function () {
    // Cargar la lista inicial de países
    loadCountries();

    // Event listeners para país de nacimiento
    const paisNacimiento = document.getElementById('paisNacimiento');
    const departamentoNacimiento = document.getElementById('departamentoNacimiento');

    paisNacimiento?.addEventListener('change', function () {
        loadDepartments(this.value, 'departamentoNacimiento');
    });

    departamentoNacimiento?.addEventListener('change', function () {
        const country = paisNacimiento.value;
        loadMunicipalities(country, this.value, 'municipioNacimiento');
    });

    // Event listeners para país de correspondencia
    const paisCorrespondencia = document.getElementById('paisCorrespondencia');
    const departamentoCorrespondencia = document.getElementById('departamentoCorrespondencia');

    paisCorrespondencia?.addEventListener('change', function () {
        loadDepartments(this.value, 'departamentoCorrespondencia');
    });

    departamentoCorrespondencia?.addEventListener('change', function () {
        const country = paisCorrespondencia.value;
        loadMunicipalities(country, this.value, 'municipioCorrespondencia');
    });

    // Event listeners para país actual (experiencia laboral)
    const paisActual = document.getElementById('paisActual');
    const departamentoActual = document.getElementById('departamentoActual');

    paisActual?.addEventListener('change', function () {
        loadDepartments(this.value, 'departamentoActual');
    });

    departamentoActual?.addEventListener('change', function () {
        const country = paisActual.value;
        loadMunicipalities(country, this.value, 'capitalActual');
    });

    // Mantener la funcionalidad especial para nacionalidad
    const paisNacionalidad = document.getElementById('paisNacionalidad');
    document.querySelectorAll('input[name="tipoNacionalidad"]').forEach(radio => {
        radio.addEventListener('change', function () {
            if (this.value === 'Colombia') {
                paisNacionalidad.disabled = true;
                paisNacionalidad.value = "Colombia";
            } else if (this.value === 'extranjero') {
                paisNacionalidad.disabled = false;
                paisNacionalidad.value = "";
            }
        });
    });
});
