<?php
/** ****************************************************************************************
* @file login.php
* @brief <inserire una breve descrizione del modulo>
* <specifiche del progetto>
* <specifiche del collaudo>
* 
* @author <autore>
* @date <data> 
* @version 1.0 <data> <Descrivere le modifiche apportate>
* @version 1.1 <data> <Descrivere le modifiche apportate>
*/

session_start(); // Avvia la sessione php

$user="";
$psd="";
?>

<!DOCTYPE html>
<head>

<title> Login </title>
<link rel="stylesheet" type="text/css" href="css/stile.css">
</head>

<body>
<?php
if(!isset($_POST['invia'])){  
               
?>             

    <div class="form-box">

        <h1> Richiesta credenziali </h1>
            <div class="input-box">
                <form method="POST">
                    <input class="name" type="text" name="nome" placeholder="Username"><br>
					
					<input type="password" name="psw" placeholder="Password">
    </div>

            <div class="input-box2" align="center">
                <br> <input type="submit" name="invia" value="LOGIN"></br>
                </form>
            </div>
 
<?php   }
  else{

    $user=$_POST['nome'];
    $psd=$_POST['psw'];

    if($user!="Luca"||$psd!="admin"){
        
        echo "<h2> Credenziali errate </h2>";
        echo "<a href='login.php'>Login</a><br>"; 
        echo "<a href='index.php'>Home</a>"; 
        $_SESSION['nome']=false;
    }
        
    else{
        header("location:PaginaRiservata.php");
        $_SESSION['nome']=true;
    }
        
}
		
?>
</body>

</html>