<!doctype html>

<html lang="es">
	<head>
		<title>Agregar Autor</title>
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
				$query = 'INSERT INTO author (name_author, nationality) VALUES ("' . $_POST['nombre_autor'].'","'. $_POST['nacionalidad'] .'");';
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
					echo "<p>Se solicito correctamente</p>";
				}else{
					echo "<p></p>";
				}
			?>

			<form method="post">
				<div>
					<label>Nombre</label>
					<div>
						<input type="text" name="nombre_autor" required> 
					</div>
				</div>
				<div>
					<label>Nacionalidad</label>
					<div>
						<input type="text" name="nacionalidad" required>
					</div>
				</div>
				<div>
					<button type="submit">Guardar</button>
				</div>
			</form>
		</main>
	</body>
</html>