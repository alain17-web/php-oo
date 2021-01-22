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

    // Read all from Article
    public function readAllArticle(): Array {
        $sql = "SELECT * FROM article ORDER BY articleDateTime DESC";
        $recupAll = $this->db->query($sql);
        if($recupAll->rowCount()) {
            return $recupAll->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return [];
        }
    }

    // select one article by slug
    public function readOneArticle(String $slug): Array{
        // prepare request
        $sql = "SELECT * FROM article WHERE articleSlug=?";
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(1,$slug,PDO::PARAM_STR);
        $prepare->execute();
        // on a une ligne de résultat
        if($prepare->rowCount()){
            return $prepare->fetch(PDO::FETCH_ASSOC);
        }
        // pas de résultats
        return [];
    }

    // insert into table Article
    public function insertArticle(Article $item){
        //"ON EST ICI ."
        var_dump($item);
    }

    // function qui va permettre de couper les x premiers caractères sans couper de mots, le mot clef static va permettre d'utiliser cette méthode sans devoir instancier le classe ArticleManager
    public static function cutTheText(string $text, int $nbChars): string{
        $cutText = substr($text,0,$nbChars);
        return $cutText = substr($cutText,0,strrpos($cutText," "));
    }
}