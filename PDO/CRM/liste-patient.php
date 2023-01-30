<?php

include('index.php'); 

try {
    $database = new PDO ('mysql:host='.BD_HOST.';port='.BD_PORT.';dbname='.BD_DATABASE, BD_USERNAME, BD_PASSWORD);

} catch (Exception $e) { 

 die('Erreur : ' .$e->getMessage().'<br  />'); 
}

$sql = "SELECT lastname, firstname, birthdate, phone, mail FROM patients";
$result = $database->query($sql);
$data = $result->fetchAll(PDO::FETCH_ASSOC);



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
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<table>
<tr>
    <th>Last Name</th>
    <th>First Name</th>
    <th>Birthdate</th>
    <th>Phone</th>
    <th>Email</th>
  </tr>
  <?php foreach ($data as $row) { ?>
  <tr>
    <td><?php echo $row['lastname']; ?></td>
    <td><?php echo $row['firstname']; ?></td>
    <td><?php echo $row['birthdate']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['mail']; ?></td>
  </tr>
  <?php } ?>
</table>
 <a href="ajout-patient.php">ajouter un nouveau patient ? </a><a href="profil-patient.php">consultez le profil des patients</a> 

</body>
</html>