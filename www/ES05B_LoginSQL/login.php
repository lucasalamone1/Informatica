<?php   session_start();
    require 'functions.php';
?>

<html>
        <head>
            <title> Login </title>
            <link rel="stylesheet" type="text/css" href="CSS/style.css?ts=<?=time()?>&quot">
        </head>
    <body>

<?php

    $privacy = isset($_POST['privacy']) ? $_POST['privacy'] : 'false';      //$privacy vale 'true' se il checkbox "privacy" è stato selezionato nel form, altrimenti il suo valore è false


        if(!isset($_SESSION['login'])){                                     //se login non è avvalorato controllo se è stato schiacciato il tasto LOGIN
            if(!isset($_POST['invia'])){                                    //se non è avvalorato l'utente vedrà il form del login
                formLogin();     
            }else{
                if(isset($_POST['privacy'])){
                    if($privacy)
                        login();
                    else{
                        echo "<b>Devi accettare l'informativa sulla privacy!</b><br>";
                        echo "<a href='login.php'>LOGIN</a>";
                    }
                }else{
                    echo "<b>Devi accettare l'informativa sulla privacy!</b><br>";
                    echo "<a href='login.php'>LOGIN</a>";
                }
               
            }   		
        }
        else{                                                               //se login è avvalorato controllo se la variabile di sessione è true o false
            if(!$_SESSION['login']){                                        //se è false controllo se il tasto login è stato schiacciato
                if(!isset($_POST['invia'])){        
                    formLogin();   
                }else{
                    login(); 
                }
            }else{                                                         //se la variabile di sessione è gia avvalorata significa che sono gia loggato
                echo "<h2> SEI GIA LOGGATO! </h2>";
                echo "<a href='welcome.php'>AVANTI</a><br>";
                echo "<a href='logout.php'>LOGOUT</a>";
            }           
        }
    
 ?>           
    </body>
    </html>