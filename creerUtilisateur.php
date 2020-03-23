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
           		    $('#nom').css('border','1px solid green');
           		    $('#nom').css('background','lightgreen');
           		}
           		else
           		{
           		    $('#status2').html('pas bon');    
           		    $('#nom').css('border','1px solid red');
           		    $('#nom').css('background','pink');
           		}
        	}  

			function VerifPrenom(){
           		var name = $('#prenom').val();
           		if (/^[a-zA-Z]{1,100}$/.test(name))
           		{        
           		    $('#status3').html('c\'est bon');        // affecte ce message au statut
           		    $('#prenom').css('border','1px solid green');
           		    $('#prenom').css('background','lightgreen');
           		}
           		else
           		{
           		    $('#status3').html('pas bon');    
           		    $('#prenom').css('border','1px solid red');
           		    $('#prenom').css('background','pink');
           		}
        	} 

			function VerifPseudo(){
           		var name = $('#pseudo').val();
           		if (/^a*.{4,15}$/.test(name))
           		{        
           		    $('#St_Pseudo').html('c\'est bon');        // affecte ce message au statut
           		    $('#pseudo').css('border','1px solid green');
           		    $('#pseudo').css('background','lightgreen');
           		}
           		else
           		{
           		    $('#St_Pseudo').html('pas bon');    
           		    $('#pseudo').css('border','1px solid red');
           		    $('#pseudo').css('background','pink');
           		}
        	} 

			function VerifMdp(){
           		var name = $('#motpasse').val();
           		if (/^(?=.*\d)(?=.*[a-zA-Z]).{6,20}$/.test(name))
           		{        
					$('#st_mdp').html('c\'est bon');        // affecte ce message au statut
					$('#motpasse').css('border','1px solid green');
					$('#motpasse').css('background','lightgreen');           			
				}
           		else
           		{
           		    $('#st_mdp').html('pas bon');    
           		    $('#motpasse').css('border','1px solid red');
           		    $('#motpasse').css('background','pink');
           		}
        	}

			function VerifMdp2(){
				var motpasse = document.getElementById("motpasse").value;
				var verifmdp = document.getElementById("verifmdp").value;
           		if (motpasse == verifmdp)
           		{        
					$('#verif_mdp').html('c\'est bon');        // affecte ce message au statut
					$('#verifmdp').css('border','1px solid green');
					$('#verifmdp').css('background','lightgreen');           			
				}
           		else
           		{
           		    $('#verif_mdp').html('pas bon');    
           		    $('#verifmdp').css('border','1px solid red');
           		    $('#verifmdp').css('background','pink');
           		}
        	}

		</script>

		<h2><?php echo $description; ?></h2>
		
		<form method="post" id="saisie" name="saisie" action="afficherUtilisateur.php?choix=<?php echo $asso; ?>">
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
					<input type="email" class="form-control" id="mail" name="mail"></input>
				</div>
				<div class="col-md-3">
                    <p>Choisir votre civilité:</p>
                    <?php
                        $SQL1 = "SELECT idCivilite, libelleCivilite FROM civilite";
                        $resultats=$connexion->query($SQL1); // on execute notre requête
                        $resultats->setFetchMode(PDO::FETCH_OBJ); 
                        while ($ligne = $resultats->fetch()){
                            ?>
                            <div>
                                    <input type="radio" id="civilite" name="civilite" value="<?= $ligne->idCivilite ?>"
                                    <?php if ($ligne->idCivilite == 1){ echo "checked";} ?>  >
                                    <label for="<?= $ligne->libelleCivilite ?>"><?= $ligne->libelleCivilite ?></label>
                            </div>
                        <?php
                        }
                        ?>

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
					<input type="password" class="form-control" id="motpasse" name="motpasse" placeholder="Mot de passe"  onkeyup="VerifMdp();" >
					<span id="st_mdp"></span>
				</div>
				<div class="col-md-3">
					<label for="nom">Verifier mot de passe</label>
					<input type="password" class="form-control" id="verifmdp" name="verifmdp" placeholder="Mot de passe" onkeyup="VerifMdp2();" >
					<span id="verif_mdp"></span>
				</div>
				
				<label for="start">Date de naissance :</label>
				<input type="date" id="date" name="date"
					value="2020-03-23"
					min="1970-01-01" max="2020-03-23">
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
