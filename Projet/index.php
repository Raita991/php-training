<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="row justify-content-md-center header">
      <!--img src="bandeau-expertise-comptable-groupe2B-1024x272.jpg" alt="bandeau" class="img-fluid" id="imagel"-->
      <!--img src="aaci-expertise-comptable-bandeau-2.jpg" alt="bandeau2" class="img-fluid" id="images"-->
      <div class="title">
        <h1>Suivi du chiffre d'affaire</h1>
      </div>
    </div>
    <form method="POST" action="back.php">
      <div class="row content1">
        <div class="title pink">
        <h2>Nouvelle(s) entrée(s)</h2>
        </div>
        <div class="input-group mb-3">
          <select class="form-select" aria-label="Default select example" id="month" name="newMounth">
            <option selected>Selectionner le mois</option>
            <option value="1">Janvier</option>
            <option value="2">Fevrier</option>
            <option value="3">Mars</option>
            <option value="4">Avril</option>
            <option value="5">Mai</option>
            <option value="6">Juin</option>
            <option value="7">Juillet</option>
            <option value="8">Aôut</option>
            <option value="9">Septembre</option>
            <option value="10">Octobre</option>
            <option value="11">Novembre</option>
            <option value="12">Decembre</option>
          </select>
          <select class="form-select" aria-label="Default select example" id="source" name="newSource">
            <option selected>Source du CA</option>
            <option value="1">Scolaire</option>
            <option value="2">Studio</option>
            <option value="3">Autres</option>
          </select>
        </div>
      
        <div class="mb-3 number">
          <label for="basic-url" class="form-label">Nouveau montant</label>
          <div class="input-group mb-3">
            <input type="number" name="devise" class="form-control" id="amount" step=".01">
            <span class="input-group-text">€</span>
          </div>
          <!--<label for="new number" class="form-label" name="title">Chiffre du mois en cours</label>
          <div class="input-group mb-3">
          <input type="text" class="form-control" id="exampleFormControlInput1" id="monthSelect">
          <span class="input-group-text">€</span>
          </div>
        </div>-->
      </div>
      
  
      <div class="d-grid">
        <button class="btn btn-danger" type="submit" id="button">Envoyer</button>
      </div>
    </form>
  </div>

  <?php

function refreshTable() {

  $dsn = 'mysql:host=localhost;dbname=ca_poupette';
  $pdo = new PDO($dsn, 'root','');
  foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 1)
    AND (monthOfprice = 1)', PDO::FETCH_ASSOC) as $number) {
    $priceJanSco = $number['SUM(price)'];
    }
  foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 2)
  AND (monthOfprice = 1)', PDO::FETCH_ASSOC) as $number) {
    $priceJanStu = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 3)
  AND (monthOfprice = 1)', PDO::FETCH_ASSOC) as $number) {
    $priceJanOt = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 1)
  AND (monthOfprice = 2)', PDO::FETCH_ASSOC) as $number) {
    $priceFebSco = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 2)
  AND (monthOfprice = 2)', PDO::FETCH_ASSOC) as $number) {
    $priceFebStu = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 3)
  AND (monthOfprice = 2)', PDO::FETCH_ASSOC) as $number) {
    $priceFebOt = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 1)
  AND (monthOfprice = 3)', PDO::FETCH_ASSOC) as $number) {
    $priceMarSco = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 2)
  AND (monthOfprice = 3)', PDO::FETCH_ASSOC) as $number) {
    $priceMarStu = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 3)
  AND (monthOfprice = 3)', PDO::FETCH_ASSOC) as $number) {
    $priceMarOt = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 1)
  AND (monthOfprice = 4)', PDO::FETCH_ASSOC) as $number) {
    $priceAprSco = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 2)
  AND (monthOfprice = 4)', PDO::FETCH_ASSOC) as $number) {
    $priceAprStu = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 3)
  AND (monthOfprice = 4)', PDO::FETCH_ASSOC) as $number) {
    $priceAprOt = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 1)
  AND (monthOfprice = 5)', PDO::FETCH_ASSOC) as $number) {
    $priceMaySco = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 2)
  AND (monthOfprice = 5)', PDO::FETCH_ASSOC) as $number) {
    $priceMayStu = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 3)
   AND (monthOfprice = 5)', PDO::FETCH_ASSOC) as $number) {
     $priceMayOt = $number['SUM(price)'];
    }
    foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 1)
  AND (monthOfprice = 6)', PDO::FETCH_ASSOC) as $number) {
    $priceJunSco = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 2)
  AND (monthOfprice = 6)', PDO::FETCH_ASSOC) as $number) {
    $priceJunStu = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 3)
  AND (monthOfprice = 6)', PDO::FETCH_ASSOC) as $number) {
    $priceJunOt = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 1)
  AND (monthOfprice = 7)', PDO::FETCH_ASSOC) as $number) {
    $priceJuiSco = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 2)
  AND (monthOfprice = 7)', PDO::FETCH_ASSOC) as $number) {
    $priceJuiStu = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 3)
  AND (monthOfprice = 7)', PDO::FETCH_ASSOC) as $number) {
    $priceJuiOt = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 1)
  AND (monthOfprice = 8)', PDO::FETCH_ASSOC) as $number) {
    $priceAugSco = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 2)
  AND (monthOfprice = 8)', PDO::FETCH_ASSOC) as $number) {
    $priceAugStu = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 3)
  AND (monthOfprice = 8)', PDO::FETCH_ASSOC) as $number) {
    $priceAugOt = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 1)
  AND (monthOfprice = 9)', PDO::FETCH_ASSOC) as $number) {
    $priceSepSco = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 2)
  AND (monthOfprice = 9)', PDO::FETCH_ASSOC) as $number) {
    $priceSepStu = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 3)
  AND (monthOfprice = 9)', PDO::FETCH_ASSOC) as $number) {
    $priceSepOt = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 1)
  AND (monthOfprice = 10)', PDO::FETCH_ASSOC) as $number) {
    $priceOctSco = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 2)
  AND (monthOfprice = 10)', PDO::FETCH_ASSOC) as $number) {
    $priceOctStu = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 3)
  AND (monthOfprice = 10)', PDO::FETCH_ASSOC) as $number) {
    $priceOctOt = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 1)
  AND (monthOfprice = 11)', PDO::FETCH_ASSOC) as $number) {
    $priceNovSco = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 2)
  AND (monthOfprice = 11)', PDO::FETCH_ASSOC) as $number) {
    $priceNovStu = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 3)
  AND (monthOfprice = 11)', PDO::FETCH_ASSOC) as $number) {
    $priceNovOt = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 1)
  AND (monthOfprice = 12)', PDO::FETCH_ASSOC) as $number) {
    $priceDecSco = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 2)
  AND (monthOfprice = 12)', PDO::FETCH_ASSOC) as $number) {
    $priceDecStu = $number['SUM(price)'];
   }
   foreach ($pdo->query('SELECT SUM(price) FROM turnover WHERE (typeOfPrice = 3)
  AND (monthOfprice = 12)', PDO::FETCH_ASSOC) as $number) {
    $priceDecOt = $number['SUM(price)'];
   }
   $totalOfSco = $priceJanSco + $priceFebSco + $priceMarSco + $priceAprSco + $priceMaySco + $priceJunSco + $priceJuiSco + $priceAugSco
   + $priceSepSco + $priceOctSco + $priceNovSco + $priceDecSco;

   $totalOfStu = $priceJanStu + $priceFebStu + $priceMarStu + $priceAprStu + $priceMayStu + $priceJunStu + $priceJuiStu + $priceAugStu
   + $priceSepStu + $priceOctStu + $priceNovStu + $priceDecStu;

   $totalOfOt = $priceJanOt + $priceFebOt + $priceMarOt + $priceAprOt + $priceMayOt + $priceJunOt + $priceJuiOt + $priceAugOt
   + $priceSepOt + $priceOctOt + $priceNovOt + $priceDecOt;

   $OneForAll = $totalOfStu + $totalOfSco + $totalOfOt;
    echo"
    <div class=\"row content\">
    
    <div class=\"title pink\">
    
      <h2>Récapitulatif de l'année</h2>
    </div>
    <div class=\"summary\">
      <table class=\"table\" id=\"myTable\">
        <thead>
          <tr>
            <th scope=\"col\">#</th>
            <th scope=\"col\">Mois</th>
            <th scope=\"col\">CA scolaire</th>
            <th scope=\"col\">CA Studio</th>
            <th scope=\"col\">Autres</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope=\"row\">1</th>
            <td>Janvier</td>
            <td id=\"turnoverOfJanuaryOfSchool\">$priceJanSco.€</td>
            <td id=\"turnoverOfJanuaryOfStudio\">$priceJanStu.€</td>
            <td id=\"turnoverOfJanuaryOfOther\">$priceJanOt.€</td>
          </tr>
          <tr>
            <th scope=\"row\">2</th>
            <td>Fevrier</td>
            <td id=\"turnoverOfFebruaryOfSchool\">$priceFebSco.€</td>
            <td id=\"turnoverOfFebruaryOfStudio\">$priceFebStu.€</td>
            <td id=\"turnoverOfFebruaryOfOther\">$priceFebOt.€</td>
          </tr>
          <tr>
            <th scope=\"row\">3</th>
            <td>Mars</td>
            <td id=\"turnoverOfMarchOfSchool\">$priceMarSco.€</td>
            <td id=\"turnoverOfMarchOfStudio\">$priceMarStu.€</td>
            <td id=\"turnoverOfMarchOfOther\">$priceMarOt.€</td>
          </tr>
          <tr>
            <th scope=\"row\">4</th>
            <td>Avril</td>
            <td id=\"turnoverOfAprilOfSchool\">$priceAprSco.€</td>
            <td id=\"turnoverOfAprilOfStudio\">$priceAprStu.€</td>
            <td id=\"turnoverOfAprilOfOther\">$priceAprOt.€</td>
          </tr>
          <tr>
            <th scope=\"row\">5</th>
            <td>Mai</td>
            <td id=\"turnoverOfMayOfSchool\">$priceMaySco.€</td>
            <td id=\"turnoverOfMayOfStudio\">$priceMayStu.€</td>
            <td id=\"turnoverOfMayOfOther\">$priceMayOt.€</td>
          </tr>
          <tr>
            <th scope=\"row\">6</th>
            <td>Juin</td>
            <td id=\"turnoverOfJuneOfSchool\">$priceJunSco.€</td>
            <td id=\"turnoverOfJuneOfStudio\">$priceJunStu.€</td>
            <td id=\"turnoverOfJuneOfOther\">$priceJunOt.€</td>
          </tr>
          <tr>
            <th scope=\"row\">7</th>
            <td>Juillet</td>
            <td id=\"turnoverOfJuilyOfSchool\">$priceJuiSco.€</td>
            <td id=\"turnoverOfJuilyOfStudio\">$priceJuiStu.€</td>
            <td id=\"turnoverOfJuilyOfOther\">$priceJuiOt.€</td>
          </tr>
          <tr>
            <th scope=\"row\">8</th>
            <td>Aôut</td>
            <td id=\"turnoverOfAugustOfSchool\">$priceAugSco.€</td>
            <td id=\"turnoverOfAugustOfStudio\">$priceAugStu.€</td>
            <td id=\"turnoverOfAugustOfOther\">$priceAugOt.€</td>
          </tr>
          <tr>
            <th scope=\"row\">9</th>
            <td>Septembre</td>
            <td id=\"turnoverOfSeptemberOfSchool\">$priceSepSco.€</td>
            <td id=\"turnoverOfSeptemberOfStudio\">$priceSepStu.€</td>
            <td id=\"turnoverOfSeptemberOfOther\">$priceSepOt.€</td>
          </tr>
          <tr>
            <th scope=\"row\">10</th>
            <td>Octobre</td>
            <td id=\"turnoverOfOctoberOfSchool\">$priceOctSco.€</td>
            <td id=\"turnoverOfOctoberOfStudio\">$priceOctStu.€</td>
            <td id=\"turnoverOfOctoberOfOther\">$priceOctOt.€</td>
          </tr>
          <tr>
            <th scope=\"row\">11</th>
            <td>Novembre</td>
            <td id=\"turnoverOfNovemberOfSchool\">$priceNovSco.€</td>
            <td id=\"turnoverOfNovemberOfStudio\">$priceNovStu.€</td>
            <td id=\"turnoverOfNovemberOfOther\">$priceNovOt.€</td>
          </tr>
          <tr>
            <th scope=\"row\">12</th>
            <td>Decembre</td>
            <td id=\"turnoverOfDecemberOfSchool\">$priceDecSco.€</td>
            <td id=\"turnoverOfDecemberOfStudio\">$priceDecStu.€</td>
            <td id=\"turnoverOfDecemberOfOther\">$priceDecOt.€</td>
          </tr>
          <tr>
            <th scope=\"row\">Total</th>
            <td>-----------</td>
            <td>$totalOfSco.€</td>
            <td>$totalOfStu.€</td>
            <td>$totalOfOt.€</td>
          </tr>
          <tr>
            <th scope=\"row\">Total des totaux</th>
            <td>$OneForAll.€</td>
            <td></td>
            <td></td>
            <td colspan=\"4\"></td>
          </tr>
        </tbody>
      </table>
      </div>
  </div>
</div>
    ";

    
}
refreshTable();



?>

  <script src="script.js"></script>
  </body>
  </html>

<!--
  