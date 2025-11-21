<?php

class Commentaire {
    
    // Déclaration attributs
    private int $idCommentaire;
    private String $texte;

    // Getters
    function getIdCommentaire(): int {
        return $this->idCommentaire;
    }
    function getTexte(): String {
        return $this->texte;
    }
}
?>