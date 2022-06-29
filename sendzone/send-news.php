<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication...</title>
    <link href="https://onyos.fr/css/newcss.css" rel="stylesheet">
</head>
<body style="margin-top:2rem;">

<?php
$nomOrigine = $_FILES['imgnews']['name'];
$elementsChemin = pathinfo($nomOrigine);
$dirnamefile = "upload/";
$extensionFichier = $elementsChemin['extension'];
$extensionsAutorisees = array("jpeg", "jpg", "gif", "png");
    $repertoireDestination = dirname(__FILE__)."/upload"."/";
    $nomDestination = date("d-m-Y-H-i-s-ms").".jpg";

    if (move_uploaded_file($_FILES["imgnews"]["tmp_name"], 
                                     $repertoireDestination.$nomDestination)) {
        echo "<p id='failed' class='fw-bold text-success text-center p-5 shadow-lg border border-success border-3 mt-5' style='border-radius:20px;'>&#128077 - L'image s'est correctement chargée et les valeurs ont bien été indéxées !</p><br> <a class='btn btn-outline-success' href='../actu.php/'>Retour</a>";
                $date = date("d-m-Y-H-i-s-ms");
                $date2 = date('d-m-y');
                $file_name='news-result'. '.json';
                $to = 'karine.lesimple@cuisinella78-orgeval.com, audrey.tichit@cuisinella78-orgeval.com, dinis.ferreira@cuisinella78-orgeval.com, johan.coudert@cuisinella78-orgeval.com, johan.sacilotto@cuisinella78-orgeval.com, kaled.salhi@cuisinella78-orgeval.com, khaoula.hammami@cuisinella78-orgeval.com, regis.retif@cuisinella78-orgeval.com, tom.coudert@cuisinella78-orgeval.com, jessy.laram@cuisinella78-orgeval.com';
                $subject = 'Une Cuisin\'Actu a été publiée !';
                $message = '
                <!DOCTYPE html>
                <html lang="fr">
                
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Nouvelle actu !</title>
                </head>
                
                <body style="background-color: #1a1a1a;">
                    <nav style="padding: 20px;">
                        <div style="background:none;width:70px; height:70px !important;margin: auto;">
                            <img src="https://onyos.fr/img/logo-cuisinella-site.png" alt="Logo" style="width:70px">
                        </div>
                        <div
                            style="color: white; font-family:-apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif; max-width:700px !important; margin-left:auto; margin-right:auto; line-height: 1.52;">
                            <h1 style="text-align:start; font-size: 30px;">Une Cuisinell\'Actu a été publiée</h1>
                            <p>
                                Bonjour à tous, <br>
                                Une Cuisinell\'Actu a été publiée il y a quelques instants, vous pouvez aller la voir en cliquant. <a
                                style="text-decoration: none; color:rgb(255, 68, 68);" href="https://onyos.fr/news.php#down">ici</a>
                                <br>
                                <br>
                                Dans l\'objectif du programme 100% secret*, je m\'engages à traîter votre demande contenant, au regard de
                                la loi, des informations sensibles (nom du client) le plus confidentiellement possible. <br> Pour plus
                                d\'informations concernant la confidentialité, veuillez contacter Léo, par <a
                                    style="text-decoration: none; color:rgb(255, 70, 70);" href="mailto:leolesimple@onyos.fr">mail</a>
                                <br>
                                <i><small>(Si le lien ne fonctionne pas, copier-coller, l\'adresse suivante :
                                        leolesimple@onyos.fr)</small></i><br>
                                <i><small>*100% secret est un programme lancé en avril 2022, par Léo pour retirer l\'entiereté des
                                        cookies de ses sites, pour une confidentialité plus forte que jamais 😉 !</small></i>
                            </p>
                        </div>
                    </nav>
                </body>
                
                </html>
                ';
                
                $str = file_get_contents('news-result.json');
                $arr = json_decode($str, true);
                $arrne['titre'] = $_POST['title'];
                $arrne['description'] = $_POST['description'];
                $arrne['date'] = $date;
                $arrne['date2'] = $date2;
                $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
                $headers = "From : leolesimple@onyos.fr"."\n";
                $headers .= 'Content-type: text/html [RFC2854]; charset=utf-8'."\n"; // l'en-tete Content-type pour le format HTML
                $headers = "From : noreply@onyos.fr" . "\n";
                mail($to, $subject, $message, $headers);
                array_push( $arr['news'], $arrne);
                $str = json_encode($arr);
                
                if (json_decode($str) != null)
                {
                $file = fopen('news-result.json','w');
                fwrite($file, $str);
                fclose($file);
                echo"<div class=\"success-forms\">
                <h1>🛫 Pfiou !</h1>
                <p>
                    Votre demande à été prise en charge. <br>
                    Je me charge de publier ceci au plus vite !
                </p>
                </div>";
                }
                else
                {
                echo "<div class=\"error-forms\">
                <h1>😬 Oups...</h1>
                <p>
                    Votre demande n’a pas abouti ! <br>
                    Un souci dans l’envoi des données a fait que votre demande a été rejetée. <br>
                    Veuillez réessayer !  
                </p>
                </div>";
                 }
                
    } else {
        echo "<div class=\"error-forms\">
        <h1>😬 Oups...</h1>
        <p>
            Votre demande n’a pas abouti ! <br>
            Un souci dans l’envoi des données a fait que votre demande a été rejetée. <br>
            Veuillez réessayer !  
        </p>
        </div>
        ";
    }
?>


</body>
</html>