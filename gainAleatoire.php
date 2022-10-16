<?php
$connection = new PDO('mysql:host=localhost;dbname=casino;charset=utf8','root','');

header("Content-Type: text/plain; charset=utf-8");
header("Cache-Control: no-cache . private");
header("Pragma: no-cache");
sleep(2);

$niveau = $_REQUEST['niveau'];
$mise = $_REQUEST['mise'];
$nom = $_REQUEST['nom'];
$gain = $_REQUEST['compte'];

if(isset($_REQUEST['niveau']))
{ 

    if($niveau == 'facile'){
        $niveau = 'facile';
        $valeurAleatoire = rand(0,100);

        if ($valeurAleatoire < 50) {

            $gain = $gain - $mise;
            $mise = $mise - $mise;

        } else if ($valeurAleatoire >= 50 &&  $valeurAleatoire < 75) {

            $gain = $gain + $mise * 0.5;
            $mise = $mise * 0.5;

        } else {

            $gain = $gain + $mise;
            $mise = $mise;
        }

    }
    else if($niveau == 'moyen'){
        $niveau = 'moyen';
        $valeurAleatoire = rand(0,500);

        if ($valeurAleatoire < 250) {

            $gain = $gain - $mise;
            $mise = $mise - $mise;

        } else if ($valeurAleatoire >= 250 && $valeurAleatoire < 375) {

            $gain = $gain + $mise * 0.25;
            $mise = $mise * 0.25;

        } else {

            $gain = $gain + $mise;
            $mise = $mise;
        }

    }
    else {
        $niveau = 'difficile';
        $valeurAleatoire = rand(0,1000);

        if ($valeurAleatoire < 500) {

            $gain = $gain - $mise;
            $mise = $mise - $mise;


        } else if ($valeurAleatoire >= 500 && $valeurAleatoire < 750) {

            $gain = $gain + $mise * 0.75;
            $mise = $mise * 0.75;
           

        } else {
            $gain = $gain + $mise;
            $mise = $mise;
        }


    }
}
else
{
    $niveau = "niveau inconnu";
}

$resultat = $niveau.':'.$valeurAleatoire;
echo $resultat;

$joueur=$connection->prepare('INSERT INTO joueur(nom_joueur, niveau_joueur, mise_joueur, numero_tire, gain, date_jeu) VALUES(:nom_joueur, :niveau_joueur, :mise_joueur, :numero_tire, :gain, :date_jeu)');
$joueur->execute(array(
        'nom_joueur'=>$nom,
        'niveau_joueur'=>$niveau,
        'mise_joueur'=>$mise,
        'numero_tire'=>$valeurAleatoire,
        'gain'=>$mise,
        'date_jeu'=>date("Y-m-d H:i:s"),
        ))
?>