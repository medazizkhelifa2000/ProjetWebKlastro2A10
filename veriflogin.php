<?php
include_once(__DIR__ .  "/../services/UserService.php");
include_once(__DIR__ .  "/../Util/DataSource.php");
	if(isset($_POST['login']) && isset($_POST['mdp']))
{
	$UserService = new UserService();
	$result = $UserService->verifierLogin($_POST['login'],$_POST['mdp']);

	if($result->count==0)
	{

        echo "<script>
                alert('User not found');
                window.location.href='../Views/login.html';
                </script>";


	
	}
	else
	{
		session_start();
		$_SESSION['id'] = $result->id;
		$_SESSION['nom'] = $result->nom_user;
        $_SESSION['prenom'] = $result->prenom;
        $_SESSION['mail'] = $result->mail;
        $_SESSION['username'] = $result->username;
        $role = $result->role;

if ( $role == 'role_admin')
{
	header("location:../Views/back/AfficherCategorie.php");

}
else
{
    header("location:../Views/front/AfficherProduit.php");
}


}
}
else
{

    echo "<script>
                alert('MDP OU USERNAME EST INCORRECT');
                window.location.href='../Views/login.html';
                </script>";
}



 ?>