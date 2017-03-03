<?php 
/*
*@param string $name;
*@return integer
*/
require('../categories.php');
$cat=new categories();
if(isset($_POST['name']))
{
	$name=$_POST['name'];
     if($cat->getnumrows($name)>0)
   {
   	echo 1;
    }
   else
   {
   	echo  0;
   }

}
 ?>
