<?php
namespace App;

use App\Exception\NotFoundException;

class UrlReader
{
    public function parse(): PageConfig
    {
        // découpe de l'url sur les '/'
        $path = trim($_SERVER['REQUEST_URI'],'/');  
        $uriParts = explode('/', $path);
        // ou sur une seul ligne de commande
        // $uriParts = explode('/', trim($_SERVER['REQUEST_URI'],'/'));

            return $this->match($uriParts);

    }

    private function match(array $Parts): PageConfig
    {
        //url de la form "/annonce"
        if (count($Parts) === 1
                && $Parts[0] === 'annonce')
             {

            return new PageConfig([
                'method' => 'index',
                'args' => [],
            ]);
        }
        // url de la form "annonce/<numero>"?
        if (count($Parts) === 2
            && $Parts[0] === 'annonce'
            && is_numeric($Parts[1])
        ) {
                return new PageConfig([
                    'method' => 'show',
                    'args' => ['id' => intval($Parts[1])],
                ]);
        }
        // pas d'url trouvé
        throw new NotFoundException('URL non reconnue bordel de merde !');
    }
}

