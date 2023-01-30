<?php
 

 include('PDO.php'); 


try {
    $database = new PDO ('mysql:host='.BD_HOST.';port='.BD_PORT.';dbname='.BD_DATABASE, BD_USERNAME, BD_PASSWORD);

} catch (Exception $e) { 

 die('Erreur : ' .$e->getMessage().'<br  />'); 
}

 // exercice 6

 try {
    $query = 'SELECT title, date, startTime FROM shows ORDER BY title ASC';
            
      $sql= $database->prepare($query);
      $sql->execute();
      $shows = $sql->fetchAll(PDO::FETCH_ASSOC);
                
      foreach ($shows as $show) {
        echo '<p> Spectable ' .$show['title'].' Le ' .$show['date']. ' à '.$show['startTime'].'</p>';
    }   
        } catch (Exception $e) { 
            
          die('Erreur : ' .$e->getMessage().'<br  />');
    };  


?>    