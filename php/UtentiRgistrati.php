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
        ListaUtenti
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
    <script src="../js/DeleteUser.js"></script>
    <script src="../js/ban_unban.js"></script>
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
        $sql = "SELECT iduser, firstname, lastname, email,ban FROM users";
        $result = $con->query($sql);
    ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">UserID</th>
                <th scope="col">firstname</th>
                <th scope="col">lastname</th>
                <th scope="col">email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody id="usersList">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $userid = $row["iduser"];
                    $mailAdmin=$row["email"];
                    $banUser=$row["ban"];
            ?>
              <tr data-userid="<?php echo $userid; ?>">
                <td><?php echo $userid; ?></td>
                <td><?php echo $row["firstname"]; ?></td>
                <td><?php echo $row["lastname"]; ?></td>
                <td><?php echo $mailAdmin; ?></td>
                <td>
                <?php if ($mailAdmin != "sportsunlimitedsaw@gmail.com"): ?>
                    <form class="delete-form" action="delete_user.php">
                        <input type="hidden" name="userId" value="<?php echo $userid; ?>">
                        <button type="submit" class="btn btn-danger delete-user-btn">Delete User</button>
                    </form>
                <?php endif; ?>
            </td>
            <td>
                <?php if ($mailAdmin != "sportsunlimitedsaw@gmail.com"): ?>
                    <?php if ($banUser === '1'): ?>
                      <form class="delete-form" method="post"  action="ban_user.php">
                          <input type="hidden" name="userId" value="<?php echo $userid; ?>">
                          <button type="submit" id="banUser" class="btn btn-warning ">Ban User</button>
                      </form>
                    <?php endif; ?>  
                    <?php if ($banUser === '0'): ?>
                      <form class="delete-form" method="post" action="unban_user.php">
                          <input type="hidden" name="userId" value="<?php echo $userid; ?>">
                          <button type="submit" id="UnbanUser" class="btn btn-warning ">UnBan User</button>
                      </form>
                    <?php endif; ?>    
                <?php endif; ?>
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