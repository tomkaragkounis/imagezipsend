<?php
   if(isset($_FILES['image'])){
      $order_id = $_POST['order_id'];
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 100000000000000){
         $errors[]='File size must be excately 2 MB';
      }
      
      
     # Location
     $location = "print/".$order_id;

     # create directory if not exists in upload/ directory
     if(!is_dir($location)){
       mkdir($location, 0755);
     }

     $location .= "/".$filename;
      
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,$location.$file_name);
         
 
         echo "Success";
      }else{
         print_r($errors);
      }
   }
   
include 'zipfiles.php';
include 'moveftp.php';   
   
?>