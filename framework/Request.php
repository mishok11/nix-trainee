<?php
namespace framework;

class Request
{
    protected $_get;
    protected $_post;

    public function __construct()
    {
        $this->_post = $_POST;
        $this->_get = $_GET;


    }

    /**
     * @return mixed
     */
    public function getGet()
    {
        return $this->_get;
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->_post;
    }

    /**
     * @param mixed $get
     */
    public function setGet($get = []): void
    {
        $this->_get =  $_GET;
    }

    /**
     * @param mixed $post
     */
    public function setPost($post = []): void
    {
        $this->_post = $_POST;
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->_get['r'] ?? 'site/index/';
    }

    public function parseRoute()
    {
        $query = explode('/', $this->getRoute());
        return $query;
    }

    public function handleRequest(){
        $parser = $this->parseRoute();
        $controller = $parser[0];
        $action = $parser[1];
        $idQuery = $parser[2] ?? null;
        $callController= "controllers\\".ucfirst(($controller)."Controller");
        try {
            if (class_exists($callController)) {
                $c= new $callController;
            }  else {
                throw new \Exception("Controller $callController do not exist");

            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        try {
            if (method_exists($c,'action'.ucfirst($action))) {
                call_user_func([$c,'action'.ucfirst($action)]);
            } else {
                throw new \Exception("action $action do not exist");

            }
        } catch (\Exception $e){
            echo $e->getMessage();
        }

    }

}