<?PHP
include_once(__DIR__ . "/../services/ReclamationService.php");
include_once(__DIR__ . "/../Entities/Reclamation.php");



if (isset($_POST["id_reclamation"])){
    $PC=new ReclamationService();

    $PC->SupprimerReclamation($_POST["id_reclamation"]);







    header('Location: ../Views/back/AfficherReclamation.php');
}

?>

