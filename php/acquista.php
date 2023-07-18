<?php session_start();

//controllo che l\'utente sia registrato
if (!isset($_SESSION['iduser'])) {
     echo json_encode(array('message' => 'not_registered'));  
     exit();
}
//includo la connessione
include("db.php");     
    
//leggo il contenuto di products json
$products = $_POST['products'];

//per ogni elemento di products eseguo la insert
foreach($products as $product) {
    $stmt = mysqli_prepare($con, "INSERT INTO acquisti (UserId, ProductId, Quantity, Recensito, Date) VALUES (?, ?, ?, ?, now())");
    
    // Set the default value for the Recensito column to 'true'
    $recensito = 'false';
  
    mysqli_stmt_bind_param($stmt, 'iiis', $_SESSION['iduser'], $product['id'], $product['num'], $recensito);
    
    mysqli_stmt_execute($stmt);
  }
  
echo json_encode(array('message' => 'success'));
mysqli_stmt_close($stmt); 
mysqli_close($con);
?>