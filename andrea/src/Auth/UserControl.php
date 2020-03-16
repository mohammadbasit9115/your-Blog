<?php
namespace App\Auth;

use App\Abstracts\Controller;

class UserControl extends Controller
{
    public function __construct(UserRepo $userRepo)
    {
        $this->UserRepo = $userRepo;
    }
    public function regis()
    {
        if(!empty($_POST))
        {
           
           if(($_POST['email'] === $_POST['conemail']) AND ($_POST['password'] === $_POST['conpassword'])){
                $password = $_POST['password'];
                $password =  password_hash($password,PASSWORD_DEFAULT);

                $data = $_POST;
                $data['password'] = $password;
                $this->UserRepo->register($data);
                header("Location:index");
                die();
            }else{
                $this->render("userControl/singup",[]);
            }
           
        }
        $this->render("userControl/singup",[]);
    }
}
?>
