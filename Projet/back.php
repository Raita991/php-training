<?php

$dsn = 'mysql:host=localhost;dbname=ca_poupette';

try {
    $pdo = new PDO($dsn, 'root','');
    foreach ($pdo->query('SELECT price, typeOfPrice, monthOfPrice FROM experimental', PDO::FETCH_ASSOC) as $number) {
       $price = $number['price'];
       if ($number['price'] == 79.00 || 105.80 || 585.25) {
            echo "
            <table>
                <thead>
                    <tr>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$price</td>
                    </tr>
                </tbody>
            </table>    
            ";
       } else {
           echo "Ok";
       }
    }
} catch (PDOException $PDOException) {
    echo 'Impossible de se connecter à la base de données';
}


