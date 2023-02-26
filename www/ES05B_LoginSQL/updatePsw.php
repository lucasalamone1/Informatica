<?php require 'functions.php'; 

if(!isset($_POST['invia'])){?>
<html>
    <head> <title> Cambio Password </title></head>
<body>
    <link rel="stylesheet" type="text/css" href="CSS/style.css?ts=<?=time()?>&quot">

    <div class="form-box">

        <h1> Cambia Password </h1>
    
        <form action="updatePsw.php" method="POST">
            <input class="input-boxN" type="text" name="nome" placeholder="Username"><br>
            
            <input class="input-boxP" type="password" name="psw" placeholder="Password">                    
    <hr>

        <div class="input-box2" align="center">
            <br> <input type="submit" name="invia" value="CAMBIA"></br>
            </form>
        </div>
    </div>
<?php }else{
    updatePsw(); 
}?>

</body>
</html>