<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
    <style>
        tr,td {
            font-size: 10pt;
            font-weight: bold;
            margin-left: 100px;
            font-family: Arial ;
            border: darkgray;
            background-color: antiquewhite;
            border-style: double;
            border-color: #868074;
        }
    </style>
</head>
<body>
<?php
@session_start();
if (!isset($_SESSION["tableRows"])) $_SESSION["tableRows"] = array();
date_default_timezone_set("Europe/Moscow");
$x = (float) $_GET["xvalue"];
$y = (float) $_GET["yvalue"];
$r = (float) $_GET["rvalue"];
$coordsStatus = checkCoordinates($x, $y, $r);
$currentTime = date("H : i : s");
$sessionTime = microtime((true) - $_SERVER["REQUEST_TIME_FLOAT"]);
array_push($_SESSION["tableRows"], "<tr>
<td>$x</td>
<td>$y</td>
<td>$r</td>
<td>$coordsStatus</td>
<td>$currentTime</td>
<td>$sessionTime</td>
</tr>");
echo "<table id='outputTable'>
        <tr>
            <th>x</th>
            <th>y</th>
            <th>r</th>
            <th>Попал?</th>
            <th>Текущее время</th>
            <th>Время работы скрипта</th>
        </tr>";
foreach ($_SESSION["tableRows"] as $tableRow) echo $tableRow;
echo "</table>";


function checkCoordinates($x, $y, $r){
    if ((($x <= 0) && ($y <= 0) && ($x >= -$r) && ($y >= -$r)) ||
        ($x >= 0) && ($y <= 0) && (($x**2 + $y**2) <= ($r**2))  ||
        (($x >= 0) && ($y >= 0) && ($x + $y <= $r/2))) return "попал";
    else return "не попал";
}
?>
</body>
</html>