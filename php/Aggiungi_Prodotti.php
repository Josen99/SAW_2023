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
        Add Product
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
    <script src="../js/search.js"></script>
    <script src="../js/logout.js"></script>
    <script src="../js/footer.js"></script>
    <script src="../js/Aggiungi_Prodotti.js"></script>
    <script src="https://kit.fontawesome.com/f53b9ebdc2.js" crossorigin="anonymous"></script>
</head>
<body >
    <?php
        include("../partials/navbar.php");
    ?>
             <section class="sfondo RegSect">
            <div class="row marginrow">
                <div class="col-md-3"></div>
                <div class="col-md-6 login-form-1 RegDiv">
                    <div class="log-reg-card">
                        <h3>Aggiungi un nuovo prodotto</h3>
                        <form action="AddProduct.php" method="post" onsubmit="return false" >
                        
                        <div class="form-group">
                           <label for="validationCustom02">Descrizione</label>
                           <input type="text" class="form-control" id="descrizione" name="descrizione" placeholder="Descrizione..." required>
                        </div>

                        <div class="form-group">
                           <label for="validationCustom02">Marca</label>
                           <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca..." required>
                        </div>

                        <div class="form-group">
                           <label for="validationCustom02">Sesso</label>
                           <input type="text" class="form-control" id="sesso" name="sesso" placeholder="Sesso..." required>
                        </div>

                        <div class="form-group">
                           <label for="validationCustom02">Tipologia</label>
                           <input type="text" class="form-control" id="tipologia" name="tipologia" placeholder="Tipologia..." required>
                        </div>

                        <div class="form-group">
                           <label for="validationCustom02">Prezzo</label>
                           <input type="text" class="form-control" id="prezzo" name="prezzo" placeholder="Prezzo..." required>
                        </div>
                         <!--
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Immagine prodotto</label>
                            <input type="file" class="form-control-file" name="my_image" id="exampleFormControlFile1">
                        </div>-->
                             <div>
                                 <input id="add" class="btn btn-primary RegBottom" name="submit" type="submit" value="SALVA">
                             </div>
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