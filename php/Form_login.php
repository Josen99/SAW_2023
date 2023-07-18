<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Form per il Login
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/main.css"> 
        <link rel="stylesheet" href="../css/form-style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
        <!-- Scripts -->
        <script src="../js/jquery-3.6.3.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="../js/nav.js"></script>
        <script src="../js/login.js"></script>
        <script src="../js/footer.js"></script>
        <script src="https://kit.fontawesome.com/f53b9ebdc2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    </head>

    <body class="sfondo">
        <?php
            include("../partials/navbar.php");
        ?>
        <section>
            <div class="login-container">
                <div class="row marginrow">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 login-form-1">
                        <h3>Login Form</h3>
                        <form action="login.php" method="post" onsubmit="return false">
                            <div class="form-group">
                                <input class="form-control" type="email" id="email" name="email" placeholder="Email" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" id="pass" name="pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <input id="login" type="submit" name="submit" class="btnSubmit" value="Accedi" />
                            </div>
                            <div class="form-group">
                                <a href="#" class="ForgetPwd">Password dimenticata?</a>
                            </div>
                            <div class="form-group">
                                <a href="Form_registration.php">
                                    Non hai un account? Registrati
                                </a>
                            </div>
                            <div id="errore" class="errore"></div>
                        </form>
                    </div>
                <div class="col-md-3"></div>
                </div>
            </div>
        </section>
        <?php
            include("../partials/footer.php");
        ?>
    </body>
</html>