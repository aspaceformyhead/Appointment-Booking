<?php 
    require_once __DIR__ . '/../app/controller.php';
    $controller = new Controller();
    ?>

<html>
    <head>
    <link rel="stylesheet" href="../static/css/defaultStyles/default.css">
<link rel="stylesheet" href="../static/css/menu/home.css">
    
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







    