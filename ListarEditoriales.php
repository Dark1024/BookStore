<!doctype html>

<html lang="es">
	<head>
		<title>Listar Editoriales</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
	</head>
	<body>

		<nav>
			<div>
				<a href="index.php">Regresar a BOOKSTORE</a>
			</div>
		</nav>
		
		<main>
			<?php
				$link = new mysqli("localhost","root","Darkshadow1024","bookstore");

				if(mysqli_connect_errno()){
					echo "<p>Falló Conexión</p>";
				}

				$query = 'SELECT name_editorial, address FROM editorial';
				$result = $link->query($query);
				echo "<p>Editoriales</p>";
				echo '<table border="1px">';
				echo "<tr>";
					echo "<td>Nombre</td>";
					echo "<td>Dirección</td>";
				echo "</tr>";
				while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
					echo "<tr>";
					echo '<td>' . $row['name_editorial'] . '</td>';
					echo '<td>' . $row['address'] . '</td>';
					echo "</tr>";
				}
			?>
		</main>
	</body>
</html>