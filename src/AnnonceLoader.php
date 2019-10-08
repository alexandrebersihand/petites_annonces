<?php

require_once SRC_DIR.'/Annonce.php';
require_once SRC_DIR.'/Application.php';

class Annonceloader{

    public function load(int $id): Annonce {
        return new Annonce();
    }
}