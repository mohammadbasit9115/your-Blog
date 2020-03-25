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
"/create"   =>[
    "controller" => "PostControl",
    "action"     => "create"
],
"/singup"   =>[
    "controller" => "UserControl",
    "action"     => "regis"
],
"/login"   =>[
    "controller" => "UserControl",
    "action"     => "login"
],
"/logout"   =>[
    "controller" => "UserControl",
    "action"     => "logOut"
]
];

if(isset($pages[$path]))
{
$control = $pages[$path]['controller'];
$action  = $pages[$path]['action'];

 $container->make($control)->$action();

}

 
   


  
 
  

  



?>