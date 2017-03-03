<?php 

/*
insert data  table categories
*/
session_start();
require('convertword.php');
require('categories.php');
$convert=new convertword();
$cat=new categories();
date_default_timezone_set("Asia/Ho_Chi_Minh");

   $name=isset($_POST['name'])?$_POST['name']:"";
   $parent=isset($_POST['parent'])?$_POST['parent']:"";
   $name_seo=$convert->word($_POST['name']);
   $keyword_seo=$convert->word($_POST['name']);
   $description=isset($_POST['description'])?$_POST['description']:"";
    $is_public=isset($_POST['ispublic'])?$_POST['ispublicss']:"";
    $create_at=date("Y-m-d h:i:s");
    $newcount=0;
    $parent_id=0;
    if( $parent=="")
    {
    	  $parent_id=0;
    }
    else
    {
    	   $parent_id=$parent;
    }
   $arr=array("name"=>$name,"parent_id"=>$parent_id,"new_count"=>$newcount,"name_seo"=>$name_seo,"keyword_seo"=>$keyword_seo,"decription"=>$description,"is_public"=>$is_public,"created_at"=>$create_at);
   
   $num=$cat->getnumrows($name);
  
    if($num>0)
    {
      $_SESSION['exists_name']="exists name";
    header("location:../../index.php?view=formcat");
     
    }
    else
    {
   if($cat->insertcat($arr))
   {    
    $_SESSION['success_cat']="insert successfull";
   header("location:../../index.php?view=listcat");
   
   }
   else
   {
    $_SESSION['error_cat']="error insert ";
   header("location:../../index.php?view=listcat");
   }
   
   }
 ?>