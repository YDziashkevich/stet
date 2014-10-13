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
        $rootParent = null;
        $i = 0;
        foreach($rootDirectories as $dir){
            if($dir[0]!="."){
                $this->DirectoryModel->addDir($dir, null);
            }
            if(is_dir($dir) && $dir[0]!="."){
                $rootDir[$i]["id"] = $this->DirectoryModel->getLastInsertId();
                $rootDir[$i]["pathDirectory"] = APP_DEFAULT_DIR."\\".$dir;
            }
            ++$i;
        }
        return $rootDir;
    }
    private function getDirectory($directory = array(), $parentDir = "")
    {
        if(!empty($directory)){
            $directories = scandir($directory["pathDirectory"]);
            foreach($directories as $dir){
                if($dir[0]!="."){
                    $this->DirectoryModel->addDir($dir, $directory["id"]);
                }
                clearstatcache();
                if(is_dir($directory["pathDirectory"]."/".$dir."/") && $dir[0]!="."){
                    $childDir["id"] = $this->DirectoryModel->getLastInsertId();
                    $childDir["pathDirectory"] = $directory["pathDirectory"]."\\".$dir;
                    $this->getDirectory($childDir, $parentDir.$dir."/");
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
                $html .= "<li>".$dir["name"]."<form method='post'>
                <input type='hidden' name='idDel' value='$dir[id]' />
                <input type='submit' class='float_r btn-mini btn btn-danger my-del' name='delDir' value='DEL' /></form>"."</li>"."<br />";
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
}