<?php

class DatabaseConnexion {
    function connect(){
        new PDO('mysql:host=localhost;dbname=petites_annonces', 'dawan', 'dawan');
    }
}