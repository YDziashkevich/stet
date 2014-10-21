<?php
class DirectoryController extends Controller
{
    private $DirectoryModel;
    public function __construct()
    {
        $this->DirectoryModel = new DirectoryModel();
        parent::__construct();
    }
    public function indexAction()
    {
        if(isset($_POST["delete"]) && !empty($_POST["delete"])){
            $this->DirectoryModel->clearTable();
            parent::redirect(APP_BASE_URL.'index.php?url=directory');
        }
        if(isset($_POST["create"]) && !empty($_POST["create"]) && $this->DirectoryModel->isEmptyTable()===false){
            $rootDir = $this->rootDirectory();
        }
        if(isset($rootDir) && !empty($rootDir)){
            foreach($rootDir as $directory){
                $this->getDirectory($directory);
            }
            parent::redirect(APP_BASE_URL.'index.php?url=directory');
        }
        $data["root"] = $this->DirectoryModel->getRoot();
        if(isset($_POST["idDel"]) && !empty($_POST["idDel"])){
            self::delDir($_POST["idDel"]);
            parent::redirect(APP_BASE_URL.'index.php?url=directory');
        }
        $this->view->render("directory", $data);
    }
    private function rootDirectory()
    {
        $rootDirectories = scandir(APP_DEFAULT_DIR);
        $i = 0;
        foreach($rootDirectories as $dir){
            if($dir[0]!="."){
                $this->DirectoryModel->addDir($dir, null);
                $idDir = $this->DirectoryModel->getLastInsertId();
                if(!is_dir($dir)){
                    $size = filesize($dir);
                    $this->DirectoryModel->saveSize($idDir, $size);
                }else{
                    $rootDir[$i]["id"] = $idDir;
                    $rootDir[$i]["pathDirectory"] = APP_DEFAULT_DIR."\\".$dir;
                    $rootDir[$i]["name"] = $dir;
                }
                clearstatcache();
            }
            ++$i;
        }
        return $rootDir;
    }
    private function getDirectory($directory = array())
    {
        if(!empty($directory)){
            $directories = scandir($directory["pathDirectory"]);
            foreach($directories as $dir){
                if($dir[0]!="."){
                    $this->DirectoryModel->addDir($dir, $directory["id"]);
                    $idDir = $this->DirectoryModel->getLastInsertId();
                    if(!is_dir($directory["pathDirectory"]."/".$dir."/")){
                        $size = filesize($directory["name"]."/".$dir);
                        $this->DirectoryModel->saveSize($idDir, $size);
                    }else{
                        $childDir["id"] = $idDir;
                        $childDir["pathDirectory"] = $directory["pathDirectory"]."\\".$dir;
                        $childDir["name"] = $directory["name"]."/".$dir."/";
                        $this->getDirectory($childDir);
                    }
                    clearstatcache();
                }
            }
        }
        return true;
    }
    public static function getDir($id = "")
    {
        $html = "<ul>";
        if(!empty($id)){
            $directories = DirectoryModel::getDir($id);
            foreach($directories as $dir){
                if($dir["size"] == 0){
                    $html .= "<li><b>".$dir["name"]."</b> "."- ".self::getSizeDir($dir["id"])."Kb"."<form method='post'>
                <input type='hidden' name='idDel' value='$dir[id]' />
                <input type='submit' class='float_r btn-mini btn btn-danger my-del' name='delDir' value='DEL' /></form>"."</li>"."<br />";
                }else{
                    $size = round($dir["size"]/1024,2);
                    $html .= "<li>".$dir["name"]." -"." ".$size."Kb"."<form method='post'>
                <input type='hidden' name='idDel' value='$dir[id]' />
                <input type='submit' class='float_r btn-mini btn btn-danger my-del' name='delDir' value='DEL' /></form>"."</li>"."<br />";
                }
                $html .= self::getDir($dir["id"]);
            }
        }
        $html .= "</ul>";
        return $html;
    }
    public static function delDir($id)
    {
        if(isset($id) && !empty($id)){
            DirectoryModel::delDir($id);
            foreach(DirectoryModel::getDir($id) as $dir){
                DirectoryModel::delDir($dir["id"]);
                self::delDir($dir["id"]);
            }
        }
    }
    public static function getSizeDir($id = "")
    {
        $sum = "";
        if(!empty($id)){
            $directory = DirectoryModel::getDir($id);
            $sum = DirectoryModel::getSize($id);
            foreach($directory as $dir){
                $sumDir = DirectoryModel::getSize($dir["id"]);
                if(!empty($sumDir)){
                    $newDirectory = DirectoryModel::getDir($dir["id"]);
                    foreach($newDirectory as $newDir){
                        $newSumDir = self::getSizeDir($newDir["id"]);
                        $sum += $newSumDir;
                    }
                }
                $sum += $sumDir;
            }
        }
        $sum = round($sum/1024, 2);
        return $sum;
    }
}