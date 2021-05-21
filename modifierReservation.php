<?php
    include_once "../controller/ReservationC.php";
    include_once '../model/reservation.php';

	$resC = new ReservationC();
	$error = "";

	if (
        isset($_POST["cin"]) &&
        isset($_POST["idVol"]) &&
        isset($_POST["valid"]) &&
        isset($_POST["dateReservation"]) &&
        isset($_POST["prix"])
    ){
		if (
            !empty($_POST["cin"]) &&
            !empty($_POST["idVol"]) &&
            !empty($_POST["valid"]) &&
            !empty($_POST["dateReservation"]) &&
            !empty($_POST["prix"])
        ) {
            $RES = new reservation(
                $_POST['cin'],
                $_POST['idVol'],
                $_POST['valid'],
                $_POST['dateReservation'],
                $_POST['prix']
            );
            $resC->modifierReservation($RES, $_GET['idR']);
            header('Location: afficherreservations.php');
        }
        else
            $error = "Missing information";
	}

?>

<html>
	<head>
		<title>Modifier Reservation</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<button><a href="afficherreservations.php">Retour à la liste</a></button>
        <hr>

        <div idR="error">
            <?php echo $error; ?>
        </div>

		<?php
			if (isset($_GET['idR'])){
				$RES = $resC->recupererReservation($_GET['idR']);

		?>
    <form action="" method="POST">
     <label for="cin">Id Chien:  </label>
     <input type="int" name="cin" id="cin"  value = "<?php echo $RES['cin']; ?>" pattern="[0-9]{8}" title="id doit avoir 8 chiffres ." pattern="[0-9]{8}" title="CIN doit avoir 8 chiffres ." required>
    <br>
     <label for="idVol">Nom Chien:  </label>
     <input type="text" name="idVol" id="idVol" value ="<?php echo $RES['idVol']; ?>">
     <br>
     <label for="valid">Race:  </label>
     <input type="text" name="valid" id="valid" value ="<?php echo $RES['valid']; ?>">
     <br>
     <label for="dateReservation">date de naissance:  </label>
     <input type="date" name="dateReservation" id="dateReservation" value = " <?php echo $RES['dateReservation']; ?> " required>
     <br>
     <label for="prix">prix:  </label>
     <input type="number" name="prix" id="prix" value = " <?php echo $RES['prix']; ?> " >
     <br>

        <input type="submit" value="Modifier" name = "modifer">
        <br>
        <input type="reset" value="Annuler" >


        </form>
        <?php
    }
    ?>
  </body>
    </html>