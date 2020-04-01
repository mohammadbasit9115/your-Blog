<?php 
namespace App\Core;
use PDO;
use PDOException;
use App\Abstracts\Container;
use App\Post\PostControl;
use App\Post\PostRepo;
use App\Post\PostService;
use App\Comment\ComRepo;
use App\Comment\ComControl;
use App\Auth\UserControl;
use App\Auth\UserModel;
use App\Auth\UserService;
use App\Auth\UserRepo;
class Container1 extends Container
{
    public $instances=[];
    public $receipts=[];
    public function __construct()
    {
$this->receipts=[

        "ComControl" => function(){
                return new ComControl(
                    $this->make('ComRepo')
                );
            },
        "ComRepo" => function(){
                return new ComRepo(
                    $this->make('pdo')
                );
            },
            "PostControl" => function(){
                return new PostControl(
                    $this->make("PostService"),
                    $this->make("ComRepo")
                );
            },
            "PostService" => function(){
                return new PostService(
                    $this->make('PostRepo'),
                    $this->make("UserRepo")
                );
            },
            "PostRepo" => function(){
                return new PostRepo(
                $this->make("pdo")
                );
            },"UserControl" => function(){
                return new UserControl(
                    $this->make("UserService")
                );
            },
            "UserService" => function(){
                return new UserService(
                    $this->make("UserRepo")
                );
            },   

            "UserRepo" => function(){
                return new UserRepo(
                    $this->make("pdo")
                );
            },"pdo" => function(){
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

}

    ?>