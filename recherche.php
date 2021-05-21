<?php
    require_once '../controller/ReservationC.php';

    $reservationC =  new reservationC();
    $liste=$reservationC->rechercherCIN();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>search</title>
	<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>


	<section class="container">
		<h2></h2>
		<div class="form-container">
            <form action="" method ='POST'>
                <div class="row">
                    <div class="col-25">
                        <label>Search CIN: </label>
                    </div>
                    <div class="col-75">
                        <input type = "text" name ="Search">
                    </div>
                </div>
                <br>
                <div class="row">
                    <input type = "submit" value = "Search" name ="Search">
                </div>
            </form>
		</div>
	</section>

	<?php
		if (isset($_POST['cin']) && isset($_POST['Search'])){
			$result = $reservationC->getreservationbyCIN($_POST['cin']);
			if ($result !== false) {
	?>
		<section class="container">
			<h2>RESERVATIONS</h2>
			<a href = "afficherreservations.php" class="btn btn-primary shop-item-button">All reservations</a>
			<div class="shop-items">

				<div class="shop-item">
					<strong class="shop-item-title"> <?= $result['cin'] ?> </strong>
		      	<strong class="shop-item-title"> <?= $result['idVol'] ?> </strong>
            	<strong class="shop-item-title"> <?= $result['valid'] ?> </strong>
              	<strong class="shop-item-title"> <?= $result['dateReservation'] ?> </strong>
                	<strong class="shop-item-title"> <?= $result['prix'] ?> </strong>
				</div>

			</div>
		</section>
	<?php
		}
		else {
			echo "No results found!!! ";
		}
	}

	?>


	<script src="../assets/js/script.js"></script>
</body>

</html>
