<?php

/*
 * Mapping of theuser's table
 */
class Theuser{

    private int $idtheUser;
    private string $theUserLogin;
    private string $theUserPwd;

    /**
     * Theuser constructor.
     * @param array $datas
     */
    public function __construct(array $datas)
    {
        $this->hydrate($datas);
    }


    /**
     * hydrate Theuser
     * @param array $datas
     */
    private function hydrate(Array $datas){
        foreach($datas as $key => $value){
            $methodSetters = "set".ucfirst($key);
            if(method_exists($this,$methodSetters)){
                $this->$methodSetters($value);
            }
        }
    }

    /**
     * $idtheUser's getter
     * @return int
     */
    public function getIdtheUser(): int
    {
        return $this->idtheUser;
    }

    /**
     * $idtheUser's setters
     * @param int $idtheUser
     */
    public function setIdtheUser(int $idtheUser): void
    {
        $this->idtheUser = $idtheUser;
    }

    /**
     * $theUserLogin's getter
     * @return string
     */
    public function getTheUserLogin(): string
    {
        return $this->theUserLogin;
    }

    /**
     * $theUserLogin's setter
     * @param string $theUserLogin
     */
    public function setTheUserLogin(string $theUserLogin): void
    {
        $this->theUserLogin = $theUserLogin;
    }

    /**
     * $theUserPwd's getter
     * @return string
     */
    public function getTheUserPwd(): string
    {
        return $this->theUserPwd;
    }

    /**
     * $theUserPwd's setter
     * @param string $theUserPwd
     */
    public function setTheUserPwd(string $theUserPwd): void
    {
        $this->theUserPwd = $theUserPwd;
    }


}