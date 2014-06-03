<?php	
echo $this->Html->script(array(
	'jquery/jquery-1.7.2.min',
	'message_front_show',
	'jquery/confirm',
	'jquery/jquery.simplemodal'
));
echo $this->Html->css(array('message_style'));
?>



<script type="text/javascript">
var SITEURL = '<?php echo Configure::read('App.SiteUrl');?>';
//jQuery.modal.close();

<?php 
if ($this->Session->check('Message.flash')==1) {
?>
	
	showFlashSuccess('<?php echo $this->Session->flash(); ?>');
	setTimeout(function()
			{
				window.location.href = SITEURL + '/users/social_media_authenticate';
			},2000);
	
	 
<?php } ?>

</script>