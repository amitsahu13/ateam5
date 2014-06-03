<?php	
echo $this->Html->script(array(
	'jquery/jquery-1.7.2.min',
	'message_front_show'
));
echo $this->Html->css(array('message_style'));
?>



<script type="text/javascript">
<?php 
if ($this->Session->check('Message.flash')==1) {
?>
	showFlashSuccess('<?php echo $this->Session->flash(); ?>');
<?php } ?>
</script>
<script style="text/javascript">
var flag = '<?php echo $flag; ?>';
var SITEURL = '<?php echo Configure::read('App.SiteUrl');?>';

if(flag == 'login_success')
{
	<?php
	if($this->Session->read('Auth.User.role_id') == Configure::read('App.Role.Buyer'))
	{
	?>
		window.location.href = SITEURL + '/projects/my_project';
	<?php	
	}
	if($this->Session->read('Auth.User.role_id') == Configure::read('App.Role.Provider'))
	{
	?>
	window.location.href = SITEURL + '/jobs/my_job';
	<?php
	}
	if($this->Session->read('Auth.User.role_id') == Configure::read('App.Role.Both'))
	{
	?>
		window.location.href = SITEURL + '/projects/my_project';
	<?php	
	}
	?>
	
}
if(flag == 'admin_inactive')
{
	window.location.href = SITEURL + '/users/register';
}


</script>

