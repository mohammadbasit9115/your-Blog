<?php
namespace App\Comment;
use App\Abstracts\Controller;

class ComControl extends Controller
{
public function __construct(ComRepo $comRepo)
{
    $this->ComRepo= $comRepo;
}
    public function delete()
    {
        if(isset($_POST['id']))
        {
            
        }
    }


}
?>