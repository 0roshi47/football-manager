<?php

class Compositon {
    
    private array $joueurs;
    private array $rencontres;

    public function __construct(array $joueurs, array $rencontres) {
        $this->joueurs = $joueurs;
        $this->rencontres = $rencontres;
    }

    public function getJoueurs(): array {
        return $this->joueurs;
    }

    public function ajouterJoueur(Joueur $joueur): void {
        $this->joueurs.array_push($joueur);
    }

    public function supprimerJoueur(Joueur $joueur): void {
        for ($i = 0; $i < count($this->joueurs); $i++) {
            if ($this->joueurs == $joueur) {
                unset($this->joueurs);
            }
        }
    }

    public function getRencontres(): array {
        return $this->rencontres;
    }

    public function ajouterRencontre(Rencontre $rencontre): void {
        $this->joueurs.array_push($rencontre);
    }

    public function supprimerRencontre(Rencontre $rencontre): void {
        for ($i = 0; $i < count($this->rencontres); $i++) {
            if ($this->rencontres == $rencontre) {
                unset($this->rencontres);
            }
        }
    }
}
?>