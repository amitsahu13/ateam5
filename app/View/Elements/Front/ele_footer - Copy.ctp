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
?>
<div id="footer_wrp">
	<div class="footer">
    	<div class="ftr_lnks">
        	<ul>
            	<h3 class="yellow">My Place</h3>
            	<li><?php echo $this->Html->link('My Project',array('controller'=>'users','action'=>'my_project'));?></li>
                <li><a href="#">My Jobs</a></li>
                <li><?php echo $this->Html->link('My Workrooms',array('controller'=>'users','action'=>'my_workroom'));?></li>
                <li><a href="#">My Inbox</a></li>
                <li><a href="#">My Experts</a></li>
                <li><a href="#">Received job applications</a></li>
                <li><a href="#">Sent Job Applications</a></li>
                <li><a href="#">Received Invitations</a></li>
                <li><a href="#">My Queries</a></li>
                <li><a href="#">My Watch Lists</a></li>
                <!--<li><a href="#">My Portfolio</a></li>-->
				<li><a href="#">My Profile</a></li>
				<li><a href="#">My User Info</a></li>
                <li><a href="#">My Contracts</a></li>
                <li><a href="#">Preferences</a></li>
				<li><a href="#">Report Violation</a></li>
				<li><a href="#">Report Dispute</a></li>
            </ul>
            <ul>
            	<h3 class="blue">I Have a Dream</h3>
            	<li><a href="#">Post a project</a></li>
                <li><a href="#">Post a job in a project</a></li>
                <li><a href="#">Search Experts</a></li>
                <li><a href="#">Browse</a></li>
                <h3 class="pink" style="margin-top:15px;">Join a Team</h3>
                <li><a href="#">Serach projects</a></li>
                <li><a href="#">Search  jobs</a></li>
                <li><a href="#">Search Leaders</a></li>
                <li><a href="#">Browse </a></li>
            </ul>
			<?php //pr($footer_link); ?>
            <ul>
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
				<h3 class="whyt" style="margin-top:15px;">About A Team 4 A Dream</h3>
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
					echo $this->Html->link(ucfirst($value['Page']['title']),'javascript:void(0)',array('div'=>false,'lable'=>false,'escape'=>false,'id'=>'feedback'));
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
            </ul>
            <ul>
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
                <h3 class="whyt" style="margin-top:15px;">Stay in touch</h3>
            <?php 
				foreach($footer_link as $key=>$value)
				{
					if($value['Page']['parent_id'] == STAY_IN_TOUCH)
					{
			?>
            	<li>
					<?php echo $this->Html->link(ucfirst($value['Page']['title']),array('controller'=>'pages','action'=>'view','static'=>$value['Page']['slug']),array('div'=>false,'lable'=>false,'escape'=>false)); ?>
				</li>
            <?php
					}
				}
			?>
                
				 <li><a href="#" class="fb"></a> <a href="#" class="twtr"></a> <a href="#" class="rss"></a></li>
			
            </ul>
        </div>
        <?php echo $this->element('Front/ele_footer_logo'); ?>
    </div>
</div>
<!--Feedback form start from here -->
<script>
$(function(){$('#contactable').contactable({userid:'user_id'})});



</script>
<div id="contactable"><!-- contactable html placeholder --></div>
<!--Feedback form end from here -->
<div class="share_lnk">
	<ul>
    	<li><a href="#" class="hrt"></a></li>
        <li><a href="#" class="fb"></a></li>
        <li><a href="#" class="twtr"></a></li>
        <li><a href="#" class="rss"></a></li>
    </ul>
</div>
