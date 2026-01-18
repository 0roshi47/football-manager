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
        $id = $res['idJoueur'];
        $license = $res['license'];
        $nom = $res['nom'];
        $prenom = $res['prenom'];
        $naissance = $res['naissance'];
        $statut = $res['statut'];
        $poids = $res['poids'];
        $taille = $res['taille'];

        $dateNaissance = new DateTimeImmutable($naissance);

        return new Joueur($id, $license, $nom, $prenom, $dateNaissance, $statut, $poids, $taille);
    }

    public function create(mixed $entity): void {
        if (! $entity instanceof Joueur) {
            throw new \InvalidArgumentException('Joueur requis');
        }

        $dateNaissance = $entity->getNaissance()->format('Y-m-d');

        $pdo = MariaDBDataSource::getConnexion();
        $sql = 'insert into Joueur (license, nom, prenom, naissance, statut, poids, taille) values(:license, :nom, :prenom, :naissance, :statut, :poids, :taille)';
        $statement = $pdo->prepare($sql);
        $statement->execute(
            [':license' => $entity->getLicence(), 
            ':nom' => $entity->getNom(),
            ':prenom' => $entity->getPrenom(),
            ':naissance' => $dateNaissance,
            ':statut' => $entity->getStatut(),
            ':poids' => $entity->getPoids(),
            ':taille' => $entity->getTaille()]);
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
        $statement = $pdo->query($sql);
        $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);

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
        $statement = $pdo->prepare($sql);
        $statement->execute([':id' => $id]);
    }
}
?>
