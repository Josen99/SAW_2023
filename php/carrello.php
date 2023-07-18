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
        Carrello
    </title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Scripts -->
    <script src="../js/jquery-3.6.3.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/search.js"></script>
    <script src="../js/cart.js"></script>
    <script src="../js/logout.js"></script>
    <script src="../js/footer.js"></script>
    <script src="https://kit.fontawesome.com/f53b9ebdc2.js" crossorigin="anonymous"></script>
   
</head>
<body >
    <?php
        include("../partials/navbar.php");
    ?>
    <section class="sfondo paddCarrello">
            <div class="row marginrow">
                <div class="col-sm-3"></div>
                <div class="market_col col-sm-6 market">
                    <h3 class="titolo">
                        Il tuo carrello
                    </h3>
                    <table class="table" >
                        <thead>
                            <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Descrizione</th>
                            <th scope="col" class="th_mobile">Sesso</th>
                            <th scope="col" class="th_mobile">Marca</th>
                            <th scope="col" class="th_mobile">Tipologia</th>
                            <th scope="col">Prezzo</th>
                            <th scope="col">Quantità</th>
                            <th scope="col">Carrello</th>
                            </tr>
                        </thead>
                        <tbody id="list_cart"></tbody>
                    </table>
                    <div id="totale" class="total"></div>
                    <div class="text-center" style="margin-bottom:20px"><button id="acquista" class="btn btn-primary ">ACQUISTA</button></div>
                    <div class="errore"></div>
                </div>
                <div class="col-sm-3"></div>   
            </div>    
    </section>

    <?php
        include("../partials/footer.php");
    ?>
</body>
</html>