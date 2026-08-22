<div id="actualizarSocio-<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form method="post">
        <div class="modal-header">
            <h4 class="modal-title" id="standard-modalLabel">Actualizar socio</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="row g-2">

            <div class="mb-3 col-md-6">
                <label class="form-label">Nombre</label><input value="<?php echo $socios[$i]["nombre"]; ?>" name="nombre" type="text" class="form-control">
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label">Direccion</label><input value="<?php echo $socios[$i]["direccion"]; ?>" name="direccion" type="text" class="form-control">
            </div>

            <input type="text" hidden="hidden" name="actualizar" value="<?php echo $socios[$i]["id"]; ?>">

        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
    </div>
    </div>
    </div>