<?php
$serverName = "KHEN\SQLEXPRESS";
$connectionOptions = [
    "Database" => "WEBAPP",
    "Uid" => "",
    "PWD" => ""
];
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn == false) {
    die(print_r(sqlsrv_errors(), true));
}

$LOGIN_EMAIL = $_POST['EMAIL'];
$LOGIN_PASSWORD = $_POST['PASSWORD'];

if (empty($LOGIN_EMAIL)) {
    echo "Missing Field: Email";
} else if (empty($LOGIN_PASSWORD)) {
    echo "Missing Field: Password";
} else {
    $FETCH_ROW_SQL = "SELECT EMAIL, PASSWORD, USERID FROM ACCOUNTS WHERE EMAIL = '{$LOGIN_EMAIL}'";
    $FETCH_ROW_RESULTS = sqlsrv_query($conn, $FETCH_ROW_SQL);
    $FETCH_ROW_QUERY = sqlsrv_fetch_array($FETCH_ROW_RESULTS);

    if ($FETCH_ROW_QUERY && $FETCH_ROW_QUERY['PASSWORD'] == $LOGIN_PASSWORD) {
        session_start();
        $_SESSION['USERID'] = $FETCH_ROW_QUERY['USERID'];

        if ($FETCH_ROW_QUERY['USERID'] == 0) {
            header("Location: admin.php");
        } else {
            header("Location: user-report.php");
        }
        exit();
    } else {
        echo "Invalid email or password";
    }
}
?>
