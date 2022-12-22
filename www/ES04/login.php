<?php
    session_start();                                // Questa funzione avvia una nuova sessione o riprende quella esistente.

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

    if($user!="Luca"||$psd!="admin"){                       //  Se vengono inserite le credenziali errate la sessione verrà messa a FALSE
        
        echo "<h2> Credenziali errate </h2>";
        echo "<a href='login.php'>Login</a><br>"; 
        echo "<a href='index.php'>Home</a>"; 
        $_SESSION['nome']=false;
    }
        
    else{                                                   //  Se vengono inserite le credenziali corrette la sessione verrà messa a TRUE. 
        header("location:PaginaRiservata.php");             //  Con la funzione header() sarà fatta una redirect a PaginaRiservata.php
        $_SESSION['nome']=true;
    }
        
}
		
?>
</body>

</html>