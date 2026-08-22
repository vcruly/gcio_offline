<header class="topnav">
<nav class="navbar navbar-expand-lg">
<nav class="container-fluid">
<div class="collapse navbar-collapse" id="topnav-menu-content">
<ul class="navbar-nav">

    <li class="nav-item">
        <a class="nav-link" href="index.php"><span class="menu-icon"><i class="ti ti-home"></i></span><span class="menu-text">Inicio</span></a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="ipv.php"><span class="menu-icon"><i class="ti ti-presentation-analytics"></i></span><span class="menu-text">IPV</span></a>
    </li>

    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle drop-arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="menu-icon"><i class="ti ti-apps"></i></span>
        <span class="menu-text">Operaciones</span>
        <div class="menu-arrow"></div>
    </a>
    <div class="dropdown-menu" aria-labelledby="topnav-apps">

        <!-- Compra -->
        <div class="dropdown">
        <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-package-import"></i> Compra <div class="menu-arrow"></div>
        </a>
        <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
        <?php

            $areas = areas();

            for($i = 0; $i < count($areas); $i++){

                $area = $areas[$i]["id"];
                $datos = base64_encode("compra|$area");

                echo "<a href='operaciones.php?x=$datos' class='dropdown-item'>{$areas[$i]["nombre"]}</a>";
            }
         ?>
        </div>
        </div>

    </div>
    </li>


    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle drop-arrow-none" href="#" id="editar" data-bs-toggle="dropdown" role="button" aria-haspopup="true"
           aria-expanded="false">
            <span class="menu-icon"><i class="ti ti-edit"></i></span>
            <span class="menu-text"> Editar </span>
            <div class="menu-arrow"></div>
        </a>
        <div class="dropdown-menu" aria-labelledby="editar">
            <a href="mercancias.php" class="dropdown-item">Mercancias</a>
        </div>
    </li>


    


















</ul>
</div>
</nav>
</nav>
        </header>