<!doctype html>

<html lang="es">
	<head>
		<title>Agregar Autor</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
	</head>
	<body>

		<?php
			$link = new mysqli("localhost","root","Darkshadow1024","bookstore");

			if(mysqli_connect_errno()){
				echo "<p>Falló Conexión</p>";
			}

			$result = NULL;
			if ($_SERVER['REQUEST_METHOD']=='POST') {

				$query = 'INSERT INTO  book (isbn, namebook, year, id_editorial) 
							VALUES ("' . $_POST['isbn'].'","'. $_POST['nombre'] . '",'. $_POST['year']. ',' . $_POST['editorial'] . ');';
				$result = $link->query($query);
			}

			if ($result) {
				$idBook = $link->insert_id;
				foreach ($_POST['Autor_Libro'] as $author) {
					$query = 'INSERT INTO bookauthors VALUES ('.$idBook.','.$author.');';
					$link->query($query);
				}
				
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
					<label>ISBN</label>
					<div>
						<input type="text" name="isbn" required> 
					</div>
				</div>
				<div>
					<label>Nombre</label>
					<div>
						<input type="text" name="nombre" required>
					</div>
				</div>
				<div>
					<label>Año</label>
					<div>
						<input type="text" name="year" required>
					</div>
				</div>
				<div>
					<label>Editorial</label>
					<div>
						<select type="text" name="editorial">
							<?php
								$result = $link->query("SELECT id_editorial, name_editorial FROM editorial;");
								while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
									echo '<option value="'.$row['id_editorial'].'">'.$row['name_editorial']."</option>";
								}
							?>
						</select>
					</div>
				</div>
				<div>
					<label>Autores</label>
					<div>
						<select type="text" name="Autor_Libro[]" multiple>
							<?php
								$result = $link->query("SELECT id_author, name_author FROM author;");
								while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
									echo '<option value="'.$row['id_author'].'">'.$row['name_author']."</option>";
								}
								$link->close();
							?>
						</select>
					</div>
				</div>
				<div>
					<button type="submit">Guardar</button>
				</div>
			</form>
		</main>
	</body>
</html>