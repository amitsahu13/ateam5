<div class="content-box"><!-- Start Content Box -->

	<div class="content-box-header">
		
		<h3 style="cursor: s-resize;">Blog Detail</h3>
		
		<ul class="content-box-tabs">
			<li></li>
		</ul>
		<?PHP //pr($data); ?>
		<div class="clear"></div>
		
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		
		<div style="display: none;" class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
			<?php //echo $this->General->data_picture($data['Blog']['id'], $data['Blog']['image'], 'LARGE');?>
			
			<table id="admins" class="wordwrap">
				
				<tfoot>
					<tr>
						<td colspan="2">
							<div class="bulk-actions align-left">
								
								<?php echo $this->Html->link("Back", array('action'=>'index'), array("class"=>"button", "escape"=>false)); ?>
								
							</div>
							
						</td>
					</tr>
				</tfoot>
			 
				<tbody>
					<tr>
						<td>Title</td>
						<td><?php echo ($blog['Blog']['title']);?></td>
					</tr>
				<!--	<tr>
						<td>Sex</td>
						<td><?php //echo (Configure::read('App.Sex.'.$blog['Blog']['sex']));?></td>
					</tr> -->
					
					<tr>
						<td>Article</td>
						<td><?php echo nl2br($blog['Blog']['article']);?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td><?php echo ($this->Layout->status($blog['Blog']['status']));?></td>
					</tr>
					<tr>
						<td>Blog Created</td>
						<td><?php echo ($this->Time->niceShort(strtotime($blog['Blog']['created'])));?></td>
					</tr>
					<tr>
						<td>Updated on</td>
						<td><?php echo ($this->Time->niceShort(strtotime($blog['Blog']['modified'])));?></td>
					</tr>
				</tbody>
				
			</table>
			
		</div> 
		
	</div> <!-- End .content-box-content -->
	
</div> <!-- End .content-box -->


<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		
		<h3 style="cursor: s-resize;">Blog Comment</h3>
		<ul class="content-box-tabs"><?php //pr($tabs); die; ?>
			<?php foreach($tabs as $tab=>$count){ ?>
					<li><a href="#<?php echo ($tab);?>" <?php echo ($defaultTab==$tab?'class="default-tab"':'');?>><?php echo ($tab);?> (<?php echo ($count); ?>)</a></li>
			<?php }
			?>
		</ul>
		
		<div class="clear"></div>
		
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
	
		<div id="page-loader">
			<?php
				echo ($this->Html->image('admin/loading.gif'));
			?>
		</div>
		<?php
		echo ($this->Form->create(''.$modelc.'', array('name'=>''.$modelc.'', 'url' => array('controller'=>'blogs','action' => 'comment_process'))));
		echo ($this->Form->hidden('pageAction', array('id' => 'pageAction')));
		echo ($this->Form->hidden('Blog.id', array('value' => $blog_id)));
		
		foreach($tabs as $tab=>$count){ ?>
		
		<div class="tab-content<?php echo ($defaultTab==$tab?' default-tab':'');?>" id="<?php echo ($tab);?>"> <!-- This is the target div. id must match the href of this div's tab -->
			
			<div id="target<?php echo ($tab);?>"><?php
				echo ($defaultTab==$tab?$this->element('Admin/'.$model.'/comment_table'):'');
			?></div>
			
		</div> 
		
		<?php 
		}
		echo ($this->Form->end());
		?>
		
	</div> <!-- End .content-box-content -->
	
</div> <!-- End .content-box -->
<script type="text/javascript">
var controller = '<?php echo $controller;?>';
jQuery(document).ready(function(){
	init('#target<?php echo($defaultTab);?>');
});
</script>