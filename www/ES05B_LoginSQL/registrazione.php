<?php 
session_start();

require 'functions.php';

echo "<link rel='stylesheet' type='text/css' href='CSS/style.css?ts=<?=time()?>&quot'> ";

if(!isset($_POST['invia']))
    formRegistrazione($errUser,$errVia,$errEmail,$errPassword);
else    
    registrazione();

?>