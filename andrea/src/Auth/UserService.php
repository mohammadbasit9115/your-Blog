<?php
namespace App\Auth;

use App\Abstracts\Controller;

class UserService extends Controller
{
    public function __construct(UserRepo $userRepo)
    {
        $this->UserRepo = $userRepo;
    }
    public function newUser($data)
    {
        $error= '';
        if($data['email'] !== $data['conemail']){
            $error = "the Email is incorrect.";
        }
        if($data['password'] !== $data['conpassword']){
            $error = "the password is incorrect.";
        }
        if($error == ""){
            $password = $data['password'];
            $password =  password_hash($password,PASSWORD_DEFAULT);
            $data['password'] = $password;
            $this->UserRepo->register($data);
           
            $_SESSION['userName']=$data['username'];
            session_regenerate_id(true);
            return true;
        }else{
            return false;
        } 
    }      

    public function fetchUser($data)
    {
        if(isset($data['userData']) && isset($data['password']))
        {
            $userData = $data['userData'];
           $user= $this->UserRepo->login($userData);
            $password = $data['password'];
            if(password_verify($password,$user['password']))
            {
             $_SESSION['userName']=$user['username'];
             session_regenerate_id(true);
             return true;
            }else
            {
                return false;
            }
        }else
        {
            return false;
        }
    }

    public function unset()
    {
        session_unset();
        session_regenerate_id(true);
    }
     
  
}
?>