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
$USER_FAMILY_NAME = isset($_POST['USER_FAMILY_NAME']) ? strtoupper($_POST['USER_FAMILY_NAME']) : '';
$USER_FIRST_NAME = isset($_POST['USER_FIRST_NAME']) ? strtoupper($_POST['USER_FIRST_NAME']) : '';
$USER_MIDDLE_NAME = isset($_POST['USER_MIDDLE_NAME']) ? strtoupper($_POST['USER_MIDDLE_NAME']) : '';
$USER_STREET = isset($_POST['USER_STREET']) ? strtoupper($_POST['USER_STREET']) : '';
$USER_CITY = isset($_POST['USER_CITY']) ? strtoupper($_POST['USER_CITY']) : '';
$USER_ZIP = isset($_POST['USER_ZIP']) ? strtoupper($_POST['USER_ZIP']) : '';
$USER_PROVINCE = isset($_POST['USER_PROVINCE']) ? strtoupper($_POST['USER_PROVINCE']) : '';
$CONTACT_NUMBER = isset($_POST['CONTACT_NUMBER']) ? strtoupper($_POST['CONTACT_NUMBER']) : '';
$TIN = isset($_POST['TIN']) ? strtoupper($_POST['TIN']) : '';
$NATIONALITY = isset($_POST['NATIONALITY']) ? strtoupper($_POST['NATIONALITY']) : '';
$GENDER = isset($_POST['GENDER']) ? strtoupper($_POST['GENDER']) : '';
$BIRTH_DATE = isset($_POST['BIRTH_DATE']) ? strtoupper($_POST['BIRTH_DATE']) : '';
$HEIGHT = isset($_POST['HEIGHT']) ? strtoupper($_POST['HEIGHT']) : '';
$WEIGHT = isset($_POST['WEIGHT']) ? strtoupper($_POST['WEIGHT']) : '';

$sql = "UPDATE USER_DATA
        SET FAMILY_NAME = '$USER_FAMILY_NAME',
            FIRST_NAME = '$USER_FIRST_NAME',
            MIDDLE_NAME = '$USER_MIDDLE_NAME',
            STREET = '$USER_STREET',
            CITY = '$USER_CITY',
            ZIP_CODE = '$USER_ZIP',
            PROVINCE = '$USER_PROVINCE',
            CONTACT_NUMBER = '$CONTACT_NUMBER',
            TIN = '$TIN',
            NATIONALITY = '$NATIONALITY',
            GENDER = '$GENDER',
            BIRTH_DATE = '$BIRTH_DATE',
            HEIGHT = '$HEIGHT',
            WEIGHT = '$WEIGHT'
        WHERE USERID = IDENT_CURRENT('USER_DATA');";

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