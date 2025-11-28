<?php

class Commentaire {
    
    // Déclaration attributs
    private int $idCommentaire;
    private String $texte;

    // Getters
    public function getIdCommentaire(): int {
        return $this->idCommentaire;
    }
    public function getTexte(): String {
        return $this->texte;
    }
}
?>