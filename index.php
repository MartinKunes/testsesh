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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <Style>
     #panel, #flip {
         padding: 5px;
     }
    #panel {
        padding: 50px;
        display: none;
    }</Style>
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
                        <a class="nav-link active" aria-current="page" href="#">Hlavní stránka</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="store.php">Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="releases.php">Releases</a>
                    </li>
                    <?php if(!isset($_SESSION["email"])){
                        echo '"<li class="nav-item">
                      <a class="nav-link" href="loginDesign.php">Přihlásit</a>
                        </li><li class="nav-item">
                      <a class="nav-link active" >Not logged in</a>
                       </li>"';
                    }else {
                        echo '"<li class="nav-item">
                      <a class="nav-link" href="logout.php">Odhlásit</a>
                       </li>
                       <li class="nav-item">
                      <a class="nav-link active" > '.$_SESSION['email'].'</a>
                       </li>"';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="container d-line text-center align-items-center justify-content-center">
    <br><br><br>
<br>
    <h3>Until next release</h3>
    <h3 id="demo"></h3>
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active " data-bs-interval="10000">
            <img src="img/img1.png" class="img-fluid w-50"    alt="...">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="img/img2.png" class="img-fluid w-50"   alt="...">
        </div>
        <div class="carousel-item">
            <img src="img/img03.png" class="img-fluid w-50"  height="500px" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
    <div id="flip">
        <button type="button"class="btn btn-light">   <h1>New Collab between Nike and Travis Scott</h1></button>
    </div>
</div>
<div class="container">
    <div id="panel">
    <p>V dnešní době kolaborace mezi hudebními umělci a značkami jsou stále běžnější a přinášejí svěží pohled na svět módy a kultury. Jedním z nejvýraznějších spojení mezi světem hudby a sportovního průmyslu je spolupráce mezi značkou Nike a hudebním umělcem Travisem Scottem. Tato spolupráce představuje spojení dvou kreativních sil, které vytváří nové trendy a inovativní produkty. V tomto článku se podíváme na to, jaké jsou hlavní informace ohledně kolaborace mezi Nike a Travisem Scottem a jaký dopad měla na svět módy a hudby.
</p>
   <h3>Vznik kolaborace:</h3>
    <p>    Kolaborace mezi Travisem Scottem a Nike vznikla v roce 2017, kdy Travis Scott podepsal smlouvu se značkou. Scott se stal součástí elitního týmu Nike, který tvoří vybraní umělci a sportovci. Spolupráce byla založena na vzájemném respektu mezi oběma stranami a jejich snaze přinášet inovativní designy a produkty na trh.
</p>
   <h3>Značka Cactus Jack:</h3>
<p>Travis Scott spolupracoval se značkou Nike pod svou vlastní značkou nazvanou Cactus Jack. Tato značka je pojmenována po Scottově pseudonymu "Cactus Jack" a představuje jeho kreativní výraz a styl. Produkty Cactus Jack jsou inovativní a vyjadřují Scottův jedinečný umělecký pohled.
</p>
      <h3>Výsledky spolupráce:</h3>
      <p>  Spolupráce mezi Nike a Travisem Scottem přinesla na trh několik vysoce oceňovaných a populárních produktů. Jedním z nejznámějších jsou tenisky Air Jordan 1 Retro High Travis Scott, které se staly velkým hitem mezi sneakerheady. Tyto tenisky obsahují unikátní designové prvky, včetně reverzibilního Swooshe, které umožňuje nositelskému přizpůsobit vzhled bot dle svého vkusu.</p>
</div>
</div>
</div>
<br>
<br>
<br>
<br>
<footer class="bg-info text-center text-lg-start fixed-bottom">
    <div class="text-center p-3" style="background-color: rgb(80,80,80);">
        <a class="text-light" href="https://github.com/MartinKunes">    ©Martin Kuneš 2023</a>
    </div>
</footer>
<script src="script.js"></script>
</body>
</html>