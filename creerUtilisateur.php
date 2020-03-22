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
		
		<script type="text/javascript">
			function VerifNom(){
           		var name = $('#nom').val();
           		if (/^[a-zA-Z]{1,100}$/.test(name))
           		{        
           		    $('#status2').html('c\'est bon');        // affecte ce message au statut
           		    //$('#test').css('border','1px solid green');
           		    //$('#test').css('background','lightgreen');
           		}
           		else
           		{
           		    $('#status2').html('pas bon');    
           		    //$('#test').css('border','1px solid red');
           		    //$('#test').css('background','pink');
           		}
        	}  

			function VerifPrenom(){
           		var name = $('#prenom').val();
           		if (/^[a-zA-Z]{1,100}$/.test(name))
           		{        
           		    $('#status3').html('c\'est bon');        // affecte ce message au statut
           		    //$('#test').css('border','1px solid green');
           		    //$('#test').css('background','lightgreen');
           		}
           		else
           		{
           		    $('#status3').html('pas bon');    
           		    //$('#test').css('border','1px solid red');
           		    //$('#test').css('background','pink');
           		}
        	} 

			function VerifPseudo(){
           		var name = $('#pseudo').val();
           		if (/^a*.{4,15}$/.test(name))
           		{        
           		    $('#St_Pseudo').html('c\'est bon');        // affecte ce message au statut
           		    //$('#test').css('border','1px solid green');
           		    //$('#test').css('background','lightgreen');
           		}
           		else
           		{
           		    $('#St_Pseudo').html('pas bon');    
           		    //$('#test').css('border','1px solid red');
           		    //$('#test').css('background','pink');
           		}
        	} 

			function VerifMdp(){
           		var name = $('#motpasse').val();
           		if (/^a*.{6,150}$/.test(name))
           		{        
					if (/^[0-9]{1,150}$/.test(name)) {
           		    	$('#st_mdp').html('c\'est bon');        // affecte ce message au statut
           		    	//$('#test').css('border','1px solid green');
           		    	//$('#test').css('background','lightgreen');
					}
					else
           			{
           			    $('#st_mdp').html('pas bon');    
           			    //$('#test').css('border','1px solid red');
           			    //$('#test').css('background','pink');
           			}
				}
           		else
           		{
           		    $('#st_mdp').html('pas bon');    
           		    //$('#test').css('border','1px solid red');
           		    //$('#test').css('background','pink');
           		}
        	}


		</script>

		<h2><?php echo $description; ?></h2>
		
		<form method="post" id="saisie" action="afficherUtilisateur.php?choix=<?php echo $asso; ?>">
				<div class="row">	
					<div class="col-md-3">	
					<img class="img-responsive" src="<?php echo $image; ?>" />
				</div>
				<div class="col-md-3">
					<label for="nom">Quel est votre pseudo ?</label>
					<textarea rows="1" class="form-control form-control-lg" id="pseudo" name="pseudo" onkeyup="VerifPseudo();"></textarea>
					<span id="St_Pseudo"></span>
				</div>
				<div class="col-md-3">
					<label for="nom">Quel est votre  nom ?</label>
					<textarea rows="1" class="form-control form-control-lg" id="nom" name="nom"  onkeyup="VerifNom();"></textarea>
					<span id="status2"></span>
				</div>
				<div class="col-md-3">
					<label for="nom">Quel est votre prénom ?</label>
					<textarea rows="1" class="form-control form-control-lg" id="prenom" name="prenom"  onkeyup="VerifPrenom();"></textarea>
					<span id="status3"></span>
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
				<div class="col-md-3">
					<label for="pays">Quel est votre pays ?</label>
					<select name="pays" id="pays" class="form-control form-control-lg">
						<?php
							$SQL4 = "SELECT idPays, libellePays FROM pays ";
							$resultats=$connexion->query($SQL4); // on execute notre requête
							$resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
							while ($ligne = $resultats->fetch()){
								echo '<option value="'.$ligne->idPays.'">'.$ligne->libellePays.'</option>';
							}		
							$resultats->closeCursor(); // on ferme le curseur des résultats*/
						?>
					</select>
				</div>
				<div class="col-md-3">
					<label for="nom">Quel est votre mot de passe ?</label>
					<input type="password" class="form-control" id="motpasse" placeholder="Mot de passe"  onkeyup="VerifMdp();" >
					<span id="st_mdp"></span>
				</div>
				<div class="col-md-3">
				<label for="pwd">Confirmation mot de passe:</label>
				<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
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

