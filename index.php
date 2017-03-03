<!-- home page -->
<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title></title>
	<!-- Bootstrap -->
	<link href="assets/public/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>
      <header>

      </header>
      <section id="menu-left">

        <div class="left">
         <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="./">Quản lý tin tức</a>
            </div>
            <div>
              <ul class="nav navbar-nav">
                <li><a href="index.php?view=listcat"><span class="glyphicon glyphicon-tasks"></span> categories</a></li>
                <li><a href="index.php?view=listnews"><span class="glyphicon glyphicon-book"></span> News</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <div class="right" >
      <div class="breadbrums">
        <div class="row">
          <div class="col-md-12">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active"><?php echo (isset($_GET['view']))?$_GET['view']:"" ?></li>
          </ol>
          </div>
        </div>
      </div>
       <?php 
       if(isset($_GET['view']))
       {
        $view=$_GET['view'];
        include("module/template/".$view.".php");
      }
      else
      {

      }

      ?>
    </div>
  </section>
  <div class="modal fade" id="imagenews" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 900px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Sản phẩm</h4>
        </div>
        <div class="modal-body">
          <iframe  width="100%" height="550" frameborder="0" src="../../filemanager/dialog.php?type=1&field_id=image">
          </iframe>
        </div>
      </div>
    </div>
  </div>
  <footer>
    
  </footer>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>

<script src="assets/public/js/bootstrap.min.js"></script>
<script src=  "assets/tinymce/tinymce.min.js"></script>
<script src="assets/js/main.js"></script>
<!-- ajax search news -->
<script>
    function search(val)
    {
      $.ajax({
    url: '/module/template/searchnews.php',
    type : "post",
    data : {name:val},
   
    success: function(result) {
       $("#news-content").html(result);
   }
   });
    }

</script>








