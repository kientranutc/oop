<?php 
/*
*update record table news
*/ 
session_start();
require('news.php');
$news=new news();
date_default_timezone_set("Asia/Ho_Chi_Minh");

   $idnews=$_POST['idnews'];
    $title=isset($_POST['title'])?$_POST['title']:"";
    $image=isset($_POST['image'])?$_POST['image']:"";
    $img=str_replace("http://".$_SERVER['HTTP_HOST'], "", $image);
   
    $sapo=isset($_POST['sapo'])?$_POST['sapo']:"";
    $content=isset($_POST['content'])?$_POST['content']:"";
    $tag=isset($_POST['tag'])?$_POST['tag']:"";
    $ispublic=isset($_POST['is_public'])?$_POST['is_public']:"";
    $ishot=isset($_POST['ishot'])?$_POST['ishot']:"";
     
    $updated_at=date("Y-m-d h:i:s");

     $arrishot=$_POST['ishot'];
   $ishotstring="";
   foreach ($arrishot as $key => $value) {
        $ishotstring.=$value.",";
   }
  $ishotstring=trim($ishotstring,",");


    $arr=array("title"=>$title,"image"=>$img,"sapo"=>$sapo,"content"=>$content,"tag"=>$tag,"is_public"=>$ispublic
    	,"is_hot"=> $ishotstring,"updated_at"=>$updated_at);
   if($news->updatenews($idnews,$arr))
   {
    
    $_SESSION['success_cat']="update successfull";
   header("location:../../index.php?view=listnews&idnews=".$idnews);
   
   }
   else
   {
    $_SESSION['error_cat']="error update ";
   header("location:../../index.php?view=listnews&idnews=".$idnews);
   }



 

 ?>