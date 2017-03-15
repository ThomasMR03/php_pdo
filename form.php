<?php
$pdo = new PDO('mysql:host=localhost;dbname=colyseum;charsert=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
?>

<?php
 if (isset($_POST) $$ !empty($_POST)) {
 	$erreur = [];
 	
 	if (isset($_POST['nom']) && $_POST['nom']==''){
 		$nom = $_POST['nom'];
 	}else{
 		$erreur[] = "Merci de mettre un nom";
 	}
 	if (isset($_POST['prenom']) && $_POST['prenom']=='') {
 		$nom = $_POST['prenom'];
 	}else{
 		$erreur[] = "Merci de mettre un prénom";
 	}
 	if (isset($_POST['naissance'])) {
 		$nom = $_POST['naissance'];
 	}else{
 		$erreur[] = "Merci de mettre votre date de naissance";
 	}
 	if (isset($_POST['card'])) {
 		$card = 1;
 		if (isset($_POST['numeCard'])) {
 			$numeCard = $_POST['numeCard'];
 		}else{
 			$erreur[] = "Merci de mettre un numéro de carte";
 		}
 	}else{
 		$card = 0;
 	}
 	echo "Post effecuté !";
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulaire client</title>
</head>
<body>
<h1>Ajout de client</h1>

<form method="post" action="">
	<input type="text" name="nom" placeholder="Nom">
	<input type="text" name="prenom" placeholder="Prénom">
	<input type="date" name="naissance">
	<label for="card">Le client a t'il une carte de fidélité ?</label>
	<input type="checkbox" name="card">
	<input type="number" name="numeCard" placeholder="Numéro de la carte">
</form>
</body>
</html>