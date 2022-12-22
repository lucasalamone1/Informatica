<?php
    session_start();
?>

<html>
    <body>


    <?php

        if(!$_SESSION['nome']){

            echo "<b> Esegui il login per accedere alla sezione riservata!</b><br>";	
            echo "<br><a href='login.php'>Login</a><br>";
            echo "<a href='index.php'>Home</a><br>";

        }else{
            
            echo "<b>BENVENUTO NELLA SEZIONE RISERVATA</b><br>";
            echo "<a href='logout.php'>Logout</a><br>";
            echo "<a href='index.php'>Home</a><br>";
        }
    ?>
    </body>

</html>