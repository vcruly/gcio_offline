<div class="page-title-head d-flex align-items-center">
<div class="flex-grow-1"></div>
<div class="text-end">
<ol class="breadcrumb m-0 py-0">
    <li class="breadcrumb-item"><a href="<?php echo SITE_HTTP."/index.php"; ?>">Inicio</a></li>
    <li class="breadcrumb-item">Turnos</li>
</ol>
</div>
</div>

<?php echo $msg; ?>

<div class="row justify-content-center">
<div class="col-12">

<div class="d-flex align-items-sm-center flex-sm-row flex-column mb-3">
<div class="flex-grow-1">
    <h4 class="fs-xl mb-1">Administrar turnos</h4>
    <p class="text-muted mb-0">Datos e informacion de los turnos</p>
</div>
</div>

<div class="card">
<div class="card-body">
<table id="productos" data-tables="basic" class="table table-bordered dt-responsive align-middle mb-0">

    <thead class="thead-sm text-uppercase fs-xxs bg-light align-middle bg-opacity-25">
    <tr>
        <th class="text-muted">ID</th>
        <th class="text-muted">Inicio</th>
        <th class="text-muted">Cierre</th>
        <th class="text-muted">Operador</th>
        <th class="text-muted">Efectivo</th>
        <th class="text-muted">Transferencia</th>
        <th class="text-muted">Eliminar</th>
    </tr>
    </thead>

    <tbody><b></b>
    <?php

        for($i = 0; $i < count($turnos); $i++){

            $id = $turnos[$i]["id"];

            echo "
            <tr>
                <td><a href='turno.php?id=$id'>$id</a></td>
                <td>{$turnos[$i]["inicio"]}</td>
                <td>{$turnos[$i]["cierre"]}</td>
                <td>{$turnos[$i]["operador"]}</td>
                <td>{$turnos[$i]["efectivo"]}</td>
                <td>{$turnos[$i]["transferencia"]}</td>
                <td>
                <div class='d-flex justify-content-center gap-1'>
                    <a href='#' data-bs-toggle='modal' data-bs-target='#eliminar-$i' class='btn btn-light btn-icon btn-sm rounded-circle'>
                        <i class='ti ti-trash fs-lg'></i>
                    </a>
                </div>
                </td>
            </tr>";

            $titulo_eliminar = "turno";
            $nombre_eliminar =  $turnos[$i]["id"];
            $id_eliminar = $turnos[$i]["id"];

            include "bararaq/components/modales/eliminar.php";
        }
    ?>
     </tbody>

</table>
</div>
</div>


</div>
</div>
