<?php
define("cssPath","../../static/css/");   
define("imgPath","../../static/images/");
define("header","layout/header.css");

$css=cssPath . header;
$img=imgPath;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--<link rel="stylesheet" href="../../static/css/layout/header.css">-->

<link rel="stylesheet" href="<?= htmlspecialchars($css)?>">


</head>
<body>
<header>
    <img src="<?= htmlspecialchars($img)?>2.png" alt="">
    <ul>
        <a href="../../home/pages/homepg.php"
         class="a <?php echo isset($page) && $page === 'Home' ? 'active' : ''; ?>" >Home </a>
        <a href="../../home/pages/aboutUs.php"
        class=" a<?php echo isset($page) && $page === 'About Us' ? 'active' : ''; ?>">About Us</a>
        <a href="../../home/pages/products.php"
        class="a <?php echo isset($page) && $page === 'Store' ? 'active' : ''; ?>">Products</a>
        <a href="" class="a">Contact Us</a>
        <a href="../../home/pages/form.php" class="a <?php echo isset($page) && $page === 'Register' ? 'active' : ''; ?>">Login </a>
        <a href=""><i class="a fa fa-question-circle fa-lg" aria-hidden="true"></i></a>
        <a href="../../home/pages/appointment.php" class="">
        <button class="primary" href>Appointment</button>
        </a>


    </ul>
    

</header>
    
</body>
</html>


