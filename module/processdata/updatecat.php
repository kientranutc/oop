<?php 
/*
* update field is_public table categories
*/ 
require('categories.php');
$cat=new categories();
if(isset($_POST['id']) && isset($_POST['ispublic']))
{
	$id=$_POST['id'];
	$ispublic=$_POST['ispublic'];
   $arr=array('is_public'=>$ispublic);
   if($cat->updatecat($id,$arr))
   {
    $_SESSION['updatecat']="update category successfull !";
   }

}



 ?>