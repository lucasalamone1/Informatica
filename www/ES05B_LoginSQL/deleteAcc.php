<?php 
session_start();
require 'functions.php';
?>

<html>
<head> <link rel="stylesheet" type="text/css" href="CSS/style.css?ts=<?=time()?>&quot"></head>
    <?php 
        
        $user=$_SESSION['user'];
        deleteAccount($user);

        session_destroy();
    ?>
</html>