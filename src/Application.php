<?php
namespace App;

use App\database\AnnonceLoader;
use App\database\DatabaseConnexion;
use App\html\Annonce as AnnonceHtml;
use App\Exception\NotFoundException;

class Application{
    public function run(): Response {
        // regarder dans l'URL
        $config = json_decode(file_get_contents(__DIR__.'/../config/database.json'));
        $connexion = new DatabaseConnexion(
            $config->dsn,
            $config->username,
            $config->password
        );

        $reader = new UrlReader();

        try {
            $id = $reader->parse();
            $loader = new AnnonceLoader($connexion);
            $annonce = $loader->load($id);
            $annonceHtml = new AnnonceHtml();
            $response = new Response($annonceHtml->build($annonce));
        }

        catch(NotFoundException $e) {
            $response = new Response($e->getMessage(), 404);
        }
        return $response;
    }
}