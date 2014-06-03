 <h3 class='title_h3'> Post a Project  </h3>
<div class="cmpnsn_prgrsDV">

	<div class="cmpnsn_prgrsnav">
	 
	<?php
	$post_job_navigation = array(

		'General'=>array('controller'=>'projects','action'=>'project_general'),
		//'Leader Remove'=>array('controller'=>'projects','action'=>'project_leader'),
		'Status and Timeline'=>array('controller'=>'projects','action'=>'project_status_timeline'),
		'Business Stuff'=>array('controller'=>'projects','action'=>'project_business_stuff'))
	?>
	<ul>
		<?php
		$i=1;

		foreach($post_job_navigation as $post_job_navigation_key=>$post_job_navigation_value)
		{
			if($this->request->params['controller'] == $post_job_navigation_value['controller'] && $this->request->params['action'] == $post_job_navigation_value['action'])
			{
				$class = "blue";
			}
			else
			{
				$class="";
			}
		?>
			
			 <li> 
			 <? 
			  
			 	if ($this->Session->read($post_job_navigation_value['action'])== "allow" ||  $post_job_navigation_value['action'] == "project_general" ):
			 ?>
			 
			 <a href="<?php echo Configure::read('App.SiteUrl')."/".$post_job_navigation_value['controller']."/".$post_job_navigation_value['action']."/".$id?>" class="<?php echo $class;?>">
			  <? else: ?>  
			 	 <a href="javascript:void(0)"   onclick="alert('Please Complete Previous Steps.');" class="<?php echo $class;?>">
			  <? endif;  ?>
			  
			  
			  <span class="<?php echo $class; ?>"><?php echo $i ?></span>
			  <?php echo $post_job_navigation_key; ?></a>
			  
			  </li> 
			  
			
		<?php	/*<li><a href="javascript:void(0);" class="<?php echo $class;?>"><span class="<?php echo $class; ?>"><?php echo $i ?></span> <?php echo $post_job_navigation_key; ?></a></li>*/?>
		<?php
		$i++;
		}
		?>
	</ul>
	</div>
	<div class="prgrsnav_fill">
		<?php echo $this->Html->image('75.jpg',array('escape'=>false));?>
		
	</div>
</div>