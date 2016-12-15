<?php
$user = 'mctb';
$pass = 'mctb2015';
$host = 'localhost';
$dbname = 'mctb';
define('SITE_ROOT', 'http://10.114.32.109/'); 
session_start();

// Muodostetaan yhteys tietokantaan
try {     //Avataan yhteys tietokantaan ($DBH on nyt luotu yhteysolio, nimi vapaasti valittavissa)
	$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
           // virheenkäsittely: virheet aiheuttavat poikkeuksen
	$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	// käytetään  merkistöä utf8
	$DBH->exec("SET NAMES utf8;");
} catch(PDOException $e) {
	echo "Yhteysvirhe.";  
            //Kirjoitetaan mahdollinen virheviesti tiedostoon
	file_put_contents('DBErrors.txt', 'Connection: '.$e->getMessage()."\n", FILE_APPEND);
} //HUOM hakemistopolku!


 /*
 //*
 //* Hakee annetusta kannasta enintään annetun määrän uusimpia mediatuoteita.
 //* @param tietokantaosoitin $DBH
 //* @param montako mediatuotetta halutaan $count
 //* @return $mediat taulukko olioista
 */

function getNewestMedia($DBH, $count){
    try {
   	 //Haetaan $count muuttujan arvon verran uusimpia kuvia
   	 $mediaTuotteet = array(); //Taulukko haettaville kuva-olioille (mediatuote)


   	 $STH = $DBH->query("SELECT * FROM media ORDER BY date DESC LIMIT $count");


   	 $STH->setFetchMode(PDO::FETCH_OBJ);  //yksi rivi objektina
   	 while($mediaTuote = $STH->fetch()){
   		 $mediaTuotteet[] = $mediaTuote; //Lisätään objekti taulukon loppuun
   	 }
   	// print_r($mediaTuotteet);
   	 return $mediaTuotteet;
    } catch(PDOException $e) {
   	 file_put_contents('log/DBErrors.txt', 'getNewMedia(): '.$e->getMessage()."\n", FILE_APPEND);
   	 return false;
    }
    }
  


//This works in 5.2.3
//First function turns SSL on if it is off.
//Second function detects if SSL is on, if it is, turns it off.


//==== Redirect... Try PHP header redirect, then Java redirect, then try http redirect.:
function redirect($url){
    if (!headers_sent()){	//If headers not sent yet... then do php redirect
   	 header('Location: '.$url); exit;
    }else{                	//If headers are sent... do java redirect... if java disabled, do html redirect.
   	 echo '<script type="text/javascript">';
   	 echo 'window.location.href="'.$url.'";';
   	 echo '</script>';
   	 echo '<noscript>';
   	 echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
   	 echo '</noscript>'; exit;
    }
}//==== End -- Redirect


//==== Turn on HTTPS - Detect if HTTPS, if not on, then turn on HTTPS:
function SSLon(){
    if($_SERVER['HTTPS'] != 'on'){
   	 $url = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
   	 redirect($url);
    }
}//==== End -- Turn On HTTPS


//==== Turn Off HTTPS -- Detect if HTTPS, if so, then turn off HTTPS:
function SSLoff(){
    if($_SERVER['HTTPS'] == 'on'){
   	 $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
   	 redirect($url);
    }
}//==== End -- Turn Off HTTPS


/**
 * Etsii annetun käyttäjän tiedot kannasta
 * @param $user
 * @param $salasana
 * @param $DBH
 * @return $row käyttäjäolio ,boolean false jos annettua käyttäjää ja salasanaa löydy
 */
function login($user_name, $user_password, $DBH) {
	// !! on suola, jotta kantaan taltioitu eri hashkoodi vaikka salasana olisi tiedossa
	//kokeile !! ja ilman http://www.danstools.com/md5-hash-generator/
	//Tukevampia salauksia hash('sha256', $pwd ) tai hash('sha512', $pwd )
	//MD5 on 128 bittinen
	$hashpwd = hash('md5', $user_password.'!!'); //HUOM Suola
	//An array of values with as many elements as there are bound parameters in the 
	//SQL statement being executed. All values are treated as PDO::PARAM_STR
	$data = array('kayttajanimi' => $user_name, 'salasana' => $hashpwd);
	//print_r($data);
	try {
		//print_r($data);
		//echo "Login 1<br />";
		$STH = $DBH->prepare("SELECT * FROM kayttajat WHERE kayttajanimi=:kayttajanimi AND
		salasana = :salasana");
		//HUOM! SQL-lauseessa on monta muuttuvaa) tietoa. Ne on helppo antaa
		// assosiatiivisen taulukon avulla (eli indeksit merkkijonoja)
		//HUOM! Taulukko annetaan nyt execute() metodille
		$STH->execute($data);
		$STH->setFetchMode(PDO::FETCH_OBJ);
		$row = $STH->fetch();
		//print_r($row);
		if($STH->rowCount() > 0){
			//echo "Login 4<br />";
			return $row;
		} else {
			//echo "Login 5<br />";
			return false;
		}
	} catch(PDOException $e) {
		echo "Login DB error.";
		file_put_contents('log/DBErrors.txt', 'Login: '.$e->getMessage()."\n", FILE_APPEND);
	}
}


?>



