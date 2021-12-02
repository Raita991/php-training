<?php





try {
        
        sendToDatabase($_POST); 

        echo'<br><a href="http://localhost/exo&projet/projet/index.php"><button>Retourner à la page précédente </button></a>';
    
} catch (PDOException $PDOException) {
    echo 'Impossible de se connecter à la base de données';
}
    


/* FUNCTION */
function sendToDatabase() {
    $dsn = 'mysql:host=localhost;dbname=ca_poupette';
    $pdo = new PDO($dsn, 'root','');
    $montant = $_POST['devise'];
    $mounth =  $_POST['newMounth'];
    $source = $_POST['newSource'];
    var_dump($montant, $mounth, $source);
    $statement = $pdo->prepare('INSERT INTO experimental(price, typeOfPrice, monuthOfPrice) VALUES (:montant, :source, :mounth)');
    $statement->bindParam(':montant', $montant);
    $statement->bindParam(':source', $source);
    $statement->bindParam(':mounth', $mounth);

    if($statement->execute()) {
        echo "Nouveau enregistrement créé avec succès !";
    } else {
        echo "toujours pas :/";
    } 
}

/*
function dataRecovery() {
    $dsn = 'mysql:host=localhost;dbname=ca_poupette';
    $pdo = new PDO($dsn, 'root','');
    foreach ($pdo->query('SELECT price FROM experimental', PDO::FETCH_ASSOC) as $number) {
        $price = $number['price'];
        echo "<td id=\"turnoverOfMarchOfStudio\">$price</td>";
    }
}

*/

?>

