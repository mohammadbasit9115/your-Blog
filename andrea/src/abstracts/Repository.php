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
    public function getbyId($id)
    {

    }
    public function update($id,$data)
    {

    }
    public function delete($id)
    {
        
    }

}
?>