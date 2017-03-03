<?php 
/*
* class proccess table categories
*property string table;
*/
require('processdatabase.php');
class categories extends processdatabase
{
	private $table="categories";
  


  /*
  *insert data  table categories
  *@param array $arr
  *@return true or false
  */
	public function insertcat($arr)
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
  *delet data  table categories
  *@param interger $id
  *@return true or false
  */
	public function delcat($id)
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
  *delete  parent_id  table categories
  *@param interger parent
  *@return true or false
  */
  public function delparent($id)
  {
    $sql="DELETE FROM ".$this->table." WHERE parent_id = ".$id;
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
  update data table categories
  *@param interger $id
  *@param array $arr
  *@return true or false
  */
	public function updatecat($id,$arr)
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
  /*
  *check name exits
  *@param string $name
  *@return integer
  */
	 public function getnumrows($name)
	 {
	 	$sql="select * from ".$this->table." WHERE name = '$name'";
    	if($this->query($sql))
    	{
          return  $this->numrows();
    	}
	 }
    
  /*
  * count record table categories
  *@return integer
  */
   public function countrow()
   {
      $sql="select * from ".$this->table;
      if($this->query($sql))
      {
          return  $this->numrows();
      }
   }
   /*
   *show parent_id table categories
   *@param integer $id
   *@return array 
   */
   public function getsubcat($id)
   {
      $sql="SELECT * FROM ".$this->table."WHERE parent_id=".$id;

      if($this->query($sql))
      {
          return  $this->fetchall();
      }
   }
     /*
     *get data limit start, limit table categories
     *@param integer $start
     *@param intege $limit
     *@return array
     */
    public function getall($start,$limit)
    {
    	$sql="SELECT * FROM ".$this->table.' LIMIT '.$start.",".$limit;

    	if($this->query($sql))
    	{      
          return  $this->fetchall();
    	}
    }
    /*
     *get all data  status is public table categories
     *@return array
     */
    public function getallpublic()
    {
      $sql="select * from ".$this->table." WHERE is_public=0";

      if($this->query($sql))
      {
          return  $this->fetchall();
      }
    }
    /*
    * delete record table news
    *@param integer $id
    *@return true or false
    */
  function deletenews($id)
  {
    $sql="DELETE FORM news WHERE cate_id=".$id;

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
    * show multi dropdownlist table categoris
    *@param array
    *@param integer $parent_id
    *@param string $char
    *@return string;
    */
	function showCategories($categories, $parent_id = 0, $char = '')
    {
    foreach ($categories as $key => $item)
    { 
      
          
        if ($item['parent_id'] == $parent_id)
        {
            echo '<option  value="'.$item['id'].'">';
                echo $char . $item['name'];
            echo '</option>';
          self::showCategories($categories, $item['id'], $char.'--');
        }
     
    }
  }

  
     /*
    * show multi table from table categoris if is_public is private
    * ,color row is red , unless color row is default
    *@param array
    *@param integer $parent_id
    *@param string $char
    *@return string;
    */
function showlistcat($categories, $parent_id = 0, $char = '')
    {
    foreach ($categories as $key => $item)
    {
        if ($item['parent_id'] == $parent_id)
        {
           ?>

           <tr <?php if($item['is_public']==1){
            echo "style='background:#FB9292;'";
            }  ?>>
           
             <td>
               <?php echo $char . $item['name']; ?>
             </td>
             <td>
               <?php echo $item['parent_id']; ?>
             </td>
             <td>
             <select name="is_public" id="ispublic-<?php echo $item['id']?>" class="form-control"  required>
              <?php 

              $arrispublic =array("0"=>"public","1"=>"private");
              foreach ($arrispublic as $key => $value) {
                $slected="";
                if($key==$item['is_public']){
                  $slected = "selected";
                }
                ?>
                <option <?php echo $slected; ?> value="<?php echo $key ?>"><?php echo $value; ?></option>
                
                <?php
              }
              ?>
              

              
            </select>
             </td>
             <td>
               <?php echo $item['new_count']; ?>
             </td>
             <td>
               <?php echo  $item['created_at']; ?>
             </td>
              
              <td>
             <a href="javascript:void(0)" onclick="deletecat(<?php echo $item['id'] ?>,<?php echo $item['parent_id']; ?> )"><span class="glyphicon glyphicon-trash"></span></a>
             </td>
             <td><a href="javascript:void(0)" onclick="updatecat(<?php echo $item['id']  ?>)"  data-toggle="tooltip" title="sửa bản tin"><span class="glyphicon glyphicon-wrench"></span></a></td>
           </tr>
           <?php

          self::showlistcat($categories, $item['id'], $char.'---');
        }
    }
}
}



 ?>

