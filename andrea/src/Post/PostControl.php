<?php 
namespace App\Post;
use App\Abstracts\Controller;
class PostControl extends Controller
{
    public function __construct(PostRepo $PostRepo)
    {
        $this->postRepo= $PostRepo;
    }
    public function index()
    {
        $posts = $this->postRepo->getAll();
        $this->render("index",[
            "posts" =>$posts
        ]);
    }
    public function article()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $post = $this->postRepo->getById($id);
            $this->render("article",[
                "post" =>$post
            ]);
        }
        header("Location:index");
    }
}
?>