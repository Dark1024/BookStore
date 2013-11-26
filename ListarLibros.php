<!doctype html>

<html lang="es">
	<head>
		<title>Listar Libros</title>
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

				$query = 'SELECT isbn, namebook, year FROM book';
				$result = $link->query($query);
				echo "<p>Autores</p>";
				echo '<table border="1px">';
				echo "<tr>";
					echo "<td>ISBN</td>";
					echo "<td>Nombre</td>";
					echo "<td>Año</td>";
				echo "</tr>";
				while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
					echo "<tr>";
					echo '<td>' . $row['isbn'] . '</td>'; 
					echo '<td>' . $row['namebook'] . '</td>';
					echo '<td>' . $row['year'] . '</td>';
					echo "</tr>";
				}
			?>
		</main>
	</body>
</html>