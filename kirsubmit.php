
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title> Hanassa </title>

</head>
<body> 

<div align=center>
<?php 

require_once('config.php');


if(isset($_POST) & ! empty($_POST)){
$user_name = $_POST['kayttajanimi'];
$user_password =  md5($_POST['salasana']);
 


 

  
 // try
  //{ 
  
   $stmt = $DBH->prepare("SELECT * FROM kayttaja WHERE kayttajanimi =:kayttajanimi AND salasana = :salasana");
   $stmt->execute(array(":kayttajanimi"=>$user_name, ":salasana"=>$user_password));
   $count = $stmt->rowCount();
   
   if($count==1){
   $kayttaja = $stmt->fetch();
   
			$_SESSION['kirjautunut'] = 'yes';

            $_SESSION['kayttajanimi'] = $user_name;
            $_SESSION['kayttajaID'] = $kayttaja['kID'];
            echo "Kirjautuminen onnistui </br></br>";
            echo "<form action='index.php'><input class=kirjaudu type='submit' value='Etusivulle' /></form>";
            
  
   }
   else{
    
    echo "Käyttäjänimi ja salasana eivät täsmää."; //  not available
   }

}







?>
</div>

</body>
</html>