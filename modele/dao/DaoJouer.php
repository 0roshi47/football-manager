<?php
require_once 'Dao.php';
require_once 'MariaDBDataSource.php';
require_once __DIR__ . '../../Jouer.php';
require_once __DIR__ . '../../Joueur.php';
require_once __DIR__ . '/DaoJoueur.php';

class DaoJouer implements Dao {

    public function createInstance(array $res): Jouer {
        $idJouer = $res['idJouer'];
        $idRencontre = $res['idRencontre'];
        $idJoueur = $res['idJoueur'];
        $poste = $res['poste'];
        $titulaire = isset($res['titulaire']) ? (bool)$res['titulaire'] : false;
        $note = $res['note'];

        // Récupérer l'objet Joueur via son DAO (si disponible)
        $joueur = null;
        try {
            $daoJoueur = new DaoJoueur();
            $joueur = $daoJoueur->findById($idJoueur);
        } catch (Exception $e) {
            $e->getMessage();
        }

        return new Jouer($idJouer, $idRencontre, $joueur, $poste, $titulaire, $note);
    }

    public function create(mixed $entity): void {
        if (! $entity instanceof Jouer) {
            throw new \InvalidArgumentException('Type Jouer requis');
        }

        $pdo = MariaDBDataSource::getConnexion();
        $requete = 'INSERT INTO Jouer (idRencontre, idJoueur, poste, titulaire, note) VALUES (:idRencontre, :idJoueur, :poste, :titulaire, :note)';
        $statement = $pdo->prepare($requete);
        $statement->execute([
            ':idRencontre' => $entity->getIdRencontre(),
            ':idJoueur' => $entity->getJoueur()->getIdJoueur(),
            ':poste' => $entity->getPoste(),
            ':titulaire' => $entity->getTitulaire() ? 1 : 0,
            ':note' => $entity->getNote(),
        ]);
    }

    public function findById(int $id): ?Jouer {
        $pdo = MariaDBDataSource::getConnexion();
        $requete = 'SELECT * FROM Jouer WHERE idJouer = :id';
        $statement = $pdo->prepare($requete);
        $statement->execute([':id' => $id]);
        $row = $statement->fetch(\PDO::FETCH_ASSOC);
        if ($row === false) {
            return null;
        }
        return $this->createInstance($row);
    }

    public function findAll(): array {
        $pdo = MariaDBDataSource::getConnexion();
        $requete = 'SELECT * FROM Jouer';
        $statement = $pdo->prepare($requete);
        $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $result = [];
        foreach ($rows as $row) {
            $result[] = $this->createInstance($row);
        }
        return $result;
    }

    public function findByRencontre(int $idRencontre): array {
        $pdo = MariaDBDataSource::getConnexion();
        $requete = 'SELECT * FROM Jouer WHERE idRencontre = :idRencontre';
        $statement = $pdo->prepare($requete);
        $statement->execute([':idRencontre' => $idRencontre]);
        $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $result = [];
        foreach ($rows as $row) {
            $result[] = $this->createInstance($row);
        }
        return $result;
    }

    public function update(mixed $entity): void {
        if (! $entity instanceof Jouer) {
            throw new \InvalidArgumentException('Type Jouer requis');
        }

        $pdo = MariaDBDataSource::getConnexion();
        $requete = 'UPDATE Jouer SET idRencontre = :idRencontre, idJoueur = :idJoueur, poste = :poste, titulaire = :titulaire, note = :note WHERE idJouer = :idJouer';
        $statement = $pdo->prepare($requete);
        $statement->execute([
            ':idRencontre' => $entity->getIdRencontre(),
            ':idJoueur' => $entity->getJoueur()->getIdJoueur(),
            ':poste' => $entity->getPoste(),
            ':titulaire' => $entity->getTitulaire() ? 1 : 0,
            ':note' => $entity->getNote(),
            ':idJouer' => $entity->getIdJouer()
        ]);
    }

    public function deleteById(int $id): void {
        $pdo = MariaDBDataSource::getConnexion();
        $requete = 'DELETE FROM Jouer WHERE idJouer = :id';
        $stmt = $pdo->prepare($requete);
        $stmt->execute([':id' => $id]);
    }
}
