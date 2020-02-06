<?php //on utilise ici une autre stratégie que celle du routeur que vous avez vu en PPE1 pour uniformiser les pages de l'application. Il s'agit d'inclure sur chaque page du site des entetes et bas de page identiques 
	include ("header.php");
?>
<div class="container">
<?php
   try
   {
       $bdd = new PDO('mysql:host=localhost;dbname=ppe2;charset=utf8', 'root', 'root');
   }
   catch(Exception $e)
   {
           die('Erreur : '.$e->getMessage());
   }
   
   if(isset($_POST['nomPerso']) && $_POST['histoirePerso'] &&$_POST['libelleUnivers'] && $_POST['imageUnivers'] && $_POST['deviseUnivers'] && $_POST['libelleCamp'] != "") 
	{   if (isset($_GET['choix'])){
        $choix = htmlentities($_GET['choix']);
        }
            $req0 = $bdd->prepare('INSERT INTO univers(libelleUnivers, imageUnivers, deviseUnivers) VALUES(?, ?, ?)');
            $req0->execute(array($_POST['libelleUnivers'], $_POST['imageUnivers'], $_POST['deviseUnivers']));
            
            $rep = $bdd->query('SELECT idUnivers FROM univers ORDER BY idUnivers DESC LIMIT 0,1');
            $do = $rep->fetch();
            
            $req2 = $bdd->prepare('INSERT INTO camp(libelleCamp, idUnivers) VALUES(?, ?)');
            $req2->execute(array($_POST['libelleCamp'],$do['idUnivers']));
            
            $rep1 = $bdd->query('SELECT idUnivers FROM camp ORDER BY idUnivers DESC LIMIT 0,1');
            $do1 = $rep1->fetch();
            
            $rep2 = $bdd->query('SELECT idCamp FROM camp ORDER BY idCamp DESC LIMIT 0,1');
            $do2 = $rep2->fetch();
            
            $req = $bdd->prepare('INSERT INTO personnage(nomPerso, histoirePerso, idUnivers, idCamp) VALUES(?, ?, ?, ?)');
            $req->execute(array($_POST['nomPerso'], $_POST['histoirePerso'], $do1['idUnivers'], $do2['idCamp']));
            ?>
            <div class="alert alert-success" role="alert">
                Fiche bien enregistrée !
            </div>
            <?php
    }
    else{
		?>
		<div class="alert alert-danger" role="alert">
			Fiche non enregistrée...
		</div>
		<?php
	}
	?>

</div>
<div class="container">
	<div class="row">
    <div class="col-sm">
			<?php 
			echo "<div><u>Nom de l'univers : </u><br/>";
			if (isset($_POST['libelleUnivers'])){
				$libelleUnivers = htmlentities($_POST['libelleUnivers']);
				echo $libelleUnivers;
			}

			echo "</div>";
			?>
		</div>
        <div class="col-sm">
			<?php 
			echo "<div><u>Image de l'univers : </u><br/>";
			if (isset($_POST['imageUnivers'])){
				$imageUnivers = htmlentities($_POST['imageUnivers']);
				echo $imageUnivers;
			}
			
			echo "</div>";
			?>
		</div>
		<div class="col-sm">
			<?php 
			echo "<div><u>Nom du personnage : </u><br/>";
			if (isset($_POST['deviseUnivers'])){
				$deviseUnivers = htmlentities($_POST['deviseUnivers']);
				echo $deviseUnivers;
			}
			
			echo "</div>";
			?>
		</div>
		
		<div class="col-sm">
			<?php
			echo "<div><u>Histoire du personnage : </u><br/>";
			if (isset($_POST['histoirePerso'])){
				$histoirePerso = htmlentities($_POST['histoirePerso']);
				echo $histoirePerso;
			}
			
			echo "</div>";
			?>
		</div>
        <div class="col-sm">
			<?php 
			echo "<div><u>Nom du camp : </u><br/>";
			if (isset($_POST['libelleCamp'])){
				$libelleCamp = htmlentities($_POST['libelleCamp']);
				echo $libelleCamp;
			}
			
			echo "</div>";
			?>
		</div>
	</div>
</div>	
<?php 
		
		include ("footer.php");
	?>
    