<?php
    session_start();                            //	Questa funzione avvia una nuova sessione o riprende quella esistente.
    echo "<b>Logout effettuato</b><br>";
    session_destroy();                          //  Con session_destroy() distruggo tutti i dati associati alla sessione corrente. 

    echo "<a href='index.php'>Home</a> <br>";
?>

<html>
<body>
<head><title>Pagina Logout </title></head>
<link rel="stylesheet" type="text/css" href="CSS/style.css?ts=<?=time()?>&quot">
</body>
</html>