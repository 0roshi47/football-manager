<?php
class Jouer {
    private int $idJouer;
    private int $idRencontre;
    private Joueur $joueur;
    private String $poste;
    private bool $titulaire;
    private int $note;

    public function __construct(int $idJouer, int $idRencontre, Joueur $joueur, String $poste, bool $titulaire, int $note) {
        $this->idJouer = $idJouer;
        $this->idRencontre = $idRencontre;
        $this->joueur = $joueur;
        $this->poste = $poste;
        $this->titulaire = $titulaire;
        $this->note = $note;
    }

    public function getIdJouer(): int {
        return $this->idJouer;
    }

    public function getIdRencontre(): int {
        return $this->idRencontre;
    }

    public function getJoueur(): Joueur {
        return $this->joueur;
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