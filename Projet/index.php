<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <link rel="stylesheet" href="bootstrap.min.css">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="row justify-content-md-center header">
      <img src="bandeau" alt="bandeau" class="img" id="imagel">
      <img src="aaci-expertise-comptable-bandeau-2.jpg" alt="bandeau2" class="img-fluid" id="images">
    </div>
    <div class="row justify-content-md-center">  
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
            <option value="3">Mariage</option>
            <option value="4">Identité</option>
            <option value="5">Autres</option>
          </select>
        </div>
      
        <div class="mb-3 number">
          <label for="basic-url" class="form-label">Nouveau montant</label>
          <div class="input-group mb-3">
            <input type="number" name="devise" class="form-control" id="amount" step=".01">
            <span class="input-group-text">€</span>
          </div>
      </div>
      <div class="d-grid">
        <button class="btn btn-danger" type="submit" id="button">Envoyer</button>
      </div>
    </form>

    <div class="accordion accordion-flush" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button btn-danger collapsed accordion-transition" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            <b>Chiffre d'affaire</b>
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
          <?php

  
            function refreshTableTwo() {
              $dsn = 'mysql:host=localhost;dbname=ca_poupette';
              $pdo = new PDO($dsn, 'root','');

              $result = $pdo->query('SELECT
                monthOfPrice,
                SUM(CASE typeOfPrice WHEN 1 THEN price ELSE 0 end) As type_1_sum,
                SUM(CASE typeOfPrice WHEN 2 THEN price ELSE 0 end) As type_2_sum,
                SUM(CASE typeOfPrice WHEN 3 THEN price ELSE 0 end) As type_3_sum,
                SUM(CASE typeOfPrice WHEN 4 THEN price ELSE 0 end) As type_4_sum,
                SUM(CASE typeOfPrice WHEN 5 THEN price ELSE 0 end) As type_5_sum
                From ca_poupette.turnover
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
              SUM(CASE typeOfPrice WHEN 3 THEN price ELSE 0 end) As type_total3_sum,
              SUM(CASE typeOfPrice WHEN 4 THEN price ELSE 0 end) As type_total4_sum,
              SUM(CASE typeOfPrice WHEN 5 THEN price ELSE 0 end) As type_total5_sum
              FROM ca_poupette.turnover', PDO::FETCH_ASSOC);
                foreach($totalResult as $numberOne){
                  $totalResultSco = $numberOne['type_total1_sum'];
                  $totalResultStu = $numberOne['type_total2_sum'];
                  $totalResultMarriage = $numberOne['type_total3_sum'];
                  $totalResultIdentity = $numberOne['type_total4_sum'];
                  $totalResultOther = $numberOne['type_total5_sum'];
                  $finalTotalResult = $totalResultOther + $totalResultSco + $totalResultStu + $totalResultIdentity + $totalResultMarriage;
                };
                echo
                "
                <table class='table' style ='margin-top: 5%'>
                  <thead>
                    <tr>
                      <th scope='col'>#</t.2
                      <th scope='col' style='width: 16.5%'>Mois</th>
                      <th scope='col' style='width: 16.5%'>CA scolaire</th>
                      <th scope='col' style='width: 16.5%'>CA Studio</th>
                      <th scope='col' style='width: 16.5%'>Mariage</th>
                      <th scope='col' style='width: 16.5%'>Identité</th>
                      <th scope='col' style='width: 16.5%'>Autres</th>
                    </tr>
                  </thead> 
                </table>
                ";
                  foreach($result as $number) {
                    $monthValue = $monthNames[$number['monthOfPrice']];
                    $priceSco = $number['type_1_sum'];
                    $priceStu = $number['type_2_sum'];
                    $priceMarriage = $number['type_3_sum'];
                    $priceIdentity = $number['type_4_sum'];
                    $priceOther= $number['type_5_sum'];
                    echo
                    "
                    <table class='table table-pink table-striped'>
                      <tbody>
                        <tr>
                          <th scope='row'></th>
                          <td style ='width: 16.6%'><b>$monthValue</b></td>
                          <td style ='width: 16.6%'>$priceSco.€</td>
                          <td style ='width: 16.6%'>$priceStu.€</td>
                          <td style ='width: 16.6%'>$priceMarriage.€</td>
                          <td style ='width: 16.6%'>$priceIdentity.€</td>
                          <td style ='width: 16.6%'>$priceOther.€</td>
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
                  <td style ='width: 16.6%'><b><u>Totaux</b></u></td>
                  <td style ='width: 16.6%'><u>$totalResultSco.€</u></td>
                  <td style ='width: 16.6%'><u>$totalResultStu.€</u></td>
                  <td style ='width: 16.6%'><u>$totalResultMarriage.€</u></td>
                  <td style ='width: 16.6%'><u>$totalResultIdentity.€</u></td>
                  <td style ='width: 16.6%'><u>$totalResultOther.€</u></td>
                </tr>
                </table>
                <table class='table'>
                <tr>
                  <th scope='row'></th>
                  <td style ='width: 24%'><b><u>Total des totaux</b></u></td>
                  <td style ='width: 24%'></td>
                  <td style ='width: 24%'><b><u>$finalTotalResult.€</b></u></td>
                  <td style ='width: 24%'></td>
                  <td style ='width: 24%'></td>
                  <td style ='width: 24%'></td>
                </tr>
                </table>
                ";
            }


            refreshTableTwo();
            ?>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <b>Suppresion d'une saisie</b>
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <!--Code ici -->
            <?php

            function deleteData () {
              $dsn = 'mysql:host=localhost;dbname=ca_poupette';
              $pdo = new PDO($dsn, 'root','');
              $output = array();
              

              $resultDelete = $pdo->query('SELECT price, id, typeOfPrice
              FROM turnover
              ORDER BY id DESC
              LIMIT 5', PDO::FETCH_ASSOC);
              foreach($resultDelete as $deleted) {
                $toTable = ['price' => $deleted['price'], 'id' => $deleted['id'], 'typeOfPrice' => $deleted['typeOfPrice']];
                array_push($output, $toTable);
              }
              return $output;
            }  
            $myTable = deleteData();
            $myTableId1 = $myTable[0]['id'];
            $myTableId2 = $myTable[1]['id'];
            $myTableId3 = $myTable[2]['id'];
            $myTableId4 = $myTable[3]['id'];
            $myTableId5 = $myTable[4]['id'];
            $myTablePrice1 = $myTable[0]['price'];
            $myTablePrice2 = $myTable[1]['price'];
            $myTablePrice3 = $myTable[2]['price'];
            $myTablePrice4 = $myTable[3]['price'];
            $myTablePrice5 = $myTable[4]['price'];
            $myTableTypeOfPrice1 = $myTable[0]['typeOfPrice'];
            $myTableTypeOfPrice2 = $myTable[1]['typeOfPrice'];
            $myTableTypeOfPrice3 = $myTable[2]['typeOfPrice'];
            $myTableTypeOfPrice4 = $myTable[3]['typeOfPrice'];
            $myTableTypeOfPrice5 = $myTable[4]['typeOfPrice'];
            $myTableTypeOfPriceGeneral = [
              1 => 'Scolaire',
              2 => 'Studio',
              3 => 'Mariage',
              4 => 'Identité',
              5 => 'Autres'
            ];
            echo"
              <form action=\"delete.php\" method=\"POST\">
                <select class=\"form-select\" aria-label=\"Default select example\" id=\"delete\" name=\"falseData\">
                  <option selected>Quel montant à supprimer</option>
                  <option value=\"$myTableId1\">$myTablePrice1.€  $myTableTypeOfPriceGeneral[$myTableTypeOfPrice1]</option>
                  <option value=\"$myTableId2\">$myTablePrice2.€  $myTableTypeOfPriceGeneral[$myTableTypeOfPrice2]</option>
                  <option value=\"$myTableId3\">$myTablePrice3.€  $myTableTypeOfPriceGeneral[$myTableTypeOfPrice3]</option>
                  <option value=\"$myTableId4\">$myTablePrice4.€  $myTableTypeOfPriceGeneral[$myTableTypeOfPrice4]</option>
                  <option value=\"$myTableId5\">$myTablePrice5.€  $myTableTypeOfPriceGeneral[$myTableTypeOfPrice5]</option>
                </select>
                <div class=\"d-grid\">
                  <button class=\"btn btn-danger marge\" type=\"submit\" id=\"buton\">Envoyer</button>
                </div>
              </form>
            ";
      
            ?>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <b>Historique</b>
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <?php
              function history() {
                $dsn = 'mysql:host=localhost;dbname=ca_poupette';
                $pdo = new PDO($dsn, 'root','');
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
                $typeNames = [
                  1 => "Scolaire",
                  2 => "Studio",
                  3 => "Mariage",
                  4 => "Identité",
                  5 => "Autres"              
                ];
                $i = 1;
                $result = $pdo -> query('SELECT * FROM turnover ORDER BY id DESC LIMIT 5', PDO::FETCH_ASSOC);
                echo"
                    <table class=\"table table-dark table-striped\">
                    <tr>
                      <td scope=\"col\">#</th>
                      <td scope=\"col\">Prix</th>
                      <td scope=\"col\">Mois</th>
                      <td scope=\"col\">Type</th>
                    <tr>
                    </table>
                  ";
                foreach($result as $history) {
                  $monthValue = $monthNames[$history['monthOfPrice']];
                  $priceValue = $history['price'];
                  $typeValue = $typeNames[$history['typeOfPrice']];
                  echo"
                  <table class='table table-pink table-striped'>
                  <tbody>
                    <tr>
                      <th scope='row'></th>
                      <td style ='width: 13%'><b>$i</b></td>
                      <td style ='width: 26%'>$priceValue.€</td>
                      <td style ='width: 30%'>$monthValue</td>
                      <td style ='width: 30%'>$typeValue</td>
                    </tr0
                  </tbody>
                </table>
                  ";
                  $i ++;
                }

              } 
              history();
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  
</body>
</html>