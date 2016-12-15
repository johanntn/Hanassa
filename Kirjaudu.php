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
<div align = "center">



<form  action="kirsubmit.php" method="post">
		
	<br/> <br/>	

	Käyttäjänimi:<br/>	
	<input type="text" name="kayttajanimi"  placeholder="Nimi" required/><br/> <br/>
		
	Salasana:<br/>	
	<input type="password" name="salasana" placeholder="Salasana" required/><br/> <br/>
	</br>

	</br>
	<input class=kirjaudu type= "submit" value="Kirjaudu">
	</form>	
	
	<form action="register.php" method="post">
	</br>
	</br>
	tai
	</br>
	</br>
	<input class=kirjaudu type="submit" name='rek' value='Rekisteröidy' />
	
</form>
	
		



	</div>
	

</body>
</html> 
 