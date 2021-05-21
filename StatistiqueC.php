<?php // content="text/plain; charset=utf-8"
require_once ('C:/wamp64/www/Projetweb/Controllers/jpgraph-4.2.0/src/jpgraph.php');
require_once ('C:/wamp64/www/ProjetWeb/Controllers/jpgraph-4.2.0/src/jpgraph_bar.php');
require_once '../util/DataSource.php';
//bar linear fix

$query="SELECT sum(prix) as  pr , nom_categorie FROM `produit` group by nom_categorie  ";

$db= DataSource::getConnexion();
$Data1 =  $db->query($query);
$Data2 =  $db->query($query);
$datay=array();
$datax=array();

foreach ($Data1 as $row){
    $datay[]=$row['pr'];
}
foreach ($Data2 as $row){
    $datax[]=$row['nom_categorie'];

}


// Create the graph. These two calls are always required
$graph = new Graph(500,400,"auto");
$graph->SetScale('textlin');

$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);
// Adjust the margin a bit to make more room for titles
$graph->SetMargin(80,30,20,40);
$graph->SetBox(false);
// Create a bar pot
$bplot = new BarPlot($datay);
$fcol='#FFFFFF';
$tcol='#ff7700';
$bplot->SetFillGradient($fcol,$tcol,GRAD_LEFT_REFLECTION);
// Adjust fill color
$bplot->SetColor("white");
$bplot->SetFillColor("#cc1111");
$graph->Add($bplot);
// Setup the titles
$graph->title->Set('Somme des Prix par Rapport au Categorie');
$graph->xaxis->title->Set('categories');
$graph->yaxis->title->Set('somme des prix');
$graph->title->SetFont(FF_TIMES,FS_BOLD);
$graph->yaxis->title->SetFont(FF_TIMES,FS_BOLD);
$graph->xaxis->title->SetFont(FF_TIMES,FS_BOLD);
$graph->xaxis->SetTickLabels($datax);
//$graph->xaxis->SetLabelAngle(50);
$graph->xaxis->SetTextTickInterval(1);
// Display the graph
$graph->Stroke();
?>