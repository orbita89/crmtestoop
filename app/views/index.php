<?php
if($_SERVER['REQUEST_URI'] == '/test1/index.php'){
    header('Location: /test1/');
    exit();
}

$title = 'Home page';
ob_start(); 
?>

<h1>Главная</h1>

<?php $content = ob_get_clean(); 

include 'app/views/layout.php';
?>