<?php

// ceci est la lasse fille de la classe PDO
class MyPDO extends PDO
{
    // Attributs - Propriétés
    private int $connect;

    // constructeur personnel
    public function __construct($dsn, $username = null, $password = null, $error = null)
    {
        // je récupère le fonctionnement normal du constructeur de PDO
        parent::__construct($dsn, $username, $password);

        // if $error vaut true, on active les erreurs
        if($error===true){
            $this->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        // on va prendre l'heure en Temps UNIX lors de l'instanciation
        $this->setConnect();
    }
    // je veux interdire l'utilisation d'exec natif de PDO -> cet enfant de PDO est incapable d'exécuter des exec, on écrase la méthode exec
    public function exec($statement){}

    // getter
    public function getConnect(): int
    {
        return $this->connect;
    }

    // méthodes qui prend le timestamp de la dernière connexion
    private function setConnect(): void
    {
        $this->connect = time();
    }


}