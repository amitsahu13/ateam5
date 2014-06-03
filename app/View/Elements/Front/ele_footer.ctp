<?php
$name='';
$email='';
if($this->Session->check('Auth.User.id'))
{
	$name = $this->Session->read('Auth.User.first_name')." ".$this->Session->read('Auth.User.last_name');
	$email = $this->Session->read('Auth.User.email');
}
?>
<script>
feedback_name = '<?php echo $name;?>';
feedback_email = '<?php echo $email;?>';
</script>
<?php
echo $this->Html->css(array('feedback_slider/contactable'));
echo $this->Html->script(array('feedback_slider/jquery_validate_pack','feedback_slider/jquery_contactable'));

if(!$this->Session->check('Auth.User.id'))
{
?>
<div class="powerde_by">
<div class="pwd_container">
<div class="pwd_mid">
<div class="pwd_left">A Team 4 A Dream <span>is powered by:</span></div>
<div class="pwd_right">
<ul>
<!--<li><div class="pwd_imgs"><?php echo $this->Html->image('pwd_2.png');?></div></li>
<li><div class="pwd_imgs"><?php echo $this->Html->image('pwd_3.png');?></div></li>-->
<li style="width: 300px; text-align: center; padding-top: 18px;"><?php echo $this->Html->image('firehost-logo-black.png');?></li>
<li style="width: 215px; text-align:center;"><div class="float_left"><?php echo $this->Html->image('maxmind-logo.gif',array('width'=>109,'height'=>53));?></div></li>
<li><div class="float_left"><?php echo $this->Html->image('pwd_1.png');?></div></li>

</ul></div>
</div>
<div class="clear"></div>
</div>
</div>
<?php
}
?>
<div class="clear"></div>


<div id="footer_wrp">
	<div class="footer<? if($this->Session->check('Auth.User.id')):  ?> sets-2<? endif; ?>">
    	<div class="ftr_lnks">
    	 
    	 <? if($this->Session->check('Auth.User.id')):  ?> 
    	
        	<ul class="footer-col-1">
            	<h3 class="yellow">My Place</h3>
            	<li><?php echo $this->Html->link('My Projects',array('controller'=>'projects','action'=>'my_project'));?></li>
                <li>
               <!--  <?php echo $this->Html->link('My Jobs',array('controller'=>'jobs','action'=>'my_job'),array('escape'=>false,'div'=>false));?>  -->


                </li>
                <li><?php echo $this->Html->link('My Workrooms',array('controller'=>'Inbox','action'=>'index/2'));?></li>
                 
                 <li><a href="/Inbox/index">My Inbox</a></li>
                 <li> <?php echo $this->Html->link('My Profile',array('controller'=>'users','action'=>'user_profile_overview'));?> </li>
                 <li> <?php echo $this->Html->link('My user info',array('controller'=>'users','action'=>'my_workroom'));?> </li>
                 
                 
                 <li> 
                 <?php if($this->Session->check('Auth.User.id')): ?> 
                 <?php echo $this->Html->link('Authenticate myself',array('controller'=>'users','action'=>'userinfo_authenticate'));?> 
               <? endif;?>  
                 
                  </li>
           
            </ul>
            
            <? endif ;  ?> 
            
            
            
            <ul class="footer-col-2">
            	<h3  class='blue' style='color:#00B6CD;'>  I Have a Dream </h3>
            	 
            	 	 <? if($this->Session->check('Auth.User.id')):  ?> 
            	<li>
            		<?php echo $this->Html->link('Post a project', array('controller'=>'projects','action'=>'project_general?new=1'),array('div'=>false,'lable'=>false,'escape'=>false)); ?>
            	</li>
            	
            	
                <li><a href="#">Post a job in a project</a>
                
                </li>
                <li>
                	<?php echo $this->Html->link('Search Experts', array('controller'=>'users','action'=>'search_expert'),array('div'=>false,'lable'=>false,'escape'=>false)); ?>
                </li>
             
                      <? endif ;  ?>  
                
                <h3 class="pink">  Join a Team </h3>
                
                
                 <? if($this->Session->check('Auth.User.id')):  ?> 
                <li>
               		<?php echo $this->Html->link('Search projects', array('controller'=>'projects','action'=>'search_project'),array('div'=>false,'lable'=>false,'escape'=>false)); ?>
                </li>
                <li>
                
                	<?php echo $this->Html->link('Search jobs', array('controller'=>'jobs','action'=>'search_job'),array('div'=>false,'lable'=>false,'escape'=>false)); ?>
                </li>
                <li>
                	
                	<?php echo $this->Html->link('Search Leaders', array('controller'=>'users','action'=>'search_leader'),array('div'=>false,'lable'=>false,'escape'=>false)); ?>
                </li>
             
                
                
                <? else: ?>  
                
                
      <h3 class="whyt" style='color:#FFF000'> How It Works?</h3>
            	
            	
			<?php //pr($footer_link);die;
				foreach($footer_link as $key=>$value)
				{
					if($value['Page']['parent_id'] == HOW_IT_WORKS)
					{
			?>
            	<li>
					<?php echo $this->Html->link(ucfirst($value['Page']['title']),array('controller'=>'pages','action'=>'view','static'=>$value['Page']['slug']),array('div'=>false,'lable'=>false,'escape'=>false)); ?>
				</li>
            <?php
					}
				}
			?>
                
                
                
            <? endif ;  ?>  
                
            </ul>
		 
            <ul class="footer-col-3">
            <? if($this->Session->check('Auth.User.id')):  ?>  
            
            	
            
            
            
            
            
            	<h3 class="whyt">How It Works?</h3>
            	
            	
			<?php  
				foreach($footer_link as $key=>$value)
				{
					if($value['Page']['parent_id'] == HOW_IT_WORKS)
					{
			?>
            	<li>
					<?php echo $this->Html->link(ucfirst($value['Page']['title']),array('controller'=>'pages','action'=>'view','static'=>$value['Page']['slug']),array('div'=>false,'lable'=>false,'escape'=>false)); ?>
				</li>
            <?php
					}
				}
			?> 
				<h3 class="whyt"> Resource Center </h3>
				
				<?php  
				foreach( $footer_link  as $key=>$value)
				{
					if($value['Page']['parent_id'] ==  RESOURCES)
					{
			?>
            	<li>
					<?php echo $this->Html->link(ucfirst($value['Page']['title']),array('controller'=>'pages','action'=>'view','static'=>$value['Page']['slug']),array('div'=>false,'lable'=>false,'escape'=>false)); ?>
				</li>
            <?php
					}
				}
			?> 
				
			<? endif;?> 
			
				<h3 class="whyt">About A Team 4 A Dream</h3>
            <?php 
				foreach($footer_link as $key=>$value)
				{
					if($value['Page']['parent_id'] == ABOUT_TEAM)
					{
			?>
            	<li>
					<?php 
					if($value['Page']['slug'] == 'feedback')
					{
						?> <a href="javascript:void(0);" class="contactform">Feedback</a> <?php
					}
					else
					{
						echo $this->Html->link(ucfirst($value['Page']['title']),array('controller'=>'pages','action'=>'view','static'=>$value['Page']['slug']),array('div'=>false,'lable'=>false,'escape'=>false));
					}

					?>
				</li>
            <?php
					}
				}
			?>
			
			
			   <? if(!$this->Session->check('Auth.User.id')):  ?> 
					
				<h3 class="whyt">Help</h3>
            <?php 
				foreach($footer_link as $key=>$value)
				{
					if($value['Page']['parent_id'] == HELP)
					{
			?>
            	<li>
					<?php echo $this->Html->link(ucfirst($value['Page']['title']),array('controller'=>'pages','action'=>'view','static'=>$value['Page']['slug']),array('div'=>false,'lable'=>false,'escape'=>false)); ?>
				</li>
            <?php
					}
				}
			?>
              
				<? endif;?> 
			
            </ul>
            
              <ul class="footer-col-4">
            
            
            
            
                <? if($this->Session->check('Auth.User.id')):  ?> 
          
            	<h3 class="whyt">Help</h3>
            <?php 
				foreach($footer_link as $key=>$value)
				{
					if($value['Page']['parent_id'] == HELP)
					{
			?>
            	<li>
					<?php echo $this->Html->link(ucfirst($value['Page']['title']),array('controller'=>'pages','action'=>'view','static'=>$value['Page']['slug']),array('div'=>false,'lable'=>false,'escape'=>false)); ?>
				</li>
            <?php
					}
				}
			?>
              
         
            
            <? endif;?>  
            
              <h3 class="whyt">Stay in touch</h3>
            	<li>
					<?php echo $this->Html->link('Feedback',array('controller'=>'','action'=>''),array('div'=>false));?>
				</li>
            	<li>
					<?php echo $this->Html->link('blog',array('controller'=>'blogs','action'=>'listing'),array('div'=>false));?>
				</li>
                
                
                      <h3 class="whyt">Share</h3>
            
				 <li><a href="#" class="fb"></a><a href="#" class="twtr"></a><a href="#" class="rss"></a></li>
			
               </ul> 
            
        </div>
       
        <?php echo $this->element('Front/ele_footer_logo'); ?>
    </div>
</div>
<!--Feedback form start from here -->
<script>
$(function(){$('#contactable').contactable({userid:'user_id'})});
$(document).ready(function(){
    $(".contactform").click(function(){
          $("#contactable_inner").click(); //opens contact form
       
    });
});
</script>
<div id="contactable"><!-- contactable html placeholder --></div>
<!--Feedback form end from here -->
            
 

<div class="share_lnk">
	<ul style="padding-top: 15px;">
    	<!--<li><a href="#" class="hrt"></a></li>-->
        <li><a href="#" class="fb"></a></li>
        <li><a href="#" class="twtr"></a></li>
        <li><a href="#" class="rss"></a></li>
    </ul>
</div>

