<?php
echo $this->Form->create('Comment',array('url' => array('controller' => 'blogs', 'action' => 'detail'),'type'=>'file'));
?>
<div class="blog3_right">
	<!--<label class="error" for="name" id="name_error">This field is required.</label>-->
	<?php  
	echo $this->Form->input('Comment.meta_description', array(
												'type'=>'textarea', 
												'div'=>false, 
												'placeholder'=>'Type your comment here*',
												"class" => "blog_area_input",
												'label'=>false
												));
	?> 
		<span class="Continue4Btn" style="float:right; margin:13px 0px 0px 0;">
			<input type="submit" name="" class="Continue4BtnRi" value="Publish">
		</span>
</div>
<?php echo $this->Form->end();?>

