<div id="abrir-turno" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
    <form action="index.php" method="post">
        <div class="modal-header">
            <h4 class="modal-title" id="standard-modalLabel">Abrir turno</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="row g-2">

            <div class="mb-3 col-md-6">
                <label class="form-label">Fondo de caja (CUP)* </label><input name="fondo" type="number" step="0.01" required="required" class="form-control">
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label">Nota </label><input name="nota" type="text" class="form-control">
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
    </form>
    </div>
    </div>
    </div>