<?php
try {
    include('recuperation_post.php');
    $sql = "INSERT INTO commande (mode,rib,numero_cb,numero_ce)
    VALUES ('$modep', '$rib', '$cb','$ce')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "jawek behi";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
  $conn = null;
  ?>