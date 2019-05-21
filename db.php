<?php
try
{
	// On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=id9263491_todolist;charset=utf8', 'id9263491_sami', 'BeCode2019');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

if (isset ($_POST['tache'])){
    $task=htmlspecialchars($_POST['tache']);
    $tache= filter_var($task, FILTER_SANITIZE_STRING);
    $bdd->exec("INSERT INTO Todolist(Tâche) VALUES('$tache')");
}
 
 
if(isset($_POST['supprimer']) AND isset($_POST['delete'])){
    foreach($_POST['delete'] as $select){
    $bdd->exec("DELETE FROM Todolist WHERE tâche='$select'");
    $bdd->exec("INSERT INTO Archive(Archive) VALUES('$select')");
    }
}

if(isset($_POST['enleve']) AND isset($_POST['archiv'])){
    foreach($_POST['archiv'] as $key){
    $bdd->exec("DELETE FROM Archive WHERE Archive='$key'");
    }
}



header('Location: https://todolistbecode.000webhostapp.com/index.php');
?>
