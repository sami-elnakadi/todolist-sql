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

if (isset ($_POST['tache'])){
    $tache= htmlspecialchars($_POST['tache']);
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



header('Location: index.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">
    <link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="/assets/db.css">
    <title>To do list</title>
</head>