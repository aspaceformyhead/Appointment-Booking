<?php require_once __DIR__ . '/../../app/controller.php';
    $controller = new Controller();
    ?>





<html>
    <head>
<link rel="stylesheet" href="../../static/css/default.css">


    </head>

<body>
    <main class="body">
        <?php $controller->header("HOME");
        $controller->about();
        $controller->footer();

        ?>

    </main>
</body>

</html>