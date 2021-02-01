<?php

/*
 * Theuser's Manager
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
     * selectOneUserById()
     * @param int $id
     * @return array
     */
    public function selectOneUserById(int $id): array {
        $req = $this->connect->prepare("SELECT idtheUser, theUserLogin FROM theuser WHERE idtheUser= ? ;");
        $req->execute([$id]);
        if($req->rowCount()){
            return $req->fetch(PDO::FETCH_ASSOC);
        }
        return [];
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
                $_SESSION = session_id();
                return true;
            }else{
                return false;
            }
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }


}