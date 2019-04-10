<?php
try
{
	// On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'user', 'user');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

$resultat = $bdd -> query('SELECT * FROM Météo');
$donnees = $resultat->fetch();

?>

<!DOCTYPE html>

<body>
    <section class="mainForm">
        <div class="container form">   
                <form class="col-md-12" role="form" name="inscription" method="post" action="test.php" id='form'>
                    <?php
                    echo '<table><th>Ville</th>';
                    echo '<th>Haut</th>';
                    echo '<th>Bas</th>';
                    while ($donnees = $resultat->fetch())
                    {
                      echo '<tr>';
                      echo'<td><input type="checkbox" name="delete[]" id="delete" value="'.$donnees['ville'].'">'.$donnees['ville'].'</td>';
                      echo '<td>'.$donnees['haut'].'</td>';
                      echo '<td>'.$donnees['bas'].'</td>';
                      echo '</tr>';
                    }
                    echo '</table>';
                    $resultat->closeCursor();
                    ?>                    
                    
                    <div class = "row">
                        <div class="all col-md-6">  
                            <label for="ville" >Ville:</label>
                            <input class="form-control" type="text" maxlength="30" placeholder="Votre ville" name="ville"/>

                            <label for="haut">Température haute:</label>
                            <input class="form-control" type="text" maxlength="30"  placeholder="Température haute" name="haut"/>

                            <label for="basse">Température basse:</label>
                            <input class="form-control" type="text" maxlength="30"  placeholder="Température basse" name="bas"/>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="valider" value="Envoyer">Envoyer</button>
                    <button type="submit" class="btn btn-primary" name="supprimer" value="supprimer">Supprimer</button>
            </form>
        </div>
    </section>   
</body>