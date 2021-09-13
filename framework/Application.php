<?php
namespace framework;




class Application {
    public $config;
    public function __construct()
    {

    }

    public function run()
    {
        $route = new Request();
        $route->handleRequest();



    }
}

