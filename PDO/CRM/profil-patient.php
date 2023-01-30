<?php
include('index.php'); 

try {
    $database = new PDO ('mysql:host='.BD_HOST.';port='.BD_PORT.';dbname='.BD_DATABASE, BD_USERNAME, BD_PASSWORD);

} catch (Exception $e) { 

 die('Erreur : ' .$e->getMessage().'<br  />'); 
}



if (isset($_POST['lastname']) && isset($_POST['firstname'])) {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];

    $sql = "SELECT * FROM patients WHERE lastname='$lastname' AND firstname='$firstname'";
    $result = $database->query($sql);
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
 
   if (count($data) > 0) {
      foreach ($data as $row) {
        echo 'nom de famille ';
        echo $row['lastname'];
        echo '<br> prenom ';
        echo $row['firstname'];
        echo '<br> date de naissance ';
        echo $row['birthdate'];
        echo '<br> numero de telephone ';
        echo $row['phone'];
        echo '<br> email ';
        echo $row['mail'];
      }

   } else {
      echo "Il n'y a pas de patient avec ce nom et prénom";
   }
}


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
<style>
    body {
      background-color: antiquewhite;
      display: flex;
      align-items: center;
      margin-top: 50px;
      justify-content: center;
      flex-direction: column;
    }
    table {
      border: 1px solid black;
      border-radius: 15px;
      background-color: beige;
      
      align-items: center;
      justify-content: center;
      width: 45%;
    }

    th {
      margin-left: 50px;
      margin-right: 50px;
    }
  </style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <label for="lastname">Nom</label>
    <input type="text" id="lastname" name="lastname">

    <label for="firstname">Prénom</label>
    <input type="text" id="firstname" name="firstname">

    <input type="submit" value="rechercher">

    <a href="modification.php">moditication</a>

</body>
</html>


