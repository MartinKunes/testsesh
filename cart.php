<?php
session_start();


if(isset($_SESSION["email"])){
    echo "Logged as " . $_SESSION['email'];
} else {
    header("Location: 404.php");

}



$serverName = "193.85.203.188"; //serverName\instanceName
$connectionOptions = array(
    "Database" => "kunes",
    "UID" => "kunes",
    "PWD" => "SPjoxufy321"
);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn) {
    echo "Connection established.<br />";
} else {
    echo "Connection could not be established.<br />";
    die(print_r(sqlsrv_errors(), true));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartData = $_POST['cart'];

    if (!empty($cartData)) {
        $data = json_decode($cartData, true);

        // Prepare and execute the INSERT query
        $query = "INSERT INTO testik (name, releaseDate, price, nfo) VALUES (?, ?, ?,?)";


        foreach ($data as $sneaker) {
            $name = $sneaker['name'];
            $releaseDate = $sneaker['releaseDate'];
            $price = $sneaker['price'];

            $params = array($name, $releaseDate, $price);
            $stmt = sqlsrv_query($conn, $query, $params);

            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }
        }

        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
    } else {
        echo 'No data found in localStorage.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
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
                        <a class="nav-link active" href="#">Cart</a>
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

<body>

<br>
<br>
<br>
<br>
    <div class="container-md mt-4 card text-light bg-secondary">
        <h1 class="mt-5 mx-5">Doručení:</h1>
        <p class="mt-2 mx-5"> Dopravu nad 300$ platíme my. Jinak si ji platíte sami a na dobírku neposíláme. Bohužel nejsou peníze.</p>
    </div>
<div class="container text-center justify-content-center">
    <br>
    <h1>In your cart</h1>
    <div class="mt-4 row row-cols-2 row-cols-sm-2 row-cols-md-4 g-4 text-center justify-content-center "  id="cardContainer">
    </div>
    <script>
        const cartData = localStorage.getItem('cart');
        const data = cartData ? JSON.parse(cartData) : [];

        data.forEach(sneaker => {
            let row = document.createElement("div");
            row.classList.add("row");

            let cardCol = document.createElement("div");
            cardCol.classList.add("col");

            let card = document.createElement("div");
            card.classList.add("card");


            let image = document.createElement("img");
            image.classList.add("card-img-top");
            image.src = sneaker.image;
            card.appendChild(image);

            let cardBody = document.createElement("div");
            cardBody.classList.add("card-body");


            let name = document.createElement("h5");
            name.classList.add("card-title");
            name.textContent = sneaker.name;
            cardBody.appendChild(name);

            let releaseDate = document.createElement("p");
            releaseDate.classList.add("card-text");
            releaseDate.textContent = "Release Date: " + sneaker.releaseDate;
            cardBody.appendChild(releaseDate);

            let price = document.createElement("p");
            price.classList.add("card-text");
            price.textContent = "Price: $" + sneaker.price;
            cardBody.appendChild(price);


            card.appendChild(cardBody);
            cardContainer.appendChild(card);
        });
        let price = document.createElement("p");
        price.classList.add("card-text");

        let row = document.createElement("div");
        row.classList.add("container");
        price.textContent = "Price: $" + sneaker.price;
        row.appendChild(price);

        $(document).ready(function(){
            $("#p1").mouseleave(function(){
                alert("Neutratil jsi dostatek");
            });
        });



    </script>
<br>
    <br>
    <div class="d-grid gap-2 col-3 mx-auto">
        <button id="myButton" class="btn btn-primary ">Dokončit objednávku</button>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myButton').click(function() {
                const cartData = localStorage.getItem('cart');

                if (cartData) {
                    $.ajax({
                        type: 'POST',
                        url: 'cart.php',
                        data: { cart: cartData },
                        success: function(response) {
                            console.log('Data were successfully sent to the server.');
                        },
                        error: function(error) {
                            console.error('Error while sending data to the server:', error);
                        },
                    });
                } else {
                    console.log('No data found in localStorage.');
                }
            });
        });
    </script>
</div>
<footer class="bg-info text-center text-lg-start fixed-bottom">
    <div class="text-center p-3" style="background-color: rgb(80,80,80);">
        <a class="text-light" href="https://github.com/MartinKunes">    ©Martin Kuneš 2023</a>
    </div>
</footer>
    </body>
</html>