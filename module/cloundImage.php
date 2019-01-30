<?php
    require_once './vendor/autoload.php';
    require_once './config/cloudinary.config.php';

   class CloundImage {
       public function upLoadImageByRemote(string $imgUrl,string $tagname) {
           $img_path = \Cloudinary\Uploader::upload(
               $imgUrl,
               array('tags' => $tagname)
           );
           return $img_path;
       }
   }
?>