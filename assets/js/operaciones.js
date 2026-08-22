if( typeof mercancias !== "undefined" ){


// ====== REFERENCIAS ======
const tabla = document.querySelector("#tabla tbody");
const operacion = document.getElementById("operacion").value;
const moneda = document.getElementById("moneda").value;
const operador = document.getElementById("operador").value;
const socio = document.getElementById("socio").value;
const area = document.getElementById("area").value;
const nota = document.getElementById("nota").value;


// ====== ID �NICO POR FILA ======
let filaIdCounter = 0;


// ====== VALIDACI�N ======
function validarNumero(input) {

    let valor = parseFloat(input.value);

    if (isNaN(valor) || valor < 0) {
        input.classList.add("is-invalid");
        return 0;
    } else {
        input.classList.remove("is-invalid");
        return valor;
    }
}


// ====== TOTAL GENERAL ======
function calcularTotalGeneral() {

    let total = 0;

    tabla.querySelectorAll(".importe").forEach(input => {
        total += parseFloat(input.value) || 0;
    });

    document.getElementById("total").value = total.toFixed(2);
}


// ====== CALCULAR IMPORTE ======
function calcular_importe(fila) {

    formula_costo = formula;
    const cantidad = validarNumero(fila.querySelector(".cantidad"));
    const costo = validarNumero(fila.querySelector(".costo"));


    switch(operacion){

        case "compra":

            if( formula != ""){

                //Reemplazar el porciento por su expresion matematica
                formula_costo = formula.replace(/(\d+)%/g, "($1/100)");

                //Reemplazar CC (costo de compra) por el valor de la variable costo
                formula_costo = formula_costo.replace(/\bCC\b/g, costo);

                precio = math.evaluate(formula_costo);
                fila.querySelector(".precio").value = precio;
                fila.querySelector(".importe").value = (cantidad * precio).toFixed(2);

             }else{

                const costo = validarNumero(fila.querySelector(".costo"));
                fila.querySelector(".importe").value = (cantidad * costo).toFixed(2);

             }
             break;


        case "venta":
        case "salida":
        case "merma":
        case "ajuste":

            precio = validarNumero(fila.querySelector(".precio"));
            fila.querySelector(".importe").value = (cantidad * precio).toFixed(2);
            break;

    }

    calcularTotalGeneral();
}


// ====== LLENAR DATOS ======
function llenarDatos(fila, productoId) {

    const producto = mercancias.find(p => p.id == productoId);

    if(producto){

        fila.querySelector(".id").value = productoId;
        fila.querySelector(".codigo").value = producto.codigo;
        fila.querySelector(".medida").value = producto.medida;
        fila.querySelector(".costo").value = producto.costo;
        fila.querySelector(".precio").value = producto.precio;

        validarNumero(fila.querySelector(".costo"));
        validarNumero(fila.querySelector(".precio"));
        calcular_importe(fila);
        fila.querySelector(".cantidad").focus();
    }
}


// ====== NUMERACI�N ======
function actualizarNumeros() {
    tabla.querySelectorAll("tr").forEach((tr, idx) => {
        tr.querySelector(".numero").textContent = idx + 1;
    });
}


// ====== ELIMINAR POR ROW ID ======
function eliminarFilaPorRowId(rowId){

    const fila = tabla.querySelector(`tr[data-row-id="${rowId}"]`);

    if(fila){
        fila.remove();
    }

    actualizarNumeros();
    calcularTotalGeneral();
}


// ====== AGREGAR FILA ======
function agregarFila() {

    const fila = document.createElement("tr");

    // ?? asignar ID �nico
    fila.dataset.rowId = ++filaIdCounter;

    fila.innerHTML = `
        <td class="numero"></td>
        <td>
            <div class="autocomplete-box">
                <input type="text" class="form-control form-control-sm producto">
                <div class="lista-autocomplete d-none"></div>
            </div>
        </td>

        <td class="d-none"><input type="text" disabled class="id"></td>

        <td><input type="text" class="form-control form-control-sm codigo bg-light" readonly></td>
        <td><input type="text" class="form-control form-control-sm medida bg-light" readonly></td>
        <td>
            <input type="number" class="form-control form-control-sm cantidad" value="1" min="0">
            <div class="invalid-feedback">No negativo</div>
        </td>
        <td><input type="number" class="form-control form-control-sm costo" min="0"></td>
        <td><input type="number" class="form-control form-control-sm precio" min="0"></td>
        <td><input type="number" class="form-control form-control-sm bg-light importe" readonly></td>
        <td><button class="btn btn-danger btn-icon btn-sm rounded-circle eliminar"><i class="ti ti-trash fs-lg"></i></button></td>
    `;

    tabla.appendChild(fila);
    actualizarNumeros();
    activarAutocomplete(fila.querySelector(".producto"), fila);
    calcularTotalGeneral();

    if( operacion == "compra" && formula != ""){

        fila.querySelector(".precio").setAttribute("readonly", "readonly");
        fila.querySelector(".precio").setAttribute("class", "form-control form-control-sm precio bg-light");
    }
}


// ?? Buscar producto por nombre
function buscarProducto(nombre){ return mercancias.find(p => p.nombre.toLowerCase() === nombre.toLowerCase()); }


// ====== EVENTOS ======
tabla.addEventListener("change", (e)=>{

    if(e.target.classList.contains("producto")){
        const fila = e.target.closest("tr");
        llenarDatos(fila, e.target.value);
    }
});


tabla.addEventListener("input", (e)=>{

    if(e.target.matches(".cantidad, .costo, .precio")){
        const fila = e.target.closest("tr");
        validarNumero(e.target);
        calcular_importe(fila);
    }
});


tabla.addEventListener("click", (e)=>{

    if(e.target.closest(".eliminar")){

        const fila = e.target.closest("tr");
        const rowId = fila.dataset.rowId;

        eliminarFilaPorRowId(rowId);
    }
});


document.getElementById("btnLimpiar").addEventListener("click", limpiarTabla);


function enviarDatos(){

    const efectivo = document.getElementById("efectivo").value;
    const transferencia = document.getElementById("transferencia").value;

    const datos = {
        total: parseFloat(document.getElementById("total").value) || 0,
        productos: obtenerDatosTabla(),
        tipo: operacion,
        moneda: moneda,
        operador: operador,
        socio: socio,
        area: area,
        transferencia: transferencia,
        efectivo: efectivo,
        turno: turno,
        nota: nota
    };

    fetch(GCIO_API + "index.php?request=registrar_operacion", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(datos)
    })
    .then(res => res.text())
    .then(data => {

        // Selecciona el modal
        var modal = document.getElementById('guardarOperacion');

        // Obtén la instancia del modal
        var modalInstance = bootstrap.Modal.getInstance(modal);

        // Cierra el modal
        modalInstance.hide();

        const div = document.createElement("div");
        div.className = "alert alert-success border-0 alert-dismissible fade show border-success";
        div.innerHTML = `
            <span class='fw-semibold'>Todo bien!</span> La operacion ha sido exitosa. <b>#Operacion ${data}</b>
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>`;

        document.getElementById("msg").appendChild(div);

        limpiarTabla();

    });
}


function obtenerDatosTabla(){

    const filas = tabla.querySelectorAll("tr");
    const datos = [];

    filas.forEach(fila => {

        const producto = fila.querySelector(".producto").value;

        // evitar filas vac�as
        if (!producto) return;

        datos.push({
            id: fila.querySelector(".id").value,
            nombre: producto,
            codigo: fila.querySelector(".codigo").value,
            medida: fila.querySelector(".medida").value,
            cantidad: parseFloat(fila.querySelector(".cantidad").value) || 0,
            costo: parseFloat(fila.querySelector(".costo").value) || 0,
            precio: parseFloat(fila.querySelector(".precio").value) || 0,
            importe: parseFloat(fila.querySelector(".importe").value) || 0
        });
    });

    return datos;
}

// ====== NAVEGACI�N ======
tabla.addEventListener("keydown", (e)=>{

    const fila = e.target.closest("tr");
    const celdas = Array.from(fila.querySelectorAll("input, select"));
    const idx = celdas.indexOf(e.target);

    if(e.key === "Enter"){

        e.preventDefault();
        if(e.altKey){ agregarFila(); }
        else if(idx < celdas.length -1){ celdas[idx+1].focus(); }
        else{ agregarFila(); }

    }else if(e.key === "ArrowDown"){

        e.preventDefault();
        const nextRow = fila.nextElementSibling;
        if(nextRow) nextRow.querySelectorAll("input, select")[idx].focus();

    }else if(e.key === "ArrowUp"){

        e.preventDefault();
        const prevRow = fila.previousElementSibling;
        if(prevRow) prevRow.querySelectorAll("input, select")[idx].focus();

    }else if(e.key === "ArrowLeft"){

        e.preventDefault();

        if(idx > 0){
            celdas[idx-1].focus();
        } else {
            const prevRow = fila.previousElementSibling;
            if(prevRow){
                const prevCeldas = prevRow.querySelectorAll("input, select");
                prevCeldas[prevCeldas.length-1].focus();
            }
        }

    }else if(e.key === "ArrowRight"){

        e.preventDefault();

        if(idx < celdas.length - 1){
            celdas[idx+1].focus();
        } else {
            const nextRow = fila.nextElementSibling;

            if(nextRow){
                nextRow.querySelectorAll("input, select")[0].focus();
            } else {
                agregarFila();
                tabla.lastElementChild.querySelector("input").focus();
            }
        }
    }
});


// ====== AUTOCOMPLETE ======
function activarAutocomplete(input, fila){

    const contenedor = input.parentElement;
    const lista = contenedor.querySelector(".lista-autocomplete");

    let index = -1;

    function renderLista(filtro = ""){

        lista.innerHTML = "";

        const resultados = mercancias.filter(p =>
            p.nombre.toLowerCase().includes(filtro.toLowerCase()) ||
            p.codigo.includes(filtro)
        );

        resultados.forEach((p, i)=>{

            const item = document.createElement("div");
            item.textContent = `${p.nombre} (${p.codigo})`;

            item.addEventListener("click", ()=> seleccionar(p));

            lista.appendChild(item);
        });

        lista.classList.remove("d-none");
    }

    function seleccionar(p){

        input.value = p.nombre;
        llenarDatos(fila, p.id);
        lista.classList.add("d-none");
    }

    input.addEventListener("focus", ()=> renderLista(""));

    input.addEventListener("input", ()=>{
        index = -1;
        renderLista(input.value);
    });

    input.addEventListener("keydown", (e)=>{

        const items = lista.querySelectorAll("div");

        if(!items.length) return;

        if(e.key === "ArrowDown"){
            e.preventDefault();
            index = (index + 1) % items.length;
        }
        else if(e.key === "ArrowUp"){
            e.preventDefault();
            index = (index - 1 + items.length) % items.length;
        }
        else if(e.key === "Enter" && index >= 0){
            e.preventDefault();
            items[index].click();
        }
        else if(e.key === "Escape"){
            lista.classList.add("d-none");
        }

        items.forEach(el => el.classList.remove("activo"));
        if(items[index]) items[index].classList.add("activo");
    });

    document.addEventListener("click", (e)=>{
        if(!contenedor.contains(e.target)){
            lista.classList.add("d-none");
        }
    });
}


// ====== LIMPIAR ======
function limpiarTabla() {

    tabla.innerHTML = "";
    document.getElementById("total").value = "0.00";

    agregarFila();
}


// ====== INIT ======
agregarFila();

}