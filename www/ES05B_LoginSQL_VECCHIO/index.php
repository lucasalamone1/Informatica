<?php
//$conn = new mysqli('localhost','root','','web_app2');

  define('DB_SERVER', 'localhost');
  define('DB_NAME', 'web_app2');
  define('DB_USER', 'root');
  define('DB_PASSWORD', '');

?>


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

            <div class="input-box2" align="center">
                <br> <input type="submit" name="invia" value="LOGIN"></br>
                </form>
            </div>

        </div>
        
<?php   }

      else{
          
        $user=$_POST['nome'];
        $psd=$_POST['psw'];
        $pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);

        $query = "SELECT * FROM utente WHERE username='$user' AND password='$psd'";
        $result = $pdo->query($query);

        if ($result->rowCount() > 0) {
            echo "<h2> Benvenuto " . $user ." nell'area personale</h2>";
        } else {
            echo "<h2> Nome utente o password errati. </h2>";
        }
        
        }  
    ?>  
    </body>
