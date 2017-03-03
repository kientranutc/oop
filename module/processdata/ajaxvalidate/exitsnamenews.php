<?php 
/*
*@param string $name;
*@return integer
*/
require('../news.php');
$news=new news();
if(isset($_POST['name']))
{
	$name=$_POST['name'];
    if($news->getnumrows($name)>0)
   {
   	echo 1;
    }
   else
   {
   	echo  0;
   } 
}
 ?>
