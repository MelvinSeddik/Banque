<?php

class Banque{
    private $libelle;
    private $soldeInitial;
    private $devise;
    private $titulaire;

    public function __construct($libelle=" ", $soldeInitial=" ", $devise=" ", Titulaire $titulaire)
    {
        $this->libelle = $libelle;
        $this->soldeInitial = $soldeInitial;
        $this->devise = $devise;
        $this->titulaire = $titulaire;
    }

    

    /**
     * Get the value of libelle
     */ 
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @returnself
     */ 
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of soldeInitial
     */ 
    public function getSoldeInitial()
    {
        return $this->soldeInitial;
    }

    /**
     * Set the value of soldeInitial
     *
     * @returnself
     */ 
    public function setSoldeInitial($soldeInitial)
    {
        $this->soldeInitial = $soldeInitial;

        return $this;
    }

    /**
     * Get the value of devise
     */ 
    public function getDevise()
    {
        return $this->devise;
    }

    /**
     * Set the value of devise
     *
     * @returnself
     */ 
    public function setDevise($devise)
    {
        $this->devise = $devise;

        return $this;
    }

    /**
     * Get the value of titulaire
     */ 
    public function getTitulaire()
    {
        return $this->titulaire;
    }

    /**
     * Set the value of titulaire
     *
     * @returnself
     */ 
    public function setTitulaire($titulaire)
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    public function __toString(){
        return $this->libelle." ".$this->soldeInitial." ".$this->devise." ".$this->titulaire;
    }

    /* Fonction pour créditer ou débiter */
    public static function operation($montant, $type, $compte){
        if($type === "+"){
            $compte->setSoldeInitial($compte->getSoldeInitial() + $montant);
            echo $compte->getTitulaire()->getPrenom()." ".$compte->getTitulaire()->getNom()." a été crédité de ".$montant.$compte->getDevise()." et possède maintenant : ". $compte->getSoldeInitial()."<br>";
        }
        if($type === "-"){
            $compte->setSoldeInitial($compte->getSoldeInitial() - $montant);
            echo $compte->getTitulaire()->getPrenom()." ".$compte->getTitulaire()->getNom()." a été débité de ".$montant.$compte->getDevise()." et possède maintenant : ". $compte->getSoldeInitial()."<br>";
            if($compte->getSoldeInitial() < 0){
                echo "Vous êtes dans le rouge!<br>";
            }
        }
    }

    /* Fonction pour effectuer un virement */
    public static function virement($compte1, $compte2, $montant){
        if($compte1->getSoldeInitial() < $montant){
            echo "Echec : Vous n'avez pas assez d'argent pour effectuer ce virement!<br>";
        }
        else{
            $compte1->getSoldeInitial() - $montant;
            $compte2->getSoldeInitial() + $montant;
            echo "Le compte ".$compte1." a effectué un virement d'un montant de ".$montant.$compte1->getDevise()." au compte ".$compte2.".<br>";
        }
    }
}


?>