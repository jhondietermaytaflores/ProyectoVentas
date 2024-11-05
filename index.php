<?php

    require_once "./config/app.php";
    require_once "./autoload.php";

    /*---------- Iniciando sesion ----------*/
    require_once "./app/views/inc/session_start.php";

    if(isset($_GET['views'])){
        $url=explode("/", $_GET['views']);
    }else{
        $url=["login"];
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once "./app/views/inc/head.php"; ?>
</head>
<body>
    <?php
        use app\controllers\viewsController;
        use app\controllers\loginController;
        use app\controllers\ApiController;

        $insLogin = new loginController();
        $viewsController= new viewsController();

        //1
        if (isset($_GET['views']) && strpos($_GET['views'], 'api') === 0) {
            $apiController = new ApiController();

            switch ($_GET['views']) {
                case 'api/productos':
                    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                        $apiController->getProductos();
                    }
                    break;
                // +Rutas
            }
            exit(); 
        }
        //1

        //continuar si no es api query
        $vista=$viewsController->obtenerVistasControlador($url[0]);
        if($vista=="login" || $vista=="404"){
            require_once "./app/views/content/".$vista."-view.php";
        }else{
    ?>
    <main class="page-container">
    <?php
            # Cerrar sesion #
            if((!isset($_SESSION['id']) || $_SESSION['id']=="") || (!isset($_SESSION['usuario']) || $_SESSION['usuario']=="")){
                $insLogin->cerrarSesionControlador();
                exit();
            }
            require_once "./app/views/inc/navlateral.php";
    ?>      
        <section class="full-width pageContent scroll" id="pageContent">
            <?php
                require_once "./app/views/inc/navbar.php";

                require_once $vista;
            ?>
        </section>
    </main>
    <?php
        }

        require_once "./app/views/inc/script.php"; 
    ?>
</body>
</html>