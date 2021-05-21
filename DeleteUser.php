<?PHP
include_once(__DIR__ . "/../services/UserService.php");
include_once(__DIR__ . "/../Entities/User.php");



if (isset($_POST["id"])){
    session_start();
    if($_POST["id"] != $_SESSION['id']){
    $UserC=new UserService();
    $UserC->Supprimeruser($_POST["id"]);


    header('Location: ../Views/back/AfficherUser.php');}
    else{
        echo "<script>
                alert('Vous pouvez pas supprimer ton compte');
                window.location.href='../Views/back/AfficherUser.php';
                </script>";
    }
}

?>