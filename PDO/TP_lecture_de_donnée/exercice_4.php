<?php
 


 include('PDO.php'); 

try {
    $database = new PDO ('mysql:host='.BD_HOST.';port='.BD_PORT.';dbname='.BD_DATABASE, BD_USERNAME, BD_PASSWORD);

} catch (Exception $e) { 

 die('Erreur : ' .$e->getMessage().'<br  />'); 
}

 // exercice 4

    try {
        $query = 'SELECT * FROM clients where card = 0';
                
          $sql= $database->prepare($query);
          $sql->execute();
          $clients = $sql->fetchAll(PDO::FETCH_ASSOC);
                    
          foreach ($clients as $clients) {
            echo '<table>';
            echo '<tr>';
            echo '<td>' . $clients['lastName'] . '</td>';
            echo '<td>' . $clients['firstName'] . '</td>';
            echo '<td>' . $clients['birthDate'] . '</td>';
            echo '<td>' . $clients['card'] . '</td>';
            echo '<td>' . $clients['cardNumber'] . '</td>';
            echo '</tr>';
            echo '</table>';
        }   
            } catch (Exception $e) { 
                
              die('Erreur : ' .$e->getMessage().'<br  />');
        };  
?>

