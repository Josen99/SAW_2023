<?php 
    session_start();
    if(!isset($_SESSION['nome']))
        header("Location: index.php");
    
    include("db.php");    
?>    
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Show Profile
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
    <script src="../js/update_profile.js"></script>
    <script src="../js/market.js"></script>
    <script src="../js/logout.js"></script>
    <script src="../js/footer.js"></script>
    <script src="https://kit.fontawesome.com/f53b9ebdc2.js" crossorigin="anonymous"></script>
</head>
<body >
    <?php
        include("../partials/navbar.php");       

        $stmt= mysqli_prepare($con, "SELECT * FROM users WHERE email=?");
        mysqli_stmt_bind_param($stmt, 's', $_SESSION['email']);
        mysqli_stmt_execute($stmt);
        $res= mysqli_stmt_get_result($stmt);
        $row= mysqli_fetch_assoc($res);
        mysqli_stmt_close($stmt);

        if(mysqli_num_rows($res) == 0){
            error_log("--PROFILO-- Error! Nussuna riga associata alla mail\n", 3, "../../log.txt");
            header("Location: Form_login.php");
            exit();
        }

        if(mysqli_num_rows($res) > 1){
            error_log("--PROFILO-- Error! Restituite più righe associate ad un unica mail\n", 3, "../../log.txt");
            header("Location: Form_login.php");
            exit();
        }
    ?>

    <section class="sfondo">
        <div class="row marginrow">
            <div class="col-sm-3"></div>
            <div class="col-sm-6" id="SProfile">
                <h3 id="titoloSP">Profilo di <?php echo $_SESSION['nome']; ?></h3>
                <hr></hr>
                <form action="update_profile.php" method="post" onsubmit="return false" >
                    <div class="row">
                        <!-- colonna sinistra -->  
                        <div class="profile_col col-sm-6">
                            <label for="name">Nome*:</label> <br>
                            <input type="text" id="firstname" name="firstname" placeholder="Inserisci nome" required
                            <?php // visualizzo il valore già esistente
                                echo "value='".$row["firstname"]."'";
                            ?> >
                            <br><br>

                            <label for="lastname">Cognome*:</label> <br>
                            <input type="text" id="lastname" name="lastname" placeholder="Inserisci cognome" required
                                <?php
                                    echo "value='".$row["lastname"]."'";
                                ?> >
                            <br><br>

                            <label for="email">Email*:</label><br>
                            <input type="email" id="email" name="email" placeholder="Inserisci email" required
                                <?php
                                    echo "value='".$row["email"]."'";
                                ?> >
                            <br><br>

                            <label for="DataDiNascita">Data di nascita*:</label> <br>
                            <input type="date" id="DataDiNascita" name="DataDiNascita" placeholder="Inserisci data di nascita" required
                                <?php
                                    echo "value='".$row["DataDiNascita"]."'";
                                ?> >
                            <br><br>

                            <label for="Telefono">Telefono*:</label> <br>
                            <input type="text" id="Telefono" name="Telefono" placeholder="Inserisci telefono" required
                                <?php
                                    echo "value='".$row["Telefono"]."'";
                                ?> >
                            <br><br>
                    
                            <label for="Sesso">Sesso:</label><br>
                            <select name="Sesso" id="Sesso">
                                <option value="Altro" <?php if($row['sesso']!="F" or $row['sesso']!='M') echo "selected"?>>Altro</option>
                                <option value="F" <?php if($row['sesso']=="F") echo "selected"?>>Donna</option>
                                <option value="M" <?php if($row['sesso']=='M') echo "selected"?>>Uomo</option>
                            </select>

                            <br>
                            <button class="btn btn-default" style="margin-top: 20px"><a href="Modifica-Password.php">MODIFICA PASSWORD</a></button>
                        </div>

                        <!-- colonna destra -->
                        <div class="profile_col col-sm-6">
                            <label for="Stato">Stato:</label> <br>
                            <input type="text" id="Stato" name="Stato" placeholder="Inserisci stato"
                                <?php
                                    echo "value='".$row["Stato"]."'";
                                ?> >
                            <br><br>

                            <label for="Provincia">Provincia:</label> <br>
                            <input type="text" id="Provincia" name="Provincia" placeholder="Inserisci provincia"
                                <?php
                                    echo "value='".$row["Provincia"]."'";
                                ?> >
                            <br><br>

                            <label for="Citta">Citta:</label> <br>
                            <input type="text" id="Citta" name="Citta" placeholder="Inserisci città"
                                <?php
                                    echo "value='".$row["Citta"]."'";
                                ?> >
                            <br><br>

                            <label for="Indirizzo">Indirizzo:</label> <br>
                            <input type="text" id="Indirizzo" name="Indirizzo" placeholder="Inserisci indirizzo"
                                <?php
                                    echo "value='".$row["Indirizzo"]."'";
                                ?> >
                            <br><br>

                            <label for="Cap">Cap:</label> <br>
                            <input type="text" id="Cap" name="Cap" placeholder="Inserisci cap"
                                <?php
                                    echo "value='".$row["Cap"]."'";
                                ?> >
                            <br><br>
                        
                            <p>Iscrizione alla newsletter:</p>
                            <input type="radio" id="iscrizione" name="Newsletter" value=1 <?php if($row['Newsletter'] == 1) echo "checked"?>>
                            <label for="true">SI</label>
                            <input type="radio" id="false" name="Newsletter" value=0 <?php if($row['Newsletter'] == 0) echo "checked"?>>
                            <label for="false">No</label>
                        </div><!-- chiudo column -->
                    </div> <!-- chiudo row -->
                    <div id="SubSP">
                        <input name="submit" type="submit" id="update_profile" class="btn btn-primary">
                    </div> 
                    <div id="errore" class="errore"></div>
                </form>
            </div>
        </div>
    </section>
    <?php
        include("../partials/footer.php");
    ?>
</body>