<?php
class Rencontre {

    private int $idMatch;
    private DateTime $dateHeure;
    private String $adversaire;
    private String $lieu;
    private bool $resultat;

    public function getIdMatch() {
        return $this->idMatch;
    }

    public function setDateHeure(DateTime $nouvelleDate) {
        $this->dateHeure = $nouvelleDate;
    }

    public function getDateHeure(): DateTime {
        return $this->dateHeure;
    }

    public function setAdversaire(String $adversaire) {
        $this->adversaire = $adversaire;
    }

    public function getAdversaire(): String {
        return $this->adversaire;
    }

    public function setLieu(String $lieu) {
        $this->lieu = $lieu;
    }

    public function getLieu(): String {
        return $this->lieu;
    }

    public function setResultat(bool $resultat) {
        $this->resultat = $resultat;
    }

    public function getResultat(): bool {
        return $this->resultat;
    }

}


?>