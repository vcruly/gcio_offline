<div id="actualizarUsuario-<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
    <form method="post">
        <div class="modal-header">
            <h4 class="modal-title" id="standard-modalLabel">Actualizar usuario</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="row g-2">

            <div class="mb-3 col-md-6">
                <label class="form-label">Nombre</label><input value="<?php echo $usuarios[$i]["nombre"]; ?>" name="nombre" type="text" class="form-control">
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label">Password</label><input name="password" type="text" class="form-control">
            </div>

            <div class="mb-3 col-12">
                <label class="form-label">Email</label><input value="<?php echo $usuarios[$i]["email"]; ?>" name="email" type="text" class="form-control">
            </div>

            <div class="mb-3 col-md-6"><label class="form-label">Rol </label>
            <select name="rol" class="form-control">
            <?php

                for($j = 0; $j < count($roles); $j++){

                    $nombre = $roles[$j]["nombre"];
                    $id = $roles[$j]["id"];
                    $selected = $id == $usuarios[$j]["rol"] ? "selected" : "";

                    echo "<option $selected value='$id'>$nombre</option>";
                }
             ?>
            </select>
            </div>

            <div class="mb-3 col-md-6"><label class="form-label">Area</label>
            <select name="area" class="form-control">
            <option value='todas'>Todas</option>
            <?php

                for($j = 0; $j < count($areas); $j++){

                    $nombre = $areas[$j]["nombre"];
                    $id = $areas[$j]["id"];
                    $selected = $id == $usuarios[$j]["area"] ? "selected" : "";

                    echo "<option $selected value='$id'>$nombre</option>";
                }
             ?>
            </select>
            </div>

            <input type="text" hidden="hidden" name="actualizar" value="<?php echo $usuarios[$j]["id"]; ?>">

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