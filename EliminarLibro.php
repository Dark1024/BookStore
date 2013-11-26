<!doctype html>

<html lang="es">
	<head>
		<title>Eliminar Libro</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
	</head>
	<body>

		<?php
			$link = new mysqli("localhost","root","Darkshadow1024","bookstore");

			if(mysqli_connect_errno()){
				echo "<p>Falló Conexión</p>";
			}

			if($_SERVER['REQUEST_METHOD']=='POST'){
				$query = 'DELETE FROM bookauthors WHERE id_book=' . $_POST['Libro'] . ';';

				$result = $link->query($query);
			
				$query = 'DELETE FROM book WHERE id_book=' . $_POST['Libro'] . ';';
				
				$result = $link->query($query);
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
				}else{
					echo "<p></p>";
				}
			?>

			<form method="post">
				<div>
						<label>Libros</label>
						<div>
							<select type="text" name="Libro">
								<?php
									$result = $link->query("SELECT id_book, namebook FROM book;");
									while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
										echo '<option value="'.$row['id_book'].'">'.$row['namebook']."</option>";
									}
									$link->close();
								?>
							</select>
						</div>
					</div>
					<div>
						<button type="submit">Eliminar</button>
					</div>
				</form>
		</main>
	</body>
</html>