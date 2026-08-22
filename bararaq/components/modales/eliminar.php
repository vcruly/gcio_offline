<div id="eliminar-<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form method="post">
        <div class="modal-header">
            <h4 class="modal-title" id="standard-modalLabel">Eliminar <?php echo $titulo_eliminar; ?></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="row g-2">

            <p>Esta seguro desea eliminar <span class="fw-bold"><?php echo $nombre_eliminar; ?></span>?</p>
            <input value="<?php echo $id_eliminar; ?>" name="eliminar" hidden="hidden">

        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </div>
    </form>
    </div>
    </div>
    </div>