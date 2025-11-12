<?php

$caisse = [
    500 => 0,
    200 => 1,
    100 => 1,
    50  => 10,
    20  => 5,
    10  => 10,
    2   => 45,
    1   => 30,
    0.5 => 30,
    0.2 => 45,
    0.1 => 45,
    0.05 => 45,
    0.02 => 45,
    0.01 => 45
];

function calculerRendu($montantARendre, &$caisse)
{
    $rendu = [];

    foreach ($caisse as $valeur => &$quantite) {
        $valeur = floatval($valeur);
        $nb = 0;

        while ($montantARendre >= $valeur && $quantite > 0) {
            $montantARendre = round($montantARendre - $valeur, 2);
            $quantite--;
            $nb++;
        }


        if ($nb > 0) {
            $rendu[$valeur] = $nb;
        }
    }

    if ($montantARendre > 0) {
        echo "Impossible de rendre la monnaie exacte avec l'état actuel de la caisse.\n";
    }

    return $rendu;
}


$montantTotal = 43.40;
$montantDonne = 75.00;
$montantARendre = round($montantDonne - $montantTotal, 2);

$rendu = calculerRendu($montantARendre, $caisse);

echo "Rendu de monnaie pour $montantARendre € :\n";
foreach ($rendu as $valeur => $quantite) {
    echo "$quantite x " . number_format($valeur, 2) . " €\n";
}
