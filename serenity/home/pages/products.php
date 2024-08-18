<link rel="stylesheet" href="serenity\static\css\default.css">

<?php
$controller = new Controller();
?>
<html>

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