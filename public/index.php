<?php

require_once '../src/Response.php';
require_once '../src/UrlReader.php';

// regarder dans l'URL
$reader = new UrlReader();

// ToDo /!\ : mettre la construction de la reposne dans une classe
try {
    $id = $reader->parse();
    $response = new Response('Est ce que ça l\'fait..?? ouais, ouais, ouais !');
}

catch(Exception $e) {
    $response = new Response('Erreur 404... ;(  ......Cette page n\'existe pas', 404);
}

$response->send();

