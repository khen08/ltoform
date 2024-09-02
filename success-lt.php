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

session_start();

$USERID = $_SESSION['USERID'];
$LICENSE_TYPE = isset($_POST['LICENSE_TYPE']) ? strtoupper($_POST['LICENSE_TYPE']) : '';

$sql = "UPDATE APPLICATION_DETAILS
        SET LICENSE_TYPE = '$LICENSE_TYPE'
        WHERE APPLICATIONID = IDENT_CURRENT('APPLICATION_DETAILS');";

$results = sqlsrv_query($conn, $sql);

if ($results) {
    echo "<p style='color: green;'>Record Updated Successfully!</p>";
    echo "<p>Loading Updated Information...</p>";
} else {
    echo "<p style='color: red;'>Error updating record: " . sqlsrv_errors() . "</p>";
}
?>

<script>
    setTimeout(function () {
        window.location.href = "ltoreport.php";
    }, 3000);
</script>