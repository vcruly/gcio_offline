<div class="page-title-head d-flex align-items-center">
<div class="flex-grow-1"></div>
<div class="text-end">
<ol class="breadcrumb m-0 py-0">
    <li class="breadcrumb-item"><a href="<?php echo SITE_HTTP."/index.php"; ?>">Inicio</a></li>
    <li class="breadcrumb-item">IPV</li>
</ol>
</div>
</div>

<?php echo $msg; ?>

<div class="row justify-content-center">
<div class="col-12">

<div class="d-flex align-items-sm-center flex-sm-row flex-column mb-3">
<div class="flex-grow-1">
    <h4 class="fs-xl mb-1">IPV</h4>
    <p class="text-muted mb-0">Datos y estadisticas de las operaciones de la entidad</p>
</div>
</div>

<form method="post">
<div class="card">
<div class="card-body">
<div class="card-header border-light justify-content-between mb-2 px-0">
    <span class="fw-semibold">Filtros para la busqueda:</span>
    <button type="submit" class="btn btn-light"><i class="ti ti-search me-1"></i>Buscar registros</button>
</div>
<div class="row align-items-center">

    <div class="col-md-2 mb-3">
    <label class="form-label">Fecha</label>
    <select id="fechas" class="form-control" name="fecha">
        <option selected="selected" value="hoy">Hoy</option>
        <option value="ayer">Ayer</option>
        <option value="esta semana">Esta semana</option>
        <option value="semana pasada">Semana pasada</option>
        <option value="este mes">Este mes</option>
        <option value="mes pasado">El mes pasado</option>
        <option value="fecha personalizada">Fecha personalizada</option>
    </select>
    </div>

    <div class="col-md-2 mb-3">
        <label class="form-label">Desde</label>
        <input type="text" id="desde" name="desde" class="form-control" disabled="disabled" data-provider="flatpickr" autocomplete="off"
               data-default-date=""  data-date-format="Y-m-d">
    </div>

    <div class="col-md-2 mb-3">
        <label class="form-label">Hasta</label>
        <input type="text" id="hasta" name="hasta" class="form-control" disabled="disabled" data-provider="flatpickr" autocomplete="off"
               data-default-date="" data-date-format="Y-m-d">
    </div>

    <input type="text" hidden="hidden" name="buscar" value="1">

</div>
</div>
</div>
</form>

<div class="card">
<div class="card-body">
<table id="productos" data-tables="basic" class="table table-bordered dt-responsive align-middle mb-0">

    <thead class="thead-sm text-uppercase fs-xxs bg-light align-middle bg-opacity-25">
    <tr>
        <th class="text-muted">Mercancia</th>
        <th class="text-muted">Compra</th>
        <th class="text-muted">Venta</th>
        <th class="text-muted">Salida</th>
        <th class="text-muted">Merma</th>
        <th class="text-muted">Ajuste</th>
        <th class="text-muted">Precio</th>
        <th class="text-muted">Costo</th>
        <th class="text-muted">Inicio</th>
        <th class="text-muted">Final</th>
    </tr>
    </thead>

    <tbody>
    <?php

        #Se va producto por producto y operacion por operacion sobre cada producto
        #yuca, operaciones de venta, compra, etc. Luego yogurt todas las de venta, compra, etc
        #De esta manera quedan bloques de operaciones por cada producto
        #Se traen todas las operaciones, luego ir operacion por operacion sobre todas las mercancias e ir eliminando del array

        foreach($ipv as $mercancia => $operaciones_mercancia){

            $compra = 0;
            $venta = 0;
            $salida = 0;
            $merma = 0;
            $ajuste = 0;
            $costo = 0;
            $precio = 0;
            $inicio = $operaciones_mercancia[0]["inicio_mercancia"];
            $final = $operaciones_mercancia[count($operaciones_mercancia)-1]["final_mercancia"];

            for($i = 0; $i < count($operaciones_mercancia); $i++){

                switch($operaciones_mercancia[$i]["tipo"]){

                    case "compra": $compra++; break;
                    case "venta": $venta++; break;
                    case "merma": $merma++; break;
                    case "ajuste": $ajuste++; break;
                    case "salida": $salida++; break;
                }

                $precio += $operaciones_mercancia[$i]["precio"];
                $costo += $operaciones_mercancia[$i]["costo"];
            }

            echo "
            <tr>
                <td>$mercancia</td>
                <td>$compra</td>
                <td>$venta</td>
                <td>$salida</td>
                <td>$merma</td>
                <td>$ajuste</td>
                <td>$precio</td>
                <td>$costo</td>
                <td>$inicio</td>
                <td>$final</td>
            </tr>";
        }
    ?>
    </tbody>

</table>
</div>
</div>


</div>
</div>




