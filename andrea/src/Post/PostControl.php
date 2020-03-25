<?php 
namespace App\Post;
use App\Abstracts\Controller;
class PostControl extends Controller
{
    public function __construct(PostService $postService)
    {
        $this->PostService= $postService;
    }
       public function index()
    {
        $posts = $this->PostService->All();
        $this->render("index",[
            "posts" =>$posts
        ]);
    }
 public function article()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $post = $this->PostService->getById($id);
            $this->render("article",[
                "post" =>$post
            ]);
        }
        header("Location:index");
    }
    public function create()
    {
        if(isset($_SESSION['userName']))
        {
            $error = '';
            if(!empty($_POST) AND !empty($_FILES)){
               
              if($this->PostService->checkData($_POST,$_FILES))
               {
                  header("Location:index");
                   exit();
               }else{
               $error = "the image should be png,jpg and jpeg and the max size is 500*1024 and don't have a error.";
            }
            }
            $this->render("Posts/insert",["error"=>$error]);
        }else{
            header("Location: singup");
        }
       
         
     }
       
        
    
}
?>