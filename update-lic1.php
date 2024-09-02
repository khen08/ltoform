<?php
session_start();

$USERID = $_SESSION['USERID'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change License Type</title>

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
            padding: 50px;
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
        <h1>Change your License Type</h1>
    </div>
    <div class="container">
        <form action="success-lt1.php" method="post">
            <label class="title">TYPE OF LICENSE APPLIED FOR: </label><br>
            <input type="radio" name="LICENSE_TYPE" value="STUDENT PERMIT"><label for="LICENSE_TYPE">STUDENT
                PERMIT</label><br>
            <input type="radio" name="LICENSE_TYPE" value="NON-PROFESSIONAL"><label
                for="LICENSE_TYPE">NON-PROFESSIONAL</label><br>
            <input type="radio" name="LICENSE_TYPE" value="PROFESSIONAL"><label
                for="LICENSE_TYPE">PROFESSIONAL</label><br>
            <input type="radio" name="LICENSE_TYPE" value="CONDUCTOR"><label
                for="LICENSE_TYPE">CONDUCTOR</label><br><br>
            <input type="submit" value="Update">
        </form>
    </div>
</body>

</html>