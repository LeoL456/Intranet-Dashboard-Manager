<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication...</title>
    <link rel="stylesheet" href="https://onyos.fr/css/newcss.css">
</head>

<body style="margin-top:2rem;">

    <?php
    $date = date("d-m-Y-H-i-s-ms");
    $idperson = $_POST['id'] . '@cuisinella78-orgeval.com';
    $date2 = date('d-m-y');
    $file_name = 'relance' . '.json';
    $to = $idperson;
    $subject = 'Constatation d\'absence';
    $message = "
    <!DOCTYPE html>
    <html lang='fr'>
    <head>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Email</title>
    <meta charset='UTF-8'>
    </head>
    <body style=\"font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;\">
    <h1 style='margin-top: 1.5rem!important;margin-bottom: 1.5rem!important;margin-right: 3rem!important;margin-left: 3rem!important;'>Constatation d'absence</h1>
    <p style='margin-right: 3rem!important;margin-left: 3rem!important;font-size: 1.25rem;font-weight: 300;'>
    Madame,Monsieur <br>
    Nous avons constaté votre absence à votre travail depuis le " . $_POST['debutabs'] . " " . $_POST['heureabs'] . "<br>
    Nous vous rappelons que toute absence doit être justifiée quelle qu'en soit la durée et la raison. <br>
    Si vous êtes malade, vous devez nous adresser le feuillet n°3 de votre arrêt maladie.<br><br>
    Dans cette attente, nous vous prions de bien vouloir accepter nos cordiales salutations. <br>
    La Direction.
    </p>
    </body>
    </html>";
    $str = file_get_contents('relance.json');
    $arr = json_decode($str, true);
    $arrne['id'] = $_POST['absent'];
    $arrne['debutabs'] = $_POST['debutabs'];
    $arrne['heureabs'] = $_POST['heureabs'];
    $arrne['date'] = $date;
    $arrne['date2'] = $date2;
    $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
    $headers .= 'Content-type: text/html [RFC2854]; charset=utf-8' . "\n"; // l'en-tete Content-type pour le format HTML
    $headers = "From : noreply@onyos.fr" . "\n";
    array_push($arr['historique'], $arrne);
    $str = json_encode($arr);
    if (json_decode($str) != null) {
        $file = fopen('relance.json', 'w');
        fwrite($file, $str);
        fclose($file);
        echo "<div class=\"success-forms\">
                        <h1>🛫 Pfiou !</h1>
                        <p>
                            Votre demande à été prise en charge. <br>
                            Je me charge de publier ceci à son destinataire au plus vite !
                        </p>
                        </div>";
        mail($to, $subject, $message, $headers);
    } else {
        echo "<div class=\"error-forms\">
                        <h1>😬 Oups...</h1>
                        <p>
                            Votre demande n’a pas abouti ! <br>
                            Un souci dans l’envoi des données a fait que votre demande a été rejetée. <br>
                            Veuillez réessayer !  
                        </p>
                        </div>";
    }

    ?>


</body>

</html>