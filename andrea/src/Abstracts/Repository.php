<?php 
namespace App\Abstracts;

use App\Post\PostModel;
use PDO;
abstract class Repository
{
    protected $pdo;
    abstract function table();
    abstract function model();
    public function __construct(PDO $pdo)
    {
        $this->pdo= $pdo;
    }
    public function getAll()
    {
        $table = $this->table();
        $model = $this->model();
        $stmt = $this->pdo->query("SELECT * FROM `$table`");
        $all = $stmt->fetchAll(PDO::FETCH_CLASS,$model);
        return $all;
    }
    public function getById($id)
    {
        $table = $this->table();
        $model = $this->model();  
        $stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `id`= :id");
        $stmt->execute(["id"=>$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $model);
       $data = $stmt->fetch(PDO::FETCH_CLASS);
       return $data;
    }
    
    public function update($id,$data)
    {
        $table = $this->table();
        $model = $this->model();  
        $stmt = $this->pdo->prepare("UPDATE `$table` SET `title`= :title , `content`=:content , `img`=:img WHERE `id`=:id");
        $stmt->execute(['title'=>$data['title'],'content'=>$data['content'],"img"=>$data['img'],'id'=>$id]);

    }
    
    public function delete($id)
    {
        $table = $this->table();
        $model = $this->model(); 
        $stmt = $this->pdo->prepare("DELETE FROM `$table` WHERE `id`=:id");
        $stmt->execute(['id'=>$id]);
        
    }
  

}
?>