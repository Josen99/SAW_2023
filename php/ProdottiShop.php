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
        Gestisci Prodotti
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
    <script src="../js/DeleteProduct.js"></script>
    <script src="https://kit.fontawesome.com/f53b9ebdc2.js" crossorigin="anonymous"></script>
</head>
<body >
    <?php
        include("../partials/navbar.php");
    ?>

<?php
        if ($con->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT id, descrizione, marca,sesso, tipologia,prezzo FROM prodotti";
        $result = $con->query($sql);
    ?>
   <div>
    <input type="button" onclick="window.location='./Aggiungi_Prodotti.php';" value="+Aggiungi Prodotto" class="btn btn-success btn-lg btn-block" >
   </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ProductID</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Marca</th>
                <th scope="col">Sesso</th>
                <th scope="col">Tipologia</th>
                <th scope="col">Prezzo</th>
            </tr>
        </thead>
        <tbody id="ProductList">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $Productid = $row["id"];
            ?>
            <tr data-Productid="<?php echo $Productid; ?>">
                <td><?php echo $Productid; ?></td>
                <td><?php echo $row["descrizione"]; ?></td>
                <td><?php echo $row["marca"]; ?></td>
                <td><?php echo $row["sesso"]; ?></td>
                <td><?php echo $row["tipologia"]; ?></td>
                <td><?php echo $row["prezzo"]; ?></td>
                <td>
                    <form class="delete-form" id="delete-form" action="delete_product.php">
                        <input type="hidden" name="Productid" value="<?php echo $Productid; ?>">
                        <button type="submit" class="btn btn-danger delete-user-btn">Delete Product</button>
                    </form>
                </td>
            </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='5'>0 results</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
        $con->close();
    ?>

    <?php
        include("../partials/footer.php");
    ?>
</body>
</html>