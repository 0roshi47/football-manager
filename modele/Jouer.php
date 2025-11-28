<?php
class Jouer {
    private int $idJouer;
    private int $idRencontre;
    private String $poste;
    private bool $titulaire;
    private int $note;

    public function getIdJoueur(): int {
        return $this->idJouer;
    }

    public function getIdRencontre(): int {
        return $this->idRencontre;
    }

    public function getPoste(): String {
        return $this->poste;
    }

    public function getTitulaire(): bool {
        return $this->titulaire;
    }

    public function getNote(): int {
        return $this->note;
    }
} 
?>