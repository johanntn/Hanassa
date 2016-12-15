<!DOCTYPE html>
<html>
<head>
	<style>
	</style>
	<link rel="stylesheet" type="text/css" href="style.css">
    <title>Hanassa</title>
</head>


<body>
<div align = "center">

<?php include ('header.php'); ?>



<form action= "regsubmit.php" method="post">
		
	<br/> <br/>	

	Kaikki kohdat on täytettävä </br> </br>
	Käyttäjänimi:<br/>	
	<input type="text" name="kayttajanimi"  placeholder="Nimi" required/><br/> <br/>

	Sposti:<br/>		
	<input type="email" name="sposti" placeholder="email@osoite.fi" required/><br/> <br/>
		
	Salasana:<br/>	
	<input type="password" name="salasana" placeholder="Salasana" required/><br/> <br/>
	
	Toista salasana:</br>
	<input type="password" name="salasana2" placeholder="Salasana uudestaan" required/><br/> <br/>
	</br>
	<input class=kirjaudu name="reg" type= "submit" value="Tallenna">
	</form>	
	
<br/> <br/>			  

</form>


	</div>
	
	

</body>
</html> 
 