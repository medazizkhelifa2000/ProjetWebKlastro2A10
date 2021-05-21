<?PHP
include_once(__DIR__ . "/../services/UserService.php");
include_once(__DIR__ . "/../Entities/User.php");



if (isset($_POST["id"])){
    $UserC=new UserService();
    $UserC->GrantAdmin($_POST["id"]);


    header('Location: ../Views/back/AfficherUser.php');
}

?>