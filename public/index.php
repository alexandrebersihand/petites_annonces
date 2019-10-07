<?php

require_once '../src/Response.php';
require_once '../src/UrlReader.php';

// regarder dans l'URL
$reader = new UrlReader();

// ToDo /!\ : mettre la construction de la reposne dans une classe
try
{
    $id = $reader->parse();
}
catch(Exception $e) {
    $response = new Response();
    $response->send('Erreur 404... ;(  ......Cette page n\'existe pas', 404);
    die;
}

$response = new Response();
$response->send('Est ce que ça l\'fait..?? ouais, ouais, ouais !');


