<?php //on utilise ici une autre stratégie que celle du routeur que vous avez vu en PPE1 pour uniformiser les pages de l'application. Il s'agit d'inclure sur chaque page du site des entetes et bas de page identiques 
	include ("header.php");

?>
<div class="container">
<h1>Affichage de la fiche</h1>

<?php

$association = 0;
$pseudo = "pas de pseudo transmis";
$nom = "pas de nom transmis";
$prenom = "pas de prénom transmis";
$statut = "";
$image = "";

if (isset($_GET['choix']) && $_GET['choix'] != ""){
	$asso = htmlentities($_GET['choix']);
	$SQL1 = "SELECT libelleAssociation, imageAssociation, descriptionAssociation FROM association WHERE idAssociation = ". $asso;
	$resultats=$connexion->query($SQL1); // on execute notre requête
	$resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
	$ligne = $resultats->fetch();
	$description = $ligne->descriptionAssociation;
	$image = "images/associations/".$ligne->imageAssociation;
	$libelleAsso = $ligne->libelleAssociation;
	$resultats->closeCursor(); // on ferme le curseur des résultats*/
}

if (isset($_POST['pseudo']) && $_POST['pseudo'] != ""){
	$pseudo = htmlentities($_POST['pseudo']);
}
if (isset($_POST['nom']) && $_POST['nom'] != ""){
	$nom = htmlentities($_POST['nom']);
}
if (isset($_POST['prenom']) && $_POST['prenom'] != ""){
	$prenom = htmlentities($_POST['prenom']);
}
if (isset($_POST['statut'])&& $_POST['statut'] != ""){
	$statut = htmlentities($_POST['statut']);
}


$req = $connexion->prepare('INSERT INTO utilisateur (pseudo, nom, prenom, idAssociation, idStatut) VALUES (:pseudo, :nom, :prenom, :asso, :statut)');
//$req2 = 'INSERT INTO utilisateur (pseudo, nom, prenom, idAssociation, idStatut) VALUES("'.$pseudo.'","'.$nom.'","'.$prenom.'", '.$asso.','.$statut.')';
//echo $req2;

$resultat = $req->execute(array(
    'pseudo' => $pseudo,
	'nom' => $nom,
	'prenom' => $prenom,
    'asso' => $asso,
    'statut' => $statut
    ));

if ($resultat){
	?>
		<div class="alert alert-success">Fiche bien enregistrée pour l'association <?php echo $libelleAsso; ?></div>	
		<div class="row">	
			<div class="col-md-3">	
				<img class="img-responsive" src="<?php echo $image; ?>" />
			</div>
			<div class="col-md-3">	
				<u>Pseudo :</u><br/> <?php echo $pseudo; ?>
			</div>
			<div class="col-md-3">	
				<u>Nom :</u><br/> <?php echo $nom; ?>
			</div>
			<div class="col-md-3">	
				<u>Prénom : </u><br/> <?php echo $nom; ?>
			</div>
			<?php
				$SQL = "SELECT libelleStatut FROM statut WHERE idStatut = ".$statut." AND idAssociation = ".$asso.";";
				$resultats=$connexion->query($SQL); // on execute notre requête
				$resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
				$ligne = $resultats->fetch();
				$libelleStatut = $ligne->libelleStatut;			
				$resultats->closeCursor(); // on ferme le curseur des résultats*/
			?>
			<div class="col-md-3">	
				<u>Statut </u><br/> <?php echo $libelleStatut; ?>
			</div>

		</div>
	<?php 
	}
	else {
	?>
		<div class="row alert alert-danger">
		  <strong>Erreur</strong> La fiche n'a pas pu être enregistrée
		</div>
	<?php 
	}
	?>	
</div>
<?php 
	include ("footer.php");
?>
