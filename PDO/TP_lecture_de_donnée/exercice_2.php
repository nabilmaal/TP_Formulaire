<?php



include('PDO.php'); 
try {
  $database = new PDO ('mysql:host='.BD_HOST.';port='.BD_PORT.';dbname='.BD_DATABASE, BD_USERNAME, BD_PASSWORD);

} catch (Exception $e) { 

 die('Erreur : ' .$e->getMessage().'<br  />'); 
}

 // exercice 2 


 try {

    $query = 'SELECT * FROM showtypes';

    $sql = $database->prepare($query);
    $sql->execute();
    $showtypes = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    
    foreach ($showtypes as $showtypes) {
        echo '<table>';
        echo '<tr>';
        echo '<td>' . $showtypes['type'] . '</td>';
        echo '</tr>';
        echo '</table>';
    }
    
} catch (Exception $e) { 

    die('Erreur : ' .$e->getMessage().'<br  />');
}

?>


