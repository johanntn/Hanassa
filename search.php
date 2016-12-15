<?php 
require_once("config.php"); 



try {

 if(!empty($_GET["haku"])){       
$haku = $_GET["haku"];
 

$sql="SELECT * FROM media WHERE rnimi LIKE " . "'".$haku."%'";
//echo($sql); Testi, miltä lause näyttää - lainausmerkit kohdallaan?


$omakysely = $DBH->prepare("SELECT * FROM media WHERE rnimi LIKE " . "'%".$haku."%'"); 


$omakysely->execute();
//echo(testi);
 while ($rivi = $omakysely->fetch()) {
    $new_array[] = $rivi["rnimi"]; // Inside while loop
   echo"<br /> • " .$rivi["rnimi"] ." ";
   //	echo "<form  action='' mehtod='post'><input class=kirjaudu name='ravi' type='submit' value='HANAT' /></form><br /> ";
	//$toimi = $new_array[0];
	//echo $toimi;
	
}
       }
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
} 
?>

<div align=center>

<form action="" method="post">
	</br>
	</br>
	Hae ravintolan kuvat nimen perusteella:	</br>
	<input type="text" name='khaku' placeholder='Haku'/>
	</br>
	</form>
	</br>


<?php
if(isset($_POST['khaku'])){
$khaku = $_POST['khaku'];
//echo $khaku;
$sql="SELECT * FROM media WHERE rnimi LIKE " . "'".$khaku."'";


 ?>	
<p> 



<ul style="list-style-type:none">
           	 
            	<?php 

            	//Haetaan esim. 12 uusinta
              	if($mediat = getNewestMediaR($DBH, 12)){
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
                		//echo($sql); 

              			
              	}
             	 
            ?>
</ul>
</p>
</div>
<script src="js/main-f.js"></script>
<?php
}



function getNewestMediaR($DBH, $count){


    try {
    if(isset($_POST['khaku'])){
	$khaku = $_POST['khaku'];

   	 //Haetaan $count muuttujan arvon verran uusimpia kuvia
   	 $mediaTuotteet = array(); //Taulukko haettaville kuva-olioille (mediatuote)
		

   	   	 $STH = $DBH->query("SELECT * FROM media WHERE rnimi LIKE " . "'".$khaku."'");
		$data['khaku'] = $_POST['khaku'];

   	 $STH->setFetchMode(PDO::FETCH_OBJ);  //yksi rivi objektina
   	 while($mediaTuote = $STH->fetch()){
   		 $mediaTuotteet[] = $mediaTuote; //Lisätään objekti taulukon loppuun
   	 }
   	 //print_r($mediaTuotteet);
   	 return $mediaTuotteet;
	}
    } catch(PDOException $e) {
   	 return false;
    
    }
    }
    
?>