<div class="auth-box d-flex align-items-center">
<div class="container-xxl">
<div class="row align-items-center justify-content-center">
<div class="col-xl-10">
<div class="card rounded-4">
<div class="row justify-content-between g-0">


<div class="col-lg-6">
<div class="card-body">
    <div class="auth-brand text-center mb-4">
        <a href="index.html" class="logo-dark"><img src="assets/images/logos/logo-light.png" height="100"></a>
        <a href="index.html" class="logo-light"><img src="assets/images/logos/logo-dark.png" height="100"></a>
        <h4 class="fw-bold mt-4">Bienvenido!</h4>
        <p class="text-muted w-lg-75 mx-auto">Gestion y Control de Inventarios Online</p>
    </div>

    <?php echo $msg; ?>

    <form method="post">
        <div class="mb-3">
        <label for="userEmail" class="form-label">Email de usuario<span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text bg-light"><i class="ti ti-mail text-muted fs-xl"></i></span>
            <input type="email" class="form-control" name="email" id="userEmail" required>
        </div>
        </div>

        <div class="mb-3">
        <label for="userPassword" class="form-label">Contrase&ntilde;a  <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text bg-light"><i class="ti ti-lock-password text-muted fs-xl"></i></span>
            <input type="password" class="form-control" id="userPassword" name="password" required>
        </div>
        </div>

        <div class="d-grid"><button type="submit" class="btn btn-primary fw-semibold py-2 mt-3">Acceder al sistema</button></div>
    </form>

    <p class="text-center text-muted mt-4 mb-0">&copy;<script>document.write(new Date().getFullYear())</script> GCIO</p>
</div>
</div>


<div class="col-lg-6 d-none d-lg-block">
<div class="h-100 position-relative card-side-img rounded-end-4 rounded-end rounded-0 overflow-hidden">
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