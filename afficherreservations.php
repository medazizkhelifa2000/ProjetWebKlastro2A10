 <?PHP
	include "../controller/ReservationC.php";

	$ReserC=new ReservationC();
	$listeres=$ReserC->afficherReservation();

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Afficher Liste reservations </title>
		<link href="sty.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
		<button><a href="reservation.php" class="res">Ajouter une reservation</a></button>
		<hr>
		<a href = "recherche.php" class="btn btn-primary shop-item-button">Search</a>
<br><br>

		<table border=1 align = 'center' class="tab">
			<thead>
			<tr>
				<th>idR</th>
				<th>Id Chien</th>
				<th>Nom Chien</th>
				<th>Race</th>
				<th>Date de naissance</th>
				<th>prix</th>
				<th>supprimer</th>
				<th>modifier</th>
			</tr>
		</thead>

			<?PHP
				foreach($listeres as $res){
			?>
				<tr>
							 <td><?PHP echo $res['idR']; ?></td>
				             <td><?PHP echo $res['cin']; ?></td>
				             <td><?PHP echo $res['idVol']; ?></td>
				             <td><?PHP echo $res['valid']; ?></td>
				             <td><?PHP echo $res['dateReservation']; ?></td>
				             <td><?PHP echo $res['prix']; ?></td>
					<td>
						<form method="POST" action="supprimerReservation.php">
						<input type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $res['idR']; ?> name="idR">
						</form>
					</td>
					<td>
              <a href="modifierReservation.php?idR=<?PHP echo $res['idR']; ?>"> Modifier </a>
					</td>
				</tr>
			<?PHP
				}
			?>
		</table>
	</body>
</html>
