<link rel="stylesheet" href="serenity\static\css\admin\admin.css">

<?php
$controller = new Controller();
?>
<html>

<body class="admin">
    <?php $controller->menu() ?>
    <main>
        <?php $controller->nav();
        $controller->dashboard();
        $controller->adAppointment();
        $controller->reviews();
        $controller->inventory();
        $controller->settings();
        $controller->footer();
        ?>

    </main>
    <script src="serenity\static\javaScript\admin.js"></script>
</body>


</html>