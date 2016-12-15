<!DOCTYPE html>
<html>
<head>
	<style>
	</style>
	<link rel="stylesheet" type="text/css" href="style.css">
    <title>Hanassa</title>
</head>
<div align = "center">
<a href='http://10.114.32.109/' ><img src="Logo.png"/></a>
</br>
<?php 
include("config.php"); 
?>
				Kuva ladattu,
				<form action="" method="get">
				anna ravintolan nimi:<br/>
				<input type="text" name='rnimi' placeholder='Ravintolan nimi:'/>
				<input class=kirjaudu type= "submit" value="Lähetä">
				</form>
				
				
<?php 

try {

 if(!empty($_GET["rnimi"])){       
$rnimi = $_GET["rnimi"];

$sql="UPDATE media SET rnimi = :rnimi order by date DESC limit 1";
//echo ($sql); 

$stmt = $DBH->prepare("UPDATE media SET rnimi = :rnimi order by date DESC limit 1"); 
$data['rnimi']= $rnimi;
$stmt->execute($data);
 echo "Ravintolan nimi tallennettu.</br></br>";
	echo "<form action='index.php'><input class=kirjaudu type='submit' value='Etusivulle' /></form>";
            
}
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
} 

 


 

?>

</div>
</html>