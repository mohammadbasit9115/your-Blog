<?php 
namespace App\Post;
use App\Abstracts\Repository;
class PostRepo extends Repository
{
    public function table()
    {
        return "Posts";
    }
    public function model()
    {
        return "App\\Post\\PostModel";
    }
}
?>