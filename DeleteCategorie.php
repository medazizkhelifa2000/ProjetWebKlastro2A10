
<?PHP
include_once(__DIR__ . "/../services/CategorieService.php");
include_once(__DIR__ . "/../Util/DataSource.php");



if (isset($_POST["id"])){
	$CategorieC=new CategorieService();
	$CategorieC->supprimercategorie($_POST["id"]);
    header('Location: ../Views/back/AfficherCategorie.php');

}

?>