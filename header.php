<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Absence</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark static-top">
        <div class="container">
            <img src="img/logo4.png" alt="" width="180" height="40" class="d-inline-block align-text-top">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="index.php">Hlavní stránka</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="store.php">Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="cart.php">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="releases.php">Releases</a>
                    </li>
                        <li class="nav-item">
                      <a class="nav-link" href="loginDesign.php">Přihlásit</a>
                        </li><li class="nav-item">
                      <a class="nav-link active" >Not logged in</a>
                       </li>

                </ul>
            </div>
        </div>
    </nav>
</header>

<br>
<br>
<br>
<br>
</body>
</html>