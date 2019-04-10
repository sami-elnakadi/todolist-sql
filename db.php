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

if (isset ($_POST['ville']) AND ($_POST['haut']) AND ($_POST['bas'])){
    $ville=$_POST['ville'];
    $haut=$_POST['haut'];
    $bas=$_POST['bas'];
    $bdd->exec("INSERT INTO Météo(ville,haut,bas) VALUES('$ville','$haut','$bas')");
};


 

if(isset($_POST['supprimer']) AND isset($_POST['delete'])){
    foreach($_POST['delete'] as $select){
    $bdd->exec("DELETE FROM Météo WHERE ville='$select'");
    echo "test1";
    }
}
header('Location: index.php');
?>