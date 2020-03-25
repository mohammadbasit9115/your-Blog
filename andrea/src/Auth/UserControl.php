<?php
namespace App\Auth;

use App\Abstracts\Controller;

class UserControl extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->UserService = $userService;
    }

   
    public function regis()
    {
        if(!isset($_SESSION['userName'])){
            if(!empty($_POST))
            {
               
             if($this->UserService->newUser($_POST))
             {
    
                 header("Location:index");
                 exit();
             }
             else
             {
                 echo "the email or password incorrect.";
             }
            }
            $this->render("userControl/singup",[]);
        }else{
            header("Location:index");
            exit();
        }
    }
    public function login()
    {
        $error = '';
        if(!isset($_SESSION['userName']))
        {
            if(!empty($_POST))
            {
                if($this->UserService->fetchUser($_POST))
                {
                    header('Location: index');
                    exit();
                }else{
                    $error = "The User Name, The Email or Password is incorrect.";
                }
            }
        }else{
            header("Location: index");
        }
        $this->render("userControl/login",["error"=>$error]);
    }
    public function logOut()
    {
        $this->UserService->unset();
        header("Location: index");
        exit();
    }
}
?>
