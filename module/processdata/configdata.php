

<?php 
/*
* class config connect database
*property string $server
*property string $name
*property string $pass
*property string $database
*@return string
*/
class configdata
  {
    private $server="127.0.0.1";
    private $name="root";
    private $pass="";
    private $database="new";
    // get server
    public function getserver()
    {
      return $this->server;
    }
     // get name
    public function getname()
    {
      return $this->name;
    }
    //get password
    public function getpass()
    {
      return $this->pass;
    }
    //get database
    public function getdatabase()
    {
      return $this->database;
    }
  }
 ?>