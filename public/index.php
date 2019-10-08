<?php
// définition du repertoire racine
define('SRC_DIR', __DIR__.'/../src');
require_once SRC_DIR.'/Application.php';

$app = new Application();
$response = $app->run();
$response->send();
//$annonce->load();
