<?php
    include_once '../model/reservation.php';
    include_once '../controller/reservationC.php';

    $error = "";

    // create user
    $res = null;

    // create an instance of the controller
    $resC = new ReservationC();
    if (
        isset($_POST["cin"]) &&
        isset($_POST["idVol"]) &&
        isset($_POST["valid"]) &&
        isset($_POST["dateReservation"]) &&
        isset($_POST["prix"])
    ) {
        if (
            !empty($_POST["cin"]) &&
            !empty($_POST["idVol"]) &&
            !empty($_POST["valid"]) &&
            !empty($_POST["dateReservation"]) &&
            !empty($_POST["prix"])
        ) {
            $res = new Reservation(
                $_POST['cin'],
                $_POST['idVol'],
                $_POST['valid'],
                $_POST['dateReservation'],
                $_POST['prix']
            );
            $resC->ajouterReservation($res);
            header('Location:afficherreservations.php');
        }
        else
            $error = "Missing information";
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link rel="stylesheet" href="stlres.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
    <body>
        <button><a href="afficherreservation.php" class="btn btn-primary flight">Retour à la liste</a></button>
        <hr>

        <div id="error">
            <?php echo $error; ?>
        </div>
        <form action="" method="POST">
            <table border="1" align="center" class="booking-from-box">

                <tr>
                    <td>
                        <label for="cin">Id Chien:
                        </label></td>
                    <td><input type="number" name="cin" id="cin" maxlength="8"></td>
                </tr>
                <tr>
                    <td>
                        <label for="idVol">Nom chien:
                        </label>
                    </td>
                    <td><input type="text" name="idVol" id="idVol" maxlength="20"></td>
                </tr>

                <tr>
                    <td>
                        <label for="valid">Race:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="valid" id="valid">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dateReservation">Date de naissance:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="dateReservation" id="dateReservation" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="prix">prix:
                        </label>
                    </td>
                    <td>
                        <input type="prix" name="prix" id="prix">
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer" class="btn btn-primary flight">
                    </td>
                    <td>
                        <input type="reset" value="Annuler" class="btn btn-primary flight">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
