<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

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
    $query = "SELECT * FROM login WHERE email = ?";
    $params = array($email);
    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_has_rows($stmt)) {
        $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC);

        if (password_verify($password, $user[2])) {
            $_SESSION["email"] = $user[1];
            header("Location: index.php");
            return;
        } else {
            $_SESSION['fail']++;
            if ($_SESSION['fail'] >= 3) {
                $myfile = fopen("prihlaseni.txt", "a") or die("Unable to open file!");
                $txt = "$email\n";
                fwrite($myfile, $txt);
                fclose($myfile);
                session_destroy();
            }
            header("Location: loginDesign.php");
            return;
        }
    } else {
        echo file_get_contents("header.php");
        echo "Invalid email...";
        echo file_get_contents("footer.php");
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}
?>