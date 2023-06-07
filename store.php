<?php
session_start();


if(isset($_SESSION["email"])){
    echo "Logged as " . $_SESSION['email'];
} else {
    header("Location: 404.php");
}

?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <title>Title</title>
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
                        <a class="nav-link "  href="index.php">Hlavní stránka</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"  aria-current="page" href="store.php">Store</a>
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
<main>
<br>
    <div class="container-md mt-4 card text-light bg-secondary">
        <h1 class="mt-5 mx-5">Exclusive access</h1>
        <p class="mt-2 mx-5"> Pro naše členy jsme si připravili exkluzivní přístup k limitovaným botám. Boty se mění podle plnosti skladu a na každého je jeden pár bot. </p>
    </div>
    <div class="container">

        <div class="mt-2 row row-cols-1 row-cols-sm-2 row-cols-md-2 g-5 text-center justify-content-center" id="sneakerCardContainer" ></div>
    </div>

    <script>

        fetch("products.json")
            .then(function(response) {
                return response.json();
            })
            .then(function(data){
                localStorage.setItem("products", JSON.stringify(data));
                if(!localStorage.getItem("cart")){
                    localStorage.setItem("cart", "[]");
                }
                displaySneakers(data);
            });

        let products = JSON.parse(localStorage.getItem("products"));
        let cart = JSON.parse(localStorage.getItem("cart"));

        function displaySneakers(data) {
            let cardContainer = document.getElementById("sneakerCardContainer");
            cardContainer.innerHTML = "";

            data.forEach(function(sneaker) {

                let row = document.createElement("div");
                row.classList.add("row", "row-cols-2", "g-4");

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

                let addButton = document.createElement("button");
                addButton.classList.add("btn", "btn-success");
                addButton.textContent = "Add to Cart";
                addButton.addEventListener("click", function() {
                    addItemToCart(sneaker.id);
                });
                cardBody.appendChild(addButton);

                card.appendChild(cardBody);
                cardContainer.appendChild(card);
            });
        }

        function addItemToCart(productId) {
            let product = products.find(function(product) {
                return product.id == productId;
            });
            if (cart.length == 0) {
                cart.push(product);
            } else {
                let res = cart.find(element => element.id == productId);
                if (res === undefined) {
                    cart.push(product);
                }
            }
            localStorage.setItem("cart", JSON.stringify(cart));
        }
    </script>
</main>
<footer class="bg-info text-center text-lg-start fixed-bottom">
    <div class="text-center p-3" style="background-color: rgb(80,80,80);">
        <a class="text-light" href="https://github.com/MartinKunes">    ©Martin Kuneš 2023</a>
    </div>
</footer>
<br>
<br>
<br>

</body>
</html>