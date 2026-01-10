<?php
require_once 'Dao.php';
require_once 'MariaDBDataSource.php';
require_once '../modele/Joueur.php';

class DaoJoueur implements Dao
{
    /**
     * @param array<string,mixed> $res
     * @return Joueur
     */
    public function createInstance(array $res): Joueur {
        $id = $res['id_joueur'] ?? $res['idJoueur'] ?? null;
        $license = $res['license'] ?? null;
        $nom = $res['nom'] ?? '';
        $prenom = $res['prenom'] ?? '';
        $naissance = $res['naissance'] ?? null;
        $statut = $res['statut'] ?? null;
        $poids = $res['poids'] ?? null;
        $taille = $res['taille'] ?? null;

        $dateNaissance = new DateTimeImmutable($naissance . "00:00:00");

        return new Joueur($id, $license, $nom, $prenom, $dateNaissance, $statut, $poids, $taille);
    }

    /**
     * @param int $id
     * @return Joueur|null
     */
    public function findById(int $id): ?Joueur {
        $pdo = MariaDBDataSource::getConnexion();
        $requete = 'SELECT * FROM Joueur WHERE idJoueur = :id';
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
        $sql = 'SELECT * FROM Joueur';
        $stmt = $pdo->query($sql);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $result = [];
        foreach ($rows as $row) {
            $result[] = $this->createInstance($row);
        }
        return $result;
    }

    public function update(mixed $entity): void {
        if (! $entity instanceof Joueur) {
            throw new \InvalidArgumentException('Joueur requis');
        }
    }

    public function deleteById(int $id): void {
        $pdo = MariaDBDataSource::getConnexion();
        $sql = 'DELETE FROM Joueur WHERE idJoueur = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
?>
