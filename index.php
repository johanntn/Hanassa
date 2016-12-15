<?php include ('config.php'); ?>
<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="stylesheet" type="text/css" href="style.css">
<title> Hanassa </title>

</head> 
<body>
<?php include ('header.php'); ?>
</br>
<div align=center>

<p> 
<form  action="Haku.php">
	<input class=kirjaudu type="submit" value="Hae" />
	</form>




<ul style="list-style-type:none">
           	 
            	<?php 

            	//Haetaan esim. 12 uusinta
              	if($mediat = getNewestMedia($DBH, 12)){
                 	foreach($mediat as $media){
/*HUOM -> notaatio, koska $media on OLIO sisältäen kuvan tiedot!!
//mediat on puolestaan taulukko näistä olioista */
               		// print_r($media);
               		 
               		 ?>
               		 
               		 
               		 <li>
               		 
               		   <figure>
                   		 <a href="<?php echo($media->murl);?>">
                   		 <img src="<?php echo($media->murl);?>" width="580"></a>
                   		 <figcaption>
                       		 <h3><?php echo($media->rnimi); ?></h3>
                       		 <h3><?php echo($media->date); ?></h3>
                   		 </figcaption>
               		   </figure>
            		 </li>  
                	<?php
                 	}
              	}else{
                		echo("Haku epäonnistui");
              	}
             	 
            	?>
</ul>
</p>
</div>
 <script src="js/main-f.js"></script>
</body>
</html>