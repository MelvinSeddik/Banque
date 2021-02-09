
<?php

require 'Banque.php';
require 'Titulaire.php';

$t1 = new Titulaire ("Tissaud", "Geneviève", "17-01-1974", "Tours");
$t2 = new Titulaire ("Bertrand", "Morris", "24-04-1948", "Bordeaux");
$b1 = new Banque ("compte courant", 3000, "€", $t1);
$b2 = new Banque ("livret A", 700, "€", $t1);
$b3 = new Banque ("livret A", 3200, "€", $t2);


$titulaires = [$t1, $t2];
/* On affiche tous les titulaires */
foreach($titulaires as $element){
    /* On applique l'âge en fonction de la date de naissance */
    $element->setAge($element->getAge());
    echo $element."<br>";
}


$comptes = [$b1, $b2, $b3];
/* On affiche tous les comptes existants */
foreach($comptes as $element){
    echo $element."<br>";
}


/* Pour chacun des titulaires, on regarde chaque compte et on leur attribue ceux qui leur appartient */
echo "<h3>Attribution des comptes</h3>";
foreach($titulaires as $titulaire){
    foreach($comptes as $compte){
        if($compte->getTitulaire() === $titulaire){
            $titulaire->ajouterCompte($compte);  
        }
    }
}


echo "<h3>Liste des comptes pour chaque titulaire</h3>";
foreach($titulaires as $titulaire){
    echo $titulaire." possède : ";
        foreach($titulaire->getComptesBancaires() as $chose){
            echo $chose."<br>";
        }
        echo "<br>";
}


/* Crédite*/
Banque::operation(500, "+", $b1);
Banque::operation(200, "+", $b1);

/* Débite*/
Banque::operation(5000, "-", $b1);

/* Virement */
Banque::virement($b1, $b2, 500);
Banque::virement($b2, $b1, 700);

?>