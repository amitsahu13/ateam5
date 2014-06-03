<h3 class='title_h3'> Post a Job @ <?=$project_name?> </h3>


<div class="cmpnsn_prgrsDV">
<div class="cmpnsn_prgrsnav">
<?php
$post_job_navigation = array('General'=>array('controller'=>'jobs','action'=>'job_general'),'Timeline'=>array('controller'=>'jobs','action'=>'job_timeline'),'Compensation'=>array('controller'=>'jobs','action'=>'job_compensation'))
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





<? if ($this->Session->read($post_job_navigation_value['action'])== "allow"): ?> 

	<li>
	<a href="<?php echo Configure::read('App.SiteUrl')."/".$post_job_navigation_value['controller']."/".$post_job_navigation_value['action']?>" class="<?php echo $class;?>">
	<span class="<?php echo $class; ?>"><?php echo $i ?></span> <?php echo $post_job_navigation_key; ?></a> 
	</li> 
	<? else: ?>  
	<li>
	<a href="javascript:void(0)" class="<?php echo $class;?>">
	<span class="<?php echo $class; ?>"><?php echo $i ?></span> <?php echo $post_job_navigation_key; ?></a> 
	</li>  
	<?endif;?>  
	
	
	
	
	
<?php
	/* 	<li><a href="javascript:void(0);" class="<?php echo $class;?>"><span class="<?php echo $class; ?>"><?php echo $i ?></span> <?php echo $post_job_navigation_key; ?></a></li>*/
	?>
 
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