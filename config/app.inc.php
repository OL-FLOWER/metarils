<?php

class App{
    private $path;

    function __construct()
    {
        $this->path=getcwd();
    }

    public function getPath(){
        return $this->path;
    }

    function joinPath($path,$name){
        return $path.DIRECTORY_SEPARATOR.trim($name,DIRECTORY_SEPARATOR);
    }

    function getConfigPath($file){
        return $this->joinPath($this->path,"config").DIRECTORY_SEPARATOR.$file;
    }

    function getViewsPath(){
        return $this->joinPath($this->path,"views");
    }


    function getViewPath($view){
        return $this->getViewsPath().DIRECTORY_SEPARATOR.$view.".phtml";
    }

    function getControllersPath(){
        return $this->joinPath($this->path,"controllers");
    }

    function getControllerPath($controller){
        return $this->getControllersPath().DIRECTORY_SEPARATOR.$controller.".php";
    }

    function getDbPath(){
        return $this->joinPath($this->path,"db");
    }

    function getComponentsPath(){
        return $this->joinPath($this->path,"components");
    }

    function getComponentPath($component){
        return $this->getComponentsPath().DIRECTORY_SEPARATOR.$component.".inc.php";
    }

}

if(!isset($app)){
    $app = new App();
}