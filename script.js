var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();

var x = setInterval(function() {

    var now = new Date().getTime();

    var distance = countDownDate - now;

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";

    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);

$(document).ready(function() {
    $.ajax({
        url: 'https://raw.githubusercontent.com/MartinKunes/API-boty/main/sneakers.json',
        dataType: 'json',
        success: function(data) {
            const sneakersContainer = $('#sneakers');
            data.sneakers.forEach(function(sneaker) {
                const sneakerElement = $('<div class="col"></div>');
                sneakerElement.html(`
                        <div class="card ">
                            <div class="card-body bg-dark w-100" >
                                <img src="${sneaker.image}" class="img-fluid" height="450px" alt="...">
                                <h3 class="text-light" >${sneaker.name}</h3>
                                <p class="card-text text-light">Release Date: ${sneaker.releaseDate}</p>
                                <p class="card-text text-light">Price: $${sneaker.price}</p>
                                 
                            </div>
                        </div>
                    `);
                sneakersContainer.append(sneakerElement);
            });
        },
        error: function() {
            console.error('Failed to fetch sneakers data.');
        }
    });
});

$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideDown("slow");
    });
});

window.onload = function() {
    document.getElementById('BuyForm').addEventListener('submit', function () {
        // Get the value of the name field.
        let name = document.getElementById("name").value;


        // Save the name in localStorage.
        localStorage.setItem('name', name);

    });
}





