<?php
$cargar_clase = fn ($clase) => require_once "./class/$clase.php";
spl_autoload_register($cargar_clase);

session_start();

//inicializar datos
$msj = "Sin datos que mostrar.";
$mostrar = "mostrar";
$boton_mostrar = "Mostrar Clave";
$clave = new Clave();

//$opcion -> botón pulsado
$opcion = $_POST["submit"] ?? "";
switch ($opcion) {
	case "mostrar":
		$mostrar = "ocultar";
		$boton_mostrar = "Ocultar Clave";
		$msj = "La clave es: " . Plantilla::mostrarClave();
		break;
	case "ocultar":
		$mostrar = "mostrar";
		$boton_mostrar = "Mostrar Clave";
		if (isset($_SESSION["jugadas"])) {
			$msj = Plantilla::mostrarJugadas();
		}
		break;
	case "resetear":
		session_destroy();
		session_start();
		$clave = new Clave;
		$msj = "Nueva clave generada.";
		break;

	case "jugar":
		$combinacion = $_POST["combinacion"]; //combinación selecionada al pulsar [Hacer Jugada]
		$jugada = new Jugada($combinacion);
		$_SESSION["jugadas"][] = $jugada; //jugada guardada en variable de sesión
		$posiciones = $jugada->getPosiciones(); //colores acertados en su posición
		$intentos = sizeof($_SESSION["jugadas"]); //intentos es del tamaño de las jugadas guardadas en $_SESSION["jugadas"]

		if ($posiciones < 4) {
			if ($intentos < 15) {
				$msj = Plantilla::mostrarJugadas();
			} else {
				header("location:./finjuego.php?resultado=0"); //si se ha llegado a la jugada 15
				exit();
			}
		} else {
			header("location:./finjuego.php?resultado=1"); //si se ha acertado la combinación
			exit();
		}
		break;
}

?>

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
			<div class="row">
				<div class="col-md-6">
					<h2 class="text-center mt-5">Opciones</h2>
					<div class="card my-3">
						<div class="card-header bg-info">
							<h3>Acciones posibles</h3>
						</div>
						<div class="card-body bg-light">
							<div class="d-flex justify-content-around">
								<form action="./jugar.php" method="post">
									<button type="submit" class="btn btn-primary" name="submit" value=<?= $mostrar ?>><?= $boton_mostrar ?></button>
									<button type="submit" class="btn btn-primary" name="submit" value="resetear">Resetear Clave</button>
								</form>
							</div>
						</div>
					</div>
					<div class="card my-3">
						<div class="card-header bg-info">
							<h3>Menú Jugar</h3>
						</div>
						<div class="card-body bg-light">
							<h4>Selecciona 4 colores para jugar:</h4>
							<form action="./jugar.php" method="post">
								<div class="d-flex justify-content-around my-3">
									<?= Plantilla::generaSelects() ?>
								</div>
								<div class=" text-center">
									<button type="submit" class="btn btn-primary" name="submit" value="jugar">Hacer Jugada</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<h2 class="text-center mt-5">Información</h2>
					<div class="card my-3">
						<div class="card-header bg-info">
							<h3>Información del juego</h3>
						</div>
						<div class="card-body bg-light">
							<p class="fw-bold"><?= $msj ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<footer class="fixed-bottom text-center bg-primary text-white pt-2">
		<p>Desarrollo de Aplicaciones con tecnologías Web. 2022-23.</p>
		<p>José Alberto Cornao</p>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>