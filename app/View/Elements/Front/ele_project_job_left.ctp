<div class="left_sidebar">
<h2><a href="#">I Have A Dream</a></h2>
<div class="aside_left">
<ul>
<li><?php echo $this->Html->link('Post a project',array('controller'=>'projects','action'=>'project_general?new=1'),array('title'=>'Post a project'));?></li>
<li><a href="javascript:void(0);" class="slct" id="postJob">Post a job in a project</a>
	<dl id="dljob" style="display:none;">
		<dt>
		<?php if(!empty($project_data)){
			foreach($project_data as $project){
		?>

		<dd><?php echo $this->Html->link($project['Project']['title'],array('controller'=>'jobs','action'=>'job_general',$project['Project']['id']),array('class'=>"active"));?>
		</dd>
		<?php 
			}
		}?>
		</dt>
	</dl>
</li>
<li><a href="#">Search Experts</a></li>
<li><a href="#">Browse</a></li>

</ul>

</div>
</div>
<script type="text/javascript">
$("#postJob").click(function(){
  $("#dljob").slideToggle();
});
</script>