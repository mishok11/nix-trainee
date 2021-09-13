<?php
namespace framework;


use function Composer\Autoload\includeFile;

class BaseController
{
    public  string $layoutPath = __DIR__.'/../application/views/layouts';
    public string $viewsPath = __DIR__.'/../application/views';
    public string $className;
    public string $view;
    public string $layout;

    public function __construct()
    {
        $this->className = get_class($this);
    }
    public function render ($view = 'index', $params = []){
         $content = $this->getView( $this->viewsPath.'/'.$this->view.'.php',$params)->renderFile();
         $params['content'] =$content;
         return $this->getView( $this->layoutPath.'/'.$this->layout.'.php',$params)->renderFile();

    }

    public function getView($view,$params){
        return new \View($view,$params);
    }

    /**
     * @param string $viewsPath
     */
    public function setViewsPath(string $viewsPath): void
    {
        $this->viewsPath = $viewsPath;
    }






//    /**
//     * @param $view
//     * @param array $params
//     */
//    public function render($view,$params = []){
//        $file = $this->viewsPath."/$this->className"."/$view.php";
//        $content = file_get_contents($file);
//        return $content;
//    }

}