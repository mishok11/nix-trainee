<?php



$config = array_merge(require __DIR__ . "/application/config/main.php");

function includeClass($classname) {
    $dirs = [
        __DIR__,
        __DIR__."/framework",
        __DIR__."/application",
        __DIR__."/application/controllers",
        __DIR__."/application/models"
    ];
    foreach ($dirs as $dir) {
        $filename = $classname . ".php";
        $filename = preg_replace('/\\\\/', '/', $dir. "/$filename");
        if (file_exists($filename)) {
             include_once($filename);

        }
    }

}
spl_autoload_register("includeClass");





   $app = new framework\Application();
   $app->config = $config;
   $app->run();






