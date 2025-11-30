<?php

class Commentaire {
    
    // Déclaration attributs
    private int $idCommentaire;
    private String $texte;

    public function __construct(int $idCommentaire, String $texte) {
        $this->idCommentaire = $idCommentaire;
        $this->texte = $texte;
    }

    public function getIdCommentaire(): int {
        return $this->idCommentaire;
    }
    
    public function getTexte(): String {
        return $this->texte;
    }
}
?>