<?php
require __DIR__.'/../vendor/autoload.php';
define('APP_DIR', __DIR__.'/..');
// plus besoin d'utiliser ligne 5 et 6 grace a composer !
// définition du repertoire racine
// define('SRC_DIR', __DIR__.'/../src');


$app = new App\Application();
$response = $app->run();
$response->send();


