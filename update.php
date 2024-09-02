<?php
session_start();
$USERID = $_SESSION['USERID'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Records</title>

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
            margin: 150px auto 20px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-style: solid;
            border-width: 1px;
            border-radius: 20px;
            width: max-content;
        }

        body {
            font-family: Arial, sans-serif;
            text-align: left;
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

        .update {
            background-color: #003366;
            color: white;
            padding: 10px 20px;
            border: solid;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 20px;
            transition: background-color 0.3s, color 0.3s;
        }

        .update:hover {
            background-color: white;
            color: #003366;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Edit your Personal Information</h1>
    </div>
    <div class="container">
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

        $sqlUserData = "SELECT FAMILY_NAME, 
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
                            WEIGHT
                    FROM USER_DATA WHERE USERID=IDENT_CURRENT('USER_DATA')";
        $resultsUserData = sqlsrv_query($conn, $sqlUserData);
        $userData = sqlsrv_fetch_array($resultsUserData, SQLSRV_FETCH_ASSOC);
        ?>

        <form action="success-update.php" method="post">
            <div class="update-user-data">
                <label for="full-name">NAME: </label>
                <input type="text" name="USER_FAMILY_NAME" placeholder="Family Name"
                    value="<?php echo $userData['FAMILY_NAME']; ?>">
                <input type="text" name="USER_FIRST_NAME" placeholder="First Name"
                    value="<?php echo $userData['FIRST_NAME']; ?>">
                <input type="text" name="USER_MIDDLE_NAME" placeholder="Middle Name"
                    value="<?php echo $userData['MIDDLE_NAME']; ?>"><br><br>
                <label for="address">PRESENT ADDRESS: </label>
                <input type="text" name="USER_STREET" placeholder="No., Street"
                    value="<?php echo $userData['STREET']; ?>">
                <label for="city">CITY/MUNICIPALITY: </label>
                <select id="city" name="USER_CITY">
                    <option value="default" disabled hidden>Select City/Municipality</option>
                    <?php
                    $cities = [
                        "DASMARINAS",
                        "CAVITE",
                        "TAGAYTAY",
                        "TRECE_MARTIRES",
                        "ALFONSO",
                        "AMADEO",
                        "BACOOR",
                        "CARMONA",
                        "GENERAL_EMILIO_AGUINALDO",
                        "GENERAL_MARIANO_ALVAREZ",
                        "GENERAL_TRIAS",
                        "IMUS",
                        "INDANG",
                        "KAWIT",
                        "MAGALLANES",
                        "MARAGONDON",
                        "MENDEZ",
                        "NAIC",
                        "NOVELETA",
                        "ROSARIO",
                        "SILANG",
                        "TANZA",
                        "TERNATE",
                        "BATANGAS",
                        "LIPA",
                        "TANAUAN",
                        "STO_TOMAS",
                        "BAUAN",
                        "NASUGBU",
                        "CALACA",
                        "LEMERY",
                        "SAN_PASCUAL",
                        "TAAL",
                        "AGONCILLO",
                        "ALITAGTAG",
                        "BALAYAN",
                        "CALATAGAN",
                        "CUENCA",
                        "IBAAN",
                        "LAUREL",
                        "LIAN",
                        "LOBO",
                        "MABINI",
                        "MALVAR",
                        "MATAAS_NA_KAHOY",
                        "PADRE_GARCIA",
                        "ROSARIO",
                        "SAN_JOSE",
                        "SAN_JUAN",
                        "SAN_LUIS",
                        "SAN_NICOLAS",
                        "SAN_TERESITA",
                        "TAAL",
                        "TAYSAN",
                        "TINGLOY",
                        "TUY",
                        "BINAN",
                        "CABUYAO",
                        "CALAMBA",
                        "SAN_PABLO",
                        "SANTA_ROSA",
                        "ALAMINOS",
                        "BAY",
                        "CALAUAN",
                        "CAVINTI",
                        "FAMY",
                        "KALAYAAN",
                        "LILIW",
                        "LOS_BAÑOS",
                        "LUISIANA",
                        "LUMBAN",
                        "MABITAC",
                        "MAGDALENA",
                        "MAJAYJAY",
                        "NAGCARLAN",
                        "PAETE",
                        "PAGSANJAN",
                        "PAKIL",
                        "PANGIL",
                        "PILA",
                        "RIZAL",
                        "SAN_PEDRO",
                        "SANTA_CRUZ",
                        "SANTA_MARIA",
                        "SINILOAN",
                        "VICTORIA",
                        "LUCENA",
                        "TAYABAS",
                        "CANDELARIA",
                        "DOLORES",
                        "LUCBAN",
                        "SARIAYA",
                        "TIAONG",
                        "AGDANGAN",
                        "ALABAT",
                        "ATIMONAN",
                        "BUENAVISTA",
                        "BURDEOS",
                        "CALAUAG",
                        "CATANAUAN",
                        "GENERAL_LUNA",
                        "GENERAL_NAKAR",
                        "GUINAYANGAN",
                        "GUMACA",
                        "INFANTA",
                        "JOMALIG",
                        "LOPEZ",
                        "MACALELON",
                        "MAUBAN",
                        "MULANAY",
                        "PADRE_BURGOS",
                        "PAGBILAO",
                        "PANUKULAN",
                        "PATNANUNGAN",
                        "PEREZ",
                        "PITOGO",
                        "PLARIDEL",
                        "POLILLO",
                        "QUEZON",
                        "REAL",
                        "SAMPALOC",
                        "SAN_ANDRES",
                        "SAN_ANTONIO",
                        "SAN_FRANCISCO",
                        "SAN_NARCISO",
                        "SARIAYA",
                        "TAGKAWAYAN",
                        "TIAONG",
                        "UNISAN",
                        "ANTIPOLO",
                        "ANGONO",
                        "BARAS",
                        "BINANGONAN",
                        "CAINTA",
                        "CARDONA",
                        "JALAJALA",
                        "MORONG",
                        "PILILLA",
                        "RODRIGUEZ",
                        "SAN_MATEO",
                        "TANAY",
                        "TAYTAY",
                        "TERESA"
                    ];

                    foreach ($cities as $city) {
                        echo "<option value=\"$city\"";
                        if ($userData['CITY'] == $city) {
                            echo " selected";
                        }
                        echo ">$city</option>";
                    }
                    ?>
                </select>
                <input id="zip" name="USER_ZIP" type="tel" placeholder="ZIP CODE" maxlength="4" pattern="[0-9]{4}"
                    value="<?php echo $userData['ZIP_CODE']; ?>">
                <label for="province">PROVINCE: </label>
                <select id="province" name="USER_PROVINCE">
                    <option value="default" disabled hidden>Select Province</option>
                    <?php
                    $provinces = ["CAVITE", "LAGUNA", "BATANGAS", "RIZAL", "QUEZON"];

                    foreach ($provinces as $province) {
                        echo "<option value=\"$province\"";
                        if ($userData['PROVINCE'] == $province) {
                            echo " selected";
                        }
                        echo ">$province</option>";
                    }
                    ?>
                </select><br><br>
                <label for="CONTACT_NUMBER">TEL NO./CP NO.: </label>
                <input type="tel" name="CONTACT_NUMBER" placeholder="09123456789"
                    value="<?php echo $userData['CONTACT_NUMBER']; ?>">
                <label for="TIN">TIN: </label>
                <input id="tin" name="TIN" type="tel" maxlength="15" pattern="[0-9-]+{15}"
                    placeholder="000 &dash; 123 &dash; 456 &dash; 001" value="<?php echo $userData['TIN']; ?>"><br><br>
                <label for="NATIONALITY">NATIONALITY: </label>
                <select id="NATIONALITY" name="NATIONALITY">
                    <option value="default" disabled hidden>Select Nationality</option>
                    <?php
                    $nationalities = [
                        "FILIPINO",
                        "AFGHAN",
                        "ALBANIAN",
                        "ALGERIAN",
                        "AMERICAN",
                        "ANDORRAN",
                        "ANGOLAN",
                        "ANTIGUANS",
                        "ARGENTINEDUCATIONAL_ATTAINMENTN",
                        "ARMENIAN",
                        "AUSTRALIAN",
                        "AUSTRIAN",
                        "AZERBAIJANI",
                        "BAHAMIAN",
                        "BAHRAINI",
                        "BANGLADESHI",
                        "BARBADIAN",
                        "BARBUDANS",
                        "BATSWANA",
                        "BELARUSIAN",
                        "BELGIAN",
                        "BELIZEDUCATIONAL_ATTAINMENTN",
                        "BENINESE",
                        "BHUTANESE",
                        "BOLIVIAN",
                        "BOSNIAN",
                        "BRAZILIAN",
                        "BRITISH",
                        "BRUNEIAN",
                        "BULGARIAN",
                        "BURKINABE",
                        "BURMESE",
                        "BURUNDIAN",
                        "CAMBODIAN",
                        "CAMEROONIAN",
                        "CANADIAN",
                        "CAPE VERDEDUCATIONAL_ATTAINMENTN",
                        "CENTRAL AFRICAN",
                        "CHADIAN",
                        "CHILEDUCATIONAL_ATTAINMENTN",
                        "CHINESE",
                        "COLOMBIAN",
                        "COMORAN",
                        "CONGOLESE",
                        "COSTA RICAN",
                        "CROATIAN",
                        "CUBAN",
                        "CYPRIOT",
                        "CZECH",
                        "DANISH",
                        "DJIBOUTI",
                        "DOMINICAN",
                        "DUTCH",
                        "EDUCATIONAL_ATTAINMENTST TIMORESE",
                        "ECUADOREDUCATIONAL_ATTAINMENTN",
                        "EGYPTIAN",
                        "EMIRIAN",
                        "EQUATORIAL GUINEDUCATIONAL_ATTAINMENTN",
                        "ERITREDUCATIONAL_ATTAINMENTN",
                        "ESTONIAN",
                        "ETHIOPIAN",
                        "FIJIAN",
                        "FINNISH",
                        "FRENCH",
                        "GABONESE",
                        "GAMBIAN",
                        "GEORGIAN",
                        "GERMAN",
                        "GHANAIAN",
                        "GREEK",
                        "GRENADIAN",
                        "GUATEMALAN",
                        "GUINEDUCATIONAL_ATTAINMENT-BISSAUAN",
                        "GUINEDUCATIONAL_ATTAINMENTN",
                        "GUYANESE",
                        "HAITIAN",
                        "HERZEGOVINIAN",
                        "HONDURAN",
                        "HUNGARIAN",
                        "I-KIRIBATI",
                        "ICELANDER",
                        "INDIAN",
                        "INDONESIAN",
                        "IRANIAN",
                        "IRAQI",
                        "IRISH",
                        "ISRAELI",
                        "ITALIAN",
                        "IVORIAN",
                        "JAMAICAN",
                        "JAPANESE",
                        "JORDANIAN",
                        "KAZAKHSTANI",
                        "KENYAN",
                        "KITTIAN AND NEVISIAN",
                        "KUWAITI",
                        "KYRGYZ",
                        "LAOTIAN",
                        "LATVIAN",
                        "LEBANESE",
                        "LIBERIAN",
                        "LIBYAN",
                        "LIECHTENSTEINER",
                        "LITHUANIAN",
                        "LUXEMBOURGER",
                        "MACEDONIAN",
                        "MALAGASY",
                        "MALAWIAN",
                        "MALAYSIAN",
                        "MALDIVIAN",
                        "MALIAN",
                        "MALTESE",
                        "MARSHALLESE",
                        "MAURITANIAN",
                        "MAURITIAN",
                        "MEXICAN",
                        "MICRONESIAN",
                        "MOLDOVAN",
                        "MONACAN",
                        "MONGOLIAN",
                        "MOROCCAN",
                        "MOSOTHO",
                        "MOTSWANA",
                        "MOZAMBICAN",
                        "NAMIBIAN",
                        "NAURUAN",
                        "NEPALESE",
                        "NEW ZEDUCATIONAL_ATTAINMENTLANDER",
                        "NI-VANUATU",
                        "NICARAGUAN",
                        "NIGERIAN",
                        "NIGERIEN",
                        "NORTH KOREDUCATIONAL_ATTAINMENTN",
                        "NORTHERN IRISH",
                        "NORWEGIAN",
                        "OMANI",
                        "PAKISTANI",
                        "PALAUAN",
                        "PANAMANIAN",
                        "PAPUA NEW GUINEDUCATIONAL_ATTAINMENTN",
                        "PARAGUAYAN",
                        "PERUVIAN",
                        "POLISH",
                        "PORTUGUESE",
                        "QATARI",
                        "ROMANIAN",
                        "RUSSIAN",
                        "RWANDAN",
                        "SAINT LUCIAN",
                        "SALVADORAN",
                        "SAMOAN",
                        "SAN MARINESE",
                        "SAO TOMEDUCATIONAL_ATTAINMENTN",
                        "SAUDI",
                        "SCOTTISH",
                        "SENEGALESE",
                        "SERBIAN",
                        "SEYCHELLOIS",
                        "SIERRA LEONEDUCATIONAL_ATTAINMENTN",
                        "SINGAPOREDUCATIONAL_ATTAINMENTN",
                        "SLOVAKIAN",
                        "SLOVENIAN",
                        "SOLOMON ISLANDER",
                        "SOMALI",
                        "SOUTH AFRICAN",
                        "SOUTH KOREDUCATIONAL_ATTAINMENTN",
                        "SPANISH",
                        "SRI LANKAN",
                        "SUDANESE",
                        "SURINAMER",
                        "SWAZI",
                        "SWEDISH",
                        "SWISS",
                        "SYRIAN",
                        "TAIWANESE",
                        "TAJIK",
                        "TANZANIAN",
                        "THAI",
                        "TOGOLESE",
                        "TONGAN",
                        "TRINIDADIAN OR TOBAGONIAN",
                        "TUNISIAN",
                        "TURKISH",
                        "TUVALUAN",
                        "UGANDAN",
                        "UKRAINIAN",
                        "URUGUAYAN",
                        "UZBEKISTANI",
                        "VENEZUELAN",
                        "VIETNAMESE",
                        "WELSH",
                        "YEMENITE",
                        "ZAMBIAN",
                        "ZIMBABWEDUCATIONAL_ATTAINMENTN"
                    ];

                    foreach ($nationalities as $nationality) {
                        echo "<option value=\"$nationality\"";
                        if ($userData['NATIONALITY'] == $nationality) {
                            echo " selected";
                        }
                        echo ">$nationality</option>";
                    }
                    ?>
                </select>
                <label>GENDER: </label>
                <input type="radio" name="GENDER" value="MALE" id="male" <?php echo ($userData['GENDER'] == 'MALE') ? 'checked' : ''; ?>>
                <label for="male">MALE</label>
                <input type="radio" name="GENDER" value="FEMALE" id="female" <?php echo ($userData['GENDER'] == 'FEMALE') ? 'checked' : ''; ?>>
                <label for="female">FEMALE</label><br><br>
                <label for="BIRTH_DATE">BIRTHDATE: </label>
                <input type="date" name="BIRTH_DATE" value="<?php echo $userData['BIRTH_DATE']; ?>">
                <label for="HEIGHT">HEIGHT (cm): </label>
                <input id="height" name="HEIGHT" type="number" value="<?php echo $userData['HEIGHT']; ?>">
                <label for="WEIGHT">WEIGHT (kg): </label>
                <input id="weight" name="WEIGHT" type="number" value="<?php echo $userData['WEIGHT']; ?>"><br><br>
            </div>
            <input class="update" type="submit" value="Update">
        </form>
    </div>
</body>

</html>