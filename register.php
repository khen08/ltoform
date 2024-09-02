<?php
$EMAIL = $_POST['EMAIL'];
$PASSWORD = $_POST['PASSWORD'];
$REGISTRATION_DATE = date('Y-m-d');
$CONFIRM_PASSWORD = $_POST['CONFIRM_PASSWORD'];
$IS_ADMIN = 0;
$errors = [];

if (empty($EMAIL)) {
    $errors[] = "Missing Field: Email";
}

if (empty($PASSWORD)) {
    $errors[] = "Missing Field: Password";
}

if ($CONFIRM_PASSWORD != $PASSWORD) {
    $errors[] = "Password Mismatch";
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
} else {
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

    $sqlGetUserID = "SELECT IDENT_CURRENT('USER_DATA') AS USERID";
    $stmt = sqlsrv_query($conn, $sqlGetUserID);
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $USERID = $row['USERID'];

    $checkUserIdQuery = "SELECT COUNT(*) AS UserIdCount FROM ACCOUNTS WHERE USERID = '$USERID'";
    $checkUserIdResult = sqlsrv_query($conn, $checkUserIdQuery);
    $userIdCount = sqlsrv_fetch_array($checkUserIdResult, SQLSRV_FETCH_ASSOC)['UserIdCount'];

    if ($userIdCount > 0) {
        echo "You already have an account!";
    } else {
        $sql = "INSERT INTO ACCOUNTS (USERID, EMAIL, PASSWORD, REGISTRATION_DATE) VALUES ('$USERID', '$EMAIL', '$PASSWORD', '$REGISTRATION_DATE')";
        $results = sqlsrv_query($conn, $sql);

        if ($results) {
            echo "<p style='color: green;'>Account Successfully Registered!</p>";
            echo "<p>Loading...</p>";
        } else {
            echo "<p style='color: red;'>Error updating record: " . sqlsrv_errors() . "</p>";
        }
    }
}
?>

<script>
    setTimeout(function () {
        window.location.href = "login.html";
    }, 3000);
</script>