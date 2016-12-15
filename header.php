
<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title> Hanassa </title>

</head>
<body> 

<div align=center>
<a href='http://10.114.32.109/' ><img src="Logo.png"/></a>

<?php 
if(isset($_SESSION['kirjautunut'])) {


 echo "<form  action='logout.php'><input class=kirjaudu type='submit' value='Kirjaudu ulos' /></form>";
 echo "</br> <form action = 'imgupload.php'><input class=kirjaudu type='submit' value='Lataa kuva' /></form></br>";
} else {



echo "</br><form  action='Kirjaudu.php'><input class=kirjaudu type='submit' value='Kirjaudu' /></form></br>";
}
?>		

 
	
</div>



</body>
</html>