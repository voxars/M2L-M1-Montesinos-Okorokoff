<?php //on utilise ici une autre stratégie que celle du routeur que vous avez vu en PPE1 pour uniformiser les pages de l'application. Il s'agit d'inclure sur chaque page du site des entetes et bas de page identiques 
	include ('header.php');
	
	// Sous WAMP (Windows)
	$bdd = new PDO('mysql:host=localhost;dbname=ppe2;charset=utf8', 'root', 'root');
	

?>




<div class="container">

	<?php if (isset($_GET['choix'])){
		$univers=$_GET['choix'];
		$req = $bdd->prepare('SELECT * FROM univers u WHERE idUnivers=?');
		$test = $req->execute(array($univers)); 
		$universData = $req->fetch();

		$req = $bdd->prepare('SELECT * FROM camp p WHERE idUnivers=?');
		$test = $req->execute(array($univers)); 
		$campData = array();
		while($camp = $req->fetch())
		{
			array_push($campData, $camp);
		}
		
		
	?>
	
	<form method="post" id="saisie" action="affiche.php?choix=<?php echo $_GET['choix'] ?>">

		<div class="container">
			<div class="row">
				<div class="col-sm">
					<?php

					echo "<table><tr>";

					echo "<td><img src='".$universData['imageUnivers']."' height='200px' /></td>";
					echo "</tr>";
					echo "</table>";
					?>
				</div>
				<div class="col-sm">
					<label for="nom">Quel est ton nom ?</label>
					<textarea rows="1" class="form-control form-control-lg" id="nomPerso" name="nomPerso"></textarea>
				</div>
				<div class="col-sm">
					<label for="camp">Pour quel camp te bats-tu ?</label>
					
					<select name="camp" id="camp" class="form-control form-control-lg">
						<?php 
							foreach($campData as $camp)
							{
								echo '<option value="'.$camp['idCamp'].'">'.$camp['libelleCamp'].'</option>';
							}
						?>
					</select>
				</div>
				<div class="col-sm">
					<label for="histoire">Quelle est ton histoire</label>
					<textarea class="form-control form-control-lg" id="histoirePerso" name="histoirePerso"></textarea>
				</div>
		</div>
		<br/>
		<div class="row justify-content-center"> 
 			<div class="col-4">
				<button type="submit" class="btn btn-primary">Enregistrer et afficher la ficher perso</button>
			</div>
			
	</form>
	

	<?php
	
	} 
	else { 
	?>
		<?php if (isset($_GET['suite'])){
			$labels = "ajouter-".$_GET['suite'].".php";
			include $labels;
		?>
		<div class="mx-auto" style="width: 400px;">

    
		<?php
			$suite = 0;
			if (isset($_GET['suite'])){
				$suite = htmlentities($_GET['suite']);
			}	
			if ($suite == 1)
			{
				?>
				<form method="post" id="saisie" action="nouveau.php?choix=<?php echo $_GET['suite'] ?>">

					<div class="col-sm">
						<label for="libelleUnivers">Quel est le nom de ton univer ?</label>
						<textarea rows="1" class="form-control form-control-lg" id="libelleUnivers" name="libelleUnivers"></textarea>
					</div>
					<div class="col-sm">
						<label for="deviseUnivers">Quelle est ta devise ?</label>
						<textarea rows="1" class="form-control form-control-lg" id="deviseUnivers" name="deviseUnivers"></textarea>
						
					</div>
					<div class="col-sm">
						<label for="imageUnivers">Une photo de ton univers ?(lien de la photo)</label>
						<textarea class="form-control form-control-lg" id="imageUnivers" name="imageUnivers"></textarea>
					</div>

					<br/>

					<button type="submit" class="btn btn-primary">Enregistrer l'univers dans la base de donnée</button>

				</form>
				<?php
			}
			else if ($suite == 2){
				$image = "star-wars.png";
			}
			else {
				$image = "";
			}
			?>
			
		</div>
		


	<?php } 
	else {
	?>

	<br />
	<div class="alert alert-danger" role="alert">
	Vous devez faire un choix
	</div>

	<?php } ?>
	<?php } ?>
	</br>
	</br>
	</br>
	
	<?php 
		include ('footer.php');
	?>


