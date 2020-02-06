<nav class="navbar navbar-default" role="navigation">
    <!-- Partie de la barre toujours affichée -->
    <div class="navbar-header">
        <!-- Bouton d'accès affiché à droite si la zone d'affichage est trop petite -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
            <span class="sr-only">Activer la navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span></a>
    </div>
    <!-- Partie de la barre masquée si la surface d'affichage est insuffisante -->
    <div class="collapse navbar-collapse" id="navbar-collapse-target">
        <ul class="nav navbar-nav">
        	<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="creerUtilisateur.php">Nouvel utilisateur
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<?php
					$SQL = "SELECT idAssociation, libelleAssociation FROM association";
					$resultats=$connexion->query($SQL); // on execute notre requête
					$resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
					while ($ligne = $resultats->fetch()){
						echo '<li><a href="creerUtilisateur.php?choix='.$ligne->idAssociation.'">'.$ligne->libelleAssociation.'</a></li>';
					}		
					$resultats->closeCursor(); // on ferme le curseur des résultats*/
					?>
				</ul>
			</li>
			<li><a href="fiches.php">Utilisateurs déjà créés</a></li>
    	</ul>
		
    </div>
</nav>
