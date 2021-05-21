<?PHP
	include "../config.php";
	require_once '../model/reservation.php';

	class reservationC {

		function ajouterReservation($reservation){
			$sql="INSERT INTO reservationvol(cin,idVol,valid,dateReservation,prix)VALUES(:cin,:idVol,:valid,:dateReservation,:prix)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);

				$query->execute([
					     'cin'=>$reservation->getCin(),
							 'idVol'=>$reservation->getIdVol(),
							 'valid'=>$reservation->getValid(),
							 'dateReservation'=>$reservation->getDateReservation(),
							 'prix'=>$reservation->getPrix()
				]);
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
		}

		function afficherReservation(){

			$sql="SELECT * FROM reservationvol";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function supprimerReservation($idR){
			$sql="DELETE FROM reservationvol WHERE idR= :idR";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idR',$idR);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierReservation($reservation, $idR){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reservationvol SET
					cin = :cin,
					idVol = :idVol,
					valid = :valid,
					dateReservation = :dateReservation,
					prix = :prix

			WHERE idR = :idR'
				);
					$query->execute([
							'cin' => $reservation->getCin(),
							'idVol' => $reservation->getIdVol(),
							'valid' => $reservation->getValid(),
							'dateReservation' => $reservation->getDateReservation(),
							'prix' => $reservation->getPrix(),
					'idR' => $idR
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererReservation($idR){
			$sql="SELECT * from reservationvol where idR=$idR";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$res=$query->fetch();
				return $res;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recupererReservation1($idR){
			$sql="SELECT * from reservationvol where idR=$idR";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$res = $query->fetch(PDO::FETCH_OBJ);
				return $res;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		public function getreservationbyCIN($cin) {
	             try {
	                 $pdo = getConnexion();
	                 $query = $pdo->prepare(
	                     'SELECT * FROM reservationvol WHERE cin = :cin'
	                 );
	                 $query->execute([
	                      'cin' => $cin
	                 ]);
	                 return $query->fetch();
	             } catch (PDOException $e) {
	                 $e->getMessage();
	             }
	         }
					 public function rechercherCIN($cin) {
            $sql = "SELECT * from reservationvol WHERE cin = :cin";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'cin' => $cin->getCin(),
                ]);
                $result = $query->fetchAll();
                return $result;
            }
            catch (PDOException $e) {
                $e->getMessage();
       }}
	}

?>
