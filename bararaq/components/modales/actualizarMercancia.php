<div id="actualizarMercancia-<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
    <form enctype="multipart/form-data" method="post">

    <div class="modal-header">
        <h4 class="modal-title" id="standard-modalLabel">Actualizar mercancia</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">
    <div class="row g-2">

        <div class="mb-3 col-md-6">
            <label class="form-label">Nombre</label><input value="<?php echo $mercancias[$i]["nombre"]; ?>" name="nombre" type="text" class="form-control">
        </div>

        <div class="mb-3 col-md-6">
            <label class="form-label">Codigo</label>
            <div class="input-group">
                <input name="codigo" id="codigo-<?php echo $i; ?>" value="<?php echo $mercancias[$i]["codigo"]; ?>" type="text" class="form-control">
                <button type="button" class="btn btn-soft-secondary" type="button"
                        onclick="generar_codigo('codigo-<?php echo $i; ?>')">
                        Generar
                </button>
            </div>
        </div>

        <div class="mb-3 col-md-6">
            <label class="form-label">Categoria</label>
            <select name="categoria" class="form-control">
            <?php for($j = 0; $j < count($categorias); $j++){ echo "<option value='{$categorias[$j]["id"]}'>{$categorias[$j]["nombre"]}</option>"; } ?>
            </select>
        </div>

         <div class="mb-3 col-md-6">
            <label class="form-label">Medida</label>
            <select name="medida" class="form-control">
            <?php for($j = 0; $j < count($medidas); $j++){ echo "<option value='{$medidas[$j]["id"]}'>{$medidas[$j]["nombre"]}</option>"; } ?>
            </select>
        </div>

        <div class="mb-3 col-12"><label class="form-label">Imagen</label><input name="imagen" type="file" accept="image/*" class="form-control"></div>

        <div class="mb-3 col-12">
            <label class="form-label">Descripcion</label>
            <textarea rows="3" name="descripcion" class="form-control"><?php echo $mercancias[$i]["descripcion"]; ?></textarea>
        </div>

        <input type="text" hidden="hidden" name="actualizar" value="<?php echo $mercancias[$i]["id"]; ?>">

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