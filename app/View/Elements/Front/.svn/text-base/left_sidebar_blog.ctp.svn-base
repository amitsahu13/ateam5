<h2><a href="javascript:void(0);">BLOG</a></h2>
<div class="aside_left min_height margin_bottomblog">
	<ul>
	<?php
	$blog_link = array('Recent Post'=>array('controller'=>'blogs','action'=>'listing'),'Archives'=>array('controller'=>'blogs','action'=>'blog_archive'));
	foreach($blog_link as $key => $value)
	{
		if($this->request->params['controller'] == $value['controller'] && $this->request->params['action'] == $value['action'])
		{
			$selct = 'slct';
		}
		else
		{
			$selct = '';
		}
		echo "<li>";
		echo $this->Html->link($key,$value,array('class'=>$selct));
		echo "</li>";
	}
	?>
		
	</ul>
</div>
<?php 
// pr($popular_post);
if(!empty($popular_post)){
?>
<div class="jobprogres_step_Bx min_height">
	<div class="step_Bx"> 
		<h4>Popular Posts</h4>
	</div>
	<?php 
	foreach($popular_post as $keyLPopulrBlog => $valueLblog){
		// pr($valueLblog);die;
	?>
	<div class="pop_post">
		<div class="float_left">
			<?php 
				$file_path= BLOG_IMAGE_THUMB_PATH.'thumb_'.$valueLblog['Blog']['post_img'];
				// echo $file_path;
				if(file_exists($file_path)){
					echo $this->Html->image(BLOG_IMAGE_THUMB.'thumb_'.$valueLblog['Blog']['post_img']);
				}
			?>
			</div> 
			<p>
				<?php echo $this->Html->link($this->Text->truncate($valueLblog['Blog']['title'],30,array('ellipsis' => '...','exact' => false)),array('controller'=>'blogs','action'=>'detail',$valueLblog['Blog']['id']))?>
			
			</p>	
	</div>
	<?php 
	} 
	?>
</div>
<?php } ?>

