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

}