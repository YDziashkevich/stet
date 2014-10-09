<?php
class DirectoryModel extends Model
{
    public function addDir($name, $parentId)
    {
        $dir = self::getDbc()->prepare("INSERT INTO st_directory (name, parentId) VALUES (:name, :parentId)");
        return $dir->execute(array(":name"=>$name, ":parentId"=>$parentId));
    }
    public function getId($name)
    {
        $id = self::getDbc()->prepare("SELECT id FROM st_directory WHERE name=:name");
        $id->execute(array(":name"=>$name));
        return $id->fetchColumn();
    }
    public function getLastInsertId()
    {
        return self::getDbc()->lastInsertId();
    }
    public function isEmptyTable()
    {
        $records = self::getDbc()->query("SELECT name FROM st_directory WHERE parentId IS NULL");
        return $records->fetch();
    }
    public function clearTable()
    {
        $clear = self::getDbc()->query("TRUNCATE TABLE st_directory");
        return $clear;
    }
}