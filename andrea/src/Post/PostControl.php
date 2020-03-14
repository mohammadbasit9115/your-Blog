<?php 
namespace App\Post;
use App\Abstracts\Controller;
class PostControl extends Controller
{
    public function __construct(PostRepo $postRepo)
    {
        $this->postRepo= $postRepo;
    }
    public function index()
    {
        $posts = $this->postRepo->getAll();
        $this->render("index",[
            "posts" =>$posts
        ]);
    }
}
?>