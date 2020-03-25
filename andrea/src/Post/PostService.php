<?php

namespace App\Post;
use App\Abstracts\Controller;
class PostService extends Controller
{

    public function __construct(PostRepo $postRepo)
    {
        $this->PostRepo = $postRepo;
    }

    public function All()
    {
     return $this->PostRepo->getAll() ;

    }















    public function checkData($data,$image)
    {
            $imgPath= $this->img($image);
           
            if($imgPath){
                $data['img'] = $imgPath;
                $this->PostRepo->insert($data);
                return true;
            }else {
                return false;
            }
          
    }

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
            //path for upload
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