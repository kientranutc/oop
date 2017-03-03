<?php 
/*
*list  categories
*/ 
require('module/processdata/categories.php');
$categories =new categories();
?>
<div id="list-cat">
  <a href="index.php?view=formcat" class="add">Add categories</a>
  <h3>List categories</h3>
       <!-- notification  insert successfull categories -->

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
         <!-- notification update categories -->

        <?php
        if(isset($_SESSION['updatecat']))
        {
          ?>
          <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

            <strong>Success!</strong> <?php echo $_SESSION['updatecat']; ?>
          </div>
          <?php 
          unset($_SESSION['success_cat']);
        } ?>
        <!-- notification error insert categories -->
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
  <table class="table table-bordered table-hover">
   <thead>
    <tr
    <th></th>
    <th> name</th>
    <th>parent_id</th>
    <th>is public</th>
    <th>news count</th>
    <th>created_at</th>
    <th colspan="2"></th>

  </tr>
</thead>
<tbody>
     <?php
     //total record table categories
     $total_records =$categories->countrow();
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

    $arr=$categories->getall($start,$limit);
    if(!empty($arr))
    {
    $categories->showlistcat($arr);
    }
    ?>


</tbody>
</table>
<div class="row">
  <div class="col-md-3 col-md-offset-4">
    <ul class="pagination">
          <?php 
          if($total_page<=1)
          {

          }
          else
          {
          ?>
        <li <?php if($current_page<2){
           echo "class='disabled'";
          } ?> ><a href="index.php?view=listcat&page=<?php echo ($current_page-1); ?>">&laquo;</a></li>
      
      <?php 
       }
      for ($i=0; $i < $total_page; $i++) { 
        if($total_page==1)
        {
        }
        else
        {
       ?>
       <li><a <?php if(($i+1)==$current_page) echo "style='background:red; color:#fff'"; ?> href="index.php?view=listcat&page=<?php echo ($i+1); ?>"><?php echo ($i+1); ?></a></li>
       <?php }
       }

      if($total_page<=1)
          {

          }
          else
            {     
          ?>
       

       
      <li 
      <?php 
      if($current_page==$total_page)
             {
                echo "class='disabled'";
             }
       ?>
     
        ><a href="index.php?view=listcat&page=<?php echo  ($current_page+1);  ?>">&raquo;</a></li>
        <?php } ?>
        
      </ul>
    </div>

  </div>
</div>

<script>
  function deletecat(idcat,parent)
  {
   var x=confirm("are you delete?");
   if(x)
   {
     $.ajax({
      url: '/module/processdata/delcat.php',
      type : "post",
      data : {idcat :idcat,parent:parent },
      success: function(result) {
       $("#list-cat").load("index.php?view=listcat #list-cat");
     }
   });
   }
 }
 function updatecat(id)
 {

  var ispublic=$("#ispublic-"+id).val();

  var x=confirm("are you update ?");
  if(x)
  {
   $.ajax({
    url: '/module/processdata/updatecat.php',
    type : "post",
    data : {id :id,ispublic:ispublic },
    success: function(result) {
     $("#list-cat").load("index.php?view=listcat #list-cat");
   }
 });
 }
}
</script>
