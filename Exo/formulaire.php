<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstraps.min.css">
    <title>Formulaire</title>
</head>
<body>
    <?php

        $table = ['firstname'=> 'Martin', 'lastname' => 'Jean'];

        if ($table['firstname'] == 'Martin') {
            echo "
            <div class=\"mb-3\">
            <label for=\"exampleFormControlInput1\" class=\"form-label\">Email address</label>
            <input type=\"email\" class=\"form-control\" id=\"exampleFormControlInput1\" placeholder=\"name@example.com\">
          </div>
          <div class=\"mb-3\">
            <label for=\"exampleFormControlTextarea1\" class=\"form-label\">Example textarea</label>
            <textarea class=\"form-control\" id=\"exampleFormControlTextarea1\" rows=\"3\"></textarea>
          </div>";
        } else {
            echo "ça marche po";
        }
    ?>

</body>
</html>