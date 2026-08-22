<div id="actualizarArea-<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
    <form method="post">
        <div class="modal-header">
            <h4 class="modal-title" id="standard-modalLabel">Actualizar area</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="row g-2">

            <div class="mb-3 col-md-6">
                <label class="form-label">Nombre</label><input value="<?php echo $areas[$i]["nombre"]; ?>" name="nombre" type="text" class="form-control">
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label">Codigo</label><input value="<?php echo $areas[$i]["codigo"]; ?>" name="codigo" type="text" class="form-control">
            </div>

            <div class="mb-3 col-12">
                <label class="form-label">
                <div class="form-check form-switch form-check-reverse form-check-success">
                    <label class="form-check-label" for="switch1">Precio de venta por formula</label>
                    <input type="checkbox" name="tipo_costo" class="form-check-input" id="switch1" checked>
                </div>
                </label>
                <input name="formula_costo" value="<?php echo $areas[$i]["formula_costo"]; ?>" style="text-transform: uppercase;"
                       oninput="this.value=this.value.toUpperCase()" type="text" class="form-control">

                <div class="alert alert-secondary p-3 d-flex mt-2 mb-0" role="alert">
                <div>
                    <h4 class="alert-heading">CC = Valor del costo de compra</h4>
                    <p>Ejemplo:</p>
                    <hr class="border-secondary border-opacity-25">
                    <p class="mb-0">7 + 5 * CC <br> CC + 1 (CC/100)</p>
                </div>
                </div>
            </div>

            <input type="text" hidden="hidden" name="actualizar" value="<?php echo $areas[$i]["id"]; ?>">

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