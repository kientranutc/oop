<?php
 /*
 *form insert categories
 */ 
require('module/processdata/categories.php');
$cat=new categories();
?>
<div class="form-cat">
	<div class="category">
		<div class="container">
			<div class="form-cat">
				<h3>Thêm mới danh mục</h3>
				<form class="form-horizontal" action="../module/processdata/insertcat.php" id="form-cat"   method="post">
					<div class="form-group">
						<label class="control-label col-sm-3" for="name">Category name:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="name"name="name" onblur="checkexitsname();" placeholder="name..." required="required">
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
							<label class="control-label col-sm-3" for="parent">Parent:</label>
							<div class="col-sm-9"> 
								<select name="parent" class="form-control" >
									<option value="">-choose-</option>
									<?php
									$categories=$cat->getallpublic();
									$cat->showCategories($categories); ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="description">Description :</label>
							<div class="col-sm-9">
								<textarea name="description" id="description" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="is_public">Is public :</label>
							<div class="col-sm-9">
								 <label><input type="radio" name="ispublic" value="1">Public</label>
								  <label><input type="radio" name="ispublic" value="0">Private</label>
							</div>
						</div>
						<div class="form-group"> 
							<div class="col-sm-offset-2 col-sm-9">
								<button type="button" class="btn btn-default" onclick="submitcheck()">Insert</button>
								<input type="reset" value="reset"  class="btn btn-default">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>

<script>
	function checkexitsname()
	{
		var name=$('#name').val();
		if(name.length>=4 &&name.length<=255)
		{
		 $.ajax({
	    url: '/module/processdata/ajaxvalidate/exitsnamecat.php',
	    type : "post",
	    data : {name:name},
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

	function submitcheck()
	{
	var error_name=$("#error-name").html();
	 if(error_name=="")
	 {
	   $("#form-cat").submit();
	 }

	}
</script>