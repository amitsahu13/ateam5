<script type="text/javascript">
	function search_my_account_left_link_show_hide(hide_show_element)
	{
		if(jQuery('.'+hide_show_element).css('display') == 'none')
		{
			jQuery('.'+hide_show_element).slideDown();
			
		}
		else if(jQuery('.'+hide_show_element).css('display') == 'block')
		{
			jQuery('.'+hide_show_element).slideUp();
		}
	}
</script>
<div class="left_sidebar">
      <h2><a href="#">I HAve A Dream</a></h2>
      <div class="aside_left">
        <ul>
			<?php if($this->Session->read('Auth.User.role_id')==Configure::read('App.Role.Buyer') || $this->Session->read('Auth.User.role_id')==Configure::read('App.Role.Both')){?>
           <li><?php echo $this->Html->link('Post a project',array('controller'=>'projects','action'=>'project_general?new=1')); ?></li>
		  
		   <?php 
		   $data_pro=$this->General->getProjectByLeaderId($this->Session->read('Auth.User.id'));
			if(!empty($data_pro))
			{
			?>
			
			
          <li>
		 
				<a href="javascript:void(0);" onclick="javascript:search_my_account_left_link_show_hide('list_project');">Post a job in a project</a>			
					<ul class="SubNaviLe list_project" style="display:none;" >
					<?php
					foreach($data_pro as $key=>$value)
					{
					?>
						<li><?php echo $this->Html->link(ucfirst($value),array('controller'=>'jobs','action'=>'job_general',$key),array('title'=>ucfirst($value),'alt'=>ucfirst($value)));?></li>
					<?php
					}
					?>
					</ul>	  
		  </li>
		  
		  	
							 
		  <?php
			}
		  ?>
		   <?php }?>
		  <?php if($this->request->params['action']=="search_job"){?>
		  <li><a href="javascript:void(0);" class="slct" onclick="javascript:search_my_account_left_link_show_hide('job_query');" >Search Job</a>
				<ul class="SubNaviLe job_query" style="display:none;">
				<li><a href="javascript:void(0);" class="add_query" >Save as query</a></li>
				</ul>
		  </li>
		  <?php }?>
		   <?php if($this->request->params['action']=="search_project"){?>
		   <li><a href="javascript:void(0);" class="slctpink" onclick="javascript:search_my_account_left_link_show_hide('project_query');">Search Project</a>
				<ul class="SubNaviLe project_query" style="display:none;">
				<li><a href="javascript:void(0);" class="add_query" >Save as query</a></li>
				</ul>
		  </li>
		  <?php }?>
		    <?php if($this->request->params['action']=="search_leader"){?>
		   <li><a href="javascript:void(0);" class="slct" onclick="javascript:search_my_account_left_link_show_hide('leader_query');" >Search Leader</a>
				<ul class="SubNaviLe leader_query" style="display:none;">
				<li><a href="javascript:void(0);" class="add_query" >Save as query</a></li>
				</ul>
		  </li>
		   <?php }?>
		    <?php if($this->request->params['action']=="search_expert"){?>
		   <li><a href="javascript:void(0);" class="slctpink" onclick="javascript:search_my_account_left_link_show_hide('expert_query');">Search Expert</a>
				<ul class="SubNaviLe expert_query" style="display:none;">
				<li><a href="javascript:void(0);" class="add_query" >Save as query</a></li>
				</ul>
		  </li>
		<?php }?>
          <li><a href="javascript:void(0);">Browse</a></li>
		  <li>
		<?php
		echo $this->Html->link($this->Html->image('authenticate_green.png',array('title'=>'authenticate','alt'=>'authenticate')),array('controller'=>'users','action'=>'userinfo_authenticate'),array('escape'=>false,'div'=>false,'title'=>'authenticate'));
		?>
		</li>
        </ul>
      </div>
    </div>
<?php 
echo $this->Html->script(array('calender/jquery-1.6.2.min','popup'));
echo $this->Html->css(array('popup'));
?>
<script type="text/javascript">
$(document).ready(function() {	
	/* function scrollToDiv(element,navheight){
		var offset = element.offset();
		var offsetTop = offset.top;
		var totalScroll = offsetTop-navheight;
		 
		$('body,html').animate({
				scrollTop: totalScroll
		},800);
	} */
	jQuery('.add_query').live('click', function() {
		openOffersDialog('query');
		/* var elWrapped = $('.add_query');		
		scrollToDiv(elWrapped,100); */
	});
});
</script>