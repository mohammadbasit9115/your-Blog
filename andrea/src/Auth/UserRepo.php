<?php
namespace App\Auth;

use App\Abstracts\Repository;

class UserRepo extends Repository
{
    public function table()
    {
        return "Users";
    }
    public function model()
    {
        return "App\\Auth\UserModel";
    } 

    public function register($data)
    {
        $table = $this->table();
        $stmt = $this->pdo->prepare("INSERT INTO $table 
        ( `username`, `firstname`, `lastname`,`email`,`password`)
        VALUES 
        ( :username, :firstname, :lastname,:email,:password)");
        $stmt->execute(['username'=>$data['username'],"firstname"=>$data['firstname'],'lastname'=>$data['lastname'], "email"=>$data['email'] , "password"=>$data['password']]);
    }
}
?>