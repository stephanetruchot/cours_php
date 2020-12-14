<?php
    // exe 10-a : afficher friday 11 december 2020, 14h 55m 30s
    //echo date('l j F Y, H\h i\m s\s');

    //exe 10-b : chercher a afficher la date avec strhtime en francais
    // format vendredi 11 décembre 2020, 15h 21m 30s

    //Mettre en francais
    setlocale(LC_TIME, "fr_FR.UTF8", "fra");

    //echo strftime('%Y-%m-%d %H:%M:%S');

   //echo date('Y-m-d H:i:s', (time() +((26*24*60*60)+(16*60*60))));







    // exercice 10 -d : créer une variable contenant cette date précise textuelle : "2004-04-16 12:00:00" unix : 1082116800 . le but est d'ajouter 435jours à cette date puis de l'afficher sous le format suivant : "samedi 25 juin 2005, 12h 00m 00s"

    //date de départ sous forme textuelle
    $dateToTransform = "2004-04-16 12:00:00";

    // Convertion de la date initiale en timestamp (pour pouvoir faire des calculs dessus)
    $dateToTransformTimestamp = strtotime($dateToTransform);

    //Création d'un nouveau timestamp qui correspond au timestamp initial +435j
    $newDateTimestamp = $dateToTransformTimestamp + 435 * 24 * 3600;

    // affichage de la nouvelle date en utilisant son timestamp
    echo strftime('%A %d %B %Y, %Hh %Mm %Ss', $newDateTimestamp);





    //function movingForward($futur){

    //      $date = date_create($futur);

    //      date_add($date, date_interval_create_from_date_string('434 days 18 hours'));

    //      echo date_format($date, 'l d F Y, H\h i\m s\s');

    //}


    //movingForward($dateToTransform)


    //$timeSpent = 37584000;

    //function movingForward($futur){
        //echo (strtotime($futur) + ($timeSpent));
        //echo date('Y-m-d H:i:s', ((time($futur) + ($timeSpent));

    //}

    //movingForward($dateToTransform)

    //echo date('Y-m-d H:i:s', (strtotime($dateToTransform) + ($timeSpent));

    //$timestamp=1082116800;
    //echo date('Y-m-d H:i:s', $timestamp);
    //$date = date_create($dateToTransform);
    //echo date_format(($date, 'Y-m-d H:i:s');

?>
