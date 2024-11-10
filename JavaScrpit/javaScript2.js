document.addEventListener('DOMContentLoaded', function () {
    const currentYear = new Date().getFullYear();
    let yearOptions = '';
    for (let year = currentYear; year >= 1940; year--) {
        yearOptions += `<option value="${year}">${year}</option>`;
    }
    const yearSelects = document.querySelectorAll('select');
    yearSelects.forEach(select => {
        if (select.previousElementSibling &&
            select.previousElementSibling.textContent.includes('AÑO:')) {
            select.innerHTML = '<option value="" disabled selected>Selecciona</option>' + yearOptions;
        }
    });
});