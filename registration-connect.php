<?php
$serverName="KHEN\SQLEXPRESS";
$connectionOptions=[
"Database"=>"WEBAPP",
"Uid"=>"",
"PWD"=>""
];
$conn=sqlsrv_connect($serverName, $connectionOptions);
if($conn==false)
die(print_r(sqlsrv_errors(),true));

$studentname=$_POST['name'];
$email=$_POST['email'];
$year=$_POST['yearlevel'];
$contact=$_POST['contact'];

$sql="INSERT INTO STUDENT (STUDENT_NAME, STUDENT_EMAIL, YEAR_LEVEL, MOBILE_NUMBER) VALUES ('$studentname', '$email', '$year', '$contact')";
$results=sqlsrv_query($conn, $sql);

if($results){
    echo 'Registration Successful';
} else{
    echo 'ERROR';
}

$sql = "SELECT FORMID FROM STUDENT WHERE FORMID=(SELECT IDENT_CURRENT("
    $results=sqlsrv_query($conn, $sql);

    $userid=sqlsrv_fetch_array($results)