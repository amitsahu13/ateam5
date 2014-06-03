<?php if(!empty($data)){
		$this->ExPaginator->options = array('url' => $this->passedArgs);?>
<table>
				
	<thead>
		<tr>
			<th><?php echo ($this->ExPaginator->sort('Template.name', 'Template Name'))?></th>
			<th><?php echo ($this->ExPaginator->sort('Template.subject', 'Email Subject'))?></th>
			<th><?php echo ($this->ExPaginator->sort('Template.modified', 'Updated'))?></th>
			<th width="16px">Action</th>
		</tr>
		
	</thead>
 
	<tfoot>
		<tr>
			<td colspan="4">
				<div class="bulk-actions align-left">
				</div>
				<?php $this->Paginator->options(
				array(
					 'url' => $this->passedArgs,
				));
				echo $this->element('admin/admin_pagination', array("paging_model_name"=>"Template", "total_title"=>"Templates")); ?>
			</td>
		</tr>
	</tfoot>
 
	<tbody>
		<?php
			$alt=0;
			foreach($data as $value){		 
		 ?>
		<tr <?php echo ($alt==0)?'class="alt-row"':''; $alt=!$alt;?>>
			<td><b>
			<?php echo ($this->Html->link($value['Template']['name'],Router::url(array('action'=>'display', $value['Template']['id'],'general'), true) ,array('title'=>'View Template', 'class'=>'view', 'target'=>'_blank','rel'=>'model')));?>
			</b></td>			
			<td><?php echo ($value['Template']['subject']);?></td>		
			<td><?php echo ($this->Time->niceShort($value['Template']['modified']));?></td>			
			<td>
				<!-- Icons -->
				 <?php 
					echo ($this->Html->link($this->Html->image('admin/pencil.png', array('title'=>'Edit','alt'=>'Edit')), array('action'=>'edit', $value['Template']['id']), array('escape'=>false)));
				?>
			</td>
		</tr>
		<?php
		  }
		 ?>
	</tbody>
</table>
<?php
	}else{
		echo ($this->element('admin_flash_info',array('message'=>'NO RESULTS FOUND')));
	}
?>

<div id="templateDialog"></div>
<script type="text/javascript">
	$('a.view').facebox();
</script>