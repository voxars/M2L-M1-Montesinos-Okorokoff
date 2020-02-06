<?php //on utilise ici une autre stratégie que celle du routeur que vous avez vu en PPE1 pour uniformiser les pages de l'application. Il s'agit d'inclure sur chaque page du site des entetes et bas de page identiques 
	include ("header.php");
?>

<div class="container">
<h1> Affichage de la fiche </h1>
	<div class="row">
  
		<div class="col-sm">
			<?php
				$choix = 0;
				if (isset($_GET['choix'])){
					$choix = htmlentities($_GET['choix']);
				}
				if ($choix == 1){
					$image = "star-trek.png";
				}
				else if ($choix == 2){
					$image = "star-wars.png";
				}
				else {
					$image = "";
				}
				echo "<table><tr>";
				echo "<td><img src='".$image."' height='200px' /></td>";
				echo "</table>";
			?>
		</div>

		<div class="col-sm">
			<?php 
				echo "<div><u>Nom du personnage : </u><br/>";
				if (isset($_POST['nomPerso'])){
					$nomPerso = htmlentities($_POST['nomPerso']);
					echo $nomPerso;
				}
				else 
				{ 
					echo "pas de nom de perso";
				}
				echo "</div>";
			?>
		</div>
		<div class="col-sm">
			<?php
				echo "<div><u>Camp choisi : </u><br/>";
				$campRejoint = "pas de camp choisi";
				if (isset($_POST['camp'])){
					$camp = htmlentities($_POST['camp']);
					if (($camp == 0) and ($choix == 1)) {$campRejoint = "La Fédération";};
					if (($camp == 1) and ($choix == 1)) {$campRejoint = "Les Klingons";};
					if (($camp == 0) and ($choix == 2)) {$campRejoint = "Les Jedi";};
					if (($camp == 1) and ($choix == 2)) {$campRejoint = "Les Sith";};
				}
				echo $campRejoint;
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
				else { echo "pas d'histoire pour ce personnage";
				}
				echo "</div>";
			?>
		</div>
	</div>
</div>	

<div class="container">
	<?php	
		if(isset($_POST['nomPerso']) && $_POST['histoirePerso'] != "") 
		{   
			if (isset($_GET['choix'])){
				$choix = htmlentities($_GET['choix']);
			}
			$univers=$_GET['choix'];
			$req = $bdd->prepare('SELECT * FROM univers u WHERE idUnivers=?');
			$test = $req->execute(array($univers)); 
			$universData = $req->fetch();
			if ($choix == 1){
				$req = $bdd->prepare('INSERT INTO personnage(nomPerso, histoirePerso, idUnivers, idCamp) VALUES(?, ?, ?, ?)');
				$req->execute(array($_POST['nomPerso'], $_POST['histoirePerso'], $universData['idUnivers'], $_POST['camp']));
			?>
				<div class="alert alert-success" role="alert">
					Fiche bien enregistrée !
				</div>
			<?php
		}
		else if ($choix == 2){
			
			$req = $bdd->prepare('INSERT INTO personnage(nomPerso, histoirePerso, idUnivers, idCamp) VALUES(?, ?, ?, ?)');
			$req->execute(array($_POST['nomPerso'], $_POST['histoirePerso'], $universData['idUnivers'], $_POST['camp']));
			?>
				<div class="alert alert-success" role="alert">
					Fiche bien enregistrée !
				</div>
			<?php
		}	
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
	<?php
		echo "</td>";
	?>
		<br/><br/>
	<?php 
		include ("footer.php");
	?>

