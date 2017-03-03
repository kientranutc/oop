  <?php 
  /*
insert data  table news
*/
  session_start();
  require('news.php');

  $news=new news();
  date_default_timezone_set("Asia/Ho_Chi_Minh");
      $arrishot=$_POST['ishot'];
      $ishotstring="";
      foreach ($arrishot as $key => $value) {
        $ishotstring.=$value.",";
      }
      $ishotstring=trim($ishotstring,",");
      $title=isset($_POST['title'])?$_POST['title']:"";
      $image=isset($_POST['image'])?$_POST['image']:"";
      $img=str_replace("http://".$_SERVER['HTTP_HOST'], "", $image);
      $cat=isset($_POST['cat'])?$_POST['cat']:"";
      $sapo=isset($_POST['sapo'])?$_POST['sapo']:"";
      $content=isset($_POST['content'])?$_POST['content']:"";
      $tag=isset($_POST['tag'])?$_POST['tag']:"";
      $ispublic=isset($_POST['is_public'])?$_POST['is_public']:"";
      $create_at=date("Y-m-d h:i:s");


  $arr=array("title"=>$title,"cate_id"=>$cat,"image"=>$img,"sapo"=>$sapo,"content"=>$content,"tag"=>$tag,"is_public"=>$ispublic
   ,"is_hot"=>$ishotstring,"created_at"=>$create_at);
  $num=$news->getnumrows($title);

  if($num>0)
  {
    $_SESSION['exists_name']="exists name";
    header("location:../../index.php?view=formnews");

  }
  else
  {

   if($news->insertnews($arr))
   {
    $sql="UPDATE categories SET new_count= new_count+1 WHERE id =".$cat;
    $news->updatenewcount($sql);
    $_SESSION['success_cat']="insert successfull";
    header("location:../../index.php?view=listnews");

  }
  else
  {
    $_SESSION['error_cat']="error insert ";
    header("location:../../index.php?view=listnews");
  }

  }




  ?>