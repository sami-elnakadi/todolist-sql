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

$resultat = $bdd -> query('SELECT * FROM Todolist');
$resultatArchive = $bdd -> query('SELECT * FROM Archive');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">
    <link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="./assets/db.css">
    <title>To do list</title>
</head>

<body>  
        <div class="container">
        <h1> Activités de la journée</h1>
            <div class="row">     
                <div class="col-md-6">
                
                    <form role="form" name="inscription" method="post" action="db.php" id='form'>
                    <div class="list">
                        <?php
                        echo '<table><th><h3>A faire</h3></th>';
                        while ($donnees = $resultat->fetch())
                        {
                        echo '<tr>';
                        echo'<td><input type="checkbox" name="delete[]" id="delete" value="'.$donnees['Tâche'].'">'.$donnees['Tâche'].'</td>';
                        echo '</tr>';
                        }
                        echo '</table>';
                        $resultat->closeCursor();
                        ?>                    
                    </div>        
                </div>
                <div class="col-md-6">
                    <?php

                    echo '<div class="archive"><table><th><h3>Archive</h3></th>';
                    while ($donneesArchive = $resultatArchive->fetch())
                    {
                      echo '<tr>';
                      echo'<td>'.$donneesArchive['Archive'].'</td>';
                      echo '</tr>';
                    }
                    echo '</table></div>';
                    $resultatArchive->closeCursor();
                    ?>
                </div>
            </div>

                    <div class = "row">
                        <div class="all col-md-6">  
                            <label for="tache" >Ajouter une tâche</label>
                            <input class="form-control" type="text" maxlength="60" placeholder="Tâche à faire" name="tache"/>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="valider" value="Envoyer">Enregistrer</button>
                    <button type="submit" class="btn btn-primary" name="supprimer" value="supprimer">Supprimer</button>
            </form>
        </div>
     
</body>