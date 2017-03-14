<?php
$pdo = new PDO('mysql:host=localhost;dbname=colyseum;charsert=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$statement = $pdo -> query ('SELECT * FROM clients');
$resultatExo1 = $statement -> fetchAll();

$statement = $pdo -> query('SELECT showTypes.type, genres.genre FROM showTypes, genres WHERE showTypes.id = genres.showTypesId');
$resultatExo2 = $statement -> fetchAll();

$pdo = null;
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
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
	<td><?= $value->genre; ?></td>
	<td>Cat 2</td>
</tr>
<?php
endforeach;
?>
</tbody>
</table>
</body>
</html>