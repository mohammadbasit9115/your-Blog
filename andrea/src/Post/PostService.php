<?php

namespace App\Post;
use App\Abstracts\Controller;
use App\Auth\UserRepo;

class PostService extends Controller
{

    public function __construct(PostRepo $postRepo,UserRepo $userRepo)
    {
        $this->PostRepo = $postRepo;
        $this->UserRepo = $userRepo;
        
    }

     // Fetch All Post
    public function All()
    {
    return $this->PostRepo->getAll() ;
    }

    //Fetch a Post By ID
    public function fetchPost($id)
    {
        if($this->PostRepo->getById($id))
        {
           return $this->PostRepo->getById($id);
            
        }else
        {
            return false;
        }
    }
    //Make New Post.
    public function newPost($data,$image)
    {
            //Pass The Image And Take The Image Path
            $imgPath= $this->img($image);
            //Check The Image Path And Set It in The Data Post.
            if($imgPath){
                $data['img'] = $imgPath;
                //Insert The New Post With Image Path
                $data['user_id']=$_SESSION['user_id'];
                $this->PostRepo->insert($data);
                return true;
            }
            else {
                return false;
            }
          
    }









    //Edit The Post
    public function update($data,$image)
    {
        $error= "";
        if(!empty($image['img']['name']) )
        {
            $image = $this->img($_FILES);
            if($image)
            {
                $data['img'] = $image;
            }
            else
            {
            $error = "the image should be png,jpg and jpeg and the max size is 500*1024 and don't have a error.";
            } 
        }
        else
        {
           $image = $data['img'];
        }
 
        //Set The New Data
        if(!empty($data['title']) AND !empty($data['content'])){
            $id = $data['id'];
            $this->PostRepo->update($id,$data);
        }
        else{
            $error = "you Should not leave the fields  empty."; 
        }

        if(!empty($error))
        {
            return $error;
        }
    }

    public function remove($id)
    {
        if($this->PostRepo->delete($id) == null){
            return true;
        }
        else
        {
            return false;
        }
    }




    //Upload The New Image And Check it.
    public function img($data)
    {
     
        $uploadDir = "C:/wamp64/www/your-Blog/andrea/views/img/";
        $filename  = pathinfo($data['img']['name'],PATHINFO_FILENAME);
        $extension = strtolower(pathinfo($data['img']['name'],PATHINFO_EXTENSION));

        ///////////////
        $image = '';
        $allowedExtens = ['png','jpg','jpeg'];
        $maxSize = 500*1024;//500kb

        if(!in_array($extension,$allowedExtens)) //check the Image
        {
            $image =  "the image falch";
        }
        if($data['img']['size'] >= $maxSize)
        {
            $image = "size";
        }
        if(function_exists('exif_imagetype'))//check the image if it has erorr 
        {
            $allowedImage = [IMAGETYPE_PNG, IMAGETYPE_JPEG];       
            $detectedImage = exif_imagetype($data['img']['tmp_name']);
            if(!in_array($detectedImage,$allowedImage))
            {
                $image = "error image";
            }
        }
       if($image === ""){
            //new path for upload
            $date = date("S j m Y",time()) ;
            $newDate = str_replace(" ","",$date);
            $newPath = $uploadDir . $filename . $newDate . '.' . $extension;
            $image = $newPath;
           move_uploaded_file($data['img']['tmp_name'],$newPath);
           return $newPath;
       }else{
           return false;
       } 
       
    }
}

?>