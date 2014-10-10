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
        }
        if(isset($_POST["create"]) && !empty($_POST["create"]) && $this->DirectoryModel->isEmptyTable()===false){
            $rootDir = $this->rootDirectory();
        }
        if(isset($rootDir) && !empty($rootDir)){
            foreach($rootDir as $directory){
                $this->getDirectory($directory);
            }
        }
        $this->view->render("directory");
    }
    private function rootDirectory()
    {
        $rootDirectories = scandir(APP_DEFAULT_DIR);
        $rootParent = null;
        $i = 0;
        foreach($rootDirectories as $dir){
            if($dir!="." && $dir!=".." && $dir!=".idea"){
                $this->DirectoryModel->addDir($dir, null);
            }
            if(is_dir($dir) && $dir!="." && $dir!=".." && $dir!=".idea"){
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
                if($dir!="." && $dir!=".." && $dir!=".idea"){
                    $this->DirectoryModel->addDir($dir, $directory["id"]);
                }
                clearstatcache();
                if(is_dir($directory["pathDirectory"]."/".$dir."/") && $dir!="." && $dir!=".." && $dir!=".idea"){
                    $childDir["id"] = $this->DirectoryModel->getLastInsertId();
                    $childDir["pathDirectory"] = $directory["pathDirectory"]."\\".$dir;
                    $this->getDirectory($childDir, $parentDir.$dir."/");
                }
            }
        }
        return true;
    }
}