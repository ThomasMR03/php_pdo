<?php
$pdo = new PDO('mysql:host=localhost;dbname=colyseum;charsert=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$statement = $pdo -> query ('SELECT * FROM clients LIMIT 0, 20');
$resultatExo1 = $statement -> fetchAll();

$statement = $pdo -> query("SELECT showTypes.type, genres.genre AS firstGenres, secGenres.genre AS secGenre
	FROM showTypes, genres, genres AS secGenres
	WHERE showTypes.id = genres.showTypesId AND showTypes.id = secGenres.showTypesId");
$resultatExo2 = $statement -> fetchAll();

$pdo = null;
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
<meta charset="utf-8">
	<title>Exo Pdo</title>
</head>
<body>
<h2>Exo 1</h2>

<!-- Afficher tous les clients -->
<table>
<thead>
<tr>
	<th>ID</th>
	<th>Nom</th>
	<th>Prénom</th>
	<th>Date de naissance</th>
	<th>Card</th>
	<th>Numéro de carte</th>
</tr>
</thead>
<tbody>
<?php
foreach ($resultatExo1 as $value) : 
?>
<tr>
	<td><?= $value->id; ?></td>
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

<h2>Exo 2</h2>

<!-- Afficher tous les types de spectacles possibles -->
<table>
<thead>
<tr>
	<th>ID</th>
	<th>Genre</th>
</tr>
</thead>
<tbody>
<?php
foreach ($resultatExo2 as $value) : 
?>
<tr>
	<td><?= $value->type; ?></td>
	<td><?= $value->firstGenres; ?></td>
	<td><?= $value->secGenre ?></td>
</tr>
<?php
endforeach;
?>
</tbody>
</table>

<h2>Exo 3</h2>

<!-- Afficher les 20 premiers clients -->
Voir exo 1 (Tableau)

</body>
</html>