<?php
$username='Saufiane';
$userlastname='Cherief';
$birth='1989-06-20';

// connexion de la base de données
$base_db= new PDO('mysql:host=localhost;dbname=atelier','root','');

// sql qui sera executé
$sql='INSERT INTO users(u_name, u_lastname, u_birth) 
VALUES(:username, :userlastname, :birth)';

// prepare la requette a etre executé

$sth = $base_db->prepare($sql);

// proteger les données que l'on insere

$sth->bindParam(':username',$username, PDO::PARAM_STR);
$sth->bindParam(':userlastname',$userlastname, PDO::PARAM_STR);
$sth->bindParam(':birth',$birth, PDO::PARAM_STR);

// executer la requette

$sth->execute();
$sql = 'SELECT u_name, u_lastname, u_birth FROM users';
$result = $base_db->query($sql);
$sth->execute();

// le resultat de ma requette est stocke dans la variable users

$users = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Liste des personnes </h1>
<?php
foreach ($users as $user){

?>
<!-- il fallait que j'enleve le s à user -->
    <p>Nom : <?php echo $user['u_name']; ?> 
    Prenom : <?php echo $user['u_lastname']; ?>
     Age : <?php echo $user['u_birth']; ?> </p>
<?php
}
?>
</body>
</html>
