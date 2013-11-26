<!doctype html>

<html lang="es">
	<head>
		<title>Actualizar Autor</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
	</head>
	<body>
		<main>
			<?php
				$link = new mysqli("localhost","root","Darkshadow1024","bookstore");

				if(mysqli_connect_errno()){
					echo "<p>Falló Conexión</p>";
				}
			?>

			<div>
				<select type="text" name="select_editorial">
					<?php
						$query = 'SELECT id_author, name_author FROM author';
						$result = $link->query($query);
						while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
							echo '<option value="'.$row['id_editorial'].'">'.$row['name_editorial']."</option>";
						}
					?>
				</select>
			</div>

			<button type="submit"></button>
		</main>
	</body>
</html>