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
    public function getRoot()
    {
        $dir = self::getDbc()->query("SELECT name, id, size FROM st_directory WHERE parentId IS NULL ORDER BY name");
        return $dir->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getDir($id)
    {
        $dir = self::getDbc()->prepare("SELECT name, id, size FROM st_directory WHERE parentId=:parentId");
        $dir->execute(array(":parentId"=>$id));
        return $dir->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function delDir($id)
    {
        $dir = self::getDbc()->prepare("DELETE FROM st_directory WHERE id=:id");
        $dir->bindParam(":id", $id, PDO::PARAM_INT);
        return $dir->execute();
    }
    public function saveSize($id, $size)
    {
        $dir = self::getDbc()->prepare("UPDATE st_directory SET size=:size WHERE id=:id");
        return $dir->execute(array(":id"=>(int)$id, ":size"=>$size));
    }
    public static function getTotalSize()
    {
        $dir = self::getDbc()->query("SELECT SUM(size) FROM st_directory");
        $size = (int)$dir->fetchColumn();
        return round($size/1024, 2);
    }
    public static function getSize($id = "")
    {
        $dir = self::getDbc()->prepare("SELECT SUM(size) FROM st_directory WHERE parentId=:id");
        $dir->execute(array(":id"=>$id));
        return $dir->fetchColumn();
    }
}