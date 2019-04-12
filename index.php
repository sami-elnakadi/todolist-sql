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
    <link type="text/css" rel="stylesheet" href="./assets/css/db.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>To do list</title>
</head>

<body>  
<img src="./assets/img/test.png" alt="cahier" class="image-fluid fond">
    <div class="container">
        <h1> To do list</h1>
            <div class="row">     
                <div class="col-md-6">
                
                    <form role="form" name="inscription" method="post" action="db.php" id='form'>
                        <div class="list">
                            <?php
                            echo '<table class="tache"><th><h3><i class="fas fa-times"></i> A faire</h3></th>';
                            while ($donnees = $resultat->fetch())
                            {
                            echo '<tr>';
                            echo'<td><input draggable="true" type="checkbox" name="delete[]" id="delete" class="check" onclick="check()" value="'.$donnees['Tâche'].'">'.$donnees['Tâche'].'</td>';
                            echo '</tr>';
                            }
                            echo '</table>';
                            $resultat->closeCursor();
                            ?>                    
                        </div>
                        <button type="submit" class="btn btn-primary disparais" name="supprimer" value="supprimer" id="valider">Valider la tâche</button>     
                    </form>
                </div>

                <div class="col-md-6">   
                    <form role="form" name="inscription" method="post" action="db.php" id='form'>
                
                    <?php
                    echo '<div class="archive"><table><th><h3> <i class="fas fa-check"></i> Fait</h3></th>';
                    while ($donneesArchive = $resultatArchive->fetch())
                    {
                      echo '<tr>';
                      echo'<td><input draggable="true" type="checkbox" name="archiv[]" id="delete" class="check2" onclick="check2()" value="'.$donneesArchive['Archive'].'">'.$donneesArchive['Archive'].'</td>';
                      echo '</tr>';
                    }
                    echo '</table></div>';
                    $resultatArchive->closeCursor();
                    ?>
                    <button type="submit" class="btn btn-primary disparais" name="enleve" value="supprimer" id="valide">Supprimer la tâche</button>
                    </form>
                </div>
            </div>

                    <div class = "row">
                    <form role="form" name="inscription" method="post" action="db.php" id='form'>
                        <div class="all col-md-12" id="envois">  
                            <label for="tache" >Ajouter une tâche</label>
                            <input class="form-control" type="text" maxlength="60" placeholder="Tâche à faire" name="tache" required/>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="valider" value="Envoyer">Ajouter</button>
                    </form>
    </div>
    <!DOCTYPE html>
<html>
<head>
    <title>Inclusion de fichier javascript dans une page</title>
</head>

<body>
    <!-- 

        tout le contenu de la page 

    -->



    <script src="./assets/js/todo.js" type="text/javascript"></script>
</body>
</html>

</body>