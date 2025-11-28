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
    private array $commentaires;

    // Getters
    public function getIdJoueur( ): int {
        return $this->idJoueur;
    }

    public function getLicence(): String {
        return $this->licence;
    }

    public function getNom(): String {
        return $this->nom;
    }

    public function getPrenom(): String {
        return $this->prenom;
    }

    public function getNaissance(): Datetime {
        return $this->naissance;
    }

    public function getStatut(): String {
        return $this->statut;
    }

    public function getPoids(): float {
        return $this->poids;
    }
    public function getTaille(): float {
        return $this->taille;
    }

    public function getCommentaire(): array {
        return $this->commentaires;
    }

    public function ajouterCommentaire(Commentaire $commentaire): void {
        $this->commentaires.array_push($commentaire);
    }

    public function supprimerCommentaire(Commentaire $commentaire): void {
        for ($i = 0; $i < count($this->commentaires); $i++) {
            if ($this->commentaires == $commentaire) {
                unset($this->commentaires);
            }
        }
    }
}

?>