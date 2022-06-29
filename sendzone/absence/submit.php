<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande traitée !</title>
    <link rel="stylesheet" href="https://onyos.fr/css/newcss.css">
</head>

<body>
    <?php
    $date = date("d-m-Y-H-i-s-ms");
    $date2 = date('d-m-y');
    $file_name = 'absence' . '.json';
    $to = $_POST['vendeurabsent'] . "@cuisinella78-orgeval.com";
    $subject = 'Constatation d\'absence';
    $message = "
    <!DOCTYPE html>
    <html lang='fr'>
    
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Absence constatée</title>
    </head>
    
    <body style='background-color: #1a1a1a;'>
        <nav style='padding: 20px;'>
            <div style='background:none;width:70px; height:70px !important;margin: auto;'>
                <img src='https://onyos.fr/img/logo-cuisinella-site.png' alt='Logo' style='width:70px'>
            </div>
            <div
                style=\"color: white; font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; max-width:700px !important; margin-left:auto; margin-right:auto; line-height: 1.52;\">
                <h1 style='text-align:start; font-size: 30px;'>Constatation d'une absence</h1>
                <p>
                    Par la présente, nous constatons ce jour, le " .  $POST['datedebut'] . " que vous êtes absent(es) de votre poste de travail. 
                    Comme vous devez le savoir, vous êtes tenu de nous signaler toute absence et de nous fournir un justificatif dans les quarante-huit heures.  <br><br>
                    Nous vous rappelons qu'une absence injustifiée est passible de sanctions. Toute absence non autorisée à votre poste de travail doit donc être dûment justifiée dans les plus brefs délais.  <br><br>
                    Je vous prie d'agréer, Madame, Monsieur, mes respectueuses mes sincères salutations.
                    <br></br><hr><br>
                    Dans l'objectif du programme 100% secret*, vos données sont stockées et traités uniquement par Intranet,
                    aucune donnée n'est et ne peut être divulgés en accès public, l'accès aux bases de données sont protégés
                    et les mails sont cryptés pendant leur envoi. <br> Pour plus d'informations concernant la
                    confidentialité, veuillez contacter Léo, par <a style='text-decoration: none; color:rgb(255, 70, 70);'
                        href='mailto:leolesimple@onyos.fr'>mail</a> <br>
                    <i><small>(Si le lien ne fonctionne pas, copier-coller, l'adresse suivante :
                            leolesimple@onyos.fr)</small></i><br>
                    <i><small>*100% secret est un programme lancé en avril 2022, par Léo pour retirer l'entiereté des
                            cookies de ses sites, pour une confidentialité plus forte que jamais 😉 !</small></i>
                </p>
            </div>
        </nav>
    </body>
    
    </html>";
    $str = file_get_contents('absence.json');
    $arr = json_decode($str, true);
    $arrne['id'] = $_POST['vendeurabsent'];
    $arrne['datedebut'] = $_POST['datedebut'];
    $arrne['heuredebut'] = $_POST['heuredebut'];
    $arrne['datefin'] = $_POST['datefin'];
    $arrne['heurefin'] = $_POST['heurefin'];
    $arrne['comments'] = $_POST['comments'];
    $arrne['date'] = $date;
    $arrne['date2'] = $date2;
    $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
    $headers = "From : noreply@onyos.fr" . "\n";
    $headers .= 'Content-type: text/html [RFC2854]; charset=utf-8' . "\n"; // l'en-tete Content-type pour le format HTML
    array_push($arr['absence'], $arrne);
    $str = json_encode($arr);
    if (json_decode($str) != null) {
        $file = fopen('absence.json', 'w');
        fwrite($file, $str);
        fclose($file);
        echo "
            <div class=\"success-forms\">
              <h1>🛫 Pfiou !</h1>
              <p>
                  Votre demande à été prise en charge. <br>
                  Je me charge d’envoyer ceci à son destinataire au plus vite !
              </p>
          </div>";
        mail($to, $subject, $message, $headers);
    } else {
        echo " <div class=\"error-forms\">
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