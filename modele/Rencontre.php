<?php
class Rencontre {

    private int $idRencontre;
    private DateTime $dateHeure;
    private String $adversaire;
    private String $lieu;
    private String $resultat;

    public function __construct(int $idRencontre, DateTime $dateHeure, String $adversaire, String $lieu, String $resultat) {
        $this->idRencontre = $idRencontre;
        $this->dateHeure = $dateHeure;
        $this->adversaire = $adversaire;
        $this->lieu = $lieu;
        $this->resultat = $resultat;
    }

    public function getIdRencontre() {
        return $this->idRencontre;
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

    public function getResultat(): String {
        return $this->resultat;
    }

}
?>