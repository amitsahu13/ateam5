<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
	<?php  echo ($this->Form->input('id'));?>				
	<p>
		<?php  echo ($this->Form->input('title', array('div'=>false, 'label'=>'Title*', "class" => "text-input medium-input")));?> 
	</p>
	<p>
		<?php  echo ($this->Form->input('category_id', array('div'=>false, 'label'=>'Title*', "class" => "text-input medium-input")));?> 
	</p>
	<p>
		<?php  echo ($this->Form->input('article', array('div'=>false, 'label'=>'Content*', "class" => "text-input text-area ckeditor", 'rows'=>'30')));?> 
	</p><p>&nbsp;</p>
	<p>
		<?php  echo ($this->Form->input('post_img', array('type'=>'file','div'=>false, 'label'=>'Post Image*', "class" => "text-input")));?> 
	</p>
	<p>
		<?php  echo ($this->Form->input('meta_title', array('div'=>false, 'label'=>'Meta Title*', "class" => "text-input small-input")));?> 
		<br><small>Meta title displays on Titlebar of Browser</small>
	</p>
	<p>
		<?php  echo ($this->Form->input('meta_keywords', array('div'=>false, 'label'=>'Meta Keywords*', "class" => "text-input small-input")));?> 
	</p>
	<p>
		<?php  echo ($this->Form->input('meta_description', array('type'=>'textarea', 'div'=>false, 'label'=>'Meta Description*', "class" => "text-input large-input")));?> 
		
	</p>
	<p>
		<label>Status</label>
		<?php  echo ($this->Form->input('status', array('options'=>Configure::read('Status'),'div'=>false, 'label'=>false, "class" => "small-input")));?> 
	</p>
	<p>
		<?php  echo ($this->Form->submit('Submit', array('class' => 'button', "div"=>false)));?>
		<?php echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>'blogs', 'action'=>'index'), array("class"=>"button", "escape"=>false)); ?>
	</p>
</fieldset>