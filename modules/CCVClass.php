<?php
class CCV extends database
{
    public function ccv_getall()
    {
        $getall = $this->connect->prepare("SELECT * from ccv where");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}
