<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="index.php">
    <img src="../img/logo4.jpg" alt="logo" id="ImgNav"> 
    Sports Unlimited
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php if (isset($_SESSION['nome']))
          echo '<li class="nav-item">
                   <a class="nav-link" href="show_profile.php">Profilo</a>
               </li>';
      ?>
      <li class="nav-item">
        <a class="nav-link" href="about.php">Chi Siamo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="prodotti.php">Shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacts.php">Contatti</a>
      </li>
      <?php
if (isset($_SESSION['send'])) {
    echo '<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" onclick="toggleDropdown()" aria-expanded="false">
                Menu
              </a>
              <ul class="dropdown-menu" id="dropdownMenu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="Form_Newsletter.php">Newsletter</a></li>
                <li><a class="dropdown-item" href="ListaAcquisti.php">ListaAcquisti</a></li>
                <li><a class="dropdown-item" href="UtentiRgistrati.php">Gestisci Utenti</a></li>
                <li><a class="dropdown-item" href="ProdottiShop.php">Gestisci Prodotti</a></li>
              </ul>
            </li>
            
            <script>
              function toggleDropdown() {
                var dropdownMenu = document.getElementById("dropdownMenu");
                dropdownMenu.classList.toggle("show");
              }
            </script>';
}
?>
    </ul>
    <div><input id="search" class="menu_margin form-control SearchNav" type="search" placeholder="Search" aria-label="Search">
    <ul id="product_list" class="list-group" style="position: absolute; z-index:999; width: 400px; padding: 3px"></ul></div>  
    <div>
    
  </div>
    <div class="menu_margin MargNav"><a href="carrello.php"><i class="fa-solid fa-cart-shopping" style="font-size: 20px"></i><div class="notifications">0</div></a></div>
    <?php if (isset($_SESSION['nome']))
              echo '<a href="show_profile.php" class="MargNav"><i class="fa-solid fa-user INav"></i> '.$_SESSION['nome'].'</a><button id="logout" class="btn btn-primary">Logout</button>'; 
          else 
              echo '<a href="Form_login.php" class="MargNav"><i class="fa-solid fa-user INav"></i></a>'; 
    ?>
  </div>
</nav>