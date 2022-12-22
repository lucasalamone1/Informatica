<html>
        <head>
            <title> Login </title>
            <link rel="stylesheet" type="text/css" href="CSS/style.css?ts=<?=time()?>&quot">
        </head>
    <body>

<?php
    if(!isset($_POST['invia'])){
?>      
	<div class="form-box">
	<h1> Richiesta credenziali </h1>

	<form action="index.php" method="POST">
		<input class="input-boxN" type="text" name="nome" placeholder="Username"><br>
		<input class="input-boxP" type="password" name="psw" placeholder="Password">
		<hr>
		<br> 
		<div class="input-box2" align="center">
		<input type="submit" name="invia" value="LOGIN"></br>
		</div>
	</form>
	</div>
        
<?php   }

      else{
          
        $user=$_POST['nome'];
        $psd=$_POST['psw'];
        
        if($user!="Luca"||$psd!="admin"){

            echo "<h2> Nome utente o password errati. </h2>";

        }
        else
            echo "<h2> Benvenuto " . $user ." nell'area personale</h2>";
        
        }  
    ?>  
    </body>
