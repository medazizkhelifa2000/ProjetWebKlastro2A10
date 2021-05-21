<?php
include("config.php");
?>
<!DOCTYPE html >
<html>
<head>
<meta charset ="uft-8">
<title>Formulaire de maitre </title>
<link rel ="stylesheet" type="text/css" href="css/bootstrap.min.css">
<style>
body {
background-color :#000;

}
h1,h2,h3,h4,h5,h6{
    color :#fff;
}
hr{
    border-color:#999;
}
tr,th,td{
    color :#fff;
}
input[type="text"],input[type="email"]{
    background-color:#999;
}
</style>   
</head>
<body>
<div class="container col-md-12">
<div clss="row justify-content-center">
<div clss="col-md-8">
<br>
<h3 clss="text-center">Formulaire maitre </h3>
<hr>
<br>
</div>
</div>
<div class="row">
<div class="col-md-8">
<h3 class ="text-center">Afficher les donner de la BD </h3>
<hr>
<table class="table table-bordered">
<thead>
<tr>
<th>IdP</th>
<th>Nom</th>
<th>Prenom</th>
<th>Ville</th>
<th>Age</th>
<th>Email</th>
<td colspan="2" align="center">Action</td>
</tr>
</thead>
<tbody>
<tr>
<td> 1 </td>
<td> Djebbi </td>
<td> Mahdi </td>
<td> Boumhal </td>
<td> 21 </td>
<td> mahdi@yahoo.fr </td>
<td><a href ="#" class="btn btn-danger"> Supprimer </a></td>
<td><a href ="#" class="btn btn-info"> Modifier </a></td>
</tr>
<tr>
<td> 2 </td>
<td> Bejaoui </td>
<td> Lamine </td>
<td> Hamam lif </td>
<td> 21 </td>
<td> Lamine@gmail.fr </td>
<td><a href ="#" class="btn btn-danger"> Supprimer </a></td>
<td><a href ="#" class="btn btn-info"> Modifier </a></td>
</tr>
</tbody>
</table>
</div>
<div clss="col-md-4">
<h3 class ="text-center">ajouter les information </h3>
<hr>
<form method="post" action="action.php">
<div class="form-group">
<label>Nom : </label>
<input type="text" name="txtnom" class="form-control" placeholder="tapez votre nom"/>
</div>
<div class="form-group">
<label>Prenom : </label>
<input type="text" name="txtprenom" class="form-control" placeholder="tapez votre prenom"/>
</div>
<div class="form-row">
<div class="form-group col-md-3">
<label>Jour</label>
<select class="form-control" name="txtjour">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
</div>
<div class="form-group col-md-3">
<label>Mois</label>
<select class="form-control" name="txtmois">
<option value="Janvier">Janvier</option>
<option value="Fevrier">Fevrier</option>
<option value="Mars">Mars</option>
<option value="Avril">Avril</option>
<option value="Mai">Mai</option>
<option value="Juin">Juin</option>
<option value="Juillet">Juillet</option>
<option value="Aout">Aout</option>
<option value="Septembre">Septembre</option>
<option value="Octobre">Octobre</option>
<option value="Novembre">Novembre</option>
<option value="Decemnbre">Decemnbre</option>
</select>
</div>
<div class="form-group col-md-3">
<label>Année</label>
<select class="form-control" name="txtannee">
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
<option value="2021">2021</option>
</select>
</div>
</div>
<div class="form-group">
<label>Ville : </label>
<input type="text" name="txtville" class="form-control" placeholder="tapez votre ville"/>
</div>
<div class="form-group">
<label>Age : </label>
<input type="text" name="txtage" class="form-control" placeholder="tapez votre age"/>
</div>
<div class="form-group">
<label>Email : </label>
<input type="text" name="txtemail" class="form-control" placeholder="tapez votre email"/>
</div>
<div class="form-group">
<imput type="submit" name="btn_Ajout" class="btn btn-primary btn-block" value="Enregistrer" />
<hr>
</div>
</form>
</div>
</div>
</div>
</body>
</html>

