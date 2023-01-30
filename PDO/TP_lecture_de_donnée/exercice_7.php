<?php
 

 include('PDO.php'); 


try {
    $database = new PDO ('mysql:host='.BD_HOST.';port='.BD_PORT.';dbname='.BD_DATABASE, BD_USERNAME, BD_PASSWORD);

} catch (Exception $e) { 

 die('Erreur : ' .$e->getMessage().'<br  />'); 
}

 // exercice 4

try {
    $query = 'SELECT * FROM clients';

    $sql = $database->prepare($query);
    $sql->execute();
    $clients = $sql->fetchAll(PDO::FETCH_ASSOC);

   

    foreach ($clients as $client) {
       
        echo '<br><th>Nom</th><br>';
        echo '<td>' . $client['lastName'] . '</td><br>';
        echo'<br>';
        
        echo '<th>Prénom</th><br>';
        echo '<td>' . $client['firstName'] . '</td><br>';
        echo'<br>';

        echo '<th>Date de naissance</th><br>';
        echo '<td>' . $client['birthDate'] . '</td><br>';
        echo'<br>';
    
        if ( $client['card'] == 1 ) {
            echo '<th>Carte de fidélité</th><br>';
        echo '<td>' . $client['card'] . '</td><br>';
        echo'<br>';

        echo '<th>Numéro de carte</th><br>';
        echo '<td>' . $client['cardNumber'] . '</td><br>';
        echo'<br>'; 
        } else
            
       echo 'pas de carte<br>';
    }

} catch (Exception $e) { 
                
              die('Erreur : ' .$e->getMessage().'<br  />');
        };  
?>
