
<?php 
/*
* form insert news
*/ 
require('module/processdata/categories.php');
$cat=new categories();

?>
<div class="news">
	<div class="form-ar">
		<h3>Thêm mới bản tin</h3>
		
		<form class="form-horizontal" action="../module/processdata/insertnews.php" id="form-news" method="post">
			<div class="form-group">
				<label class="control-label col-sm-2" for="title">title:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="title" name="title" onblur="checkexitsname()" placeholder="title ..."  required="required">
					<span id="error-name"><?php 
						if(isset($_SESSION['exists_name']))
						{
							echo $_SESSION['exists_name'];
							unset($_SESSION['exists_name']);
						}
						?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2" for="image">Image:</label>
					<div class="col-sm-10">
						<img src="" id="atrimage" alt="">
						<input type="text" class="form-control" id="image" name="image" placeholder="click để chọn ảnh ..."  required="required">

					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="Sapo">Sapo :</label>
					<div class="col-sm-10">
						<textarea name="sapo" id="sapo" class="form-control"></textarea>
					</div>
				</div>


				<div class="form-group">
					<label class="control-label col-sm-2" for="cat">category:</label>
					<div class="col-sm-10"> 
						<select name="cat" class="form-control" required >
							<option value="">-choose-</option>
							<?php
							$categories=$cat->getallpublic();
							$cat->showCategories($categories); ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2" for="content">Content :</label>
					<div class="col-sm-10">
						<textarea name="content" id="content" class="form-control"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="ishot">tag:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tag"name="tag" placeholder="tag ..."  required="required">

					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="ishot">ishot:</label>
					<div class="col-sm-10">
						<label>Tin hot <input type="checkbox" name="ishot[]" value="0"></label>
						<label>Tin nổi bật <input type="checkbox" name="ishot[]" value="1"></label>
						<label>Tin hit <input type="checkbox" name="ishot[]" value="2"></label>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="is_public">Is public :</label>
					<div class="col-sm-10">
						<div class="col-sm-9">
								 <label><input type="radio" name="is_public" value="0">Public</label>
								  <label><input type="radio" name="is_public" value="1">Private</label>
							</div>
					</div>
				</div>
				<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
						<button type="button" class="btn btn-default" onclick="submitcheck()">Insert news</button>
						<input type="reset" value="reset"  class="btn btn-default">
					</div>
				</div>
			</form>
		</div>
	</div>
	<script>
	/*
      check length title range[4,255] and exits name
	*/ 
	function checkexitsname()
	{
		var title=$('#title').val();

		if(title.length>=4 &&title.length<=255)
		{
		 $.ajax({
	    url: '/module/processdata/ajaxvalidate/exitsnamenews.php',
	    type : "post",
	    data : {name:title},
        success: function(result) {
   
         if(result==1)
         {
           $("#error-name").html(" exits name");
         }
         else
         {
         	 $("#error-name").html("");
         }

       }
	    });
      }
      else
      {
      	$("#error-name").html("name 4-255 charaters");
      }

	}
    /*
     *check if error not submit else sunmit
    */ 
	function submitcheck()
	{
	var error_name=$("#error-name").html();
	 if(error_name=="")
	 {
	   $("#form-news").submit();
	 }

	}
</script>

