

<?php 
/*
*delete categories
*@param integer $parent_id
*@param integer $idcat;
*return true or false
*/
session_start();
require('categories.php');
$cat=new categories();
$idcat=$_POST['idcat'];
$parent=$_POST['parent'];
if($parent==0)
{     
	  $arrsub=$cat->getsubcat($idcat);
	   foreach ($arrsub as $key => $value) {
       $cat->deletenews($value['id']);
       }
        $cat->deletenews($idcat);  
        $cat->delparent($idcat);
     	$cat->delcat($idcat);
}
else
{
        $cat->deletenews($idcat);
     	$cat->delcat($idcat);
     
}

 ?>