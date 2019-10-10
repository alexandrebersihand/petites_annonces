<?php
namespace App;

use App\database\AnnonceLoader;
use App\database\DatabaseConnexion;
use App\html\Annonce as AnnonceHtml;



class Controller
{
    /**
     * @var databaseConnexion
     */
    private $connection;
    /**
     * @var AnnonceLoader
     */
    private $loader;
    /**
     * @var AnnonceHtml
     */
    private $annonceHtml;

    public function __construct(databaseConnexion $connection)
    {
        $this->connection = $connection;
        $this->loader = new AnnonceLoader($connection);
        $this->annonceHtml = new AnnonceHtml();
    }
    // fonction pour voir l'annonce.
    public function show(int $id): Response
    {
        $annonce = $this->loader->load($id);
        return new Response($this->annonceHtml->loadTemplate(
            '/templates/annonce.phtml',
            ['annonce' => $annonce,]
        ));
    }
    /// fonction pour lister les annonces
    public function index(): Response
    {
        $annonces = $this->loader->loadAll();
        return new Response($this->annonceHtml->loadTemplate(
            '/templates/index.phtml',
            ['annonces' => $annonces,]
        ));
    }

}