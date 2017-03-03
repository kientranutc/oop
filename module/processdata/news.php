<?php 
/*
* class proccess table news
*property string table;
*/
require('processdatabase.php');
class news extends processdatabase
{
	private $table="news";


   /*
   * insert data table news
   *@param array $arr
   * return true or false
   */ 
	public function insertnews($arr)
	{ 
		 $keys="";
         $values="";
		$sql="INSERT INTO ".$this->table."(";
			foreach ($arr as $key => $value) {
				$keys.=$key.",";
				$values.="'".$value."',";
			}
			$values=trim($values,",");
			$keys=trim($keys,",");

			$sqlinsert=$sql.$keys.") VALUES (".$values.")";
         
             return $this->query($sqlinsert);
	}
   /*
   * delete one  record table "news"
   * @param interger id
   * @return true or false
   */
	public function delnews($id)
	{
		$sql="DELETE FROM ".$this->table." WHERE id = ".$id;
		
		if($this->query($sql))
       {

       	return true;
       }
       else
       {
       	return false;
       }

	}

   /*
   * delete one or more record table "news"
   * @param array 
   * @return true or false
   */
	public function deleteall($arr)
	{  
		if(!empty($arr))
		{
		foreach ($arr as $key => $value) {
			$sql="DELETE FROM ".$this->table." WHERE id = ".$value;

			 $this->query($sql);
		}
	   }

	}
	 /*
   * update data table news
   @param integer $id
   *@param array $arr
   * return true or false
   */ 
	public function updatenews($id,$arr)
	{
		$sql="UPDATE ".$this->table." SET ";
     foreach ($arr as $key => $value) {
			$sql.=$key."= '".$value."',";
		}  
		$sql=trim($sql,","); 
		$sql.=" WHERE id = ".$id;

		$updatesql=$sql;
		
		if($this->query($updatesql))
       {
       	return true;
       }
       else
       {
       	return false;
       }

	}
     /*update new_count table categories
      *@param string $sql
      *@return true or false
      */ 
	public function updatenewcount($sql)
	{
	   if($this->query($sql))
       {
       	return true;
       }
       else
       {
       	return false;
       }
	}
    /* get one record table news
     * @param integer $id
     * return array
     */ 
	public function getid($id)
	{
		$sql="select * from ".$this->table." WHERE id =".$id;
    	if($this->query($sql))
    	{
          return  $this->fetch();
    	}
	}
	 /* get record table news id <> id current
     * @param integer $id
     * return array
     */ 
	public function getnewcat($cat, $id)
	{
		$sql="select * from ".$this->table." WHERE cate_id =".$cat." and id <> ".$id;

    	if($this->query($sql))
    	{
          return  $this->fetchall();
    	}
	}
	/*check name exits 
	 *@param string $name
     *@return integer
	 */ 
	 public function getnumrows($name)
	 {
	 	$sql="select * from ".$this->table." WHERE title = '$name'";
    	if($this->query($sql))
    	{
          return  $this->numrows();
    	}
	 }

	 public function countrow()
	 {

	 	$sql="select * from ".$this->table;
    	if($this->query($sql))
    	{
          return  $this->numrows();
    	}
	 }

	 /*
     * function count record table "news"
     * @return number
	 */
	 public function countsearch()
	 {
	 	  $names=isset($_POST['name'])?$_POST['name']:"";
	 	  $_SESSION['name']=$names;
       $name=$_SESSION['name'];
	 	if($name!="")
	 	{
	 	$sql="select * from ".$this->table." WHERE title like '%$name%'";
    	if($this->query($sql))
    	{
          return  $this->numrows();
    	}
       }
       else
       {
       	$sql="select * from ".$this->table;
    	if($this->query($sql))
    	{
          return  $this->numrows();
    	}
       }
	 }

	 /*
	 *update field new_count+1 table "categories"
     *@param array $arr
     *@return  true or false
	 */
	 public function updatecat($arr)
	 {
	 	if(!empty($arr))
	 	{
	 		foreach ($arr as $key => $value) {
	 			 $sql="UPDATE categories SET new_count=new_count-1 WHERE id =".$value;
	 			return $this->query($sql);
	 		}
	 	}
	 }

   /*
    * get all data and search data news 
    */ 
     public function getsearch($start,$limit)
    {   

        $names=isset($_POST['name'])?$_POST['name']:"";
 
       $_SESSION['name']=$names;
       $name=$_SESSION['name'];
    	if($name!="")
      {
    	$sql="SELECT ar.id ,ar.title,ar.cate_id,ct.name,ar.sapo,ar.is_hot,ar.is_public, ar.image, ar.created_at ,ar.updated_at FROM news ar, categories ct WHERE ct.id=ar.cate_id and ar.title like '%$name%' order by ar.id DESC LIMIT ".$start.",".$limit;
    	if($this->query($sql))
    	{
    		
          return  $this->fetchall();
    	}
    }
    else
    {
      $sql="SELECT ar.id ,ar.title,ar.cate_id,ct.name,ar.sapo,ar.is_hot,ar.is_public, ar.image, ar.created_at ,ar.updated_at FROM news ar, categories ct WHERE ct.id=ar.cate_id  order by ar.id DESC LIMIT ".$start.",".$limit;
    	if($this->query($sql))
    	{
    		
          return  $this->fetchall();
    	}	
    }
    }
    
    
	

}



 ?>