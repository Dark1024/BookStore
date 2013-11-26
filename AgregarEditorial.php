<!doctype html>

<html lang="es">
	<head>
		<title>Agregar Editorial</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
	</head>
	<body>
		<?php
			if ($_SERVER['REQUEST_METHOD']=='POST') {
				$link = new mysqli("localhost","root","Darkshadow1024","bookstore");

				if(mysqli_connect_errno()){
					echo "<p>Falló Conexión</p>";
				}
				$query = 'INSERT INTO  editorial (name_editorial, address) VALUES ("' . $_POST['nombre_editorial'].'","'. $_POST['direccion'] .'");';
				echo $query;
				$result = $link->query($query);
				$link->close();
			}
		?>

		<nav>
			<div>
				<a href="index.php">Regresar a BOOKSTORE</a>
			</div>
		</nav>
		
		<main>
			<?php 
				if ($_SERVER['REQUEST_METHOD']=='POST') {
					echo "<p>Se solicitó correctamente</p>";
				}
			?>

			<form method="post">
				<div>
					<label>Editorial</label>
					<div>
						<input type="text" name="nombre_editorial" required>
					</div>
				</div>
				<div>
					<label>Direccion</label>
					<div>
						<input type="text" name="direccion">
					</div>
				</div>
				<div>
					<button type="submit">Guardar</button>
				</div>
			</form>
		</main>
	</body>
</html>