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
          <label for="new number" class="form-label" name="title">Chiffre du mois en cours</label>
          <div class="input-group mb-3">
          <input type="text" class="form-control" id="exampleFormControlInput1" id="monthSelect">
          <span class="input-group-text">€</span>
          </div>
        </div>
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
  foreach ($pdo->query('SELECT SUM(price) FROM experimental WHERE (typeOfPrice = 1)
    AND (monuthOfprice = 1)', PDO::FETCH_ASSOC) as $number) {
    $priceJanSco = $number['SUM(price)'];
    }
  foreach ($pdo->query('SELECT SUM(price) FROM experimental WHERE (typeOfPrice = 2)
  AND (monuthOfprice = 1)', PDO::FETCH_ASSOC) as $number) {
    $priceJanStu = $number['SUM(price)'];
   }
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
            <td id=\"turnoverOfJanuaryOfOther\"></td>
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
  <tr>
            <th scope="row">2</th>
            <td>Fevrier</td>
            <td id="turnoverOfFebruaryOfSchool"></td>
            <td id="turnoverOfFebruaryOfStudio"></td>
            <td id="turnoverOfFebruaryOfOther"></td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Mars</td>
            <td id="turnoverOfMarchOfSchool"></td>
            <td id="turnoverOfMarchOfStudio"></td>
            <td id="turnoverOfMarchOfOther"></td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>Avril</td>
            <td id="turnoverOfAprilOfSchool"></td>
            <td id="turnoverOfAprilOfStudio"></td>
            <td id="turnoverOfAprilOfOther"></td>
          </tr>
          <tr>
            <th scope="row">5</th>
            <td>Mai</td>
            <td id="turnoverOfMayOfSchool"></td>
            <td id="turnoverOfMayOfStudio"></td>
            <td id="turnoverOfMayOfOther"></td>
          </tr>
          <tr>
            <th scope="row">6</th>
            <td>Juin</td>
            <td id="turnoverOfJuneOfSchool"></td>
            <td id="turnoverOfJuneOfStudio"></td>
            <td id="turnoverOfJuneOfOther"></td>
          </tr>
          <tr>
            <th scope="row">7</th>
            <td>Juillet</td>
            <td id="turnoverOfJuilyOfSchool"></td>
            <td id="turnoverOfJuilyOfStudio"></td>
            <td id="turnoverOfJuilyOfOther"></td>
          </tr>
          <tr>
            <th scope="row">8</th>
            <td>Aôut</td>
            <td id="turnoverOfAugustOfSchool"></td>
            <td id="turnoverOfAugustOfStudio"></td>
            <td id="turnoverOfAugustOfOther"></td>
          </tr>
          <tr>
            <th scope="row">9</th>
            <td>Septembre</td>
            <td id="turnoverOfSeptemberOfSchool"></td>
            <td id="turnoverOfSeptemberOfStudio"></td>
            <td id="turnoverOfSeptemberOfOther"></td>
          </tr>
          <tr>
            <th scope="row">10</th>
            <td>Octobre</td>
            <td id="turnoverOfOctoberOfSchool"></td>
            <td id="turnoverOfOctoberOfStudio"></td>
            <td id="turnoverOfOctoberOfOther"></td>
          </tr>
          <tr>
            <th scope="row">11</th>
            <td>Novembre</td>
            <td id="turnoverOfNovemberOfSchool"></td>
            <td id="turnoverOfNovemberOfStudio"></td>
            <td id="turnoverOfNovemberOfOther"></td>
          </tr>
          <tr>
            <th scope="row">12</th>
            <td>Decembre</td>
            <td id="turnoverOfDecemberOfSchool"></td>
            <td id="turnoverOfDecemberOfStudio"></td>
            <td id="turnoverOfDecemberOfOther"></td>
          </tr>
          <tr>
            <th scope="row">Total</th>
            <td>-----------</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Total des totaux</th>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="4"></td>
          </tr>