

<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		
		<h3 style="cursor: s-resize;">Admin</h3>
		<!--
		<ul class="content-box-tabs">
			<?php	//foreach($tabs as $tab=>$count){?>
			<li><a href="#<?php //echo ($tab);?>" <?php //echo ($defaultTab==$tab?'class="default-tab"':'');?>><?php //echo ($tab);?> (<?php// echo ($count); ?>)</a></li>
			<?php //}?>
		</ul>
		-->
		<div class="clear"></div>
		
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div id="page-loader">
			<?php
				echo ($this->Html->image('admin/loading.gif'));
			?>
		</div>
		
		<?php
		echo ($this->Form->create('Admin', array('name'=>'Admin', 'url' => array('controller' => 'admins', 'action' => 'process'))));
		echo ($this->Form->hidden('pageAction', array('id' => 'pageAction')));
		
		foreach($tabs as $tab=>$count){?>
		
		<div class="tab-content<?php echo ($defaultTab==$tab?' default-tab':'');?>" id="<?php echo ($tab);?>"> <!-- This is the target div. id must match the href of this div's tab -->
			
			<div id="target<?php echo ($tab);?>"><?php
					echo ($defaultTab==$tab?$this->element('Admin/Admin/table'):'');
			?></div>
			
		</div> 
		
		<?php 
		}
		echo ($this->Form->end());
		?>
		
	</div> <!-- End .content-box-content -->
	
</div> <!-- End .content-box -->
<script type="text/javascript">
var controller = 'admins';
jQuery(document).ready(function(){
	init('#target<?php echo($defaultTab);?>');
});
</script>