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