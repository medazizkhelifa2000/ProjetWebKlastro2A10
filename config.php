
<?php
    define('USER', 'root');  //definition des params = CSTE pour la connexion à  la base MYSQL
    define('PASSWORD', '');
    define('HOST', 'localhost');
    define('DATABASE', 'doggyhouse');   // nom de la base doggyhouse
    try {
        $connection = new pdo("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);  // creation  de l'objet PDO: php data object
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,  PDO::FETCH_ASSOC);	

       // echo "connected successufully";
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>
