<?php //$myImage = $this->requestAction(array('controller'=>'users', 'action'=>'getMyImage'));?>

  

<div class="left_sidebar">
 
 <?php 
  if($this->Session->read('Auth.User.role_id')==Configure::read('App.Role.Buyer') ||  $this->Session->read('Auth.User.role_id')==Configure::read('App.Role.Both')){ ?>	
        
          <? if (strstr($_SERVER["REQUEST_URI"],"workrooms")):?>  
            	<h2><a href="#">MY PLACE</a></h2> 
          	<? else:?> 
         	   	   	<h2><a href="#">MY PLACE</a></h2>
         	   	  <? endif;?>
         	   	   		  
        
        	<? }else{?> 
        	
       
        	
        	
         	<? if (strstr($_SERVER["REQUEST_URI"],"my_job")):?> 
         	   	<h2><a href="#">MY PLACE</a></h2> 
         <? else :?>
         	
        	<? if (strstr($_SERVER["REQUEST_URI"],"my-project")):?> 
         	   	<h2><a href="#">MY PROJECTS</a></h2> 
         	   	<? else:?> 
         	   	 
                  	<? if (strstr($_SERVER["REQUEST_URI"],"projects")):?>   
                  		<h2><a href="#">MY PLACE</a></h2>  
                  	   	<? else:?> 
                  	
                 <? if (strstr($_SERVER["REQUEST_URI"],"workrooms")):?>    
                  	<h2><a href="#">WORKROOM</a></h2> 
                    	<? else:?> 
         	   	   	<h2><a href="#">MY PLACE</a></h2> 
         	   	   	
         	   	   		<? endif;?>
         	<? endif;?>         	<? endif;?>
         	
         	
         		<? endif;?>
        	
        	
        	
        	<? } ?>
        	
        	
        	<!--  Left SideBar   :   -->
        	<div class="aside_left">
            	<div class="aside_left_hdng">
                	<h3><?php echo ucfirst($myImage['User']['first_name']).' '.ucfirst($myImage['User']['last_name']); ?></h3>
                  <?php  echo $this->Html->link(null,array('controller'=>'users','action'=>'user_profile_overview'), array('escape' => false,'class'=>'edit'));?>
                </div>
                
 
                <div class="profile_pic">
				<?php 
				echo $this->General->show_user_img($myImage['User']['id'],$myImage['UserDetail']['image'],'THUMB',$myImage['User']['first_name']);
				?>      	
                </div>
				<?php  if($this->Session->read('Auth.User.role_id')==Configure::read('App.Role.Buyer')){ ?>	
						<ul>
							<li>
							<?php
							if($this->params->params['action'] == 'my_project' && $this->params->params['controller'] == 'projects'){
								$class_project = 'slct';
							}
							else{
								$class_project = "";
							} 
							echo $this->Html->link('My Projects',array('controller'=>'projects','action'=>'my_project'),array('escape'=>false,'div'=>false,'class'=>$class_project));
							?>
							</li>
							 <?/*<li>
							 <?php
							 if($this->params->params['action'] == 'my_job' && $this->params->params['controller'] == 'jobs'){
								$class_job = 'slct';
							}
							else{
								$class_job = "";
							} 
							 if($this->request->params['action']=='my_job')
							 {
 							 }
							 else
							 {
 							 }
							 
							 if($this->request->params['action']=='my_job')
							 {
							 ?>
								 
							<?php
							}
							?>	
							 </li>*/?>
							
							
					 
							
							
							
				 	 <li><a href="/Inbox/index">My Inbox 
				 	 <?php  App::import("model","Inbox"); 
						if (Inbox::getTotal($this->Session->read('Auth.User.id')) > 0):?> 
				 	 <span> 
				 	 <?   echo Inbox::getTotal($this->Session->read('Auth.User.id')); ?>
				 	 </span>
				 	 <? endif;?>  
				 	 
				 	 
				 	 </a></li>
						<!--  ChatRoom  And WorkRoom Stacks -->  
						  <li><a href="/Inbox/index/1">My Chatrooms 
						  	<?php  if (Inbox::getTotal($this->Session->read('Auth.User.id'),'0') > 0):?> 
                   <span> <?   echo Inbox::getTotal($this->Session->read('Auth.User.id'),'0'); ?></span>
                   <? endif;?>  
						   </a></li>
						  <li><a href="/Inbox/index/2">My Workrooms 
					
					<? 
						if (Inbox::getTotal($this->Session->read('Auth.User.id') ,2) > 0 ||  Inbox::getTotal($this->Session->read('Auth.User.id') ,1)>0):?> 
				 	 <span> 
				 	 <?   echo Inbox::getTotal($this->Session->read('Auth.User.id'),2); ?>
				 	 </span>
				 	 <? endif;?>   
				 	 
				 	 
						  </a></li> 
						<!-- End ChatRoom And WorkRoom --> 
						
						
						
						
					 <li> <?php echo $this->Html->link('My Profile',array('controller'=>'users','action'=>'user_profile_overview'));?> </li>
                 	
                 	
                 	 <li> <?php echo $this->Html->link('My User Info',array('controller'=>'users','action'=>'userinfo_authenticate'));?> </li>
					 <li> <?php echo $this->Html->link('Authenticate Myself',array('controller'=>'users','action'=>'userinfo_authenticate'));?> </li>
						 		
							
							 
						

					
						</ul>
			<?php 	}
				if($this->Session->read('Auth.User.role_id')==Configure::read('App.Role.Provider')){ ?>	
						<ul>
							
							 <li>
							 <?php
							 if($this->params->params['action'] == 'my_job' && $this->params->params['controller'] == 'jobs'){
								$class_job = 'slct';
							}
							else{
								$class_job = "";
							} 
							 if($this->request->params['action']=='my_job')
							 {
								echo $this->Html->link('My Projects','javascript:void(0);',array('onclick'=>"javascript:my_job_show_hide('my_job_leader_expert')",'class'=>$class_job));
							 }
							 else
							 {
								echo $this->Html->link('My Projects',array('controller'=>'jobs','action'=>'my_job'),array('class'=>$class_job));
							 }
							 
							 if($this->request->params['action']=='my_job')
							 {
							 ?>
								 
							<?php
							}
							?>	 
							
							
							
							 </li>
                  
                  
                 <li><a href="/Inbox/index">My Inbox 
               <?php  App::import("model","Inbox"); 
						if (Inbox::getTotal($this->Session->read('Auth.User.id')) > 0):?> 
				 	 <span> 
				 	 <?   echo Inbox::getTotal($this->Session->read('Auth.User.id')); ?>
				 	 </span>
				 	 <? endif;?>  
                 </a> </li>
                 <li><a href="/Inbox/index/1">My Chatrooms
	<?php  if (Inbox::getTotal($this->Session->read('Auth.User.id'),'0') > 0):?> 
                   <span> <?   echo Inbox::getTotal($this->Session->read('Auth.User.id'),'0'); ?></span>
                   <? endif;?>  
 </a></li>
						  <li><a href="/Inbox/index/2">My Workrooms 
						  <? 
						if (Inbox::getTotal($this->Session->read('Auth.User.id') ,2) > 0 ||  Inbox::getTotal($this->Session->read('Auth.User.id') ,1)>0):?> 
				 	 <span> 
				 	 <?   echo Inbox::getTotal($this->Session->read('Auth.User.id'),2) ; ?>
				 	 </span>
				 	 <? endif;?>   
						  
						  </a></li> 
                 <li> <?php echo $this->Html->link('My Profile',array('controller'=>'users','action'=>'user_profile_overview'));?> </li>
                	
                 	 <li> <?php echo $this->Html->link('My User Info',array('controller'=>'users','action'=>'userinfo_authenticate'));?> </li>
					 <li> <?php echo $this->Html->link('Authenticate Myself',array('controller'=>'users','action'=>'userinfo_authenticate'));?> </li>
						 		
							
						
							 
							 
							 				
						</ul>
			<?php   }


 

				if($this->Session->read('Auth.User.role_id')==Configure::read('App.Role.Both')){ ?>	
				
				
				
					<ul>
							
							 <li>
							 <?php
							 if($this->params->params['action'] == 'my_job' && $this->params->params['controller'] == 'jobs'){
								$class_job = 'slct';
							}
							else{
								$class_job = "";
							} 

				if ($this->Session->read('Auth.User.role_id') != 5 ){

							 if($this->request->params['action']=='my_job')
							 {
								echo $this->Html->link('My Jobs','javascript:void(0);',array('onclick'=>"javascript:my_job_show_hide('my_job_leader_expert')",'class'=>$class_job));
							 }
							 else
							 {
								echo $this->Html->link('My Jobs',array('controller'=>'jobs','action'=>'my_job'),array('class'=>$class_job));
							 }
							 


				}
							 if($this->request->params['action']=='my_job')
							 {
							 ?>
								 
							<?php
							}
							?>	
							 </li>
							 	<li><?php echo $this->Html->link('My Project',array('controller'=>'projects','action'=>'my_project'));?></li>
               	<li>
							 <a href='/jobs/my_job'> My Jobs</a>
							
							 </li> 
                  
                 <li><a href="/Inbox/index">My Inbox 
                 
                  <?php  App::import("model","Inbox"); 
						if (Inbox::getTotal($this->Session->read('Auth.User.id')) > 0):?> 
				 	 <span> 
				 	 <?   echo Inbox::getTotal($this->Session->read('Auth.User.id')); ?>
				 	 </span>
				 	 <? endif;?>  
                 
                 </a></li>
                
                  <li><a href="/Inbox/index/1">My Chatrooms
                  	<?php  if (Inbox::getTotal($this->Session->read('Auth.User.id'),'0') > 0):?> 
                   <span> <?   echo Inbox::getTotal($this->Session->read('Auth.User.id'),'0'); ?></span>
                   <? endif;?>  
                    </a></li>
						  <li><a href="/Inbox/index/2">My Workrooms 
						  <? 
						if (Inbox::getTotal($this->Session->read('Auth.User.id') ,2) > 0 ||  Inbox::getTotal($this->Session->read('Auth.User.id') ,1)>0):?> 
				 	 <span> 
				 	 <?   echo Inbox::getTotal($this->Session->read('Auth.User.id'),2); ?>
				 	 </span>
				 	 <? endif;?>   </a></li> 
						  
                 <li> <?php echo $this->Html->link('My Profile',array('controller'=>'users','action'=>'user_profile_overview'));?> </li>
               	
                 	 <li> <?php echo $this->Html->link('My User Info',array('controller'=>'users','action'=>'userinfo_authenticate'));?> </li>
					 <li> <?php echo $this->Html->link('Authenticate myself',array('controller'=>'users','action'=>'userinfo_authenticate'));?> </li>
						 		
							
						
							 
							 
							 				
						</ul>
				








							
												
						</ul>
			<?php   } ?>
			
            </div>
        </div>
<script type="text/javascript">
	function my_account_left_link_show_hide(hide_show_element)
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
	
	function my_job_show_hide(hide_show_element)
	{
		if(jQuery('.'+hide_show_element).css('display') == 'none')
		{
			jQuery('.'+hide_show_element).slideDown();
			
		}
		else if(jQuery('.'+hide_show_element).css('display') == 'block')
		{
			jQuery('.'+hide_show_element).slideUp();
			jQuery('.checkmyjob').attr('checked',false);
		}
	}
	
	jQuery(".expert").click(function(){
		
		if(jQuery('.apply_invited').css('display') == 'none')
		{
			jQuery('.apply_invited').slideDown();
		}
		else if(jQuery('.apply_invited').css('display') == 'block')
		{
			jQuery('.apply_invited').slideUp();
			jQuery('.apply_invited_checkbox').attr('checked',false);
		}
		
	});
	
	
	jQuery("#myQuery").click(function(){
	
		if(jQuery('.myQuerysubmenu').css('display') == 'none')
		{
			jQuery('.myQuerysubmenu').slideDown();
		}
		else if(jQuery('.myQuerysubmenu').css('display') == 'block')
		{
			jQuery('.myQuerysubmenu').slideUp();
		}
		
	})
</script>