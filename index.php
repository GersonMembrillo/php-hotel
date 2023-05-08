<?php

$hotels = [
	[
		'name' => 'Hotel Belvedere',
		'description' => 'Hotel Belvedere Descrizione',
		'parking' => true,
		'vote' => 4,
		'distance_to_center' => 10.4
	],
	[
		'name' => 'Hotel Futuro',
		'description' => 'Hotel Futuro Descrizione',
		'parking' => true,
		'vote' => 2,
		'distance_to_center' => 2
	],
	[
		'name' => 'Hotel Rivamare',
		'description' => 'Hotel Rivamare Descrizione',
		'parking' => false,
		'vote' => 1,
		'distance_to_center' => 1
	],
	[
		'name' => 'Hotel Bellavista',
		'description' => 'Hotel Bellavista Descrizione',
		'parking' => false,
		'vote' => 5,
		'distance_to_center' => 5.5
	],
	[
		'name' => 'Hotel Milano',
		'description' => 'Hotel Milano Descrizione',
		'parking' => true,
		'vote' => 2,
		'distance_to_center' => 50
	],
];

$filterHotels = $hotels;
if (!empty($_GET['parking'])) {
	$tempHotels = [];
	$parking = ($_GET['parking'] == 'Si') ? true : false;
	foreach ($filterHotels as $hotel) {
		if ($hotel['parking'] === $parking) {
			$tempHotels[] = $hotel;
		}
	}
	$filterHotels = $tempHotels;
}

if (!empty($_GET['vote'])) {
	$tempHotels = [];
	$vote = $_GET['vote'];
	foreach ($filterHotels as $hotel) {
		if ($hotel['vote'] >= $vote) {
			$tempHotels[] = $hotel;
		}
	}
	$filterHotels = $tempHotels;
}
// } else {
// 	$filterHotels = $hotels;
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
	<link rel="stylesheet" href="./css/style.css" />
	<title>Hotel? Boolvago!</title>
</head>

<body>

	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-3">
			<h1 class="fw-bold mb-0">Hotel? <span class="text-primary">BOOL</span><span class="text-warning">VA</span><span class="text-danger">GO!</span></h1>

			<form class="row d-flex align-items-center" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
				<div class="col">
					<select class="form=control" name="parking">
						<option value="">All</option>
						<option value="Si">Parking</options>
						<option value="No">No Parking</option>
					</select>
				</div>
				<div class="col">
					<select class="form=control" name="vote">
						<option value="">All</option>
						<option value="1">1 star</option>
						<option value="2">2 star</option>
						<option value="3">3 star</option>
						<option value="4">4 star</option>
						<option value="5">5 star</option>
					</select>
				</div>
				<div class="col">
					<button class="btn btn-success" type="submit">Cerca</button>
				</div>
			</form>
		</div>
		<div class="">
			<div class>

				<!-- Tentativo con for -->

				<!-- <?php for ($i = 0; $i < count($hotels); $i++) { ?>
				<h3><?php echo $hotels[$i]['name'] ?></h3>
					<ul>
						<li><?php echo "Descrizione: " . $hotels[$i]['description'] ?></li>
						<li><?php if ($hotels[$i]['parking'] === true) {
									echo "Parcheggio: Si";
								} else {
									echo "Parcheggio: No";
								} ?></li>
						<li><?php echo "Voto: " . $hotels[$i]['vote'] ?></li>
						<li><?php echo "Distanza del centro: " . $hotels[$i]['distance_to_center'] ?></li>
					</ul>
			<?php } ?> -->

				<!-- Tentativo con foreach e key -->

				<!-- <?php foreach ($hotels as $hotel) { ?>
				<h3><?php echo $hotel['name'] ?></h3>
					<ul><?php foreach ($hotel as $key => $value) { ?>
						<li>
							<?php echo $key . ' = ' . $value ?>
						</li>
						<?php } ?>
					</ul>
			<?php } ?> -->

				<?php foreach ($filterHotels as $hotel) { ?>
					<div class="card mb-3">
						<h3 class="bg-secondary text-white ps-2" -><?php echo $hotel['name'] ?></h3>
						<ul class="list-unstyled ps-3">
							<li><?php echo "Descrizione: " . $hotel['description'] ?></li>
							<li><?php if ($hotel['parking'] === true) {
										echo "Parcheggio: Si";
									} else {
										echo "Parcheggio: No";
									} ?></li>
							<li><?php echo "Voto: " . $hotel['vote'] ?></li>
							<li><?php echo "Distanza del centro: " . $hotel['distance_to_center'] ?></li>
						</ul>
					</div>
				<?php } ?>


			</div>
		</div>
	</div>

	<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
	<script type="text/javascript" src="./js/script.js"></script>
	<script type="text/javascript" src="./js/utility.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>