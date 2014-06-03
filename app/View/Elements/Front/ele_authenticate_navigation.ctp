 <h3 class='title_h3'>  Authenticate Myself   </h3> 
 
<div class="cmpnsn_prgrsDV">
	<div class="cmpnsn_prgrsnav">
	<?php
	$authenticate_navigation = array('User Info'=>array('controller'=>'users','action'=>'userinfo_authenticate'),
'Social Media'=>array('controller'=>'users','action'=>'social_media_authenticate'),
'Phone'=>array('controller'=>'users','action'=>'phone_authenticate'), )
	?>
	<ul>
	<?php
	$i=1;

	foreach($authenticate_navigation as $authenticate_navigation_key=>$authenticate_navigation_value)
	{
		if($this->request->params['controller'] == $authenticate_navigation_value['controller'] && $this->request->params['action'] == $authenticate_navigation_value['action'])
		{
			$class = "blue";
		}
		else
		{
			$class="";
		}
	?>
	 	<li><a href="<?=Router::url("/users/".$authenticate_navigation_value['action'], true);?>" class="<?php echo $class;?>"><span class="<?php echo $class; ?>"><?php echo $i ?></span> <?php echo $authenticate_navigation_key; ?></a></li>
 
	<?php
	$i++;
	}
	?>
	</ul>
	</div>
	<div class="prgrsnav_fill">
	<?php
	echo $this->Html->image('75.jpg',array('div'=>false,'title'=>'75$'));
	?>
	</div>
</div>