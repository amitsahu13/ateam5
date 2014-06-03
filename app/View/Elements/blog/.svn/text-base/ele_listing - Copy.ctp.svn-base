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
				<p class="blog_padding">
					<?php
						echo $this->Text->truncate($valuePost['Blog']['article'],155,array('ellipsis' => '...','exact' => false));
					?>
				</p>
			</div>
			<div class="blog_bottom">
				<p><?php echo $valuePost[0]['Total_Comment'];?> Comments</p>
				<p><span>Lables:</span> <?php echo $valuePost['Category']['name'];?></p>
				<div class="share">
					<p>Share:</p>
					<div class="blog_share_links">
						<ul>
							<li><a href="#"><?php echo  $this->Html->image('blog_fb.png')?></a></li>
							<li><a href="#"><?php echo  $this->Html->image('blog_twt.png')?></a></li>
							<li><a href="#"><?php echo  $this->Html->image('blog_view.png')?></a></li>
						</ul>
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

<div class="paginatn" style="clear:both;">
		<p><a href="#">Back to top ^</a></p>
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