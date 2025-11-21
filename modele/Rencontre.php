<?php
class Rencontre {

    private int $idMatch;
    private DateTime $dateHeure;
    private String $adversaire;
    private String $lieu;
    private bool $resultat;

    function getIdMatch() {
        return $this->idMatch;
    }

    function setDateHeure(DateTime $nouvelleDate) {
        $this->dateHeure = $nouvelleDate;
    }

    function getDateHeure(): DateTime {
        return $this->dateHeure;
    }

    function setAdversaire(String $adversaire) {
        $this->adversaire = $adversaire;
    }

    function getAdversaire(): String {
        return $this->adversaire;
    }

    function setLieu(String $lieu) {
        $this->lieu = $lieu;
    }

    function getLieu(): String {
        return $this->lieu;
    }

    function setResultat(bool $resultat) {
        $this->resultat = $resultat;
    }

    function getResultat(): bool {
        return $this->resultat;
    }

}


?>