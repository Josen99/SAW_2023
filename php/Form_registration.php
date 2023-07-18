<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Registrazione account
    </title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css"> 
    <link rel="stylesheet" href="../css/form-style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Scripts -->
    <script src="../js/jquery-3.6.3.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/registration.js"></script>
    <script src="../js/footer.js"></script>
    <script src="https://kit.fontawesome.com/f53b9ebdc2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>
    <?php 
        include("../partials/navbar.php"); 
    ?>
    <section class="sfondo RegSect">
            <div class="row marginrow">
                <div class="col-md-3"></div>
                <div class="col-md-6 login-form-1 RegDiv">
                    <div class="log-reg-card">
                        <h3>Registrazione</h3>
                        <form action="registration.php" method="post" onsubmit="return false" >
                            <div class="input-icon-wrap">
                                <span class="input-icon"><i class="fa-solid fa-user"></i></span>
                                <input class="input-with-icon" type="text" id="firstname" name="firstname" placeholder="Nome">
                            </div>                    
                            <div class="input-icon-wrap">
                                <span class="input-icon"><i class="fa-solid fa-user"></i></span>
                                <input class="input-with-icon" type="text" id="lastname" name="lastname" placeholder="Cognome"> 
                                </div>
                            <div class="input-icon-wrap">                    
                                <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
                                <input class="input-with-icon" type="email" id="email" name="email" placeholder="Email"/>
                            </div>
                            <div class="input-icon-wrap">
                                <span class="input-icon"><i class="fa-solid fa-lock"></i></span>
                                <input class="input-with-icon" type="password" id="pass" name="pass" placeholder="Password"/>     
                            </div>
                            <div class="input-icon-wrap" style="border: 0px">
                                <span id="PassSpan">Inserisci una password di almeno 8 caratteri e (massimo 32) che contenga almeno un numero, un valore minuscolo, una lettera maiuscola e un carattere speciale</span>
                            </div>
                            <div class="input-icon-wrap">
                                <span class="input-icon"><i class="fa-solid fa-lock"></i></span>
                                <input class="input-with-icon" type="password" id="confirm" name="confirm" placeholder="Conferma Password">    
                            </div>
                            <input id="register" class="btn btn-primary RegBottom" name="submit" type="submit" value="REGISTRATI">
                            <a href="Form_login.php">
                                Hai già un account? Accedi
                            </a>
                            <div id="errore" class="errore"></div>
                        </form>   
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
    </section>
    <?php 
        include("../partials/footer.php"); 
    ?>
</body>
</html>