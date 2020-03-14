<?php 
namespace App\Post;
use App\Abstracts\model;
class PostModel extends model
{
    public $id;
    public $title;
    public $content;
    public $img;
    public $time;
    public $update;
    public $delete;
    public $delete_time;
    
}
?>