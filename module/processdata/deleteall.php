<?php 
/*
* delete record is checked and update new_count=new_count-1 cateogries
*@param array
*@param integer
*@return true or false
*/
session_start();
require('news.php');

$news=new news();
if(isset($_POST['selection'])&& isset($_POST['cat']))
{
	$arr=$_POST['selection'];
	$arrcat=$_POST['cat'];
    $news->deleteall($arr); 
   $news->updatecat($arrcat);

    $_SESSION['delete_success']="Delete successfull";
   header("location:../../index.php?view=listnews");
   

   
}
 ?>
