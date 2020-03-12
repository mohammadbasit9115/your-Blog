<?php 
namespace App\Abstracts;
abstract class Controller
{
   public function render($view,$array)
   {
   include (__DIR__ .  "/../../views/{$view}.php");
    extract($array);
    
   }
}
?>