<?php
namespace App\Core;

use App\Auth\UserControl;
use App\Auth\UserRepo;
class Container2 extends Container
{
    public $instans=[];
    public function __construct()
    {
        
        $this->receipts = [
            "UserControl" => function(){
                return new UserControl(
                    $this->make("UserRepo")
                );
            }
            ,
            "UserRepo" => function(){
                return new UserRepo(
                    $this->make("pdo")
                );
            }

        ];
    }
  
       
}
?>