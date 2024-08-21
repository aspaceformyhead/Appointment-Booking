<?php require_once __DIR__ . '/../../app/controller.php';
    $controller = new Controller();
    ?>





<html>
    <head>
<link rel="stylesheet" href="../../static/css/defaultStyles/default.css">


    </head>

<body>
    <main class="body">
        <?php $controller->header("HOME");
        $controller->about();
        $controller->footer();

        ?>

    </main>
    <script>
        // Select the .rep element
        const repElement = document.querySelector('.rep');

        // Add event listener for mouse enter
        repElement.addEventListener('mouseenter', () => {
            repElement.classList.add('slideFromBottom1');
        });

        // Optionally, reset the animation when the mouse leaves
        repElement.addEventListener('mouseleave', () => {
            repElement.classList.remove('slideFromBottom1');
        });
    </script>
</body>

</html>