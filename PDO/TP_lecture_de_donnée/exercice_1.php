<?php

// les resultats de chaque exercices doivent etre renvoyer sur une page differente a chaque fois
// modifier

include('PDO.php'); 


try {
    $database = new PDO ('mysql:host='.BD_HOST.';port='.BD_PORT.';dbname='.BD_DATABASE, BD_USERNAME, BD_PASSWORD);

} catch (Exception $e) { 

 die('Erreur : ' .$e->getMessage().'<br  />'); 
}

 // exercice 1 




try {

    $query = 'SELECT * FROM clients';

    $sql= $database->prepare($query);
    $sql->execute();
    $clients = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($clients as $client) {
        echo '<table>';
        echo '<tr>';
        echo '<td>' . $client['lastName'] . '</td>';
        echo '<td>' . $client['firstName'] . '</td>';
        echo '<td>' . $client['birthDate'] . '</td>';
        echo '<td>' . $client['card'] . '</td>';
        echo '<td>' . $client['cardNumber'] . '</td>';
        echo '</tr>';
        echo '</table>';
    }
    
    
    
} catch (Exception $e) { 

    die('Erreur : ' .$e->getMessage().'<br  />');
}
;
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>
