<?php 
namespace App\Post;
use App\Abstracts\Repository;
class PostRepo extends Repository
{
    public function table()
    {
        return "posts";
    }
    public function model()
    {
        return "App\\Post\\PostModel";
    }
    public function insert($data)
    {
        $table = $this->table();
        $model = $this->model();
        $stmt=$this->pdo->prepare(
            "INSERT INTO $table 
            ( `title`, `content`, `img`)
            VALUES 
            ( :title, :content, :img)");
            $stmt->execute([":title"=>$data['title'],"content"=>$data['content'],"img"=>$data['img']]);
    }
}
?>