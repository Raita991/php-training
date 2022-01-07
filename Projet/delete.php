<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    try {
            
        deleteConfirmation($_POST); 

        echo'<br><a href="http://localhost/exo&projet/projet/index.php"><button type="btn btn-danger">Retourner à la page précédente </button></a>';

    } catch (PDOException $PDOException) {
    echo 'Impossible de se connecter à la base de données';
    }

    function deleteConfirmation() {
        $dsn = 'mysql:host=localhost;dbname=ca_poupette';
        $pdo = new PDO($dsn, 'root','');
        $id = $_POST['falseData'];
        $statement = $pdo ->prepare('DELETE FROM turnover WHERE id = :id');
        $statement->bindParam(':id', $id);
    
        if($statement->execute()) {
            echo "Donnée effacé !";
        } else {
            echo "toujours pas :/";
        } 
    }
    ?>
</body>
</html>