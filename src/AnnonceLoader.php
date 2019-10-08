<?php
namespace App;

class Annonceloader{

    private $connexion;

    public function __construct(DatabaseConnexion $connexion) {
        $connexion->connect();
        $this->connexion = $connexion->getPdo();
    }

    public function load(int $id): Annonce {
        $statement = $this->connexion->prepare(
            'SELECT id, title, content, publishAt FROM Annonce WHERE id=:id'
        );

        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();

        $annonce = $statement->fetchObject(Annonce::class);
//      return $statement->fetchObject('Annonce');      idem ligne du dessus
        return $annonce;
    }
}