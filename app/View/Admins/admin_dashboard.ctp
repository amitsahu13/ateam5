<ul class="shortcut-buttons-set">
	<li><a class="shortcut-button" href="<?php echo (Router::url(array('controller'=>'admins','action'=>'index')));?>"><span>
		<?php echo $this->Html->image('admin/admin_user.png', array('alt'=>'icon')); ?><br>
		Manage Admins
	</span></a></li>
	<li><a class="shortcut-button" href="<?php echo (Router::url(array('controller'=>'users','action'=>'index','buyer')));?>"><span>
		<?php echo $this->Html->image('admin/icon-48-user.png', array('alt'=>'icon')); ?><br>
		Manage User
	</span></a></li>
	<li><a class="shortcut-button" href="<?php echo (Router::url(array('controller'=>'projects','action'=>'index')));?>"><span>
		<?php echo $this->Html->image('admin/project_icon.png', array('alt'=>'icon')); ?><br>
		Manage Project
	</span></a></li>
	<li><a class="shortcut-button" href="<?php echo (Router::url(array('controller'=>'pages','action'=>'index')));?>"><span>
		<?php echo $this->Html->image('admin/paper_content_pencil_48.png', array('alt'=>'icon')); ?><br>
		Manage Content
	</span></a></li>
	<li><a class="shortcut-button" href="<?php echo (Router::url(array('controller'=>'categories','action'=>'index')));?>"><span>
		<?php echo $this->Html->image('admin/category.png', array('alt'=>'icon')); ?><br>
		Category
	</span></a></li>
	<li><a class="shortcut-button" href="<?php echo (Router::url(array('controller'=>'faqs','action'=>'index')));?>"><span>
		<?php echo $this->Html->image('admin/comment_48.png', array('alt'=>'icon')); ?><br>
		Manage FAQ's
	</span></a></li>
	
	<li><a class="shortcut-button" href="<?php echo (Router::url(array('controller'=>'templates','action'=>'index')));?>"><span>
		<?php echo $this->Html->image('admin/email_templates.png', array('alt'=>'icon')); ?><br>
		Email
	</span></a></li>
	
	<li><a class="shortcut-button" href="<?php echo (Router::url(array('controller'=>'countries','action'=>'index')));?>"><span>
		<?php echo $this->Html->image('admin/location.jpg', array('alt'=>'icon')); ?><br>
		Location
	</span></a></li>
	 
	<li><a class="shortcut-button" href="<?php echo (Router::url(array('controller'=>'settings','action'=>'index')));?>"><span>
		<?php echo $this->Html->image('admin/cog-icon-2-48x48.png', array('alt'=>'icon')); ?><br>
		Settings
	</span></a></li>
	
	<li><a class="shortcut-button" href="<?php echo (Router::url(array('controller'=>'skills','action'=>'index')));?>"><span>
		<?php echo $this->Html->image('admin/skills.png', array('alt'=>'icon')); ?><br>
		Skills
	</span></a></li> 
	
	<li>     </li> 
	
</ul>
<div class="clear"></div>
 