<?php
namespace App\Comment;
use App\Abstracts\Repository;
use PDO;
class ComRepo extends Repository
{
    public function table()
    {
        return "comments";
    }
    public function model()
    {
        return "App\\Comment\\ComModel";
    }
    public function insertCom($data,$user_id)
    {
        $table = $this->table();
        $model = $this->model();
        $stmt = $this->pdo->prepare("INSERT INTO $table (`comment`,`post_id`,`user_id`) VALUES (:comment,:post_id,:user_id)");
        $stmt->execute(['comment'=>$data['comment'],"post_id"=>$data['post_id'],"user_id"=>$user_id]);
    }
    public function getById($id)
    {
        $table = $this->table();
        $model = $this->model();  
        $stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `post_id`= :id");
        $stmt->execute(["id"=>$id]);
       $data = $stmt->fetchAll(PDO::FETCH_CLASS);
       return $data;
    }
    public function getCommentById($id)
    {
        $table = $this->table();
        $model = $this->model();  
        $stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `id`= :id");
        $stmt->execute(["id"=>$id]);
       $data = $stmt->fetchAll(PDO::FETCH_CLASS);
       return $data;
    }
    public function delPostComment($id)
    {
        $table = $this->table();
        $model = $this->model(); 
        $stmt = $this->pdo->prepare("DELETE FROM `$table` WHERE `post_id`=:id");
        $stmt->execute(['id'=>$id]);
        
    }
}

?>