<!-- form  update news -->
<?php 
require_once('module/processdata/categories.php');
include_once ('module/processdata/processdatabase.php');
$cat=new categories();
$prodata=new processdatabase();

$id=$_GET["idnews"];
$sql="SELECT * FROM news WHERE id=".$id;
$arr=array();
if($prodata->query($sql))
{
	$arr=$prodata->fetch();
}

?>
<div class="news">
	<div class="form-ar">
		<h3>Thêm mới bản tin</h3>
		
		<form class="form-horizontal" action="../module/processdata/updatenews.php" method="post">

			

			<input type="hidden" name="idnews" value="<?php echo $arr['id']; ?>">	
			<div class="form-group">
				<label class="control-label col-sm-2" for="title">title:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="title" name="title" value="<?php echo $arr['title'] ?>" placeholder="title ..."  required="required">
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
						
						<img src="<?php echo $arr['image'] ?>" width="150" height="150" id="atrimage" alt="">
						<input type="text" class="form-control" id="image" value="<?php echo $arr['image'] ?>" name="image" placeholder="click để chọn ảnh ..."  required="required">
						
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="Sapo">Sapo :</label>
					<div class="col-sm-10">
						<textarea name="sapo" id="sapo" class="form-control"><?php echo $arr['sapo'] ?></textarea>
					</div>
				</div>
				
				
				
				
				<div class="form-group">
					<label class="control-label col-sm-2" for="content">Content :</label>
					<div class="col-sm-10">
						<textarea name="content" id="content" class="form-control"><?php echo $arr['content'] ?> </textarea>
					</div>
				</div>
				
				

				<div class="form-group">
					<label class="control-label col-sm-2" for="ishot">tag:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" value="<?php echo $arr['tag'] ?>" id="tag"name="tag" placeholder="tag ..."  required="required">

					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="ishot">ishot:</label>
					<div class="col-sm-10">
						<?php 
                         $arrcheck=array(0=>'Tin hót',1=>'Tin nổi bật',2=>'Tin hit');
                         $arrdatacheck=explode("," ,$arr['is_hot']);
                          	$i=0;
                         foreach ($arrcheck as $key => $value) {
                         	$check="";
                         
                         	if(in_array($i,$arrdatacheck))
                         	{
                         		$check.="checked";

                         	}
                         	?>
                         	<label> <?php echo $value; ?> <input type="checkbox" <?php echo $check; ?>  name="ishot[]" value="<?php echo $key ?>"></label>
                         	<?php
                         $i++;}
                      

						 ?>

					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="is_public">Is public :</label>
					<div class="col-sm-10">
						
							<?php 
							$arrispublic =array("0"=>"public","1"=>"private");
							foreach ($arrispublic as $key => $value) {
								$selected="";
								if($key==$arr['is_public']){
									$selected = "checked";
								}
								?>
                                <label><?php echo $value; ?><input type="radio" <?php echo $selected ?> name="is_public" value=" <?php echo $key ?>" placeholder=""></label>								
								<?php
							}
							?>
							

							
						
					</div>
				</div>
				

				


				<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Update news</button>
						<input type="reset" value="reset"  class="btn btn-default">
					</div>
				</div>
			</form>
		</div>

	</div>

