<?php
require_once 'Dao.php';
require_once 'MariaDBDataSource.php';
require_once '../modele/Rencontre.php';

class DaoRencontre implements Dao
{
    /**
     * @param array<string,mixed> $res
     * @return Rencontre
     */
    public function createInstance(array $res): Rencontre {
        $id = $res['idRencontre'];
        $dateHeure = $res['dateHeure'];
        $adversaire = $res['adversaire'];
        $lieu = $res['lieu'];
        $resultat = $res['resultat'];

        $date = new DateTimeImmutable($dateHeure . "00:00:00");

        return new Rencontre($id, $dateHeure, $adversaire, $lieu, $resultat);
    }

    /**
     * @param int $id
     * @return Rencontre|null
     */
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

    /**
     * @return Joueur[]
     */
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
    }

    public function deleteById(int $id): void {
        $pdo = MariaDBDataSource::getConnexion();
        $sql = 'DELETE FROM Rencontre WHERE idRencontre = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
?>
