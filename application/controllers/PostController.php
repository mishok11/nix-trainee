<?php

namespace controllers;

use framework\BaseController;

class PostController extends BaseController
{
    public $post = [];
    public function actionIndex(){
        $this->viewsPath = $this->viewsPath."/post";
        $this->layout = 'main';
        $this->view = 'index';
        return $this->render('index', []);
    }
}