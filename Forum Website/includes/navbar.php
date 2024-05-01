<?php
session_start();
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Forums</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
      </ul>
      
      <?php
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        echo '
        <p class="text-light mx-2 my-1">Welcome '.$_SESSION['useremail'].'</p>
          <div class="mx-2">
            <a class="btn btn-outline-secondary" href="./includes/logout.php">Logout</a>
          </div>
        ';
      }
      else{
        
        echo '
          <div class="mx-2">
            <a class="btn btn-outline-secondary" href="./login.php">Login</a>
            <a class="btn btn-outline-secondary" href="./register.php">Sign up</a>
          </div>
        ';
      }
      ?>

    </div>
  </div>
</nav>