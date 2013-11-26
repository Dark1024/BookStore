<!doctype html>

<html lang="es">
	<head>
		<title>Eliminar Autor</title>
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
				$query = 'DELETE FROM author WHERE id_author=' . $_POST['Autor'] . ';';
				
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
						<label>Autores</label>
						<div>
							<select type="text" name="Autor">
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
						<button type="submit">Eliminar</button>
					</div>
				</form>
		</main>
	</body>
</html>