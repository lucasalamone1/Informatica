<?php
    session_start();                                                                    //	Questa funzione avvia una nuova sessione o riprende quella esistente.
?>

<html>
<head> <title> Pagina Riservata </title></head>
    <body>

    <?php
        if(!$_SESSION['nome']){                                                         //  Se la sessione è settata a FALSE non potrò accedere alla pagina riservata

            echo "<b> Esegui il login per accedere alla sezione riservata!</b><br>";	
            echo "<br><a href='login.php'>Login</a><br>";
            echo "<a href='index.php'>Home</a><br>";

        }else{                                                                          //  Se la sessione è settata a TRUE potrò accedere alla pagina riservata

            echo "<b>BENVENUTO NELLA SEZIONE RISERVATA</b><br>";        
            echo "<a href='logout.php'>Logout</a><br>";
            echo "<a href='index.php'>Home</a><br>";
        }
    ?>
    </body>
</html>