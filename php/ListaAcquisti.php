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
        ListaAcquisti
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

     <?php
                    if ($con->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    $sql = "SELECT UserId, ProductId, Quantity,Date  FROM acquisti";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        //"<br> id: ". $row["UserId"]. " - ProductId: ". $row["ProductId"]. " - Quantity " . $row["Quantity"] . " - Date" . $row["Date"] . "<br>";

                        echo '<table class="table">
                        <thead>
                          <tr>
                            <th scope="col">UserID</th>
                            <th scope="col">ProductId</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Date</th>
                          </tr>
                        </thead>
                        <tbody>';
                        while($row = $result->fetch_assoc()) {
                            echo '
                              <tr>
                              
                                <td>'. $row["UserId"].'</td>
                                <td>'. $row["ProductId"].'</td>
                                <td>'. $row["Quantity"] .'</td>
                                <td>'. $row["Date"] .'</td>
                              </tr>
                            ';
                        }
                    } else {
                        echo "0 results";
                    }
                           echo'</tbody>
                           </table>';
                    $con->close();
                    
     ?>

 <!-- CSS 
   <table class="table">
  <thead>
    <tr>
      <th scope="col">UserID</th>
      <th scope="col">ProductId</th>
      <th scope="col">ProductId</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

                -->
    <?php
        include("../partials/footer.php");
    ?>
</body>
</html>