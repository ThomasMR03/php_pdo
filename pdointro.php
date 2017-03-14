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
<tr>
	<th>ID</th>
	<th>Nom</th>
	<th>Prénom</th>
	<th>Date de naissance</th>
	<th>Card</th>
	<th>Numéro de carte</th>
</tr>
<tr>
	<td>Contenu interne 1</td>
	<td>Contenu interne 2</td>
	<td>Contenu interne 3</td>
	<td>Contenu interne 4</td>
	<td>Contenu interne 5</td>
	<td>Contenu interne 6</td>
</tr>

</body>
</html>