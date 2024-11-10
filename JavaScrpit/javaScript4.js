document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('calcularBtn').addEventListener('click', function () {
        const aniosServidorPublico = parseInt(document.getElementById('anioServidorPublico').value) || 0;
        const mesesServidorPublico = parseInt(document.getElementById('mesServidorPublico').value) || 0;
        const aniosEmpleadoPrivado = parseInt(document.getElementById('anioEmpleadoPrivado').value) || 0;
        const mesesEmpleadoPrivado = parseInt(document.getElementById('mesEmpleadoPrivado').value) || 0;
        const aniosTrabajadorIndependiente = parseInt(document.getElementById('anioTrabajadorIndependiente').value) || 0;
        const mesesTrabajadorIndependiente = parseInt(document.getElementById('mesTrabajadorIndependiente').value) || 0;
        const totalAnos = aniosServidorPublico + aniosEmpleadoPrivado + aniosTrabajadorIndependiente;
        const totalMeses = mesesServidorPublico + mesesEmpleadoPrivado + mesesTrabajadorIndependiente;
        const añosFinal = totalAnos + Math.floor(totalMeses / 12);
        const mesesFinal = totalMeses % 12;

        document.getElementById('totalAnio').innerHTML = ""; 

        for (let i = 0; i <= añosFinal; i++) {
            const option = document.createElement("option");
            option.value = i;
            option.text = i;
            document.getElementById('totalAnio').appendChild(option);
        }

        for (let i = 0; i <= 12; i++) {
            const option = document.createElement("option");
            option.value = i;
            option.text = i;
            document.getElementById('totalMes').appendChild(option);
        }
        
        document.getElementById('totalAnio').value = añosFinal;
        document.getElementById('totalMes').value = mesesFinal;
    });
});
