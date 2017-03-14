<?php
$pdo = new PDO('mysql:host=localhost;dbname=colyseum;charsert=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$statement = $pdo -> query ('SELECT * FROM clients');
$resultat = $statement -> fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
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
foreach ($resultat as $value) : 
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

</body>
</html>