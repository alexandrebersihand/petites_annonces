<?php
namespace App;


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
            $response = new Response('Est ce que ça l\'fait..?? ouais, ouais, ouais !');
        }

        catch(Exception $e) {
            $response = new Response('Erreur 404... ;(  ......Cette page n\'existe pas', 404);
        }

        return $response;
    }
}