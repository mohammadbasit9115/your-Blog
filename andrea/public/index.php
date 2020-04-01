<?php 
require __DIR__ . "/../init.php";
if(isset($_SERVER['PATH_INFO']))
{
    $path = $_SERVER['PATH_INFO'];
}
if($_SERVER['PATH_INFO'] == "/" AND $_SERVER['PATH_INFO'] == "" )
{
    $_SERVER['PATH_INFO'] = "/index";
}


$pages = [
"/index"    =>[
    "controller" => "PostControl",
    "action"     => "index"
],
"/"    =>[
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
"/edit"   =>[
    "controller" => "PostControl",
    "action"     => "edit"
],
"/Cdelete"   =>[
    "controller" => "PostControl",
    "action"     => "comDelete"
],
"/delete"   =>[
    "controller" => "PostControl",
    "action"     => "delete"
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