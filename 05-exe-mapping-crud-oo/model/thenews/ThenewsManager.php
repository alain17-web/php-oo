<?php


/**
 * Class ThenewsManager
 */
class ThenewsManager
{
    // EXERCICE créez le manager complet avec la connexion MyPDO en argument et toutes les méthodes nécessaires au CRUD des "thenews"
    /**
     * @var MyPDO
     */
    private MyPDO $db;

    /**
     * ThenewsManager constructor.
     * @param MyPDO $db
     */
    public function __construct(MyPDO $db)
    {
        $this->db = $db;
    }

    // Récupération de tous les news (thenews) avec le nom d'auteur joint (theuser) ordonné par date Descendante, nous allons prendre que 180 caractères

    /**
     * @return array
     */
    public function readAllNews(): array{
        $sql="SELECT n.idtheNews, n.theNewsTitle, SUBSTR(n.theNewsText,1,180) AS theNewsText, n.theNewsDate, n.theUser_idtheUser, u.theUserLogin 
        FROM thenews n
        INNER JOIN theuser u 
            ON u.idtheUser = n.theUser_idtheUser
        ORDER BY n.theNewsDate DESC ;
        ";
        $request = $this->db->query($sql);
        // si on a des articles
        if($request->rowCount()){
            return $request->fetchAll(PDO::FETCH_ASSOC);
        }
        // pas d'articles
        return [];
    }

    // chargement des news par l'id de leur auteur

    /**
     * @param int $iduser
     * @return array
     */
    public function readAllNewsByIdUser(int $iduser){
        $sql="SELECT n.idtheNews, n.theNewsTitle, SUBSTR(n.theNewsText,1,180) AS theNewsText, n.theNewsDate, n.theUser_idtheUser
        FROM thenews n
        WHERE n.theUser_idtheUser = ?
        ORDER BY n.theNewsDate DESC ;
        ";
        $request = $this->db->prepare($sql);
        $request->execute([$iduser]);
        // si on a des articles
        if($request->rowCount()){
            return $request->fetchAll(PDO::FETCH_ASSOC);
        }
        // pas d'articles
        return [];
    }

    // Chargement d'une news par son ID

    /**
     * @param int $idnews
     * @return array
     */
    public function readOneNewsById(int $idnews):array{
        $sql="SELECT n.idtheNews, n.theNewsTitle, n.theNewsText, n.theNewsDate, n.theUser_idtheUser, u.theUserLogin 
        FROM thenews n
        INNER JOIN theuser u 
            ON u.idtheUser = n.theUser_idtheUser
        WHERE n.idtheNews=? ;
        ";
        $request = $this->db->prepare($sql);
        $request->execute([$idnews]);
        // si on a un article
        if($request->rowCount()){
            return $request->fetch(PDO::FETCH_ASSOC);
        }
        // pas d'article
        return [];
    }

    // Chargement d'une news par son ID et l'id de l'utilsateur connecté

    /**
     * @param int $idnews
     * @param int $SessionIduser
     * @return array
     */
    public function readOneNewsAdminById(int $idnews, int $SessionIduser):array{
        $sql="SELECT n.idtheNews, n.theNewsTitle, n.theNewsText, n.theNewsDate, n.theUser_idtheUser
        FROM thenews n
        WHERE n.idtheNews=? AND n.theUser_idtheUser=? ;
        ";
        $request = $this->db->prepare($sql);
        $request->execute([$idnews,$SessionIduser]);
        // si on a un article
        if($request->rowCount()){
            return $request->fetch(PDO::FETCH_ASSOC);
        }
        // pas d'article
        return [];
    }

    // méthode qui insert un article si on a pas bidouillé l'id de l'utilisateur qui le poste

    /**
     * @param Thenews $news
     * @param int $SessionIduser
     * @return bool
     */
    function insertArticleAdmin(Thenews $news, int $SessionIduser){
        if($news->getTheUser_idtheUser()!=$SessionIduser){
            TheuserManager::disconnectUser();
            header("Location: ./");
            exit();
        }else{
            $sql = "INSERT INTO thenews (theNewsTitle,theNewsText,theUser_idtheUser) VALUES (?,?,?); ";
            $prepare = $this->db->prepare($sql);
            $prepare->bindValue(1,$news->getTheNewsTitle(),PDO::PARAM_STR);
            $prepare->bindValue(2,$news->getTheNewsText(),PDO::PARAM_STR);
            $prepare->bindValue(3,$news->getTheUser_idtheUser(),PDO::PARAM_INT);
            return $prepare->execute();


        }
    }

    // Delete a news by his author

    public function deleteArticleAdmin(int $idnews, int $SessionIduser){

            $sql = "DELETE FROM thenews WHERE idtheNews=? AND theUser_idtheUser=? ";
            $prepare = $this->db->prepare($sql);
            return $prepare->execute([$idnews,$SessionIduser]);


    }

    // méthode qui coupe le texte en dehors des mots, on peut l'utiliser sans instancier cette classe (static)

    /**
     * @param string $text
     * @param int $nbChars
     * @return string
     */
    public static function cutTheText(string $text, int $nbChars): string{
        $cutText = substr($text,0,$nbChars);
        return $cutText = substr($cutText,0,strrpos($cutText," "));
    }

}