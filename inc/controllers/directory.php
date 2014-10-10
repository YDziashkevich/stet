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

        //var_dump(APP_DEFAULT_DIR);
        //var_dump($rootDir);

        if(isset($rootDir) && !empty($rootDir)){
            foreach($rootDir as $directory){
                $this->getDirectory($directory);
                //var_dump($directory);
                //var_dump(is_dir(APP_BASE_URL.$directory["pathDirectory"]."/"));
                //var_dump(APP_BASE_URL.$directory."/");
                //var_dump(APP_BASE_URL);
                var_dump(is_file('stet/index.php'));
                //var_dump(file_exists("/stet/index.php"));
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
    private function getDirectory($directory = array(), $parentDir = APP_BASE_URL)
    {
        if(!empty($directory)){
            $directories = scandir($directory["pathDirectory"]);
            foreach($directories as $dir){
                if($dir!="." && $dir!=".." && $dir!=".idea"){
                    $this->DirectoryModel->addDir($dir, $directory["id"]);
                }
                if(is_dir($parentDir.$dir) && $dir!="." && $dir!=".." && $dir!=".idea"){
                    $childDir["id"] = $this->DirectoryModel->getLastInsertId();
                    $childDir["pathDirectory"] = $directory["pathDirectory"]."\\".$dir;
                    $this->getDirectory($childDir, $parentDir.$dir."/");
                }
            }
        }
        return true;
    }
}