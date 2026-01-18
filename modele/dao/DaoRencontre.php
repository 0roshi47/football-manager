<?php
require_once 'Dao.php';
require_once 'MariaDBDataSource.php';
require_once '../modele/Rencontre.php';

class DaoRencontre implements Dao {

    public function createInstance(array $res): Rencontre {
        $id = $res['idRencontre'];
        $dateHeure = $res['dateHeure'];
        $adversaire = $res['adversaire'];
        $lieu = $res['lieu'];
        $resultat = $res['resultat'];

        $dateHeure = new DateTime($dateHeure);
        if (is_null($resultat)) {
            return new Rencontre($id, $dateHeure, $adversaire, $lieu, "A venir");
        }

        return new Rencontre($id, $dateHeure, $adversaire, $lieu, $resultat);
    }

    public function create(mixed $entity): void {
        if (! $entity instanceof Rencontre) {
            throw new \InvalidArgumentException('Type rencontre requis');
        }

        $dateHeure = $entity->getDateHeure()->format('Y-m-d h:m');

        $pdo = MariaDBDataSource::getConnexion();
        $sql = 'insert into Rencontre (dateHeure, adversaire, lieu, resultat) values (:dateHeure, :adversaire, :lieu, :resultat)';
        $statement = $pdo->prepare($sql);
        $statement->execute(
            [':dateHeure' => $dateHeure, 
            ':adversaire' => $entity->getAdversaire(),
            ':lieu' => $entity->getLieu(),
            ':resultat' => $entity->getResultat()]);
    }

    public function findById(int $id): ?Rencontre {
        $pdo = MariaDBDataSource::getConnexion();
        $requete = 'SELECT * FROM Rencontre WHERE idRencontre = :id';
        $statement = $pdo->prepare($requete);
        $statement->execute([':id' => $id]);
        $result = $statement->fetch(\PDO::FETCH_ASSOC);

        if ($result === false) {
            return null;
        }

        return $this->createInstance($result);
    }

    public function findAll(): array {
        $pdo = MariaDBDataSource::getConnexion();
        $sql = 'SELECT * FROM Rencontre';
        $stmt = $pdo->query($sql);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $result = [];
        foreach ($rows as $row) {
            $result[] = $this->createInstance($row);
        }
        return $result;
    }

    public function update(mixed $entity): void {
        if (! $entity instanceof Rencontre) {
            throw new \InvalidArgumentException('Joueur requis');
        }

        $pdo = MariaDBDataSource::getConnexion();
        $sql = 'update Rencontre set dateHeure = :dateHeure, adversaire = :adversaire, lieu = :lieu, resultat = :resultat where idRencontre = :idRencontre';
        $statement = $pdo->prepare($sql);
        $statement->execute([
            ':dateHeure' => $entity->getDateHeure()->format('Y-m-d H:i'),
            ':adversaire' => $entity->getAdversaire(),
            ':lieu' => $entity->getLieu(),
            ':resultat' => $entity->getResultat(),
            ':idRencontre' => $entity->getIdRencontre(),
            ]);
    }

    public function deleteById(int $id): void {
        $pdo = MariaDBDataSource::getConnexion();
        $sql = 'DELETE FROM Rencontre WHERE idRencontre = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
?>
