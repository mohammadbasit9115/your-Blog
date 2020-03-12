<?php 
namespace App\Post;
use App\Abstracts\Controller;
class PostControl extends Controller
{
    public function index()
    {
        $this->render("index",[]);
    }
}
?>