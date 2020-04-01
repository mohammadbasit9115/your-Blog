<?php
namespace App\Auth;
use PDO;

use App\Abstracts\Repository;

class UserRepo extends Repository
{
   
    public function table()
    {
        return "Users";
    }
    public function model()
    {
        return "App\\Auth\\UserModel";
    } 

    public function register($data)
    {
        $table = $this->table();
        $model = $this->model();
        $stmt = $this->pdo->prepare("INSERT INTO $table 
        ( `username`, `firstname`, `lastname`,`email`,`password`)
        VALUES 
        ( :username, :firstname, :lastname,:email,:password)");
        $stmt->execute(['username'=>$data['username'],"firstname"=>$data['firstname'],'lastname'=>$data['lastname'], "email"=>$data['email'] , "password"=>$data['password']]);
        $user = $this->login($data['email']);
        return $user;
    }
    public function login($userData)
    {
        $table = $this->table();
        $model = $this->model();
        $stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `username` = :username OR `email` = :email");
        $stmt->execute(["username"=>$userData,"email"=>$userData]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,$model);
        $user = $stmt->fetch(PDO::FETCH_CLASS);
        return $user;
    }
  
}
?>