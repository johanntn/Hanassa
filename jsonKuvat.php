<?php
require_once("config.php");


//Hae kuvat tietokannasta
$kuvat=getNewestMedia($DBH, 4);
//Muunna oliotaulukko json muotoon
$jsonString = json_encode($kuvat);
//Palauta vastaus Ajax-pyyntöön
echo($jsonString);


?>