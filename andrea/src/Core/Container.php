<?php 
namespace App\Core;
use PDO;
use PDOException;
use App\Post\PostControl;
use App\Post\PostRepo;


use App\Auth\UserControl;
use App\Auth\UserRepo;
class Container
{
public $instans=[];
public  $receipts=[];
public function __construct()
{
   
    $this->receipts=[
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
        },
        "PostControl" => function(){
            return new PostControl(
               $this->make("PostRepo")
            );
        },
        "PostRepo"    => function(){
            return new PostRepo(
            $this->make("pdo")
            );
        }
        ,
        "pdo" =>  function(){
            try{
                $pdo = new PDO("mysql:dbname=andrea;host=localhost",'root','');
                   
            }catch(PDOException $e){
                echo "this is the problem" . $e;
                die;
            }
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $pdo;
        }
    ];
}
public function make($instan)
{
 if(!empty($this->instans[$instan])){
    return $this->instans[$instan];
}
if(isset($this->receipts[$instan])){
    $this->instans[$instan] = $this->receipts[$instan]();
}
return $this->instans[$instan];
}
}

    ?>