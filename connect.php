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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form has been submitted before processing.
    // USER_DATA
    $USER_FAMILY_NAME = $_POST['USER_FAMILY_NAME'];
    $USER_FIRST_NAME = $_POST['USER_FIRST_NAME'];
    $USER_MIDDLE_NAME = $_POST['USER_MIDDLE_NAME'];
    $USER_STREET = $_POST['USER_STREET'];
    $USER_CITY = $_POST['USER_CITY'];
    $USER_ZIP = $_POST['USER_ZIP'];
    $USER_PROVINCE = $_POST['USER_PROVINCE'];
    $CONTACT_NUMBER = $_POST['CONTACT_NUMBER'];
    $TIN = $_POST['TIN'];
    $NATIONALITY = $_POST['NATIONALITY'];
    $GENDER = $_POST['GENDER'];
    $BIRTH_DATE = $_POST['BIRTH_DATE'];
    $HEIGHT = $_POST['HEIGHT'];
    $WEIGHT = $_POST['WEIGHT'];

    $sql1 = "INSERT INTO USER_DATA (
        FAMILY_NAME, 
        FIRST_NAME, 
        MIDDLE_NAME,
        STREET,
        CITY,
        ZIP_CODE,
        PROVINCE,
        CONTACT_NUMBER,
        TIN,
        NATIONALITY,
        GENDER,
        BIRTH_DATE,
        HEIGHT,
        WEIGHT) VALUES (
            '$USER_FAMILY_NAME', 
            '$USER_FIRST_NAME', 
            '$USER_MIDDLE_NAME',
            '$USER_STREET',
            '$USER_CITY',
            '$USER_ZIP',
            '$USER_PROVINCE',
            '$CONTACT_NUMBER',
            '$TIN',
            '$NATIONALITY',
            '$GENDER',
            '$BIRTH_DATE',
            '$HEIGHT',
            '$WEIGHT')";

    $results1 = sqlsrv_query($conn, $sql1);

    // Check for errors in data insertion.
    if (!$results1) {
        echo 'Error in USER_DATA insertion: ' . print_r(sqlsrv_errors(), true);
    } else {
        // Retrieve the USERID of the inserted user
        $sqlGetUserID = "SELECT SCOPE_IDENTITY() AS USERID";
        $stmt = sqlsrv_query($conn, $sqlGetUserID);

        // Check for errors in retrieving USERID.
        if ($stmt === false) {
            echo 'Error in retrieving USERID: ' . print_r(sqlsrv_errors(), true);
        } else {
            // Fetch the USERID
            if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $USERID = $row['USERID'];

                // APPLICATION_DETAILS
                $APPLICATION_TYPE = $_POST['APPLICATION_TYPE'];
                $CHANGE_ADDRESS = isset($_POST['CHANGE_ADDRESS']) ? $_POST['CHANGE_ADDRESS'] : '0';
                $CHANGE_CIVIL_STATUS = isset($_POST['CHANGE_CIVIL_STATUS']) ? $_POST['CHANGE_CIVIL_STATUS'] : '0';
                $CHANGE_NAME = isset($_POST['CHANGE_NAME']) ? $_POST['CHANGE_NAME'] : '';
                $CHANGE_BIRTHDATE = isset($_POST['CHANGE_BIRTHDATE']) ? $_POST['CHANGE_BIRTHDATE'] : '0';
                $CHANGE_OTHERS = isset($_POST['CHANGE_OTHERS']) ? $_POST['CHANGE_OTHERS'] : '0';
                $LICENSE_TYPE = $_POST['LICENSE_TYPE'];
                $DRIVING_SKILL_FROM = $_POST['DRIVING_SKILL_FROM'];
                $DRIVING_SCHOOL_NAME = $_POST['DRIVING_SCHOOL_NAME'];
                $EDUCATIONAL_ATTAINMENT = $_POST['EDUCATIONAL_ATTAINMENT'];

                $sql2 = "INSERT INTO APPLICATION_DETAILS (
                    USERID,
                    APPLICATION_TYPE, 
                    CHANGE_ADDRESS, 
                    CHANGE_CIVIL_STATUS,
                    CHANGE_NAME,
                    CHANGE_BIRTHDATE,
                    CHANGE_OTHERS,
                    LICENSE_TYPE,
                    DRIVING_SKILL_FROM,
                    DRIVING_SCHOOL_NAME,
                    EDUCATIONAL_ATTAINMENT) VALUES (
                        '$USERID',
                        '$APPLICATION_TYPE', 
                        '$CHANGE_ADDRESS',
                        '$CHANGE_CIVIL_STATUS',
                        '$CHANGE_NAME',
                        '$CHANGE_BIRTHDATE',
                        '$CHANGE_OTHERS',
                        '$LICENSE_TYPE',
                        '$DRIVING_SKILL_FROM',
                        '$DRIVING_SCHOOL_NAME',
                        '$EDUCATIONAL_ATTAINMENT')";

                $results2 = sqlsrv_query($conn, $sql2);

                // Check for errors in data insertion.
                if (!$results2) {
                    echo 'Error in APPLICATION_DETAILS insertion: ' . print_r(sqlsrv_errors(), true);
                } else {
                    // Retrieve the APPLICATION_DETAILS of the inserted user
                    $sqlGetAppID = "SELECT SCOPE_IDENTITY() AS APPLICATIONID";
                    $stmt = sqlsrv_query($conn, $sqlGetAppID);

                    // Check for errors in retrieving APPLICATIONID
                    if ($stmt === false) {
                        echo 'Error in retrieving APPLICATIONID: ' . print_r(sqlsrv_errors(), true);
                    } else {
                        // Fetch the APPLICATIONID
                        if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                            $APPLICATIONID = $row['APPLICATIONID'];

                            //USER BIO
                            $BLOOD_TYPE = $_POST['BLOOD_TYPE'];
                            $ORGAN_DONOR = $_POST['ORGAN_DONOR'];
                            $CIVIL_STATUS = $_POST['CIVIL_STATUS'];
                            $HAIR = isset($_POST['HAIR']) ? $_POST['HAIR'] : '';
                            $EYES = isset($_POST['EYES']) ? $_POST['EYES'] : '';
                            $BUILT = $_POST['BUILT'];
                            $COMPLEXION = $_POST['COMPLEXION'];
                            $BIRTHPLACE_CITY = $_POST['BIRTHPLACE_CITY'];
                            $BIRTHPLACE_PROVINCE = $_POST['BIRTHPLACE_PROVINCE'];
                            $FATHER_FAMILY_NAME = $_POST['FATHER_FAMILY_NAME'];
                            $FATHER_FIRST_NAME = $_POST['FATHER_FIRST_NAME'];
                            $FATHER_MIDDLE_NAME = $_POST['FATHER_MIDDLE_NAME'];
                            $MOTHER_FAMILY_NAME = $_POST['MOTHER_FAMILY_NAME'];
                            $MOTHER_FIRST_NAME = $_POST['MOTHER_FIRST_NAME'];
                            $MOTHER_MIDDLE_NAME = $_POST['MOTHER_MIDDLE_NAME'];
                            $SPOUSE_FAMILY_NAME = $_POST['SPOUSE_FAMILY_NAME'];
                            $SPOUSE_FIRST_NAME = $_POST['SPOUSE_FIRST_NAME'];
                            $SPOUSE_MIDDLE_NAME = $_POST['SPOUSE_MIDDLE_NAME'];

                            if ($HAIR === "OTHERS") {
                                $HAIR = $_POST['HAIR_SPECIFY'];
                            } else {
                                $HAIR_SPECIFY = '';
                            }

                            if ($EYES === "OTHERS") {
                                $EYES = $_POST['EYES_SPECIFY'];
                            } else {
                                $EYES_SPECIFY = '';
                            }

                            $sql3 = "INSERT INTO USER_BIO (
                                USERID,
                                APPLICATIONID,
                                BLOOD_TYPE,
                                ORGAN_DONOR,
                                CIVIL_STATUS,
                                HAIR,
                                EYES,
                                BUILT,
                                COMPLEXION,
                                BIRTHPLACE_CITY,
                                BIRTHPLACE_PROVINCE,
                                FATHER_FAMILY_NAME,
                                FATHER_FIRST_NAME,
                                FATHER_MIDDLE_NAME,
                                MOTHER_FAMILY_NAME,
                                MOTHER_FIRST_NAME,
                                MOTHER_MIDDLE_NAME,
                                SPOUSE_FAMILY_NAME,
                                SPOUSE_FIRST_NAME,
                                SPOUSE_MIDDLE_NAME) VALUES (
                                    '$USERID',
                                    '$APPLICATIONID',
                                    '$BLOOD_TYPE',
                                    '$ORGAN_DONOR',
                                    '$CIVIL_STATUS',
                                    '$HAIR',
                                    '$EYES',
                                    '$BUILT',
                                    '$COMPLEXION',
                                    '$BIRTHPLACE_CITY',
                                    '$BIRTHPLACE_PROVINCE',
                                    '$FATHER_FAMILY_NAME',
                                    '$FATHER_FIRST_NAME',
                                    '$FATHER_MIDDLE_NAME',
                                    '$MOTHER_FAMILY_NAME',
                                    '$MOTHER_FIRST_NAME',
                                    '$MOTHER_MIDDLE_NAME',
                                    '$SPOUSE_FAMILY_NAME',
                                    '$SPOUSE_FIRST_NAME',
                                    '$SPOUSE_MIDDLE_NAME')";

                            $results3 = sqlsrv_query($conn, $sql3);

                            // WORK_DATA
                            $EMPLOYER_NAME = $_POST['EMPLOYER_NAME'];
                            $EMPLOYER_CONTACT = $_POST['EMPLOYER_CONTACT'];
                            $EMPLOYER_STREET = $_POST['EMPLOYER_STREET'];
                            $EMPLOYER_CITY = $_POST['EMPLOYER_CITY'];
                            $EMPLOYER_ZIP = $_POST['EMPLOYER_ZIP'];
                            $EMPLOYER_PROVINCE = $_POST['EMPLOYER_PROVINCE'];

                            $sql4 = "INSERT INTO WORK_DATA (
                                USERID,
                                EMPLOYER_NAME,
                                EMPLOYER_CONTACT,
                                EMPLOYER_STREET,
                                EMPLOYER_CITY,
                                EMPLOYER_ZIP,
                                EMPLOYER_PROVINCE) VALUES (
                                    '$USERID',
                                    '$EMPLOYER_NAME',
                                    '$EMPLOYER_CONTACT',
                                    '$EMPLOYER_STREET',
                                    '$EMPLOYER_CITY',
                                    '$EMPLOYER_ZIP',
                                    '$EMPLOYER_PROVINCE')";

                            $results4 = sqlsrv_query($conn, $sql4);

                            // Check for errors in data insertion.
                            if ($results2 || $results3 || $results4) {
                                echo 'Registration Successful';
                            } else {
                                echo 'Error in DATA insertion: ' . print_r(sqlsrv_errors(), true);
                            }
                        } else {
                            echo 'Failed to fetch USERID.';
                        }
                        sqlsrv_free_stmt($stmt);
                    }
                }
            } else {
                echo 'Failed to fetch USERID.';
            }
        }
    }
}
?>