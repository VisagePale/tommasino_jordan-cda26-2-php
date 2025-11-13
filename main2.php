<?php

//Ajout de la valeur préférée pour le rendu de monnaie


//en centime
$pref_valeur = [
    200,
    100,
    50,
    20,
    10,
    5,
    2,
    1
];

//Contenu de la caisse en pieces
$caisse = [
    200 => 5,
    100 => 10,
    50 => 10,
    20 => 10,
    10 => 10,
    5 => 10,
    2 => 10,
    1 => 10
];



function rendre_monnaie_a_rendre($caisse, $montant_a_rendre, $pref_valeur)
{


    $recu = [];
    foreach ($pref_valeur as $valeur) {
        $nb = 0;

        while ($montant_a_rendre >= $valeur && $caisse > 0) {
            $montant_a_rendre = $montant_a_rendre - $valeur;
            $caisse[$valeur]--;
            $nb++;
        }

        if ($nb > 0) {
            $recu[$valeur] = $nb;
        }
    }

    if ($montant_a_rendre > 0) {
        echo "Impossible de rendre la monnaie exacte avec l'état actuel de la caisse.\n";
    } else {
        return $recu;
    }
}




$montant_a_rendre = 376; //en centime donc 3.76 euros
$recu = rendre_monnaie_a_rendre($caisse, $montant_a_rendre, $pref_valeur);

echo "Rendu de monnaie pour " . ($montant_a_rendre / 100) . " € :\n";
foreach ($recu as $valeur => $quantite) {
    echo "$quantite x " . number_format($valeur / 100, 2) . " €\n";
};




//Ajout d'un mode qui permet de rendre la plus petite valeur de monnaie possible
