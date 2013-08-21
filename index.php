<?php
try
{
	$db = new PDO('mysql:host=localhost;dbname=facemash', 'root', 'root');
}
catch (Exception $error)
{
	die ('Erreur :' . $error->getMessage());
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Facemash</title>
		<link rel="stylesheet" href="style.css" />
	</head>

	<body>
		<div class="header">
			<h1>FACEMASH</h1>
		</div>

		<div class="main_wrapper">
			<p>
				<strong>We are let in for our looks? No. Will we be judged on them? Yes.</strong>
			</p>
			<h3>Who's Hotter? Click to Choose.</h3>

			<?php
				$maxId = $db->query('SELECT MAX(id) AS id_max FROM photos');
				$idMax = $maxId->fetch();

				$randomId1 = rand(1, 42);

				$photo1Query = $db->prepare('SELECT * FROM photos WHERE id = ?');
				$photo1Query->execute(array($randomId1));

				$photo1 = $photo1Query->fetch();


				$randomId2 = rand(1, 42);

				$photo2Query = $db->prepare('SELECT * FROM photos WHERE id = ?');
				$photo2Query->execute(array($randomId2));

				$photo2 = $photo2Query->fetch();

				$nbrPhoto = 1;
			?>
				<div id="photoRandom">
					<a href="vote.php?id=<?php echo $photo1['id'] ?>&amp;photo=first"><img src="images/<?php echo $photo1['photo'] ?>" /></a>
					<p id="or">OR</p>
					<a href="vote.php?id=<?php echo $photo2['id'] ?>&amp;photo=second"><img src="images/<?php echo $photo2['photo'] ?>" /></a>
				</div>
			<?php
			?>
		</div>

	</body>
</htmL>