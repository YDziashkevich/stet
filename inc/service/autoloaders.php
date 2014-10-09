<?php
spl_autoload_register(function($class){
    $classFileName = "inc/service/".strtolower($class).".php";
    if(file_exists($classFileName)){
        require_once($classFileName);
        return true;
    }
});
spl_autoload_register(function($class){
    $controllerFlag = strpos($class, "Controller");
    if($controllerFlag === false){
        return false;
    }else{
        $controllerName = strtolower(str_replace("Controller", "", $class));
        $controllerFileName = "inc/controllers/".$controllerName.".php";
        if(file_exists($controllerFileName)){
            require_once($controllerFileName);
            return true;
        }
    }
});
spl_autoload_register(function($class){
    $modelFlag = strpos($class,"Model");
    if($modelFlag === false){
        return false;
    }
    $modelName = strtolower(str_replace("Model", "", $class));
    $modelFileName = "inc/models/".$modelName.".php";
    if(file_exists($modelFileName)){
        require_once($modelFileName);
        return true;
    }
});