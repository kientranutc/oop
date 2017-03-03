<?php 

/*
*property string $conn
*property string $result
*process connect and data
*/
require('configdata.php');

class processdatabase extends configdata
{  
	 private $conn;
	 private $result;
	/*
    *construct connect
	*/ 
	function __construct()
	{  
		$this->conn=mysqli_connect($this->getserver(),$this->getname(),$this->getpass(),$this->getdatabase()) or die("lỗi kết nối");
	  
		mysqli_set_charset($this->conn,"utf8");
	}

   /*
    * perform query
    *@param string $sql
    *@return true or false
    */
	public function query($sql)
	{
		if($this->conn)
		{
		
			$this->result=mysqli_query($this->conn,$sql);
			return $this->result;
	   }
	}
	/*
     * count record table 
     * @return integer
	*/
	public function numrows()
	{
		if($this->result)
		{
			$data=mysqli_num_rows($this->result);
			return $data;
		}
	}
     /*
      * get one record table
      *@return array
     */
	public function fetch()
	{
		if($this->result)
		{
			$data=mysqli_fetch_array($this->result);
			return $data;

		}
		
	}
	/*
      * get one or more record table
      *@return array
     */
	public function fetchall()
	{
		 $arr=array();
		if($this->result)
		{
			while ($row=mysqli_fetch_array($this->result)) {
				$arr[]=$row;
			}
			return $arr;
		}
		
	}

}

 ?>
