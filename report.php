<?php
$serverName = "KHEN\SQLEXPRESS";
$connectionOptions = [
    "Database" => "DLSU",
    "Uid" => "",
    "PWD" => ""
];
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn == false) {
    die(print_r(sqlsrv_errors(), true));
}

$year_l=$_POST['yearlevel'];

$sql = "SELECT * FROM STUDENT WHERE YEAR_LEVEL=$year_l";
$results=sqlsrv_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary Report</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Student_Name</th>
                <th>Email</th>
                <th>Year_Level</th>
                <th>Contact_Number</th>
            </tr>
        </thead>
            <?php
                while($rows = sqlsrv_fetch_array($results)){
                    $fieldname1=$rows['STUDENT_NUMBER'];
                    $fieldname2=$rows['STUDENT_NAME'];
                    $fieldname3=$rows['STUDENT_EMAIL'];
                    $fieldname4=$rows['YEAR_LEVEL'];
                    $fieldname5=$rows['CONTACT_NUMBER'];
                    echo "<tr>
                    <td>'.$fieldname1.'</td>
                    <td>'.$fieldname2.'</td>
                    <td>'.$fieldname3.'</td>
                    <td>'.$fieldname4.'</td>
                    <td>'.$fieldname5.'</td>
                    </tr>";
                }
            ?>
    </table>
</body>
</html>