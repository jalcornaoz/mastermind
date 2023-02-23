<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mastermind</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/style.css">
</head>

<body>
	<header class="w-100 bg-primary">
		<div class="container">
			<img src="./img/images.jpeg" class="img-thumbnail imagen" alt="Logo">
			<h1 class="d-inline ms-3 text-white pt-2">Mastermind</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<div class="card my-3">
				<div class="card-header bg-info">
					<h2>Descripción del juego:</h2>
				</div>
				<div class="card-body bg-light">
					<ol>
						<li>El usuario deberá de adivinar una secuencia de 4 colores diferentes.</li>
						<li>Los colores se establecerán aleatoriamente entre 8 colores preestablecidos.</li>
						<li>Habrá 15 intentos para adivinar la clave.</li>
						<li>En cada jugada la app informará:
							<ul>
								<li>cuántos colores has acertado en la posición correcta: <span class="posicion">&nbsp?&nbsp</span></li>
								<li>cuántos de ellos están en otra posición: <span class="noPosicion">&nbsp?&nbsp</span></li>
							</ul>
						</li>
						<li>No se especificará cuáles son las posiciones acertadas.</li>
					</ol>
				</div>
			</div>
			<a href="./jugar.php" class="btn btn-primary">Empezar a jugar</a>
		</div>
	</main>
	<footer class="fixed-bottom text-center bg-primary text-white pt-2">
		<p>Certificado Desarrollo de Aplicaciones con tecnologías Web. 2022-23.</p>
		<p>José Alberto Cornao</p>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>