<!-- view news  -->
<?php
require('module/processdata/news.php'); 
$news=new news();
$id=$_GET['id'];
$arrnews=$news->getid($id);
$arrlq=$news->getnewcat($arrnews['cate_id'],$id);
$date=date_create($arrnews['created_at']);
 ?>
<div id="view-news">
	<h3><?php echo $arrnews['title']; ?></h3>
	 <span class="glyphicon glyphicon-calendar"> <?php echo date_format($date,"d/m/Y-H:i:s") ?></span>
	 <div class="description">
      <?php echo $arrnews['content'];  ?>
	 </div>

</div>
<div id="lq">
	<div id="title-lq">
		<h3>Tin liên quan</h3>
	</div>
	<div id="content-lq">
		<ul>
		<?php 
       foreach ($arrlq as $key => $value) {
      
		 ?>
			<li><a href="index.php?view=viewnews&id=<?php echo $value['id'];  ?>">
				<div class="item">
					<img src="<?php echo $value['image']; ?>" alt="">
					<div class="name-news"><?php echo $value['title'] ?></div>
				</div>
			</a></li>
			<?php } ?>
			
			
		</ul>
	</div>

</div>