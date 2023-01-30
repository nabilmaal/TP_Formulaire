<?php
 


 include('PDO.php'); 

try {
    $database = new PDO ('mysql:host='.BD_HOST.';port='.BD_PORT.';dbname='.BD_DATABASE, BD_USERNAME, BD_PASSWORD);

} catch (Exception $e) { 

 die('Erreur : ' .$e->getMessage().'<br  />'); 
}


 // exercice 5


      try {
        $query = 'SELECT lastName, firstName FROM clients WHERE lastName LIKE M% ORDER BY lastName ASC';
                
          $sql= $database->prepare($query);
          $sql->execute();
          $clients = $sql->fetchAll(PDO::FETCH_ASSOC);
                    
          echo '<table>';
          foreach ($clients as $client) {
              echo '<tr>';
              echo '<td>' . $client['lastName'] . '</td>';
              echo '<td>' . $client['firstName'] . '</td>';
              echo '</tr>';
          } 
          echo '</table>';
      } catch (Exception $e) { 
          die('Erreur : ' .$e->getMessage().'<br  />');
      }  
?>


