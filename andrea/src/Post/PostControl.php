<?php 
namespace App\Post;
use App\Abstracts\Controller;
use App\Comment\ComRepo;
class PostControl extends Controller
{
    public function __construct(PostService $postService,ComRepo $comRepo)
    {
        $this->PostService= $postService;
        $this->ComRepo= $comRepo;
    }
            // Fetch All Post
            public function index()
            {
                $posts = $this->PostService->All();
                $this->render("index",[
                    "posts" =>$posts
                ]);
            }
            // Fetch The Post By ID
            public function article()
            {
                 $id = $_GET['id'];   
                          
                if(isset($_POST['comment']))
                {
                    $user_id = $_SESSION['user_id'];
                    $_POST['post_id'] = $id;
                    $this->ComRepo->insertCom($_POST, $user_id);
                }
                $post = $this->PostService->fetchPost($id ); 
                $comments = $this->ComRepo->getById($id);
                $this->render("article",["post" =>$post,"comments"=>$comments]);
               
            }
            //Make New Post
            public function create()
            {
                   if(isset($_SESSION['userName']))
                {
                    $error = '';
                   
                    if(!empty($_POST) AND !empty($_FILES['img']['name'])){
                    
                    if($this->PostService->newPost($_POST,$_FILES))
                    {
                        header("Location: index");
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

            // Edit The Post
            public function edit()
            {
                //Fetch The Post Before Update
                if(isset($_SESSION['userName']))
                {
                    $id = "";
                    if(!empty($_GET)){
                        $id = $_GET['id'];
                        $post = $this->PostService->fetchPost($id);
                         $this->render("Posts/edit",["post"=>$post]);
                    } 
                
                    if($_POST){
                        if($this->PostService->update($_POST,$_FILES) == null)
                        {
                            header("Location: index");
                            exit();
                        }
                        else
                        {
                            $error = $this->PostService->update($_POST,$_FILES);
                            $post = $this->PostService->fetchPost($_POST['id']);
                            $this->render("Posts/edit",["post"=>$post,"error"=>$error]);
                        }
                    }
                }else
                {
                   $this->article();
                }
            }

            public function delete()
            {
                if(isset($_SESSION['userName']))
                {
                $id = $_GET['id'];
                 if($this->PostService->remove($id)){
                    $this->ComRepo->delPostComment($id);
                        header("Location: index");
                    } else
                    {
                        $this->article();
                    }
                }
                else
                {
                    $this->article();
                }
            }
            public function comDelete()
            {
                if(isset($_SESSION['userName']))
                {
                $id = $_GET['id'];
                $comments = $this->ComRepo->getCommentById($id);
                $idPost = $comments[0]->post_id;
             
                $this->ComRepo->delete($id);
                header('Location:article?id=' . $idPost);  
               
                }
                else
                {
                    $this->article();
                }  
            }
        
    
}
?>