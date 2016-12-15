
<!DOCTYPE html>
<html>
<head>
	<style>
	</style>
	<link rel="stylesheet" type="text/css" href="style.css">
    <title>Hanassa</title>
</head>
<?php include ('header.php'); ?>


<body>

<div align=center>
<form action=''method="get">
	</br>
	<input class=kirjaudu type="submit" name="Rhaku" value="Hae kaikki ravintolat" />
</form>

	</form>
	
	
	<?php if(isset($_GET['Rhaku'])){
try {


$sql="SELECT rnimi FROM media";
//echo($sql); Testi, miltä lause näyttää - lainausmerkit kohdallaan?


$omakysely = $DBH->prepare("SELECT rnimi FROM media GROUP BY rnimi"); 


$omakysely->execute();
//echo(testi);
 while ($rivi = $omakysely->fetch()) {
   echo"<br /> • " .$rivi["rnimi"] ." ";
   //	echo "<form  action='' mehtod='post'><input class=kirjaudu name='ravi' type='submit' value='HANAT' /></form><br /> ";
	//$toimi = $new_array[0];
	//echo $toimi;
	
}
       
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}
} 
?>
<form action="" method="get">

	</br>
	tai hae ravintolaa nimen perusteella:</br>
	<input type="text" name='haku' placeholder='Haku'/>
	</br>
	</form>
	</br>
	
<?php require_once ("search.php")
?>


</div>	 
	</body>
</html>