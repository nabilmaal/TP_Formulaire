<?php

include('index.php'); 

try {
    $database = new PDO ('mysql:host='.BD_HOST.';port='.BD_PORT.';dbname='.BD_DATABASE, BD_USERNAME, BD_PASSWORD);

} catch (Exception $e) { 

 die('Erreur : ' .$e->getMessage().'<br  />'); 
}
if (isset($_POST['lastname']) && isset($_POST['firstname'])) {
 
    $sql = $database->prepare('INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES (?,?,?,?,?)');
    $sql->execute(array($_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail']));

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
    form {
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
    <label for="lastname">lastname :</label>
    <input type="text" name="lastname" value="lastname" id="lastname">
    <br>
     <?php $errorMessage ?>
    <label for="firstname">firstname :</label>
    <input type="text" name="firstname" value="firstname" id="firstname">
    <br>
    <?php $errorMessage ?>
    <label for="birthdate">birthdate :</label>
    <input type="date" name="birthdate" value="birthdate" id="birthdate">
    <br>
    <?php $errorMessage ?>
    <label for="phone">phone</label>
    <input type="tel"  name="phone" value="" min="0" maxlength="10" id="phone">
    <br>
    <?php $errorMessage ?>
    <label for="mail">mail :</label>
    <input type="mail" name="mail" value="mail" id="mail">
    <br>
    <?php $errorMessage ?>
    <input type="submit">
     </form>
</body>
</html>