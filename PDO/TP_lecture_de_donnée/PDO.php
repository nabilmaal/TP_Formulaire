<?php 

use FFI\Exception;
define('BD_HOST', 'localhost');
define('BD_PORT', '3306');
define('BD_DATABASE', 'colyesum');
define('BD_USERNAME', 'root');
define('BD_PASSWORD', '');


try {
    $database = new PDO ('mysql:host='.BD_HOST.';port='.BD_PORT.';dbname='.BD_DATABASE, BD_USERNAME, BD_PASSWORD);

} catch (Exception $e) { 

 die('Erreur : ' .$e->getMessage().'<br  />'); 
}

?>