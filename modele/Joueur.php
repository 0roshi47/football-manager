<?php

class Joueur {

    // Déclaration attributs
    private int $idJoueur;
    private String $licence;
    private String $nom;
    private String $prenom;
    private Datetime $naissance;
    private String $statut;
    private float $poids;
    private float $taille;

    // Getters
    function getIdJoueur( ): int {
        return $this->idJoueur;
    }
    function getLicence(): String {
        return $this->licence;
    }
    function getNom(): String {
        return $this->nom;
    }
    function getPrenom(): String {
        return $this->prenom;
    }
    function getNaissance(): Datetime {
        return $this->naissance;
    }
    function getStatut(): String {
        return $this->statut;
    }
    function getPoids(): float {
        return $this->poids;
    }
    function getTaille(): float {
        return $this->taille;
    }

}

?>