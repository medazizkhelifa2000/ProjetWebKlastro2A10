<?PHP
include_once(__DIR__ . "/../services/ProduitService.php");
include_once(__DIR__ . "/../services/CategorieService.php");
include_once(__DIR__ . "/../Entities/Produit.php");



if (isset($_POST["id_produit"])){
    $PC=new ProduitService();
    $result1=$PC->recuperproduit($_POST["id_produit"]);

    $PC->Supprimerproduit($_POST["id_produit"]);
    foreach($result1 as $row){
        $nom_categorie=$row->nom_categorie;
    }

    $CatService = new CategorieService();

    $result=$CatService->recuperercategorienom($nom_categorie);

    foreach($result as $row){
        $id =$row->id;
        $nom=$row->nom;
        $description=$row->description;


    }
    $number_of_products = $CatService->numberofProducts($id);
    $cat = new categorie($id,$nom,$description,$number_of_products);
    $cat = new categorie($id,$nom,$description,$number_of_products);
    $CatService->modifiercategorie($cat,$id);


    header('Location: ../Views/back/AfficherProduit.php');
}

?>

