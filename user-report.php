<?php
session_start();

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

$USERID = $_SESSION['USERID'];
$sqlUserInfo = "SELECT EMAIL, PASSWORD, REGISTRATION_DATE FROM ACCOUNTS WHERE USERID='$USERID'";
$resultsUserInfo = sqlsrv_query($conn, $sqlUserInfo);
$userInfo = sqlsrv_fetch_array($resultsUserInfo);

$sqlUserData = "SELECT FAMILY_NAME, FIRST_NAME, MIDDLE_NAME, STREET, CITY, ZIP_CODE, PROVINCE, CONTACT_NUMBER, TIN, NATIONALITY, GENDER, BIRTH_DATE, HEIGHT, WEIGHT FROM USER_DATA WHERE USERID='$USERID'";
$resultsUserData = sqlsrv_query($conn, $sqlUserData);

$sqlAppDetails = "SELECT APPLICATION_TYPE, CHANGE_ADDRESS, CHANGE_CIVIL_STATUS, CHANGE_NAME, CHANGE_BIRTHDATE, CHANGE_OTHERS, LICENSE_TYPE, DRIVING_SKILL_FROM, DRIVING_SCHOOL_NAME, EDUCATIONAL_ATTAINMENT FROM APPLICATION_DETAILS WHERE USERID='$USERID'";
$resultsAppDetails = sqlsrv_query($conn, $sqlAppDetails);

$sqlUserBio = "SELECT BLOOD_TYPE, ORGAN_DONOR, CIVIL_STATUS, HAIR, EYES, BUILT, COMPLEXION, BIRTHPLACE_CITY, BIRTHPLACE_PROVINCE, FATHER_FAMILY_NAME, FATHER_FIRST_NAME, FATHER_MIDDLE_NAME, MOTHER_FAMILY_NAME, MOTHER_FIRST_NAME, MOTHER_MIDDLE_NAME, SPOUSE_FAMILY_NAME, SPOUSE_FIRST_NAME, SPOUSE_MIDDLE_NAME FROM USER_BIO WHERE USERID='$USERID'";
$resultsUserBio = sqlsrv_query($conn, $sqlUserBio);

$sqlWorkData = "SELECT EMPLOYER_NAME, EMPLOYER_CONTACT, EMPLOYER_STREET, EMPLOYER_CITY, EMPLOYER_ZIP, EMPLOYER_PROVINCE FROM WORK_DATA WHERE USERID='$USERID'";
$resultsWorkData = sqlsrv_query($conn, $sqlWorkData);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary Report</title>

    <style>
        .header {
            background-color: rgb(0, 51, 102);
            color: white;
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .container {
            margin-top: 80px;
            padding-top: 20px;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            margin: 20px auto;
            table-layout: fixed;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: center;
            white-space: normal;
            overflow: hidden;
            word-break: break-word;
        }

        th {
            background-color: #f2f2f2;
            padding: 4px;
            font-size: 12px;
        }

        td {
            padding: 4px;
            font-size: 11px;
        }

        input[type="submit"] {
            background-color: #003366;
            color: white;
            padding: 10px 20px;
            border: solid;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 10px;
            transition: background-color 0.3s, color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: white;
            color: #003366;
        }
    </style>

</head>

<body>
    <div class="header">
        <h1>Review My Records</h1>
    </div>
    <div class="container" style="display: block;">
        <div>
            <p><strong>My Account:</strong></p>
            <p>User ID:
                <?php echo $USERID; ?>
            </p>
            <p>Email:
                <?php echo $userInfo['EMAIL']; ?>
            </p>
            <p>Password:
                <?php echo $userInfo['PASSWORD']; ?>
            </p>
            <p>Registration Date:
                <?php echo $userInfo['REGISTRATION_DATE']->format('Y-m-d'); ?>
            </p>
            <form action="login.html">
                <input type="submit" value="Log Out" style="margin-bottom: 30px;">
            </form>
        </div>
        <div><strong>USER DATA</strong></div>
        <table>
            <thead>
                <tr>
                    <th>FAMILY NAME</th>
                    <th>FIRST NAME</th>
                    <th>MIDDLE NAME</th>
                    <th>STREET</th>
                    <th>CITY</th>
                    <th>ZIP CODE</th>
                    <th>PROVINCE</th>
                    <th>CONTACT NUMBER</th>
                    <th>TIN</th>
                    <th>NATIONALITY</th>
                    <th>GENDER</th>
                    <th>BIRTH DATE</th>
                    <th>HEIGHT</th>
                    <th>WEIGHT</th>
                </tr>
            </thead>
            <?php
            while ($rows = sqlsrv_fetch_array($resultsUserData)) {
                echo "<tr>
                    <td>{$rows['FAMILY_NAME']}</td>
                    <td>{$rows['FIRST_NAME']}</td>
                    <td>{$rows['MIDDLE_NAME']}</td>
                    <td>{$rows['STREET']}</td>
                    <td>{$rows['CITY']}</td>
                    <td>{$rows['ZIP_CODE']}</td>
                    <td>{$rows['PROVINCE']}</td>
                    <td>{$rows['CONTACT_NUMBER']}</td>
                    <td>{$rows['TIN']}</td>
                    <td>{$rows['NATIONALITY']}</td>
                    <td>{$rows['GENDER']}</td>
                    <td>{$rows['BIRTH_DATE']}</td>
                    <td>{$rows['HEIGHT']}</td>
                    <td>{$rows['WEIGHT']}</td>
                  </tr>";
            }
            ?>
        </table>
        <form action="update1.php" method="post">
            <div style="display: flex; justify-content: center; margin-top: 10px;">
                <input type="submit" value="I want to update my personal information">
            </div>
        </form>

        <div><strong>APPLICATION DETAILS</strong></div>
        <table>
            <thead>
                <tr>
                    <th>APPLICATION TYPE</th>
                    <th>CHANGE ADDRESS</th>
                    <th>CHANGE CIVIL STATUS</th>
                    <th>CHANGE NAME</th>
                    <th>CHANGE BIRTHDATE</th>
                    <th>CHANGE OTHERS</th>
                    <th>LICENSE TYPE</th>
                    <th>DRIVING SKILL FROM</th>
                    <th>DRIVING SCHOOL NAME</th>
                    <th>EDUCATIONAL ATTAINMENT</th>
                </tr>
            </thead>
            <?php
            while ($rows = sqlsrv_fetch_array($resultsAppDetails)) {
                echo "<tr>
                    <td>{$rows['APPLICATION_TYPE']}</td>
                    <td>{$rows['CHANGE_ADDRESS']}</td>
                    <td>{$rows['CHANGE_CIVIL_STATUS']}</td>
                    <td>{$rows['CHANGE_NAME']}</td>
                    <td>{$rows['CHANGE_BIRTHDATE']}</td>
                    <td>{$rows['CHANGE_OTHERS']}</td>
                    <td>{$rows['LICENSE_TYPE']}</td>
                    <td>{$rows['DRIVING_SKILL_FROM']}</td>
                    <td>{$rows['DRIVING_SCHOOL_NAME']}</td>
                    <td>{$rows['EDUCATIONAL_ATTAINMENT']}</td>
                  </tr>";
            }
            ?>
        </table>
        <form action="update-lic1.php" method="post">
            <div style="display: flex; justify-content: center; margin-top: 10px;">
                <input type="submit" value="I want to change my license type">
            </div>
        </form>

        <div><strong>USER BIO</strong></div>
        <table>
            <thead>
                <tr>
                    <th>BLOOD TYPE</th>
                    <th>ORGAN DONOR</th>
                    <th>CIVIL STATUS</th>
                    <th>HAIR</th>
                    <th>EYES</th>
                    <th>BUILT</th>
                    <th>COMPLEXION</th>
                    <th>BIRTHPLACE CITY</th>
                    <th>BIRTHPLACE PROVINCE</th>
                    <th>FATHER'S FAMILY NAME</th>
                    <th>FATHER'S FIRST NAME</th>
                    <th>FATHER'S MIDDLE NAME</th>
                    <th>MOTHER'S FAMILY NAME</th>
                    <th>MOTHER'S FIRST NAME</th>
                    <th>MOTHER'S MIDDLE NAME</th>
                    <th>SPOUSE'S FAMILY NAME</th>
                    <th>SPOUSE'S FIRST NAME</th>
                    <th>SPOUSE'S MIDDLE NAME</th>
                </tr>
            </thead>
            <?php
            while ($rows = sqlsrv_fetch_array($resultsUserBio)) {
                echo "<tr>
                    <td>{$rows['BLOOD_TYPE']}</td>
                    <td>{$rows['ORGAN_DONOR']}</td>
                    <td>{$rows['CIVIL_STATUS']}</td>
                    <td>{$rows['HAIR']}</td>
                    <td>{$rows['EYES']}</td>
                    <td>{$rows['BUILT']}</td>
                    <td>{$rows['COMPLEXION']}</td>
                    <td>{$rows['BIRTHPLACE_CITY']}</td>
                    <td>{$rows['BIRTHPLACE_PROVINCE']}</td>
                    <td>{$rows['FATHER_FAMILY_NAME']}</td>
                    <td>{$rows['FATHER_FIRST_NAME']}</td>
                    <td>{$rows['FATHER_MIDDLE_NAME']}</td>
                    <td>{$rows['MOTHER_FAMILY_NAME']}</td>
                    <td>{$rows['MOTHER_FIRST_NAME']}</td>
                    <td>{$rows['MOTHER_MIDDLE_NAME']}</td>
                    <td>{$rows['SPOUSE_FAMILY_NAME']}</td>
                    <td>{$rows['SPOUSE_FIRST_NAME']}</td>
                    <td>{$rows['SPOUSE_MIDDLE_NAME']}</td>
                  </tr>";
            }
            ?>
        </table>

        <div><strong>WORK DATA</strong></div>
        <table>
            <thead>
                <tr>
                    <th>EMPLOYER'S NAME</th>
                    <th>EMPLOYER'S CONTACT</th>
                    <th>EMPLOYER'S STREET</th>
                    <th>EMPLOYER'S CITY</th>
                    <th>EMPLOYER'S ZIP</th>
                    <th>EMPLOYER'S PROVINCE</th>
                </tr>
            </thead>
            <?php
            while ($rows = sqlsrv_fetch_array($resultsWorkData)) {
                echo "<tr>
                    <td>{$rows['EMPLOYER_NAME']}</td>
                    <td>{$rows['EMPLOYER_CONTACT']}</td>
                    <td>{$rows['EMPLOYER_STREET']}</td>
                    <td>{$rows['EMPLOYER_CITY']}</td>
                    <td>{$rows['EMPLOYER_ZIP']}</td>
                    <td>{$rows['EMPLOYER_PROVINCE']}</td>
                  </tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>