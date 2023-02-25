<?php session_start();

  if(!isset($_SESSION['login'])){                                                        
 
		echo "<b> Esegui il login per accedere alla sezione riservata!</b><br>";	
        echo "<br><a href='login.php'>Login</a><br>";
        echo "<a href='index.php'>Home</a><br>";
		
    }else{  
        if($_SESSION['login']){
            echo "<b>BENVENUTO NELLA SEZIONE RISERVATA</b><br>";        
            echo "<a href='index.php'>Home</a><br>";
            echo "<a href='logout.php'>Logout</a><br>";
            echo "<a href='updatePsw.php'>Cambia password</a><br>";
            echo "<a href='deleteAcc.php'>Elimina account</a><br>";

        }
        else{
            echo "<b> Esegui il login per accedere alla sezione riservata!</b><br>";	
            echo "<br><a href='login.php'>Login</a><br>";
            echo "<a href='index.php'>Home</a><br>";
        }                                                                
        
    }
?>
<link rel="stylesheet" type="text/css" href="CSS/style.css?ts=<?=time()?>&quot">