<html>
        <head>
            <title> Login </title>
            <link rel="stylesheet" type="text/css" href="CSS/style.css?ts=<?=time()?>&quot">
        </head>
    <body>

<?php

    // dichiaro le variabili per la compilazione del form
    $Nome="";
    $Cognome="";
    $User="";
    $Email="";
    $psd="";
    $Cellulare="";
    $Provincia="";
    $flag=true;

    //dichiaro i possibili errori legati alla validazione dei campi
    $errNome="";
    $errCognome="";
    $errUser="";
    $errEmail="";
    $errPassword="";
    $errCellulare="";
    $errProvincia="";
    $errComune="";
    $errCap="";
    $errVia="";

    //funzione che serve per la creazione del form
function form($errNome,$errCognome,$errUser,$errEmail,$errCellulare,$errPassword,$errProvincia,$errComune,$errCap,$errVia)
{   
    global $Nome;
    global $Cognome;
    global $User;
    global $Email;
    global $psd;
    global $Cellulare;
    global $Provincia;
    global $Comune;
    global $Cap;
    global $Via;
?>

<div class="form-box">
        <h1> Richiesta credenziali </h1>    

        <form action="index.php" method="POST">                                                                 <!-- richiamo la pagina index.php -->

        <span class="errore"><?php echo $errNome;?></span>                                                      <!-- Errore che sara' visualizzato per il campo nome  -->
        <span class="erroreIndirizzo"><?php echo $errProvincia;?></span><br>                                    <!-- Errore che sara' visualizzato per il campo provincia  -->
            <input class="input-nome" type="text" name="nome" value="<?=$Nome?>" placeholder="Nome *">          <!-- creo il campo nome-->
                
            <input class="input-indirizzo" type="text" name="provincia" value="<?=$Provincia?>" placeholder="Provincia *"><br>  <!-- creo il campo provincia-->
        
        <span class="errore"><?php echo $errCognome;?></span>                                                   <!-- Errore che sara' visualizzato per il campo cognome  -->
        <span class="erroreIndirizzo"><?php echo $errComune;?></span><br>                                       <!-- Errore che sara' visualizzato per il campo comune  -->
            <input class="input-cognome" type="text" name="cognome" value="<?=$Cognome?>" placeholder="Cognome *">  <!-- creo il campo cognome -->
                
            <input class="input-indirizzo" type="text" name="comune" value="<?=$Comune?>" placeholder="Comune *">  <br> <!-- creo il campo comune -->

        <span class="errore"><?php echo $errUser;?></span>                                                      <!-- Errore che sara' visualizzato per il campo username  -->
        <span class="erroreIndirizzo2"><?php echo $errCap;?></span><br>                                         <!-- Errore che sara' visualizzato per il campo cap  -->
            <input class="input-username" type="text" name="username" value="<?=$User?>" placeholder="Username">    <!-- creo il campo username -->

            <input class="input-indirizzo" type="text" name="cap" value="<?=$Cap?>"placeholder="Cap *"><br>         <!-- creo il campo cap -->

                
        <span class="errore"><?php echo $errCellulare;?></span>                                                 <!-- Errore che sara' visualizzato per il campo cellulare  -->
        <span class="erroreIndirizzo2"><?php echo $errVia;?></span><br>                                         <!-- Errore che sara' visualizzato per il campo via  -->
            <input class="input-cellulare" type="tel" name="cellulare" value="<?=$Cellulare?>"placeholder="Cellulare">  
                
            <input class="input-indirizzo" type="text" name="via" value="<?=$Via?>" placeholder="Via *">  <br>      <!-- creo il campo via -->

            <input class="input-data" type="date" name="data"><br>                                                  <!-- creo il campo data -->
                
        <span class="errore"><?php echo $errEmail;?></span><br>                                                 <!-- Errore che sara' visualizzato per il campo email  -->
                <input class="input-email" type="text" name="email" value="<?=$Email?>" placeholder="Email *"><br>  <!-- creo il campo email -->
    
        <span class="errore"><?php echo $errPassword;?></span><br>                                              <!-- Errore che sara' visualizzato per il campo password  -->
            <input class="input-password" type="password" name="psw" value="<?=$psd?>" placeholder="Password *">    <!-- creo il campo password -->    
                

                <hr> <!-- linea prima del login -->

                <div class="login" align="center"> 
                    <br> <input type="submit" name="invia" value="LOGIN"></br>                                      <!-- pulsante di login -->
            
        </form> 
</div>
            

<?php } 

    
    //controllo se il pulsante LOGIN e' stato premuto

    if(!isset($_POST['invia'])){                        
        
    //se non e' stato premuto, richiamo la funzione che mi genera il form
    
    form($errNome,$errCognome,$errUser,$errEmail,$errCellulare,$errPassword,$errProvincia,$errComune,$errCap,$errVia);
?>
        

<?php   }
    
    //se e' stato premuto controllo che tutti i campi siano validi
    
    else{                                              
        
        $Nome=$_POST['nome'];
        $Cognome=$_POST['cognome'];
        $User=$_POST['username'];
        $Email=$_POST['email'];
        $psd=$_POST['psw'];
        $Cellulare=$_POST['cellulare'];
        $Provincia=$_POST['provincia'];
        $Comune=$_POST['comune'];
        $Cap=$_POST['cap'];
        $Via=$_POST['via'];

        //controllo validita' nome
        if(!preg_match("/^[a-zA-Z]+$/", $Nome)){
            $errNome="Nome non valido";
            $flag=false;
        }
    
       if($Nome==""){
            $errNome="Campo obbligatorio";
            $flag=false;
        }
            

        //controllo validita' cognome
        if(!preg_match("/^[ a-zA-Z\']+$/", $Cognome)){
            $flag=false;
            $errCognome="Cognome non valido";
        }
        
        if($Cognome==""){
            $errCognome="Campo obbligatorio";
            $flag=false;
        }
        //controllo validita' email
        if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}+$/", $Email)){
            $errEmail="Email non valida";
            $flag=false;
        }

        if($Email==""){
            $errEmail="Campo obbligatorio";
            $flag=false;
        }
        //controllo validita' username

         if($Nome==$User || $Cognome==$User){
            $errUser="Username non valido";   
            $flag=false;
         }

         if($User=="")
            $errUser="";
            
     
        //controllo validita' numero di telefono

        if(!preg_match("/^([\d]{3}+\ [\d]{3}+\ [\d]{4})+$/",$Cellulare)){
          $errCellulare="Telefono non valido";  
          $flag=false;
      }

      if($Cellulare=="")
        $errCellulare="";
        
        //controllo validita' password

        if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}+$/",$psd)){
            $errPassword="Password non valida";
            $flag=false;
    }
        if($psd==""){
            $errPassword="Campo obbligatorio";
            $flag=false;
        }

        //controllo validita' provincia

        if(!preg_match("/[a-zA-Z]/", $Provincia)){
            $errProvincia="Provincia non valida";
            $flag=false;
        }
    
       if($Provincia==""){
            $errProvincia="Campo obbligatorio";
            $flag=false;
        }

        //controllo validita' comune
        if(!preg_match("/^[a-zA-Z]+$/", $Comune)){
            $errComune="Comune non valido";
            $flag=false;
        }
    
       if($Comune==""){
            $errComune="Campo obbligatorio";
            $flag=false;
        }

        //controllo validita' CAP

        if(!preg_match("/^[\d]{5}+$/", $Cap)){
            $errCap="Cap non valido";
            $flag=false;
        }
    
       if($Cap==""){
            $errCap="Campo obbligatorio";
            $flag=false;
        }

        //controllo validita' via

        if(!preg_match("/^[a-zA-Z]+[\,][ 0-9]+$/", $Via)){
            $errVia="Via non valida";
            $flag=false;
        }
    
       if($Via==""){
            $errVia="Campo obbligatorio";
            $flag=false;
        }

        //se flag==true tutti i dati inseriti sono corretti
        //se flag==false almeno 1 campo non e' valido quindi verra' rieseguito il form

        if($flag)
            echo "Accesso consentito";
        else
            form($errNome,$errCognome,$errUser,$errEmail,$errCellulare,$errPassword,$errProvincia,$errComune,$errCap,$errVia);
    } 
?>  
    </body>

</html>


