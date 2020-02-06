<?php 
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=ppe2;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	?>

<?php      
    echo '<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:80%"><tbody>';
    echo '<tr> 
        	<td>Nom Univers</td> 
        	<td>Devise</td>
        	<td>Camp</td>
        	<td>Nom Personnage</td>
        	<td>Histoire personnage</td>
        	</tr>
        <tr>';
    $result1 = $bdd->query("SELECT nomPerso, histoirePerso, libelleUnivers, deviseUnivers, libelleCamp FROM `personnage` p JOIN univers u ON p.idUnivers= u.idUnivers JOIN camp c ON p.idCamp = c.idCamp AND p.idUnivers=c.idUnivers");
    
    $i = 0;
    
    while($donnees = $result1->fetch())
    { 
        $i=$i+1;
        if($i==2)
        {
            $i=0;
            echo '<td>' . $donnees['libelleUnivers'] . '</td>';
            echo '<td>' . $donnees['deviseUnivers'] . '</td>';
            echo '<td>' . $donnees['libelleCamp'] . '</td>';
            echo '<td>' . $donnees['nomPerso'] . '</td>';
            echo '<td>' . $donnees['histoirePerso'] . '</td>';
			echo '</tr><tr>';
            
        }
        else{
            
            echo '<td>' . $donnees['libelleUnivers'] . '</td>';
            echo '<td>' . $donnees['deviseUnivers'] . '</td>';
            echo '<td>' . $donnees['libelleCamp'] . '</td>';
            echo '<td>' . $donnees['nomPerso'] . '</td>';
            echo '<td>' . $donnees['histoirePerso'] . '</td>';
            echo '</tr><tr>';
            
        }
    }
    
    echo '</tr></tbody></table>';  
?>