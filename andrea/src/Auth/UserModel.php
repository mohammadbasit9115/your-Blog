<?php
namespace App\Auth;

use App\Abstracts\Model;

class UserModel extends Model
{
   public $id;
   public $username;
   public $firstname;
   public $lastname;
   public $email;
   public $password;

}
?>