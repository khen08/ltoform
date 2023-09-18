<?php
// USER_DATA
$USER_FAMILY_NAME = $_POST['USER_FAMILY_NAME'];
$USER_FIRST_NAME = $_POST['USER_FIRST_NAME'];
$USER_MIDDLE_NAME = $_POST['USER_MIDDLE_NAME'];
$USER_STREET = $_POST['USER_STREET'];
$USER_CITY = isset($_POST['USER_CITY']) ? $_POST['USER_CITY'] : '';
$USER_ZIP = $_POST['USER_ZIP'];
$USER_PROVINCE = isset($_POST['USER_PROVINCE']) ? $_POST['USER_PROVINCE'] : '';
$CONTACT_NUMBER = $_POST['CONTACT_NUMBER'];
$TIN = isset($_POST['TIN']) ? $_POST['TIN'] : '';
$NATIONALITY = isset($_POST['NATIONALITY']) ? $_POST['NATIONALITY'] : '';
$GENDER = isset($_POST['GENDER']) ? $_POST['GENDER'] : '';
$BIRTH_DATE = $_POST['BIRTH_DATE'];
$HEIGHT = $_POST['HEIGHT'];
$WEIGHT = $_POST['WEIGHT'];

// APPLICATION_DETAILS
$APPLICATION_TYPE = isset($_POST['APPLICATION_TYPE']) ? $_POST['APPLICATION_TYPE'] : '';
$CHANGE_CLASSIFICATION = isset($_POST['CHANGE_CLASSIFICATION']) ? $_POST['CHANGE_CLASSIFICATION'] : '0';
$CHANGE_ADDRESS = isset($_POST['CHANGE_ADDRESS']) ? $_POST['CHANGE_ADDRESS'] : '0';
$CHANGE_CIVIL_STATUS = isset($_POST['CHANGE_CIVIL_STATUS']) ? $_POST['CHANGE_CIVIL_STATUS'] : '0';
$CHANGE_NAME = isset($_POST['CHANGE_NAME']) ? $_POST['CHANGE_NAME'] : '0';
$CHANGE_BIRTHDATE = isset($_POST['CHANGE_BIRTHDATE']) ? $_POST['CHANGE_BIRTHDATE'] : '0';
$CHANGE_OTHERS = isset($_POST['CHANGE_OTHERS']) ? $_POST['CHANGE_OTHERS'] : '0';
$LICENSE_TYPE = isset($_POST['LICENSE_TYPE']) ? $_POST['LICENSE_TYPE'] : '';
$DRIVING_SKILL_FROM = isset($_POST['DRIVING_SKILL_FROM']) ? $_POST['DRIVING_SKILL_FROM'] : '';
$DRIVING_SCHOOL_NAME = isset($_POST['DRIVING_SCHOOL_NAME']) ? $_POST['DRIVING_SCHOOL_NAME'] : '';
$EDUCATIONAL_ATTAINMENT = isset($_POST['EDUCATIONAL_ATTAINMENT']) ? $_POST['EDUCATIONAL_ATTAINMENT'] : '';

//USER BIO
$BLOOD_TYPE = isset($_POST['BLOOD_TYPE']) ? $_POST['BLOOD_TYPE'] : '';
$ORGAN_DONOR = isset($_POST['ORGAN_DONOR']) ? $_POST['ORGAN_DONOR'] : '';
$CIVIL_STATUS = isset($_POST['CIVIL_STATUS']) ? $_POST['CIVIL_STATUS'] : '';
$HAIR = isset($_POST['HAIR']) ? $_POST['HAIR'] : '';
$EYES = isset($_POST['EYES']) ? $_POST['EYES'] : '';
$HAIR_SPECIFY = isset($_POST['HAIR_SPECIFY']) ? $_POST['HAIR_SPECIFY'] : '';
$EYES_SPECIFY = isset($_POST['EYES_SPECIFY']) ? $_POST['EYES_SPECIFY'] : '';
$BUILT = isset($_POST['BUILT']) ? $_POST['BUILT'] : '';
$COMPLEXION = isset($_POST['COMPLEXION']) ? $_POST['COMPLEXION'] : '';
$BIRTHPLACE_CITY = isset($_POST['BIRTHPLACE_CITY']) ? $_POST['BIRTHPLACE_CITY'] : '';
$BIRTHPLACE_PROVINCE = isset($_POST['BIRTHPLACE_PROVINCE']) ? $_POST['BIRTHPLACE_PROVINCE'] : '';
$FATHER_FAMILY_NAME = isset($_POST['FATHER_FAMILY_NAME']) ? $_POST['FATHER_FAMILY_NAME'] : '';
$FATHER_FIRST_NAME = isset($_POST['FATHER_FIRST_NAME']) ? $_POST['FATHER_FIRST_NAME'] : '';
$FATHER_MIDDLE_NAME = isset($_POST['FATHER_MIDDLE_NAME']) ? $_POST['FATHER_MIDDLE_NAME'] : '';
$MOTHER_FAMILY_NAME = isset($_POST['MOTHER_FAMILY_NAME']) ? $_POST['MOTHER_FAMILY_NAME'] : '';
$MOTHER_FIRST_NAME = isset($_POST['MOTHER_FIRST_NAME']) ? $_POST['MOTHER_FIRST_NAME'] : '';
$MOTHER_MIDDLE_NAME = isset($_POST['MOTHER_MIDDLE_NAME']) ? $_POST['MOTHER_MIDDLE_NAME'] : '';
$SPOUSE_FAMILY_NAME = isset($_POST['SPOUSE_FAMILY_NAME']) ? $_POST['SPOUSE_FAMILY_NAME'] : '';
$SPOUSE_FIRST_NAME = isset($_POST['SPOUSE_FIRST_NAME']) ? $_POST['SPOUSE_FIRST_NAME'] : '';
$SPOUSE_MIDDLE_NAME = isset($_POST['SPOUSE_MIDDLE_NAME']) ? $_POST['SPOUSE_MIDDLE_NAME'] : '';

// WORK_DATA
$EMPLOYER_NAME = isset($_POST['EMPLOYER_NAME']) ? $_POST['EMPLOYER_NAME'] : '';
$EMPLOYER_CONTACT = isset($_POST['EMPLOYER_CONTACT']) ? $_POST['EMPLOYER_CONTACT'] : '';
$EMPLOYER_STREET = isset($_POST['EMPLOYER_STREET']) ? $_POST['EMPLOYER_STREET'] : '';
$EMPLOYER_CITY = isset($_POST['EMPLOYER_CITY']) ? $_POST['EMPLOYER_CITY'] : '';
$EMPLOYER_ZIP = isset($_POST['EMPLOYER_ZIP']) ? $_POST['EMPLOYER_ZIP'] : '';
$EMPLOYER_PROVINCE = isset($_POST['EMPLOYER_PROVINCE']) ? $_POST['EMPLOYER_PROVINCE'] : '';

// USER_DATA ERROR VARIABLES
$userFamilyNameError = "";
$userFirstNameError = "";
$userMiddleNameError = "";
$streetError = "";
$cityError = "";
$zipError = "";
$provinceError = "";
$contactError = "";
$nationalityError = "";
$genderError = "";
$birthDateError = "";
$heightError = "";
$weightError = "";

// USER_DATA CHECKER
if (empty($USER_FAMILY_NAME)) {
    $userFamilyNameError = "FAMILY NAME FIELD IS EMPTY!<br><br>";
    echo $userFamilyNameError;
}

if (empty($USER_FIRST_NAME)) {
    $userFirstNameError = "FIRST NAME FIELD IS EMPTY!<br><br>";
    echo $userFirstNameError;
}
if (empty($USER_MIDDLE_NAME)) {
    $userMiddleNameError = "MIDDLE NAME FIELD IS EMPTY!<br><br>";
    echo $userMiddleNameError;
}

if (empty($USER_STREET)) {
    $streetError = "STREET FIELD IS EMPTY!<br><br>";
    echo $streetError;
}

if (empty($USER_CITY)) {
    $cityError = "CITY FIELD IS EMPTY!<br><br>";
    echo $cityError;
}

if (empty($USER_ZIP)) {
    $zipError = "ZIP CODE FIELD IS EMPTY!<br><br>";
    echo $zipError;
}

if (empty($USER_PROVINCE)) {
    $provinceError = "PROVINCE FIELD IS EMPTY!<br><br>";
    echo $provinceError;
}

if (empty($CONTACT_NUMBER)) {
    $contactError = "CONTACT NUMBER FIELD IS EMPTY!<br><br>";
    echo $contactError;
}
if (strlen($CONTACT_NUMBER) != 11) {
    $contactError = "CONTACT NUMBER MUST HAVE 11 DIGITS!<br><br>";
}

if (empty($NATIONALITY)) {
    $nationalityError = "NATIONALITY FIELD IS EMPTY!<br><br>";
    echo $nationalityError;
}

if (empty($GENDER)) {
    $genderError = "GENDER FIELD IS EMPTY!<br><br>";
    echo $genderError;
}

if (empty($BIRTH_DATE)) {
    $birthDateError = "BIRTH DATE FIELD IS EMPTY!<br><br>";
    echo $birthDateError;
}

if (empty($HEIGHT)) {
    $heightError = "HEIGHT FIELD IS EMPTY!<br><br>";
    echo $heightError;
}

if (empty($WEIGHT)) {
    $weightError = "WEIGHT FIELD IS EMPTY!<br><br>";
    echo $weightError;
}

// APPLICATION_DETAILS ERROR VARIABLES
$applicationTypeError = "";
$changeClassificationError = "";
$changeAddressError = "";
$changeCivilStatusError = "";
$changeNameError = "";
$changeBirthdateError = "";
$changeOthersError = "";
$licenseTypeError = "";
$drivingSkillFromError = "";
$drivingSchoolNameError = "";
$educationalAttainmentError = "";

// APPLICATION_DETAILS CHECKER
if (empty($APPLICATION_TYPE)) {
    $applicationTypeError = "APPLICATION TYPE FIELD IS EMPTY!<br><br>";
    echo $applicationTypeError;
}

if (($APPLICATION_TYPE == "CHANGE CLASSIFICATION") && ($CHANGE_CLASSIFICATION == "0")) {
    $changeClassificationError = "PLEASE SELECT A CHANGE CLASSIFICATION!<br><br>";
    echo $changeClassificationError;
}

if (($CHANGE_CLASSIFICATION == "C1_P2N") || ($CHANGE_CLASSIFICATION == "C2_N2P")) {
    $APPLICATION_TYPE = $CHANGE_CLASSIFICATION;
}

if ((($APPLICATION_TYPE == "REVISION OF RECORDS") && empty($CHANGE_ADDRESS) && empty($CHANGE_CIVIL_STATUS) && empty($CHANGE_NAME) && empty($CHANGE_BIRTHDATE) && empty($CHANGE_OTHERS))) {
    $applicationTypeError = "PLEASE SELECT AT LEAST ONE FOR REVISION OF RECORDS<br><br>";
    echo $applicationTypeError;
}

if (empty($LICENSE_TYPE)) {
    $licenseTypeError = "LICENSE TYPE FIELD IS EMPTY!<br><br>";
    echo $licenseTypeError;
}

if (empty($DRIVING_SKILL_FROM)) {
    $drivingSkillFromError = "DRIVING SKILL FROM FIELD IS EMPTY!<br><br>";
    echo $drivingSkillFromError;
}
if ($DRIVING_SKILL_FROM == "DRIVING SCHOOL" && empty($DRIVING_SCHOOL_NAME)) {
    $drivingSchoolNameError = "DRIVING SCHOOL NAME FIELD IS EMPTY!<br><br>";
    echo $drivingSchoolNameError;
}

if (empty($EDUCATIONAL_ATTAINMENT)) {
    $educationalAttainmentError = "EDUCATIONAL ATTAINMENT FIELD IS EMPTY!<br><br>";
    echo $educationalAttainmentError;
}

// USER_BIO ERROR VARIABLES
$bloodTypeError = "";
$organDonorError = "";
$civilStatusError = "";
$hairError = "";
$eyesError = "";
$hairOthersError = "";
$eyesOthersError = "";
$builtError = "";
$complexionError = "";
$birthplaceCityError = "";
$birthplaceProvinceError = "";
$spouseFamilyNameError = "";
$spouseFirstNameError = "";
$spouseMiddleNameError = "";

// USER_BIO CHECKER
if (empty($BLOOD_TYPE)) {
    $bloodTypeError = "BLOOD TYPE FIELD IS EMPTY!<br><br>";
    echo $bloodTypeError;
}

if (empty($ORGAN_DONOR)) {
    $organDonorError = "ORGAN DONOR FIELD IS EMPTY!<br><br>";
    echo $organDonorError;
}

if (empty($CIVIL_STATUS)) {
    $civilStatusError = "CIVIL STATUS FIELD IS EMPTY!<br><br>";
    echo $civilStatusError;
}

if ((($CIVIL_STATUS == "MARRIED") || ($CIVIL_STATUS == "WIDOW")) && empty($SPOUSE_FAMILY_NAME)) {
    $spouseFamilyNameError = "SPOUSE FAMILY NAME FIELD IS EMPTY!<br><br>";
    echo $spouseFamilyNameError;
}

if ((($CIVIL_STATUS == "MARRIED") || ($CIVIL_STATUS == "WIDOW")) && empty($SPOUSE_FIRST_NAME)) {
    $spouseFirstNameError = "SPOUSE FIRST NAME FIELD IS EMPTY!<br><br>";
    echo $spouseFirstNameError;
}

if ((($CIVIL_STATUS == "MARRIED") || ($CIVIL_STATUS == "WIDOW")) && empty($SPOUSE_MIDDLE_NAME)) {
    $spouseMiddleNameError = "SPOUSE MIDDLE NAME FIELD IS EMPTY!<br><br>";
    echo $spouseMiddleNameError;
}

if (empty($HAIR)) {
    $hairError = "HAIR FIELD IS EMPTY!<br><br>";
    echo $hairError;
}

if (empty($EYES)) {
    $eyesError = "EYES FIELD IS EMPTY!<br><br>";
    echo $eyesError;
}

if ($HAIR === "OTHERS") {
    if (empty($HAIR_SPECIFY)) {
        $hairError = "PLEASE SPECIFY YOUR HAIR COLOR!<br><br>";
        echo $hairError;
    } else {
        $HAIR = $HAIR_SPECIFY;
    }
} else {
    $HAIR_SPECIFY = '';
}

if ($EYES === "OTHERS") {
    if (empty($EYES_SPECIFY)) {
        $eyesError = "PLEASE SPECIFY YOUR EYE COLOR!<br><br>";
        echo $eyesError;
    } else {
        $EYES = $EYES_SPECIFY;
    }
} else {
    $EYES_SPECIFY = '';
}


if (empty($BUILT)) {
    $builtError = "BUILT FIELD IS EMPTY!<br><br>";
    echo $builtError;
}

if (empty($COMPLEXION)) {
    $complexionError = "COMPLEXION FIELD IS EMPTY!<br><br>";
    echo $complexionError;
}

if (empty($BIRTHPLACE_CITY)) {
    $birthplaceCityError = "BIRTHPLACE CITY FIELD IS EMPTY!<br><br>";
    echo $birthplaceCityError;
}

if (empty($BIRTHPLACE_PROVINCE)) {
    $birthplaceProvinceError = "BIRTHPLACE PROVINCE FIELD IS EMPTY!<br><br>";
    echo $birthplaceProvinceError;
}

if (empty($TIN)) {
    $TIN = "N/A";
}

if (empty($DRIVING_SCHOOL_NAME)) {
    $DRIVING_SCHOOL_NAME = "N/A";
}

if (empty($FATHER_FAMILY_NAME)) {
    $FATHER_FAMILY_NAME = "N/A";
}

if (empty($FATHER_FIRST_NAME)) {
    $FATHER_FIRST_NAME = "N/A";
}

if (empty($FATHER_MIDDLE_NAME)) {
    $FATHER_MIDDLE_NAME = "N/A";
}

if (empty($MOTHER_FAMILY_NAME)) {
    $MOTHER_FAMILY_NAME = "N/A";
}

if (empty($MOTHER_FIRST_NAME)) {
    $MOTHER_FIRST_NAME = "N/A";
}

if (empty($MOTHER_MIDDLE_NAME)) {
    $MOTHER_MIDDLE_NAME = "N/A";
}

if (empty($SPOUSE_FAMILY_NAME)) {
    $SPOUSE_FAMILY_NAME = "N/A";
}

if (empty($SPOUSE_FIRST_NAME)) {
    $SPOUSE_FIRST_NAME = "N/A";
}

if (empty($SPOUSE_MIDDLE_NAME)) {
    $SPOUSE_MIDDLE_NAME = "N/A";
}

if (empty($EMPLOYER_NAME)) {
    $EMPLOYER_NAME = "N/A";
}

if (empty($EMPLOYER_CONTACT)) {
    $EMPLOYER_CONTACT = "N/A";
}

if (empty($EMPLOYER_STREET)) {
    $EMPLOYER_STREET = "N/A";
}

if (empty($EMPLOYER_CITY)) {
    $EMPLOYER_CITY = "N/A";
}

if (empty($EMPLOYER_ZIP)) {
    $EMPLOYER_ZIP = "N/A";
}

if (empty($EMPLOYER_PROVINCE)) {
    $EMPLOYER_PROVINCE = "N/A";
}

// WHEN NO ERRORS, CONNECT TO DATABASE AND INSERT DATA INTO THE TABLES

if (isset($_POST['submit'])) {
    if (
        $userFamilyNameError == "" &&
        $userFirstNameError == "" &&
        $userMiddleNameError == "" &&
        $streetError == "" &&
        $cityError == "" &&
        $zipError == "" &&
        $provinceError == "" &&
        $contactError == "" &&
        $nationalityError == "" &&
        $genderError == "" &&
        $birthDateError == "" &&
        $heightError == "" &&
        $weightError == "" &&
        $applicationTypeError == "" &&
        $changeClassificationError == "" &&
        $licenseTypeError == "" &&
        $drivingSkillFromError == "" &&
        $drivingSchoolNameError == "" &&
        $educationalAttainmentError == "" &&
        $bloodTypeError == "" &&
        $organDonorError == "" &&
        $civilStatusError == "" &&
        $hairError == "" &&
        $eyesError == "" &&
        $builtError == "" &&
        $complexionError == "" &&
        $birthplaceCityError == "" &&
        $birthplaceProvinceError == ""
    ) {
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
    }
}
?>