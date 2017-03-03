<?php 
/*
*list  news
*/ 
require('module/processdata/news.php');
$new =new news();
?>
<div id="list-news">
    <a href="index.php?view=formnews" class="add">Add news</a>

<div class="row">
    <div class="col-md-3"><h3>List news</h3></div>
    <div class="col-md-4 col-md-offset-5"> 
    <div class="input-group">
    <input type="text" name="search" class="form-control" id="search" placeholder="search..." onkeyup="search(this.value)">
        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
  </div>
    </div>
</div>
    
   
   <br/>
  
  <div id="news-content">
    <?php 
    if(isset($_SESSION['success_cat']))
    {
        ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

            <strong>Success!</strong> <?php echo $_SESSION['success_cat']; ?>
        </div>
        <?php 
        unset($_SESSION['success_cat']);
    } ?>
    

    <?php 
    if(isset($_SESSION['error_cat']))
    {
        ?>
        <div class="alert alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

            <strong>Warning!</strong> <?php echo $_SESSION['error_cat']; ?>
        </div>
        <?php 
        unset($_SESSION['error_cat']);
    } ?>
    <form action="../module/processdata/deleteall.php" method="post" accept-charset="utf-8" onsubmit="return confirm('bạn có muốn xóa không?');">
        <table class="table table-bordered table-hover">
         <thead>
            <tr>
                <th><input type="checkbox" name="selectall" id="selectall"  value=""></th>
                <th>image</th>
                <th>title</th>
                <th>Category</th>
                <th>Sapo</th>
                <th>ishot</th>
                <th>ispublic</th>
                <th>create_at</th>
                <th>updated_at</th>
                <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
         <?php

 //total record table categories
         $total_records =$new->countsearch();

         $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
         $limit = 10;

// total page
         $total_page = ceil($total_records / $limit);
         if ($current_page > $total_page){
          $current_page = $total_page;
      }
      else if ($current_page < 1){
          $current_page = 1;
      }

// $start
      $start = ($current_page - 1) * $limit;

      $arr=$new->getsearch($start,$limit);
      if(!empty($arr))
      {
       foreach ($arr as $key => $value) {

           ?>
           <tr <?php if($value['is_public']==1){
            echo "style='background:#FB9292;'";
        }  ?>>
        <td><input type="checkbox" name="selection[]" value="<?php echo $value['id'];  ?>"></td>
        <input type="hidden" name="cat[]" value="<?php echo $value['cate_id'] ?>">
        <td><img src="<?php echo $value['image']; ?>" height="70px" width="70px" alt=""></td>
        <td><?php echo $value['title']; ?></td>
        <td><?php echo $value['name']; ?></td>
        <td><?php echo $value['sapo']; ?></td>
        <td>
            <?php 
            $ishotarr=explode(",",$value['is_hot'] );
            $showishot="";
            foreach ($ishotarr as $key => $value1) {
              if($value1==0)
              {
               $showishot.="Tin hót |";
           }
           else
           {
            if($value1==1)
            {
             $showishot.="Tin nổi bật | ";
         }
         else 
         {
          $showishot.="Tin hit";
      }
  }
}
echo trim($showishot,"|");

?>
</td>
<td><?php echo ($value['is_public'])?"Private":"Public" ?></td>
<td><?php echo $value['created_at']; ?></td>
<td><?php echo $value['updated_at']; ?></td>
<td><a href="index.php?view=viewnews&id=<?php echo $value['id'];  ?>"><span class="glyphicon glyphicon-eye-open"></span></a></td>
<td><a href="index.php?view=updatenews&idnews=<?php echo $value['id']?>"><span class="glyphicon glyphicon-wrench"></span></a></td>

</tr>
<?php
}}
?>
</tbody>
</table>
<input type="submit" name="deleteall" value="Delete all">
</form>
<div class="row">
    <div class="col-md-3 col-md-offset-4">
     <ul class="pagination" id="paginations">
      <?php 
      if($total_page<=1)
      {

      }
      else
      {
          ?>
          <li <?php if($current_page<2){
             echo "class='disabled'";
         } ?> ><a href="index.php?view=listnews&page=<?php echo ($current_page-1); ?>">&laquo;</a></li>

         <?php 
     }
     for ($i=0; $i < $total_page; $i++) { 
        if($total_page==1)
        {
        }
        else
        {
         ?>
         <li><a <?php if(($i+1)==$current_page) echo "style='background:red; color:#fff'"; ?> href="index.php?view=listnews&page=<?php echo ($i+1); ?>"><?php echo ($i+1); ?></a></li>
         <?php }
     }

     if($total_page<=1)
     {

     }
     else
        {     ?>



    <li 
    <?php 
    if($current_page==$total_page)
    {
      echo "class='disabled'";

  }
  ?>

  ><a href="index.php?view=listnews&page=<?php echo  ($current_page+1);  ?>">&raquo;</a></li>
  <?php } ?>

</ul>
</div>
    </div>
</div>
</div>


