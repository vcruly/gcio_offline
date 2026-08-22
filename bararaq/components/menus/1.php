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

        <!-- Venta -->
        <div class="dropdown">
        <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-package-export"></i> Venta <div class="menu-arrow"></div>
        </a>
        <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
        <?php

            for($i = 0; $i < count($areas); $i++){

                $area = $areas[$i]["id"];
                $datos = base64_encode("venta|$area");

                echo "<a href='operaciones.php?x=$datos' class='dropdown-item'>{$areas[$i]["nombre"]}</a>";
            }
         ?>
        </div>
        </div>

        <!-- Salida -->
        <div class="dropdown">
        <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-credit-card-pay"></i> Salida <div class="menu-arrow"></div>
        </a>
        <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
        <?php

            for($i = 0; $i < count($areas); $i++){

                $area = $areas[$i]["id"];
                $datos = base64_encode("salida|$area");

                echo "<a href='operaciones.php?x=$datos' class='dropdown-item'>{$areas[$i]["nombre"]}</a>";
            }
         ?>
        </div>
        </div>

        <!-- Merma -->
        <div class="dropdown">
        <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-package-off"></i> Merma <div class="menu-arrow"></div>
        </a>
        <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
        <?php

            for($i = 0; $i < count($areas); $i++){

                $area = $areas[$i]["id"];
                $datos = base64_encode("merma|$area");

                echo "<a href='operaciones.php?x=$datos' class='dropdown-item'>{$areas[$i]["nombre"]}</a>";
            }
         ?>
        </div>
        </div>

        <!-- Ajuste -->
        <div class="dropdown">
        <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-brand-pnpm"></i> Ajuste <div class="menu-arrow"></div>
        </a>
        <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
        <?php

            for($i = 0; $i < count($areas); $i++){

                $area = $areas[$i]["id"];
                $datos = base64_encode("ajuste|$area");

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
            <a href="areas.php" class="dropdown-item">Areas</a>
            <a href="socios.php" class="dropdown-item">Socios</a>
            <a href="categorias.php" class="dropdown-item">Categorias</a>
            <a href="mercancias.php" class="dropdown-item">Mercancias</a>
        </div>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle drop-arrow-none" href="#" id="registros" data-bs-toggle="dropdown" role="button" aria-haspopup="true"
           aria-expanded="false">
            <span class="menu-icon"><i class="ti ti-files"></i></span>
            <span class="menu-text"> Reportes </span>
            <div class="menu-arrow"></div>
        </a>
        <div class="dropdown-menu" aria-labelledby="operaciones">
            <a href="registros.php?tipo=compra" class="dropdown-item">Compra</a>
            <a href="registros.php?tipo=venta" class="dropdown-item">Venta</a>
            <a href="registros.php?tipo=salida" class="dropdown-item">Salida</a>
            <a href="registros.php?tipo=merma" class="dropdown-item">Merma</a>
            <a href="registros.php?tipo=ajuste" class="dropdown-item">Ajuste</a>
        </div>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="usuarios.php"><span class="menu-icon"><i class="ti ti-users"></i></span><span class="menu-text">Usuarios</span></a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="turnos.php"><span class="menu-icon"><i class="ti ti-calendar-time"></i></span><span class="menu-text">Turnos</span></a>
    </li>

</ul>
</div>
</nav>
</nav>
</header>