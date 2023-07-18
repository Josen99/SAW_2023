<?php 
    session_start();
    include("db.php");   
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Prodotti
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
    <script src="../js/market.js"></script>
    <script src="../js/logout.js"></script>
    <script src="../js/footer.js"></script>
    <script src="https://kit.fontawesome.com/f53b9ebdc2.js" crossorigin="anonymous"></script>
</head>
<body >
    <?php
        include("../partials/navbar.php");
    ?>
    <section class="sfondo">
        <?php if (isset($_GET['prodotto']) && $_GET['prodotto']) { 
            /*$result = $con->query("SELECT * from prodotti where id = ".$_GET['prodotto']);
            $row = $result->fetch_array(); */
            $stmt = mysqli_prepare($con, "SELECT * FROM prodotti WHERE id= ?");
            mysqli_stmt_bind_param($stmt, 's', $_GET['prodotto']);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_array($res); 
            mysqli_stmt_close($stmt);

            if (mysqli_num_rows($res) == 0)  {  ?>
                <div class="row marginrow">
                    <div class="col-sm-12" id="ProdNonDisp">
                        <h1>Prodotto non disponibile</h1>
                    </div>
                </div>
            <?php } else { ?>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4 ShowProd">
                    <div class="col-item">
                        <div class="photo">
                            <img src="../img/products/<?php echo $row[0]; ?>.jpg" class="img-responsive" width="300"/>
                        </div>
                        <hr>
                        <div class="info">
                            <div class="row">
                                <div class="price col-md-6">
                                    <h5>
                                        <?php echo $row[1]." ".$row[2]." ".$row[3]; ?></h5>
                                    <h5 class="price-text-color">
                                        Prezzo: <?php echo $row[5]; ?> Euro</h5>
                                </div>
                                
                                <div class="rating hidden-sm col-md-6">
                                    <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                    </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                    </i><i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="separator clear-left">
                                <p class="btn-add">
                                    <i class="fa fa-shopping-cart"></i><a href="prodotti.php?prodotto=<?php echo $_GET['prodotto'] ?> class="hidden-sm">Add to cart</a></p>
                                <p class="btn-details">
                                    <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
                            </div>
                            <div class="clearfix">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
        <?php    }
         } else {  
            /*$result = $con->query("SELECT * from prodotti");*/
            $stmt = mysqli_prepare($con, "SELECT * FROM prodotti");
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            ?>
            <div class="row marginrow">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 ShowProd border30">
            <h3 class="titolo">Articoli sportivi</h3>
            <table class="table" >
                <thead>
                    <tr>
                    <th scope="col"><i class="fa fa-file-image-o" aria-hidden="true"></i></th>
                    <th scope="col"><i class="fa fa-product-hunt" aria-hidden="true"></i></th>
                    <th scope="col" class="th_mobile"><i class="fa fa-trademark" aria-hidden="true"></i></th>
                    <th scope="col" class="th_mobile"><i class="fa fa-venus-mars" aria-hidden="true"></i></th>
                    <th scope="col" class="th_mobile"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i></th>
                    <th scope="col">€</th>
                    <th scope="col">Quantita</th>
                    <th scope="col"><i class="fa-solid fa-cart-shopping"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; while (/*$row = $result->fetch_array()*/$row= mysqli_fetch_array($res)) {
                        echo '<tr><th scope="row"><img src="../img/products/'.$row[0].'.jpg" alt="image" width="40"></th>
                        <th scope="row"><a href="">'.$row[1].'</a></th>
                        <th scope="row" class="th_mobile">'.$row[2].'</th>
                        <th scope="row" class="th_mobile">'.$row[3].'</th>
                        <th scope="row" class="th_mobile">'.$row[4].'</th>
                        <th scope="row">'.$row[5].'</th>
                        <th scope="row"><span class="fa fa-minus" id="Prod1"></span><span class="num" id="Prod2">1</span><span class="fa fa-plus" id="Prod3"></span></th>
                        <th scope="row"><button class="add_market btn btn-primary" data-product="'.$row[0].'" data-num="1" data-count="'.$i.'">Aggiungi</button></th></tr>';
                        $i++;
                    } ?>
                </tbody>
            </table>
            </div>
            <div class="col-sm-2"></div>
        <?php } mysqli_close($con);?>    
      </div>
    </section>
    <?php
        include("../partials/footer.php");
    ?>
</body>
</html>