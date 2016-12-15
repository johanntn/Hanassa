
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title> Hanassa </title>
</head>
<?php include ('header.php'); ?>
<body>

<div align = "center">
</br>
<form action="upload.php" method="post" enctype="multipart/form-data">
<tr>
    Valitse tiedosto:
    </br>
    </br>
    <input class=kirjaudu type="file" name="fileToUpload" id="fileToUpload">
</br></br>
    <input class= kirjaudu type="submit" value="Lataa kuva" name="submit">
</form>
</div>

</body>
</html>