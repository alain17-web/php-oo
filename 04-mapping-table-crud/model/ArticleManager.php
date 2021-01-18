<?php

// Manager, s'occupe de gérer les instances de la classe Article
class ArticleManager
{
    // Attribut
    private MyPDO $db;

    // Method
    public function __construct(MyPDO $connect){
        $this->db = $connect;
    }
}