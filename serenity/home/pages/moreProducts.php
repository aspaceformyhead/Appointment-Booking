<?php require_once __DIR__ . '/../../app/controller.php';
    $controller = new Controller();
    ?>

<html>
    <head>
    <link rel="stylesheet" href="../../static/css/defaultStyles/default.css">
    </head>
    <body>

 <main class="body">
 <?php $controller->header("products");?>

       <?php $controller->moreProd();?>
      <?php  $controller->footer();?>

 </main>


    </body>
</html>