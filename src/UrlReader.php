<?php

class UrlReader
{
    public function parse(): int {
        // découpe de l'url sur les '/'
        $path = trim($_SERVER['REQUEST_URI'],'/');  
        $uriParts = explode('/', $path);
        // ou sur une seul ligne de commande
        // $uriParts = explode('/', trim($_SERVER['REQUEST_URI'],'/'));

        if ($this->match($uriParts)) {
            return intval($uriParts[1]);
        }
        // pas d'url trouvé
        throw new Exception('URL non reconnue');
    }

    private function match(array $Parts): bool {
        // url de la form "annonce/<numero>"?
        return count($Parts) === 2
            && $Parts[0] === 'annonce'
            && is_numeric($Parts[1]);
    }
}

