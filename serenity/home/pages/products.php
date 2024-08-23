<?php require_once __DIR__ . '/../../app/controller.php';
    $controller = new Controller();
    ?>

<html>
<link rel="stylesheet" href="../../static/css/defaultStyles/default.css">

<body>
    <main>
        <?php $controller->header("Store");
        $controller->products();
        $controller->footer();
        ?>

    </main>
</body>

</html>
