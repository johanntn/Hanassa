<!DOCTYPE html>
<html>
<head>
	<style>
	</style>
	<link rel="stylesheet" type="text/css" href="style.css">
    <title>Hanassa</title>
</head>


 <?php
include 'config.php';

$target_dir = "Hanassa/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Tiedosto muoto on " . $check["mime"] . ".</br>";
        $uploadOk = 1;
    } else {
        echo "Tiedosto ei ole kuva-muodossa</br>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Tiedosto on jo olemassa.</br>";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Ainoastaan JPG, JPEG, PNG & GIF tiedostot ovat suotavia.</br>";
    $uploadOk = 0;
    
    
}else {
}     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
        echo "Tiedosto ". basename( $_FILES["fileToUpload"]["name"]). " </br>Tiedosto on ladattu.";
				// Tässä kohtaa kuva on tallennettu uploads kansioon
                // Ota yhteys tietokantaan liittämällä config.php esim.  require_once() tai include() funktiolla
                require_once("config.php");
                // SQL lause esim:
                $haku = $DBH->prepare("INSERT INTO media (murl, kayttajanimi) VALUES (:target_file, :kID)") ;
                $data['target_file'] = $target_file;
               $data['kID'] = $_SESSION['kayttajaID'];
                // yläpuolella oletan että käyttäjän tiedot on tallennettu sessioon kirjautumisen yhteydessä. Käyttäjä ID:n avulla kerrotaan kenelle käyttäjälle kuva kuuluu
                // ajetaan sql-lause:
                $haku->execute($data);
                redirect('tiedonsiirto.php');


    } else {
        echo "</br>Lataus epäonnistui";
    }

        		

?>





</html>