
// Seleccionamos todos los inputs de billetes
const inputs = document.querySelectorAll(".b");

// Tags de salida
extracciones = document.getElementById("extracciones");
restante = document.getElementById("restante");


function calcular(){

    let total_billetes =
        (parseInt(document.getElementById("b1000").value) || 0) * 1000 +
        (parseInt(document.getElementById("b500").value) || 0) * 500 +
        (parseInt(document.getElementById("b200").value) || 0) * 200 +
        (parseInt(document.getElementById("b100").value) || 0) * 100 +
        (parseInt(document.getElementById("b50").value) || 0) * 50 +
        (parseInt(document.getElementById("b20").value) || 0) * 20 +
        (parseInt(document.getElementById("b10").value) || 0) * 10 +
        (parseInt(document.getElementById("b5").value) || 0) * 5;


    extracciones.textContent = total_billetes;
    document.getElementById("input-extracciones").value = total_billetes;
    restante.textContent = monto - total_billetes;
}

inputs.forEach(input => { input.addEventListener("input", calcular); });