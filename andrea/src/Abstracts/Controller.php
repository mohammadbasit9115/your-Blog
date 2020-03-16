<?php 
namespace App\Abstracts;
abstract class Controller
{
   protected function render($view,$array)
   {
      extract($array);
   include __DIR__ .  "/../../views/{$view}.php";
   
   
   }
}
?>