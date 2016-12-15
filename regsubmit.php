
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title> Hanassa </title>

</head>
<body> 

<div align=center>
<a href='http://10.114.32.109/' ><img src="Logo.png"/></a>
</br>
<?php 

require_once('config.php');



	if(isset($_POST) & ! empty($_POST)){
	$user_name = $_POST['kayttajanimi'];
	$user_email = $_POST['sposti'];
	$user_password = md5($_POST['salasana']);
 
            $_SESSION['kayttajanimi'] = $user_name;
            $_SESSION['sposti'] = $user_email;

            
 
			if($_POST['salasana'] == $_POST['salasana2']){
  			try
  			{ 
  
   				$stmt = $DBH->prepare("SELECT * FROM kayttaja WHERE sposti =:kayttajanimi");
   				$stmt->execute(array(":kayttajanimi"=>$user_name));
   				$count = $stmt->rowCount();
   
   					if($count==0){
    
   					$stmt = $DBH->prepare("INSERT INTO kayttaja(kayttajanimi,sposti,salasana) VALUES(:user_name, :user_email, :user_password)");
   					$stmt->bindParam(":user_name",$user_name);
   					$stmt->bindParam(":user_email",$user_email);
 					$stmt->bindParam(":user_password",$user_password);

     
   							 if($stmt->execute()){
     							echo "</br> Käyttäjä rekisteröity </br> Palaa etusivulle."; // teejtn
   								}else{
     							echo "Jokin meni pieleen..</br> Palaa etusivulle.";
    							} 
   				}else{
   			 	echo "käyttäjä on jo olemassa.</br> Palaa etusivulle."; //  not available
  				}
    
  		}
  		

  		catch(PDOException $e){
       		echo $e->getMessage();
  		}
  


  		}else{
  		echo "Salasanat eivät täsmää.</br> Palaa etusivulle.";
  		}
    } 


?> 

</div>

</body>
</html>