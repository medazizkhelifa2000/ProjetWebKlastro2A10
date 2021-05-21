<?PHP
	include "../controller/ReservationC.php";

	$resC=new ReservationC();

	if (isset($_POST["idR"])){
		$resC->supprimerReservation($_POST["idR"]);
		header('Location:afficherreservations.php');
	}

?>
