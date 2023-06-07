const mysql = require('mysql');

// Připojení k databázi
document.addEventListener('DOMContentLoaded', function() {
    const connection = mysql.createConnection({
        host: '127.0.0.1',
        user: 'admin',
        password: 'admin',
        database: 'testik'
    });

    connection.connect((error) => {
        if (error) {
            console.error('Chyba při připojování k databázi:', error);
        } else {
            console.log('Připojení k databázi bylo úspěšné.');
            insertDataFromLocalStorage();
        }
    });
    const myButton = document.getElementById('myButton');
    myButton.addEventListener('click', insertDataFromLocalStorage);
    // Funkce pro přidání dat z localStorage do databáze
    function insertDataFromLocalStorage() {
        // Získání dat z localStorage
        const localStorageData = localStorage.getItem('cart');

        if (localStorageData) {
            const data = JSON.parse(localStorageData);

            // Přidání dat do databáze
            const query = 'INSERT INTO testik (id, name, price) VALUES ?';
            const values = data.map(item => [item.id, item.name, item.price]);

            connection.query(query, [values], (error, results) => {
                if (error) {
                    console.error('Chyba při přidávání dat do databáze:', error);
                } else {
                    console.log('Data byla úspěšně přidána do databáze.');
                }

                // Uzavření spojení s databází
                connection.end();
            });
        } else {
            console.log('Nebyla nalezena žádná data v localStorage.');
            connection.end();
        }
