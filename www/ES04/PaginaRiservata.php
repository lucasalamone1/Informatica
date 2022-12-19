<?php
session_start();
//Controllo se l'utente ha fatto il login
echo $_SESSION['nome'];
?>