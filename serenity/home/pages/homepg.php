<?php require_once __DIR__ . '/../../app/controller.php';
    $controller = new Controller();
    ?>

<html>
    <head>
    <link rel="stylesheet" href="../../static/css/defaultStyles/default.css">
    </head>
    <body>

 <main>
 <?php $controller->header("HOME");?>

       <?php $controller->home();
         
        ?>
      <?php  $controller->footer();?>

 </main>


    </body>
</html>







    