<?php 
require __DIR__ . "/../init.php";
$path = $_SERVER['PATH_INFO'];
$pages = [
"/index"=>[
    "controller" => "PostControl",
    "action"     => "index"
]
];

if(isset($pages[$path]))
{
$control = $pages[$path]['controller'];
$action  = $pages[$path]['action'];
$control= $container->make($control)->index();




}
?>