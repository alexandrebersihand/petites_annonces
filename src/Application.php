<?php

require_once SRC_DIR.'/UrlReader.php';
require_once SRC_DIR.'/Response.php';

class Application{
    public function run(): Response {
        // regarder dans l'URL
        $reader = new UrlReader();

        try {
            $id = $reader->parse();
            $response = new Response('Est ce que ça l\'fait..?? ouais, ouais, ouais !');
        }

        catch(Exception $e) {
            $response = new Response('Erreur 404... ;(  ......Cette page n\'existe pas', 404);
        }
        return $response;
    }
}