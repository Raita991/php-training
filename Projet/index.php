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
          <select class="form-select" aria-label="Default select example" id="mounth" name="newMonth">
            <option selected>Selectionner le mois</option>
            <option value="1">Janvier</option>
            <option value="2">Fevier</option>
            <option value="3">Mars</option>
            <option value=4">Avril</option>
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

  
  function refreshTableTwo() {
    $dsn = 'mysql:host=localhost;dbname=ca_poupette';
    $pdo = new PDO($dsn, 'root','');

    $result = $pdo->query('SELECT
      monthOfPrice,
      SUM(CASE typeOfPrice WHEN 1 THEN price ELSE 0 end) As type_1_sum,
      SUM(CASE typeOfPrice WHEN 2 THEN price ELSE 0 end) As type_2_sum,
      SUM(CASE typeOfPrice WHEN 3 THEN price ELSE 0 end) As type_3_sum
      From ca_poupette.experimental
      Group by monthOfPrice
      Order by monthOfPrice', PDO::FETCH_ASSOC); 
      $monthNames= [
        1 => "Janvier",
        2 => "Février",
        3 => "Mars",
        4 => "Avril",
        5 => "Mai",
        6 => "Juin",
        7 => "Juillet",
        8 => "Aôut",
        9 => "Septembre",
        10 => "Octobre",
        11 => "Novembre",
        12 => "Décembre"
      ];
    $totalResult = $pdo->query('SELECT
    SUM(CASE typeOfPrice WHEN 1 THEN price ELSE 0 end) As type_total1_sum,
    SUM(CASE typeOfPrice WHEN 2 THEN price ELSE 0 end) As type_total2_sum,
    SUM(CASE typeOfPrice WHEN 3 THEN price ELSE 0 end) As type_total3_sum
    FROM ca_poupette.experimental', PDO::FETCH_ASSOC);
      foreach($totalResult as $numberOne){
        $totalResultSco = $numberOne['type_total1_sum'];
        $totalResultStu = $numberOne['type_total2_sum'];
        $totalResultOther = $numberOne['type_total3_sum'];
        $finalTotalResult = $totalResultOther + $totalResultSco + $totalResultStu;
      };
      echo
      "
      <table class='table' style ='margin-top: 5%'>
        <thead>
          <tr>
            <th scope='col'>#</th>
            <th scope='col' style='width: 24%'>Mois</th>
            <th scope='col' style='width: 24%'>CA scolaire</th>
            <th scope='col' style='width: 24%'>CA Studio</th>
            <th scope='col' style='width: 24%'>Autres</th>
          </tr>
         </thead> 
      </table>
      ";
        foreach($result as $number) {
          $monthValue = $monthNames[$number['monthOfPrice']];
          $priceSco = $number['type_1_sum'];
          $priceStu = $number['type_2_sum'];
          $priceOther = $number['type_3_sum'];
          echo
          "
          <table class='table table-pink table-striped'>
            <tbody>
              <tr>
                <th scope='row'></th>
                <td style ='width: 24%'>$monthValue</td>
                <td style ='width: 24%'>$priceSco.€</td>
                <td style ='width: 24%'>$priceStu.€</td>
                <td style ='width: 24%'>$priceOther.€</td>
              </tr>
            </tbody>
          </table>
          ";
        };
      echo
      "
      <table class='table table-pink table-striped'>
      <tr>
        <th scope='row'></th>
        <td style ='width: 24%'>Totaux</td>
        <td style ='width: 24%'>$totalResultSco.€</td>
        <td style ='width: 24%'>$totalResultStu.€</td>
        <td style ='width: 24%'>$totalResultOther.€</td>
      </tr>
      </table>
      <table class='table'>
      <tr>
        <th scope='row'></th>
        <td style ='width: 24%'><b>Total des totaux</b></td>
        <td style ='width: 24%'></td>
        <td style ='width: 24%'><b>$finalTotalResult.€</b></td>
        <td style ='width: 24%'></td>
      </tr>
      </table>
      ";
}
  

  refreshTableTwo();
?>
</body>
</html>