<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
$password1 = $_POST['password1'];

// Connect to the database
$serverName = "193.85.203.188";
$connectionOptions = array(
    "Database" => "kunes",
    "UID" => "kunes",
    "PWD" => "SPjoxufy321"
);
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    if ($password === $password1) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO login (email, password) VALUES (?, ?)";
        $params = array($email, $hashed_password);
        $stmt = sqlsrv_query($conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $myfile = fopen("index.php", "r");
        header("Location: loginDesign.php");
        return;
    } else {
        echo file_get_contents("header.php");
        echo "Invalid password...";
        echo file_get_contents("footer.php");
    }

    sqlsrv_close($conn);
}
?>
