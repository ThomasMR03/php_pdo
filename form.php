<?php
$pdo = new PDO('mysql:host=localhost;dbname=colyseum;charsert=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
?>

<?php
	$erreur = [];
 if (isset($_POST) && !empty($_POST)) {
 	$donne=[];
 	if (isset($_POST['nom']) && $_POST['nom']==''){
 		$donne['lastName'] = $_POST['nom'];
 	}else{
 		$erreur[] = "Merci de mettre un nom";
 	}
 	if (isset($_POST['prenom']) && $_POST['prenom']=='') {
 		$donne['firstName'] = $_POST['prenom'];
 	}else{
 		$erreur[] = "Merci de mettre un prénom";
 	}
 	if (isset($_POST['naissance'])) {
 		$donne['birthdayDate'] = $_POST['naissance'];
 	}else{
 		$erreur[] = "Merci de mettre votre date de naissance";
 	}
 	if (isset($_POST['card'])) {
 		$donne['card'] = 1;
 		if (isset($_POST['numeCard'])) {
 			$donne['cardNumber'] = $_POST['numeCard'];
 		}else{
 			$erreur[] = "Merci de mettre un numéro de carte";
 		}
 	}else{
 		$donne['card'] = 0;
 		$donne['cardNumber'] = null;
 	}

 	if (empty($erreur)) {
 		$pdo = new PDO('mysql:host=localhost;dbname=colyseum;charsert=utf8', 'root', '');
 		$pdo->setAttribute(
 			PDO::ATTR_ERRMODE,
 			PDO::ERRMODE_EXCEPTION);
 		$pdo->setAttribute(
 			PDO::ATTR_DEFAULT_FETCH_MODE,
 			PDO::FETCH_OBJ);

 		$statement = $pdo->prepare("
 			INSERT INTO clients
 			SET lastName = :lastName,
 			firstName = :firstName,
 			birthdayDate = :birthdayDate,
 			card = :card,
 			cardNumber = :cardNumber
 			");
 		$statement->execute([$nom, $prenom, $naissance, $card, $numeCard]);

 		$erreur[] = "Le client est bien ajouté !";
 	}
 }
?>
<!DOCTYPE html>
<html>
<head lang="fr">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<meta charset="utf-8">
	<title>Formulaire client</title>
</head>
<body>

<a href="index.php"><< Index PHP</a>

<!-- Le corps -->

<!-- Création du corps de la page. -->
<div class="container"> 
 
<!-- Déclaration de la première grille, au niveau du corps de la page. -->
    <div class="row">

<!-- Création d'une première zone dont la largeur sera égale à 9 colonnes -->
        <div class="col-md-12">
 
<!-- Création de la seconde grille, cette dernière aura une largeur égale de de la première zone que nous venons de créer  -->
        <div class="row"> 
 
<!-- Insertion d’une première section qui occupe 4 colonnes de notre nouvelle grille. -->
            <div class="col-xs-4">
                
            </div>
<!-- pareil pour l’élément précédent sauf que cette section occupera 5 colonnes de la grille-->
            <div class="col-xs-4" id="form">
               <h1>Ajout de client</h1>
				<div>
					<ul>
					<?php foreach ($erreur as $value) {
						echo "<li>$value</li>";
					}
					?>
					</ul>
					<form method="post" action="">
						<input type="text" name="nom" placeholder="Nom"> </br>
						<input type="text" name="prenom" placeholder="Prénom"> </br>
						<input type="date" name="naissance"> </br>
						<label for="card">Le client a t'il une carte de fidélité ?</label>
						<input type="checkbox" name="card"> </br>
						<input type="number" name="numeCard" placeholder="Numéro de la carte"> 
					</form>
				</div> 
            </div>

<!-- cette derniere section occupe le reste de la grille (8 colonnes) -->
            <div class="col-xs-4">
               
            </div>
        </div> 
    
        </div>
    </div>

</div>
</body>
</html>