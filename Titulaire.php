<?php

class Titulaire{
    private $nom;
    private $prenom;
    private $dateNaissance;
    private $ville;
    private $comptesBancaires = [" "];
    private $age;

    public function __construct($nom=" ", $prenom=" ", $dateNaissance=" ", $ville=" ")
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->ville = $ville;
    }
    

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @returnself
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @returnself
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of dateNaissance
     */ 
    public function getDateNaissance()
    {
        $this->dateNaissance = new DateTime($this->dateNaissance);
        return $this->dateNaissance;
    }

    /**
     * Set the value of dateNaissance
     *
     * @returnself
     */ 
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get the value of ville
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @returnself
     */ 
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of comptesBancaires
     */ 
    public function getComptesBancaires()
    {
        return $this->comptesBancaires;
    }

    /**
     * Set the value of comptesBancaires
     *
     * @returnself
     */ 
    public function setComptesBancaires($comptesBancaires)
    {
        $this->comptesBancaires = $comptesBancaires;

        return $this;
    }

        /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return date_diff(new DateTime(), $this->getDateNaissance())->format("%y ans");
    }

    /**
     * Set the value of age
     *
     * @returnself
     */ 
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    public function __toString(){
        return $this->nom." ".$this->prenom." ".$this->age." ".$this->ville;
    }

/*     public static function dateToAge($date){
        $date1 = new DateTime($date);
        $aujourdhui = new DateTime("now");
        $difference = $date1->diff($aujourdhui);
        $age = $difference->format("%Y ans");
        return $age;
    } */

/*     public static function dateToAge($date){
        $date1 = new DateTime(DateTime::createFromFormat('d-m-Y', $date);
        $date1 = $date1->format("Y");

        $date1 = $date1->diff($aujourdhui);
        $age = $date1;
        $aujourdhui = new DateTime("now");
        return $age;
    } */


    public function ajouterCompte($compte){
        array_push($this->comptesBancaires, $compte);
        echo "le compte <strong>".$compte."</strong> a bien été ajouté au titulaire <strong>".$this."</strong><br>";
    }
}

?>