<?php session_start();
?>

<html>
<head>

<title> Homepage </title>
</head>

<body>
<link rel="stylesheet" type="text/css" href="CSS/style.css?ts=<?=time()?>&quot">

    <h2> WEB_APP2 </h2>

	<h3> Gestione database </h3>	
	
	<?php

		if(isset($_SESSION['login'])){
			if($_SESSION['login'])
				echo "Benvenuto: <i><b> " . $_SESSION['user'] . "</i></b><br>";
		}else
			echo "<i>Non sei loggato</i><br>";
			
			

	?>
	<br><a href='welcome.php'>Vai all'area riservata del sito</a> <br>
	<a href='login.php'>Login</a><br>
	<a href='registrazione.php'>Registrati</a><br>
	<a href='logout.php'>Logout</a>

			
</body>

</html>