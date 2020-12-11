<html>

    <?php 

    include_once("../../Control/Session.php");
        $sesion = new Session();

    ?>
    <head>
        <title><?php $titulo ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <!-- CSS Bootstrap -->
        <link rel="stylesheet" type="text/css" href="../CSS/Boostrap v.4.5.2/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../CSS/Boostrap v.4.5.2/bootstrapValidator.min.css">
        <!-- summernote.org CSS-->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Roboto&display=swap" rel="stylesheet">
        <!-- Personal CSS -->
        <link rel="stylesheet" type="text/css" href="../CSS/multi-style.css">
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark flex-md-nowrap p-3" style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">FiDrive  <?php $activa = $sesion->activa();  if($activa) {echo "- Bienvenido ".$sesion->getUsNombre()." ".$sesion->getUsApellido();} ?></a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <?php  
            include_once("../../configuracion.php");
            $activa = $sesion->activa(); 
            if($activa){
                include_once("../Estructura/menu.php");
            }
        ?>


