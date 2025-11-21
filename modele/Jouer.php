<?php

class Jouer {

    // Déclaration attributs
    private int $idJouer;
    private String $poste;
    private bool $titulaire;
    private int $note;

    // Getters
    function getIdJoueur(): int {
        return $this->idJouer;
    }
    function getPoste(): String {
        return $this->poste;
    }
    function getTitulaire(): bool {
        return $this->titulaire;
    }
    function getNote(): int {
        return $this->note;
    }
    
} 
    ?>