<?php
class DaoJoueur implements Dao {
    
    public function createInstance(array $res): Joueur {
        $id = $res['idJoueur'];
        $license = $res['license'];
        $nom = $res['nom'];
        $prenom = $res['prenom'];
        $naissance = $res['naissance'];
        $statut = $res['statut'];
        $poids = $res['poids'];
        $taille = $res['taille'];
        return new Joueur($id, $license, $nom, $prenom, $naissance, $statut, $poids, $taille);
    }

    public function findById(int $id): Joueur {
        $linkpdo = MariaDBDataSource::getConnexion();
        $req = $linkpdo->prepare('select * from joueur where id_joueur = ?');
        $req->bindParam(1, $id, PDO::PARAM_INT);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $this->createInstance($res);
    }

    public function findAll(): array {
        $resArray = array();
        $linkpdo = MariaDBDataSource::getConnexion();
        $req = $linkpdo->prepare('select * from joueur where id_joueur = ?');
        $req->bindParam(1, $id, PDO::PARAM_INT);
        $resQuery = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resQuery as $joueur) {
            $resArray.array_push($this->createInstance($joueur));
        }
        return $resArray;
    }

    public function update(): void {

    }

    public function deleteById(int $id): void {

    }
}
?>