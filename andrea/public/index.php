<?php 
require __DIR__ . "/../init.php";
$path = $_SERVER['PATH_INFO'];
$pages = [
"/index"    =>[
    "controller" => "PostControl",
    "action"     => "index"
],
"/article"  =>[
    "controller" => "PostControl",
    "action"     => "article"
],
"/singup"   =>[
    "controller" => "UserControl",
    "action"     => "regis"
]
];

if(isset($pages[$path]))
{
$control = $pages[$path]['controller'];
$action  = $pages[$path]['action'];
  $control=$container->make($control)->$action();
  /*if($control == false){
    $container2->make($control)->$action();
  }
*/



}
?>