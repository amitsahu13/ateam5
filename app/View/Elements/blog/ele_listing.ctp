<ul>
<?php 	
if(!empty($blogLists)){
	foreach($blogLists as $keyPost => $valuePost){ 
?>
	<li>
		<div class="jobprogres_step_Bx">
			<div class="step_Bx border_btm">
				<h3>
				<?php echo $this->Html->link($this->Text->truncate(ucfirst($valuePost['Blog']['title']),20,array('ellipsis' => '...','exact' => false)),array('controller'=>'blogs','action'=>'detail',$valuePost['Blog']['id']))?>
				</h3></div>
			<div class=" float_left">
				<?php 
				
				$file_path= BLOG_IMAGE_SMALL_PATH.'small_'.$valuePost['Blog']['post_img'];
				if(file_exists($file_path)){
					echo $this->Html->image(BLOG_IMAGE_SMALL.'small_'.$valuePost['Blog']['post_img']);
				}
				
				?>
			</div>
			<div class="step_Bx_Txt">
				
					<?php
						echo $this->Text->truncate($valuePost['Blog']['article'],100,array('ellipsis' => '...','exact' => false));
					?>
				
			</div>
			<div class="blog_bottom">
				<p><?php echo $valuePost[0]['Total_Comment'];?> Comments</p>
				<p><span>Lables:</span> <?php echo $valuePost['Category']['name'];?></p>
				<div class="share">
					<p>Share:</p>
					<div class="blog_share_links">
						<!-- AddThis Button BEGIN 
						<div class="addthis_toolbox addthis_default_style addthis_16x16_style">
						<a class="addthis_button_facebook"></a>
						<a class="addthis_button_twitter"></a>
						<a class="addthis_button_blogkeen"></a>
						</div>
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=undefined"></script>
						 AddThis Button END -->
						 <?php 
							if(!empty($valuePost['Blog']['post_img'])){
								$imageUrl = urlencode(Configure::read('App.SiteUrl').'/img/'.BLOG_IMAGE_SMALL.'small_'.$valuePost['Blog']['post_img']);
							}else{
								$imageUrl = Configure::read('App.SiteUrl').'/img/logo.png';
							}
							?>
						<?php 
						$title=urlencode($valuePost['Blog']['title']);
						$url=urlencode('http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
						$summary=urlencode($valuePost['Blog']['article']);
						$image=$imageUrl;
						?>
<?php echo($this->Html->link($this->Html->image('blog_fb.png', array('title'=>"Share to Facebook",'alt'=>'Share to Facebook','style'=>'margin:0 0 -3px;')),'javascript:void(0);',array('escape'=>false,"onClick"=>"window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=$title&amp;p[summary]=$summary&amp;p[url]=$url&amp;p[images][0]=$image','sharer','toolbar=0,status=0,width=548,height=325');",'style'=>'margin-right:4px;float:left;color:#797979;'))); ?>
						

						<?php /* <span class='st_facebook_custom' title="Share to Facebook" alt="Share to Facebook"  st_url="<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>" st_title="<?php echo $valuePost['Blog']['title'];?>" st_image="<?php echo  Configure::read('App.SiteUrl').'/img/'.BLOG_IMAGE_SMALL.'small_'.$valuePost['Blog']['post_img'];?>" st_summary="<?php echo $valuePost['Blog']['article'];?>">
						<?php echo  $this->Html->image('blog_fb.png')?> 
						</span> */ ?>
						<span class='st_twitter_custom' title="Share to Twitter" alt="Share to Twitter"  st_url="<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>" st_title="<?php echo $valuePost['Blog']['title'];?>" st_image="<?php echo  Configure::read('App.SiteUrl').'/img/'.BLOG_IMAGE_SMALL.'small_'.$valuePost['Blog']['post_img'];?>" st_summary="<?php echo $valuePost['Blog']['article'];?>">
						<?php echo  $this->Html->image('blog_twt.png')?>
						</span>
						
						<?php echo  $this->Html->link($this->Html->image('blog_view.png'),array('controller'=>'blogs','action'=>'blog_feed',$valuePost['Blog']['id']),array('escape'=>false,'div'=>false,'target'=>'_blank'));?>
						
						<!-- 
						<span class='st_sharethis_large' displayText='ShareThis'></span>
						<span class='st_twitter_large' displayText='Tweet'></span>
						<span class='st_linkedin_large' displayText='LinkedIn'></span>  -->
						
						<!--<span class='st_email_custom' displayText='Email'>
						<img src="http://www.google.com/images/srpr/logo3w.png" /></span> 
						
						<meta property="og:title" content="Click Here to view Album" />
						<meta property="og:type" content="Sharing Widgets" />
						<meta property="og:url" content="http://64.15.136.251:8080/ealbum/" />
						<meta property="og:image" content="http://64.15.136.251:8080/ealbum/img/logo.png" />
						<meta property="og:description" content="Album done by anil yadav!" />
						<meta property="og:site_name" content="ShareThis" />
						-->

						
						
						<!--
						<ul>
							<li><a href="#"><?php //echo  $this->Html->image('blog_fb.png')?></a></li>
							<li><a href="#"><?php //echo  $this->Html->image('blog_twt.png')?></a></li>
							<li><a href="#"><?php //echo  $this->Html->image('blog_view.png')?></a></li>
						</ul>-->
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</li>
<?php	 } 
}else{
		echo $this->element('Front/ele_no_record_found');
 } ?>
</ul>

<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">
	stLight.options({
		publisher: "46ee9c5d-be43-48a1-a3db-f35116371fb5",
	});
 </script>
<div class="paginatn" style="clear:both;">
		<p><a href="javascript:void(0);" id="back_to_top">Back to top ^</a></p>
		<?php if($this->request->params['paging']['Blog']['count']>=Configure::read('App.PageLimit')){ ?>
			<div class="paging_n" style="width:auto;">
			<ul>
				<li class="prev">						
				<?php echo $this->Paginator->prev('Prev', null, null, array('class' => 'disabled'));?>						
				</li>
				<li>Page </li>										
				<li style="float:left;"><input type="text"  name="data[Paging][page_no]" onkeyup="isNumberKey(this)" class="paging_input" value="<?php echo $this->Paginator->counter(array('format' => '%page%'
));  ?>" /></li><li>of <?php echo $this->Paginator->counter(array('format' => '%pages%'));  ?></li>
				<li class="next">
				<?php echo $this->Paginator->next('Next', null, null, array('class' => 'disabled'));?>
				</li>
			</ul>
		</div>
		<?php }?>
	</div>
<script>
$("#back_to_top").click(function(){
	$('html, body').animate({ scrollTop: 0 }, 1000);
});
</script>