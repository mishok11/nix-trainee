<?php
namespace controllers;
use framework\BaseController;

class SiteController extends BaseController
{


    /**
     * @param string $viewsPath
     */


    public function actionIndex(){
        $this->viewsPath = $this->viewsPath."/site";
        $this->layout = 'main';
        $this->view = 'index';
        return $this->render($this->view,[]);
    }
}