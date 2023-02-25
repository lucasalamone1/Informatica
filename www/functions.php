<?php   
global $pdo;    
define('DB_SERVER', 'localhost');
define('DB_NAME', 'web_app2');
define('DB_USER', 'root');
define('DB_PASSWORD', '');


//////////////////
// FUNZIONE LOGIN

try{
    function login(){
        
        $user=$_POST['nome'];
        $psd=$_POST['psw'];
        $pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);

        $query = "SELECT * FROM utente WHERE username='$user' AND password='$psd'";
        $result = $pdo->query($query);

        if ($result->rowCount() > 0){
            $_SESSION['login']=true;
            $_SESSION['user']=$user;
        }
            
        else
            $_SESSION['login']=false;

        if($_SESSION['login']){
            echo "<h2> Accesso consentito: " . $user ."</h2>";
            echo "<a href='welcome.php'>AVANTI</a><br>";
            echo "<a href='logout.php'>LOGOUT</a>";

        }else {
            echo "<h2> Nome utente o password errati. </h2>";
            echo "<a href='index.php'>HOME</a><br>";
            echo "<a href='registrazione.php'>Registrati</a><br>";
        }
    }
}catch(PDOException $e){
	echo "Errore di esecuzione della query." . $e->getMessage();
}

//////////////////
// FUNZIONE FORM
    function form(){?>
        <div class="form-box">
                            
            <h1> Richiesta credenziali </h1>
                
                    <form action="login.php" method="POST">
                        <input class="input-boxN" type="text" name="nome" placeholder="Username"><br>
    
                        <input class="input-boxP" type="password" name="psw" placeholder="Password">                    
                <hr>
    
                <div class="input-box2" align="center">
                    <br> <input type="submit" name="invia" value="LOGIN"></br>
                    <a href='registrazione.php'><span style="color:red">Registrati</a></span><br>
                    <a href='updatePsw.php'><span style="color:red">Reset password</a></span>
                    </form>
                </div>
        
        </div>
 <?php   }
    

    function deleteAccount($user){
        
        $pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $query = "DELETE FROM utente WHERE username='$user'";
        $pdo->query($query);

        echo "<h1>Account eliminato correttamente</h1>";
        echo "<a href='index.php'>HOME</a><br>";


    }


//////////////////
// FUNZIONE AGGIORNAMENTO PASSWORD
    function updatePsw()
{
        ?>
        <link rel="stylesheet" type="text/css" href="CSS/style.css?ts=<?=time()?>&quot">
<?php

        $pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);

        $user=$_POST['nome'];
        $psd=$_POST['psw'];

        //controllo se esiste uno username associato alla password
        $query2 = "SELECT * FROM utente WHERE username='$user'";        
        $result = $pdo->query($query2);

        if($result->rowCount() > 0)
            $flag=true;
        else
            $flag=false;
        
        //estraggo il valore della password dal database per vedere se è uguale a quella nuova
        $query3 = "SELECT password FROM utente WHERE username='$user'";
        $result2 = $pdo->query($query3);

        //il contenuto di result2 viene messo in un array
        $row = $result2->fetch(PDO::FETCH_ASSOC);
        $password = $row['password'];

    
    if($psd!=NULL){
        if($password!=$psd)         //controllo se la password vecchia è uguale a quella nuova
        {
                if($flag)           //flag: username esistente          !flag: username non esiste
                {
                    $query = "UPDATE utente SET password='$psd' WHERE username='$user' ";
                    $pdo->query($query);
                    echo "<h1>La password è stata cambiata</h1><br>";
                    echo "<a href='index.php'>HOME</a><br>";
                    echo "<a href='updatePsw.php'>Cambia password</a><br>";
                }else{
                    echo "<h1>Username non trovato</h1><br>";
                    echo "<a href='index.php'>HOME</a><br>";
                    echo "<a href='updatePsw.php'>Cambia password</a><br>";
                }

        }else{
            echo "<h1>La nuova password non può essere uguale a quella vecchia!</h1>";
            echo "<a href='index.php'>HOME</a><br>";
            echo "<a href='updatePsw.php'>Cambia password</a><br>";
            }
    }else
        echo "<h1>La password non può essere vuota!</h1>";
        

} //chiusura funzione
        


//////////////////
// FUNZIONE REGISTRAZIONE

    
    function registrazione(){

    if(!isset($_POST['invia'])){
        
        
    $errUser="";
    $errVia="";
    $errEmail="";
    $errPassword="";
    ?>

        <html>
    <body>
    <link rel="stylesheet" type="text/css" href="CSS/style.css?ts=<?=time()?>&quot">

	<div class="form-box">
    <h1> REGISTRAZIONE </h1>    

    <form action="registrazione.php" method="POST">

    <span class="errore"><?php echo $errUser;?></span>
            <input class="input-username" type="text" name="username" placeholder="Username">

    <span class="erroreVia"><?php echo $errVia;?></span><br>
            <input class="input-indirizzo" type="text" name="via" placeholder="Via *">  <br>

    <span class="errore"><?php echo $errEmail;?></span><br>
            <input class="input-email" type="text" name="email" placeholder="Email *"><br>
   
    <span class="errore"><?php echo $errPassword;?></span><br>
            <input class="input-password" type="password" name="psw" placeholder="Password *">
            
    <hr> <!-- linea -->

    <div class="input-box2" align="center">
        <br> <input type="submit" name="invia" value="REGISTRATI"></br>    
    </div>
    
    </form>
            
 <?php   
 }else
 {
    echo "<link rel='stylesheet' type='text/css' href='CSS/style.css?ts=<?=time()?>&quot'> ";
    $flag=true;
    $user="";
    $Email="";
    $psd="";
    $Via="";

    $user=$_POST['username'];
    $Email=$_POST['email'];
    $psd=$_POST['psw'];
    $Via=$_POST['via'];


    if($user==""){
        $errNome="Campo obbligatorio";
        $flag=false;
    }

    if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}+$/", $Email)){
        $errEmail="Email non valida";
        $flag=false;

    }

    /*if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}+$/",$psd)){
        $errPassword="Password non valida";
        $flag=false;
        echo "password false<br>";

    }

    if($psd==""){
        $errPassword="Campo obbligatorio";
        $flag=false;
        echo "password false<br>";

    }*/

    if(!preg_match("/^[a-zA-Z]+[\,][ 0-9]+$/", $Via)){
        $errVia="Via non valida";
        $flag=false;
    }

    if($Via==""){
        $errVia="Campo obbligatorio";
        $flag=false;
    }

        $pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);

        if($flag==true){
            $query = "INSERT INTO utente(username,password,email,indirizzo) VALUES('$user','$psd','$Email','$Via')";
            $pdo->query($query);
            echo "<h1> REGISTRAZIONE COMPLETATA</h1>";
            echo "<a href='index.php'>Home</a> <br>";
        }
        

} 
    }
  ?>  

    
</body>
</html>