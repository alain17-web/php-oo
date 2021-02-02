<?php


/**
 * Theuser's Manager
 * Class TheuserManager
 */
class TheuserManager
{
    private MyPDO $connect;

    /**
     * TheuserManager constructor.
     * @param MyPDO $connect
     */
    public function __construct(MyPDO $connect)
    {
        $this->connect = $connect;
    }

    /**
     * selectAllUsers()
     * @return array
     */
    public function selectAllUsers(): array {
        $req = $this->connect->query("SELECT idtheUser, theUserLogin FROM theuser;");
        if($req->rowCount()){
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }


    /**
     * @param int $id
     * @return array|string
     */
    public function selectOneUserById(int $id) {
        $req = $this->connect->prepare("SELECT idtheUser, theUserLogin FROM theuser WHERE idtheUser= ? ;");
        try {
            $req->execute([$id]);
            if ($req->rowCount()) {
                return $req->fetch(PDO::FETCH_ASSOC);
            }
            return [];
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }


    /**
     * connectUser()
     * @param Theuser $user
     * @return bool|string
     */
    public function connectUser(Theuser $user) {
        $sql = "SELECT idtheUser, theUserLogin FROM theuser WHERE theUserLogin= ? AND theUserPwd = ? ;";
        $req = $this->connect->prepare($sql);
        $req->bindValue(1,$user->getTheUserLogin(),PDO::PARAM_STR);
        $req->bindValue(2,$user->getTheUserPwd(),PDO::PARAM_STR);
        try{
            $req->execute();
            if($req->rowCount()){
                $_SESSION = $req->fetch(PDO::FETCH_ASSOC);
                $_SESSION['idsession'] = session_id();
                return true;
            }else{
                return false;
            }
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }

    /**
     * static disconnectUser()
     * @return bool
     */
    public static function disconnectUser(): bool {

        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        return true;
    }

}