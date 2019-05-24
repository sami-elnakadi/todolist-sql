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
        $del=htmlspecialchars($select);
        $delete= filter_var($del, FILTER_SANITIZE_STRING);
    $bdd->exec("DELETE FROM Todolist WHERE tâche='$delete'");
    $bdd->exec("INSERT INTO Archive(Archive) VALUES('$delete')");
    }
}

if(isset($_POST['enleve']) AND isset($_POST['archiv'])){
    foreach($_POST['archiv'] as $key){
        $arch=htmlspecialchars($key);
        $archive= filter_var($arch, FILTER_SANITIZE_STRING);
    $bdd->exec("DELETE FROM Archive WHERE Archive='$archive'");
    }
}



header('Location: https://todolistbecode.000webhostapp.com/index.php');
?>

