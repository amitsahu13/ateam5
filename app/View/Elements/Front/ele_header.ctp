<noscript>
    <h2>This web site needs javascript activated to work properly. Please activate it. Thanks!</h2>
</noscript>
<script>
jQuery(document).ready(function(){
	
	
	
	jQuery(".FloatRi").mouseleave(function(){
	    jQuery(".loginslidingDiv").slideUp();
	  });
	 jQuery(".nav").mouseleave(function(){
		    jQuery(".SubMenuNav").slideUp();
		  });
	 
	 
	 
	 
	jQuery(".common_navigation").mouseenter(function(){
		
		var sub_menu = jQuery(this).attr('rel');
		jQuery("."+sub_menu).slideDown();
		
		jQuery(".SubMenuNav").each(function(i){
			var temp = jQuery(this).attr('id').split("-");
			if(temp[1] != sub_menu)
			{
				jQuery("#navigation-"+temp[1]).hide();
			}
		})
	});
}); 

</script>

 <!--  Jobs Applications Stack   --> 
  <?  echo $this->Html->script(array(  'jquery/jquery.selectbox-0.2'  ));
 echo $this->Html->css(array('jquery/jquery.alerts','style','jquery.powertip','message_style','jquery.selectbox'));


 ?> 
  <script type="text/javascript">
  jQuery(document).ready(function($){
   
   $(".custom_dropdown").selectbox(); 
  });
 </script>



<div id="header_wrp">
	<div class="header">
    	<div class="nav">
			<?php
			if($this->Session->check('Auth.User.id'))
			{
			
			?>
        	<ul>
            	<li><?php echo $this->Html->link('MY PLACE','javascript:void(0);',array('id'=>'my_place','rel'=>'my_place' ,'class'=>'common_navigation'));?>
				<div class="AeroDiv"><?php echo $this->Html->image('yellow_arw.png',array('alt'=>'how it works'))?></div>
				
				<div class="SubMenuNav my_place" id="navigation-my_place">
                    	 
                    	 <?php  if($this->Session->read('Auth.User.role_id')==Configure::read('App.Role.Buyer')){ ?>	
						<ul class="SubMenu">
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
						<ul class="SubMenu">
							
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
				
				
				
					<ul class="SubMenu">
							
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
				








							
					 
			<?php   } ?>
                    	 
                    	 
                    	 
                </div>
				
				</li>
                <li><a href="javascript:void(0);" id="header_dream" rel="header_dream" class="common_navigation">i have a dream</a>
				<div class="AeroDiv"><?php echo $this->Html->image('blue_aero.png',array('alt'=>'how it works'))?></div>
				<div class="SubMenuNav header_dream" id="navigation-header_dream">
                    	<ul class="SubMenu">
                        	<li><?php echo $this->Html->link('Post a Project',array('controller'=>'projects','action'=>'project_general?new=1'),array('escape'=>false,'div'=>false));?></li>
                            
                            <li><?php
                            
                          
							echo $this->Html->link('Search Experts',array('controller'=>'users','action'=>'search_expert'),array('escape'=>false,'div'=>false));
							
							
							?></li>
                           
                        </ul>
                	</div>
				</li>
                <li><a href="javascript:void(0);" id="join_team" rel="join_team" class="common_navigation">join a team</a>
				<div class="AeroDiv"><?php echo $this->Html->image('red_aero.png',array('alt'=>'how it works'))?></div>
				<div class="SubMenuNav join_team" id="navigation-join_team">
                    	<ul class="SubMenu">
							<li>
							<?php
							echo $this->Html->link('Search Projects',array('controller'=>'projects','action'=>'search_project'),array('escape'=>false,'div'=>false));
							?>
							</li>
                            <li><?php
							echo $this->Html->link('Search Jobs',array('controller'=>'jobs','action'=>'search_job'),array('escape'=>false,'div'=>false));
							?></li>
                            <li><?php
							echo $this->Html->link('Search Leaders',array('controller'=>'users','action'=>'search_leader'),array('escape'=>false,'div'=>false));
							?></li>
                           
                        </ul>
                	</div>
				</li>
                <li><a href="javascript:void(0);" id="how_it_work"  rel="how_it_work" class="common_navigation">how it works</a>
				<div class="AeroDiv"><?php echo $this->Html->image('yellow_arw.png',array('alt'=>'how it works'))?></div>
				
				<div class="SubMenuNav how_it_work" id="navigation-how_it_work">
                    	<ul class="SubMenu">
                        	<?php //pr($footer_link);die;
							foreach($footer_link as $key=>$value){
								if($value['Page']['parent_id'] == HOW_IT_WORKS){ ?>
            						<li><?php 
            							$slug = $value['Page']['slug'];
            							if($slug == 'online-collaboration-realized'){
            								$class = '';
            							}
            							else{
            								$class = '' ;
            							}
            							
										echo $this->Html->link(ucfirst($value['Page']['title']),array('controller'=>'pages','action'=>'view','static'=>$value['Page']['slug']),array('div'=>false,'class'=>$class,'lable'=>false,'escape'=>false)); ?>
								    </li><?php
								}
							}?>
                        </ul>
                </div>
				</li>
				<li><a href="javascript:void(0);" id="aboutat4" rel="aboutat4" class="common_navigation">about at4ad</a>
				<div class="AeroDiv"><?php echo $this->Html->image('white_arw.png',array('alt'=>'how it works'))?></div>
				<div class="SubMenuNav aboutat4" id="navigation-aboutat4"> 
                    	<ul class="SubMenu">
           		
                            <?php //pr($footer_link);die;

 
							foreach($footer_link as $key=>$value){
								if($value['Page']['parent_id'] == ABOUT_TEAM){  ?>
            						<?php 
            							$slug = $value['Page']['slug'];
            							if($slug == 'feedback'){
            							 	 ?>
            							 	<li> <a href="javascript:void(0);" class="contactform">Feedback</a> </li> <?php 
            							}
            							
            							if($slug == 'countact-us'){ ?>
            							  <li> <?php echo $this->Html->link(ucfirst($value['Page']['title']),array('controller'=>'pages','action'=>'view','static'=>$value['Page']['slug']),array('div'=>false,'lable'=>false,'escape'=>false)); ?> </li> <?php	
            							}
            								if(($slug == 'tell-a-friend')||($slug == 'about')){ ?>
            							  <li> <?php echo $this->Html->link(ucfirst($value['Page']['title']),array('controller'=>'pages','action'=>'view','static'=>$value['Page']['slug']),array('div'=>false,'lable'=>false,'escape'=>false)); ?> </li> <?php	
            							}


										 ?>
								     <?php
								}
							}?>
                           
                        </ul>
                	</div>
				</li>
                <li><a href="javascript:void(0);" id="help" rel="help" class="common_navigation">help</a>
				<div class="AeroDiv"><?php echo $this->Html->image('white_arw.png',array('alt'=>'how it works'))?></div>
				<div class="SubMenuNav help" id="navigation-help">
                    	<ul class="SubMenu">
                    		<?php //pr($footer_link);die;
							foreach($footer_link as $key=>$value){
								if($value['Page']['parent_id'] == HELP){ ?>
            						<li><?php 
            						
            							echo $this->Html->link(ucfirst($value['Page']['title']),array('controller'=>'pages','action'=>'view','static'=>$value['Page']['slug']),array('div'=>false,'class'=>$class,'lable'=>false,'escape'=>false)); ?>
								    </li><?php
								}
							}?>
                        	<!-- <li><a href="#">Q&amp;A</a></li>
                            <li><a class="act" href="#">Trust, Safety, Privacy</a></li>
                            <li><a href="#">Code of Conduct</a></li>
                            <li><a href="#">Terms of service</a></li>
                            <li><a href="#">Contact Support</a></li>  -->
                        </ul>
                	</div>
				</li>
                <li> <a href='/blog'>  Blog </a></li>
                
                
                <?   if ($this->Session->check('Auth.User.id')):?>
				<li><input name="" type="text" class="search" /><input type="submit" class="serach_icon" /></li>
				<? endif;?> 	
				<li class="FloatRi"><?php 
					if(!$this->Session->check('Auth.User.id'))
					{
						echo $this->Html->link('Log In |',array('controller'=>'users','action'=>'login'),array('div'=>false,'class'=>'login'));
						echo $this->Html->link('Signup',array('controller'=>'users','action'=>'register'),array('div'=>false,'class'=>'signup'));
					}
					else
					{					
					?>			
					
					<!--  Server   Delice   -->		  
					 	<a href="#" class="login_slct" id="show_hide_login_logout" title="<?php echo ucwords($user_data['User']['first_name']." ".$user_data['User']['last_name']);?>" >
						<?php echo $this->General->wrap_long_txt($user_data['User']['username'],0,6); ?> <span></span></a>
						
						<div class="loginslidingDiv" id="show_hide_login" style="display:none;">
							<ul>
								<li><?php echo $this->Html->link('Logout',array('controller'=>'users','action'=>'logout'),array('div'=>false));?></li>
								<!--<li><a href="#" class="act">Another room</a></li>-->
								<li class="margin_bottom"><?php 
								$class="";
								if($this->request->params['controller']=='projects' && $this->request->params['action']=='my_project' )
								{
									$class="act";
								}

							     if ($this->Session->read('Auth.User.role_id')!=4)  
								echo $this->Html->link('My user info',array('controller'=>'projects','action'=>'my_project'),array('div'=>false,'class'=>$class));
					else 
								echo $this->Html->link('My user info',array('controller'=>'jobs','action'=>'my_job'),array('div'=>false,'class'=>$class));
 
	
							?>
								</li>
								
							</ul>
						</div>      
				<?php		
					}
				?>
				</li>
            </ul>
			<?php
			}
			else
			{
			?>
			
			<ul>
         
                <li>
				<?php echo $this->Html->link('i have a dream',array('controller'=>'users','action'=>'register',Configure::read('App.Role.Buyer')),array("id"=>"header_dream"));?>
				
				</li>
                <li>
				<?php echo $this->Html->link('join a team',array('controller'=>'users','action'=>'register',Configure::read('App.Role.Provider')),array("id"=>"join_team"));?>
				</li>
                <li><a href="javascript:void(0);" id="how_it_work"  rel="how_it_work" class="common_navigation">how it works</a>
				<div class="AeroDiv"><?php echo $this->Html->image('yellow_arw.png',array('alt'=>'how it works'))?></div>
				
				<div class="SubMenuNav how_it_work" id="navigation-how_it_work">
                    	<ul class="SubMenu">
                        	<li><a href="#">Watch The Film</a></li>
                            <li><a class="act" href="#">Online collaboration Realized</a></li>
                            <li><a href="#">The Contracts</a></li>
                            <li><a href="#">Project Guidelines</a></li>
							<li><a href="#">Salaried Employees Guidelines</a></li>
                        </ul>
                </div>
				</li>
                
                
                <li> <a href='/blog'>  Blog </a> </li>
                <?   if ($this->Session->check('Auth.User.id')):?>
                <li><input name="" type="text" class="search" /><input type="submit" class="serach_icon" /></li> 
                <? endif;?> 
                
				<li class="FloatRi"><?php 
					if(!$this->Session->check('Auth.User.id'))
					{
						echo $this->Html->link('Log In |',array('controller'=>'users','action'=>'login'),array('div'=>false,'class'=>'login','title'=>'login'));
						echo $this->Html->link('Register',array('controller'=>'users','action'=>'register'),array('div'=>false,'class'=>'signup','title'=>'register'));
					}
					else
					{					
					?>					
						<a href="javascript:void(0);" class="login_slct" id="show_hide_login_logout" title="<?php echo ucwords($user_data['User']['first_name']." ".$user_data['User']['last_name']);?>" ><?php echo $this->General->wrap_long_txt($user_data['User']['first_name'],0,6); ?> <span></span></a>
						<div class="loginslidingDiv" id="show_hide_login" style="display:none;">
							<ul>
								<li><?php echo $this->Html->link('Logout',array('controller'=>'users','action'=>'logout'),array('div'=>false));?></li>
								<!--<li><a href="#" class="act">Another room</a></li>-->
								<li class="margin_bottom"><?php 
								$class="";
								if($this->request->params['controller']=='users' && $this->request->params['action']=='my_project' )
								{
									$class="act";
								}
								echo $this->Html->link('My Account',array('controller'=>'users','action'=>'my_project'),array('div'=>false,'class'=>$class));
								?>
								</li>
								
							</ul>
						</div>      
				<?php		
					}
				?>
				</li>
            </ul>

			<?php
			}
			?>
        </div>
        <?php echo $this->element('Front/ele_header_logo'); ?>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
    //jQuery("#show_hide_login").hide();
	//jQuery("#show_hide_login_logout").show();
	
	jQuery('#show_hide_login_logout').click(function(){
		jQuery("#show_hide_login").slideToggle(10);
	});
});
</script>