<?php 
namespace App\Abstracts;
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
    public function update($id,$data)
    {
        $table = $this->table();
        $model = $this->model();  

    }
    
    public function delete($id)
    {
        $table = $this->table();
        $model = $this->model();  
        
    }

}
?>