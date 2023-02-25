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
    if(!isset($_SESSION['login'])){
		if(!isset($_POST['invia'])){        
            form();     
        }else{
            login();
        }   		
	}
    else{
        if(!$_SESSION['login']){
            if(!isset($_POST['invia'])){        
                form();   
            }else{
                login();
            }
        }else{
            echo "<h2> SEI GIA LOGGATO! </h2>";
            echo "<a href='welcome.php'>AVANTI</a><br>";
            echo "<a href='logout.php'>LOGOUT</a>";
        }           
    }
		
 ?>           
    </body>
    </html>