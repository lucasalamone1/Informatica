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

session_start(); // Avvia la sessione php.
$_POST['nome']="";
$_POST['psw']="";
?>

<!DOCTYPE html>
<head>

<title> Login </title>
<link rel="stylesheet" type="text/css" href="css/stile.css">
</head>

<body>

    <div class="form-box">

        <h1> Richiesta credenziali </h1>
            <div class="input-box">
                <form action="Benvenuto.php" method="POST">
                    <input class="name" type="text" name="nome" placeholder="Username"><br>
					<?php
						$_SESSION['nome']=$_POST['nome'];
					?>
					
					<input type="password" name="psw" placeholder="Password">
					
					<?php
						$_SESSION['psw']=$_POST['psw'];
					?>
            </div>

            <div class="input-box2" align="center" >
                <br> <input type="submit" value="LOGIN"></br>
                </form>
            </div>
<?php 		
		
 
?>
</body>

</html>