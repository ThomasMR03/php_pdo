<?php
$pdo = new PDO('mysql:host=localhost;dbname=colyseum;charsert=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$statement = $pdo -> query ('SELECT * FROM clients');
$resultatExo = $statement -> fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<meta charset="utf-8">
	<title>Exo PHP</title>
</head>
<body>

<a href="index.php">Index PHP >></a> </br>
<a href="form.php">Formulaire PHP >></a>


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
            	<h1>Crée une carte client</h1>
                <table>
					<thead>
						<tr>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Date de naissance</th>
							<th>Card</th>
							<th>Numéro de carte</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($resultatExo as $value) : 
						?>
					<tr>
						<td><?= $value->firstName; ?></td>
						<td><?= $value->lastName; ?></td>
						<td><?= $value->birthDate; ?></td>
						<td><?= $value->card; ?></td>
						<td><?= $value->cardNumber; ?></td>
					</tr>
					<?php
					endforeach;
					?>
					</tbody>
				</table>
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