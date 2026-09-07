/* ------------------------------------------------------------------------------
*
*   GCIO INIT
*
*   Archivo js dedicado al codigo custom y funciones para iniciar plugins y modulos como las tablas y los charts, etc
*
* ---------------------------------------------------------------------------- */

// -------------------------------------------------- GLOBALES --------------------------------------------------

const GCIO_API = window.location.hostname == "http://localhost:1991/api/"

jQuery().select2&&$('[data-toggle="select2"]').select2();

// -------------------------------------------------- EVENTOS --------------------------------------------------

if(fechas = document.getElementById("fechas")){

    fechas.addEventListener("change", (e)=>{

        if(e.target.value === "fecha personalizada") {

            document.getElementById("hasta").disabled = false;
            document.getElementById("desde").disabled = false;

        }else{

            document.getElementById("hasta").disabled = true;
            document.getElementById("desde").disabled = true;

        }
    });
}


// -------------------------------------------------- FUNCIONES --------------------------------------------------

function mostrar_alerta(tipo = "success", mensaje = "<span class='fw-semibold'>Todo bien!</span> La operacion ha sido exitosa"){

    return `
        <div class='alert alert-${tipo} border-0 alert-dismissible fade show border-${tipo}'>${mensaje  }
        <button type='button' class='btn-close' data-bs-dismiss='alert'></button></div>`;
}


function date_rangePicker(){
    // ?? Fecha de inicio del mes actual
    const start = new Date();
    start.setDate(1);                     // D�a 1 del mes
    start.setHours(0, 0, 0, 0);           // A la medianoche (inicio del d�a)
    // ?? Fecha de fin del mes actual
    const end = new Date();
    end.setMonth(end.getMonth() + 1);     // Avanza al mes siguiente
    end.setDate(0);                       // Retrocede un d�a ? �ltimo d�a del mes actual
    end.setHours(23, 59, 59, 999);        // �ltimo instante del d�a

    // Inicializa Flatpickr en el input
    flatpickr("#date-rangePicker", {
        mode: "range",
        defaultDate: [start, end],
        dateFormat: "Y-m-d",
        altInput: true,
        altFormat: "d M, Y",              // ?? Solo el formato de cada fecha
        conjunction: " al ",              // ?? Separador visual
        locale: {
            ...flatpickr.l10ns.es,
            rangeSeparator: " al "          // ?? Separador en el input oculto (para GET)
        },
    });
}


function datatable_basic(colunm = false){

    new DataTable('[data-tables="basic"]', {
        order: [[colunm, 'asc']] ,
        language: {
            paginate: {
                first: '<i class="ti ti-chevrons-left"></i>',
                previous: '<i class="ti ti-chevron-left"></i>',
                next: '<i class="ti ti-chevron-right"></i>',
                last: '<i class="ti ti-chevrons-right"></i>'
            }
        }
    });
}


function generar_codigo(id_input){ document.getElementById(id_input).value = masker("", 5, 1, "right"); }


function masker(string, lenght = 7, mask = 0, side = null){

masquerade = '';
masquerade2 = '';


    switch (mask){

        case 0:
            mask = 'abcdefghijklmnopqrstuvwxyz';
            mask_lenght = 25;
            break;

        case 1:
            mask = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            mask_lenght = 25;
            break;

        case 2:
            mask = '0123456789abcdefghijklmnopqrstuvwxyz';
            mask_lenght = 35;
            break;

        case 3:
            mask = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            mask_lenght = 35;
            break;

        case 4:
            mask = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            mask_lenght = 60;
            break;

        default:
        return 'Error. Expected values are from 0 to 4';

    }

    //Default Maskquing
    for (i = 0; i < lenght; i++){ masquerade += mask[Math.floor(Math.random()*mask_lenght)]; }


    //Siding
    if (side == 'left' || side == null){

        return masquerade+string;

    }else if (side == 'right'){

        return string+masquerade;

    }else if (side == 'both'){

        for (i = 0; i < lenght; i++){ masquerade2 += mask[Math.floor(Math.random()*mask_lenght)]; }

        return masquerade+string+masquerade2;

    }else { return 'Error. Expected values are left, right, both'; }

//End
}


function internet_monitor() {

    const icon = document.getElementById('connection-status-icon');
    const ONLINE_IMG = 'assets/images/icons/online.png';
    const OFFLINE_IMG = 'assets/images/icons/offline.png';
    const INTERVALO = 10000; // 10 segundos

    function actualizarIcono(online) {
        icon.src = online ? ONLINE_IMG : OFFLINE_IMG;
    }

    async function verificarConexionReal() {
        try {
            const respuesta = await fetch('https://gcio.com/ping.php', {
                method: 'HEAD',
                cache: 'no-store'
            });
            actualizarIcono(respuesta.ok);
        } catch (error) {
            actualizarIcono(false);
        }
    }

    // Verificación inicial
    verificarConexionReal();

    // Verificación periódica
    setInterval(verificarConexionReal, INTERVALO);

    // Reaccionar también a eventos del navegador
    window.addEventListener('online', verificarConexionReal);
    window.addEventListener('offline', () => actualizarIcono(false));
}

/*function themeToggle(){

    let e = document.documentElement;
    var t = document.getElementById("theme-toggle"),
        o = localStorage.getItem("theme") || "light";
        e.setAttribute("data-bs-theme", o),
        t&&t.addEventListener("click", () => {
            var t = "dark"===e.getAttribute("data-bs-theme") ? "light": "dark";
                e.setAttribute("data-bs-theme", t), localStorage.setItem("theme", t)
        })
}*/


