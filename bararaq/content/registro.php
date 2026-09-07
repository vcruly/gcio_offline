<div class="auth-box d-flex align-items-center">
<div class="container-xxl">
<div class="row align-items-center justify-content-center">
<div class="col-xl-10">
<div class="card rounded-4">
<div class="row justify-content-between g-0">

    <div class="col-lg-6">
    <div class="card-body">

        <div class="auth-brand text-center mb-4">
            <a href="index.php" class="logo-dark"><img src="assets/images/logos/logo-dark.png" alt="dark logo" height="32"></a>
            <a href="index.php" class="logo-light"><img src="assets/images/logos/logo-light.png" alt="logo" height="32"></a>
            <h4 class="fw-bold mt-4">Bienvenido</h4>
            <p id="connection-status-text" class="w-lg-75 mx-auto"></p>
        </div>

        <form>
            <div class="mb-3">
            <label class="form-label">Email<span class="text-danger">*</span></label>
            <div class="input-group">
                <span class="input-group-text bg-light"><i class="ti ti-mail text-muted fs-xl"></i></span>
                <input type="email" class="form-control" required>
            </div>
            </div>

            <div class="mb-3">
            <label class="form-label">Contrase&ntilde;a <span class="text-danger">*</span></label>
            <div class="input-group">
                <span class="input-group-text bg-light"><i class="ti ti-lock-password text-muted fs-xl"></i></span>
                <input type="password" class="form-control" required>
            </div>
            </div>

            <div class="d-grid mt-3">
                <button type="submit" id="btn-registrar" class="btn btn-primary fw-semibold py-2">Registrar cuenta</button>
            </div>
        </form>

        <p class="text-muted text-center mt-4 mb-0">
            Ya tiene cuenta? <a href="login.php" class="text-decoration-underline link-offset-3 fw-semibold">Acceda al sistema offline</a>
        </p>

        <p class="text-center text-muted mt-4 mb-0">
            &copy;
            <script>document.write(new Date().getFullYear())</script> GCIO - Offline<span class="fw-semibold"></span>
        </p>
    </div>
    </div>

    <div class="col-lg-6 d-none d-lg-block">
    <div style="background: url(assets/images/bgs/2.jpg) center; background-size: cover"
         class="h-100 position-relative card-side-img rounded-end-4 rounded-end rounded-0 overflow-hidden">
        <div class="p-4 card-img-overlay rounded-4 rounded-start-0 auth-overlay d-flex align-items-end justify-content-center">

        </div>
    </div>
    </div>
    
</div>
</div>
</div>
</div>
</div>
</div>


<script>

    const text = document.getElementById('connection-status-text');
    const btn_registrar = document.getElementById('btn-registrar');
    const INTERVALO = 10000; // 10 segundos

    function actualizar_estado(online) {
        if (online) {
            text.textContent = 'Tiene conexion con el servidor. Se puede proceder con el registro';
            text.classList.add("text-success")
            btn_registrar.disabled = false;
        } else {
            text.textContent = 'Actualmente no tiene conexion. El registro no se podra llevar a cabo';
            text.classList.add("text-danger")
            btn_registrar.disabled = true;
        }
    }

    async function verificarConexionReal() {
        try {
            const respuesta = await fetch('https://gcio.com/ping.php', {
                method: 'HEAD',
                cache: 'no-store'
            });
            actualizar_estado(respuesta.ok);
        } catch (error) {
            actualizar_estado(false);
        }
    }

    // Verificación inicial
    verificarConexionReal();

    // Verificación periódica
    setInterval(verificarConexionReal, INTERVALO);

    // Reaccionar también a eventos del navegador
    window.addEventListener('online', verificarConexionReal);
    window.addEventListener('offline', () => actualizar_estado(false));

</script>
