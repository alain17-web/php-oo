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

    public function selectOneUserById(int $id): array {
        $req = $this->connect->prepare("SELECT idtheUser, theUserLogin FROM theuser WHERE idtheUser= ? ;");
        $req->execute([$id]);
        if($req->rowCount()){
            return $req->fetch(PDO::FETCH_ASSOC);
        }
        return [];
    }

}