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

        var_dump(APP_DEFAULT_DIR);
        var_dump($rootDir);

        if(isset($rootDir) && !empty($rootDir)){
            foreach($rootDir as $dir){
                $this->getDirectory($dir);
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
    private function getDirectory($directory = array())
    {
        if(!empty($directory)){
            $directories = scandir($directory["pathDirectory"]);
            $i = 0;
            foreach($directories as $dir){
                if($dir!="." && $dir!=".." && $dir!=".idea"){
                    $this->DirectoryModel->addDir($dir, $directory["id"]);
                }
                if(is_dir(APP_BASE_URL."/".$dir) && $dir!="." && $dir!=".." && $dir!=".idea"){
                    $childDir[$i]["id"] = $this->DirectoryModel->getLastInsertId();
                    $childDir[$i]["pathDirectory"] = $directory["pathDirectory"]."\\".$dir;
                }
                ++$i;
            }
            $this->getDirectory($childDir);
        }
        return true;
    }
}