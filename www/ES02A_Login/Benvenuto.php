<!DOCTYPE html>
    <head>
        <title> Pagina riservata </title>
        <link rel="stylesheet" href="css/stile.css">
    </head>

    <body>

<?php 

    $user=$_POST["nome"];
    $psd=$_POST["psw"];

    if ($user!="Luca"|| $psd!="admin") {
        echo "<h2> Nome utente o password errati. </h2>";

    } else {
        echo "<h2> Benvenuto nell'area personale</h2>";
    }
        

?>

    </body>



</html>
