function cargarAnios(selectId) {
    const selectElement = document.getElementById(selectId);
    if (!selectElement) {
        console.error(`No se encontró el elemento con ID: ${selectId}`);
        return;
    }
    const anioActual = new Date().getFullYear();
    const anioInicial = 1990;
    while (selectElement.options.length > 1) {
        selectElement.remove(1);
    }
    for (let anio = anioActual; anio >= anioInicial; anio--) {
        const option = new Option(anio.toString(), anio.toString());
        selectElement.add(option);
    }
}
document.addEventListener('DOMContentLoaded', function () {
    cargarAnios('anioTitulo');
    cargarAnios('anioEstudio');
});