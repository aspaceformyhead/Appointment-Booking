<?php require_once __DIR__ . '/../../app/controller.php';
    $controller = new Controller();
    ?>

<html>
<link rel="stylesheet" href="../../static/css/default.css">

<body>
    <main>
        <?php $controller->header("HOME");
        $controller->products();
        $controller->footer();
        ?>

    </main>
</body>

</html>
bjhbjb