<?php echo $this->element("Front/ele_post_project_navigation");?>		

<div class="product_dscrpBOX" style="width:100%;">
<h3><span class="round_bgTXT">1</span>General</h3>
<div class="compensation_frmDV">
<?php
echo $this->Form->create('Project',array('url'=>array('controller'=>'projects','action'=>'project_general'),'type'=>'file'));
?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<td><td>
			</td></td>
			<td></td>
		</tr>
		<tr>
			<td><td>
			</td></td>
			<td></td>
		</tr>
	<table>	
    <?php
	echo $this->Form->end();
	?>
	</div>
</div>
<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>		

	
