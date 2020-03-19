<?php //on utilise ici une autre stratégie que celle du routeur que vous avez vu en PPE1 pour uniformiser les pages de l'application. Il s'agit d'inclure sur chaque page du site des entetes et bas de page identiques 
	include ("header.php");

?>
	
	<div class="container">
	
		<?php if (isset($_GET['choix'])){
		$asso = htmlentities($_GET['choix']);
		?>
		
		<?php
			$SQL1 = "SELECT imageAssociation, descriptionAssociation FROM association WHERE idAssociation = ". $asso;
			$resultats=$connexion->query($SQL1); // on execute notre requête
			$resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
			$ligne = $resultats->fetch();
			$description = $ligne->descriptionAssociation;
			$image = "images/associations/".$ligne->imageAssociation;
			$resultats->closeCursor(); // on ferme le curseur des résultats*/
		?>
		
		<h2><?php echo $description; ?></h2>
		
		<form method="post" id="saisie" action="afficherUtilisateur.php?choix=<?php echo $asso; ?>">
				<div class="row">	
					<div class="col-md-3">	
					<img class="img-responsive" src="<?php echo $image; ?>" />
				</div>
				<div class="col-md-3">
					<label for="nom">Quel est votre pseudo ?</label>
					<textarea rows="1" class="form-control form-control-lg" id="pseudo" name="pseudo"></textarea>
				</div>
				<div class="col-md-3">
					<label for="nom">Quel est votre  nom ?</label>
					<textarea rows="1" class="form-control form-control-lg" id="nom" name="nom"></textarea>
				</div>
				<div class="col-md-3">
					<label for="nom">Quel est votre prénom ?</label>
					<textarea rows="1" class="form-control form-control-lg" id="prenom" name="prenom"></textarea>
				</div>
				<div class="col-md-3">
					<label for="camp">Quel est votre statut ?</label>
					<select name="statut" id="statut" class="form-control form-control-lg">
						<?php
							$SQL2 = "SELECT idStatut, libelleStatut FROM association A JOIN statut S ON A.idAssociation = S.idAssociation WHERE S.idAssociation =".$asso;
							$resultats=$connexion->query($SQL2); // on execute notre requête
							$resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
							while ($ligne = $resultats->fetch()){
								echo '<option value="'.$ligne->idStatut.'">'.$ligne->libelleStatut.'</option>';
							}		
							$resultats->closeCursor(); // on ferme le curseur des résultats*/
						?>
					</select>
				</div>
				<div class="col-md-3">
					<label for="nom">Quel est votre adresse mail ?</label>
					<textarea rows="1" class="form-control form-control-lg" id="mail" name="mail"></textarea>
				</div>
				<div class="col-md-3">
					<label for="genre">Quel est votre genre ?</label>
					<select name="genre" id="genre" class="form-control form-control-lg">
						<?php
							$SQL3 = "SELECT idCivilite, libelleCivilite FROM civilite ";
							$resultats=$connexion->query($SQL3); // on execute notre requête
							$resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
							while ($ligne = $resultats->fetch()){
								echo '<option value="'.$ligne->idCivilite.'">'.$ligne->libelleCivilite.'</option>';
							}		
							$resultats->closeCursor(); // on ferme le curseur des résultats*/
						?>
					</select>
				</div>
			</div>
			<br/>
			<div class="row">
				<button type="submit" class="btn btn-primary btn-block" >Enregistrer et afficher la fiche utilisateur</button>
			</div>
				<!--<input type="submit" value="ok" />-->
		</form>
		
		
		
		<?php } 
		else {
		?>
		<div class="alert alert-danger">Vous devez faire un choix</div>
		<?php } ?>
	</div>
<?php 
	include ("footer.php");
?>

