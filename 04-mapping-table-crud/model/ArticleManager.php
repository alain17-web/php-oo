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
    public function readOneArticleBySlug(String $slug): Array{
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

    // select one article by id
    public function readOneArticleById(int $id): Array{
        // prepare request
        $sql = "SELECT * FROM article WHERE idarticle=?";
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(1,$id,PDO::PARAM_INT);
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
        $sql = "INSERT INTO article (articleTitle,articleSlug,articleText,articleAuthor) VALUES (?,?,?,?)";
        $request = $this->db->prepare($sql);
        // essai d'insertion
        try {
            $request->execute([
                    $item->getArticleTitle(),
                    $item->getArticleSlug(),
                    $item->getArticleText(),
                    $item->getArticleAuthor()]
            );
            return true;
        // si erreur d'insertion
        }catch (Exception $e){
            // si c'est le slug qui est dupliqué (champs unique)
            if(strstr($e->getMessage(),"articleSlug_UNIQUE")){
                // on réinsert en changeant le nom du slug
                $request->execute([
                        $item->getArticleTitle(),
                        $item->getArticleSlug()."-".uniqid(),
                        $item->getArticleText(),
                        $item->getArticleAuthor()]
                );
                return true;

            }else{
                return $e->getMessage();
            }
        }

    }

    // delete article by id
    public function deleteArticleById(int $id) {
        $sql = "DELETE FROM article WHERE idarticle=?";
        $prepare = $this->db->prepare($sql);
        try{
            $prepare->execute([$id]);
            return true;
        }catch(PDOException $exception){
            return $exception->getMessage();
        }
    }

    // update article by GET id and (instance d'Article - Article's object by POST)
    public function updateArticleById(Article $article, int $idarticle){
        // no hack
        if($idarticle == $article->getIdarticle()){
            // prepare request
            $sql = "UPDATE article SET articleTitle= :articleTitle,articleSlug= :articleSlug, articleText= :articleText, articleDateTime= :articleDateTime, articleAuthor= :articleAuthor WHERE idarticle=:idarticle";
            $prepare= $this->db->prepare($sql);

            // attribute values
            $prepare->bindValue("idarticle",$article->getIdarticle(),PDO::PARAM_INT);
            $prepare->bindValue("articleTitle",$article->getArticleTitle(),PDO::PARAM_STR);
            $prepare->bindValue("articleSlug",$article->getArticleSlug(),PDO::PARAM_STR);
            $prepare->bindValue("articleText",$article->getArticleText(),PDO::PARAM_STR);
            $prepare->bindValue("articleAuthor",$article->getArticleAuthor(),PDO::PARAM_STR);
            $prepare->bindValue("articleDateTime",$article->getArticleDateTime(),PDO::PARAM_STR);

            // execute
            try{
                $prepare->execute();
                return true;
            }catch (PDOException $e){
                return $e->getMessage();
            }
        }else{
            return "No hack my site!";
        }
    }

    // function qui va permettre de couper les x premiers caractères sans couper de mots, le mot clef static va permettre d'utiliser cette méthode sans devoir instancier le classe ArticleManager
    public static function cutTheText(string $text, int $nbChars): string{
        $cutText = substr($text,0,$nbChars);
        return $cutText = substr($cutText,0,strrpos($cutText," "));
    }
}