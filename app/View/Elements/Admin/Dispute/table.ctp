<?php if(!empty($data)){
		$this->ExPaginator->options = array('url' => $this->passedArgs);?>
<table>
				
	<thead>
		<tr>	
			<th width="20px"><input name="chkbox_n" id="chkbox_id" type="checkbox" value="" class="check-all"/></th>
			<th><?php echo ($this->ExPaginator->sort("Buyer.first_name", 'Buyer'))?></th>
			<th><?php echo ($this->ExPaginator->sort("Provider.first_name", 'Provider'))?></th>
			<th><?php echo ($this->ExPaginator->sort(''.$model.'.comment', 'Comment'))?></th>
			<th><?php echo ($this->ExPaginator->sort(''.$model.'.status', 'Status'))?></th>
			<th><?php echo ($this->ExPaginator->sort(''.$model.'.created', 'Created'))?></th>
			<th width="16px">Action</th>
		</tr>
		
	</thead>
 
	<tfoot>
			<tr>
			<td colspan="7">
				<div class="bulk-actions align-left">
					<select name="data['<?php echo $model;?>']['action']" id="UserAction<?php echo ($defaultTab);?>">
						<option selected="selected" value="">Choose an action...</option>
						<option value="activate">Activate</option>
						<option value="deactivate">Deactivate</option>
						<option value="delete">Delete</option>
					</select>
					<?php echo ($this->Form->submit('Apply to selected', array('name'=>'activate', 'class'=>'button','div'=>false, 'type'=>'button', "onclick" => "javascript:return validateChk('".$model."','UserAction{$defaultTab}');")));?>
					
				</div>
				<?php 
				
				$this->Paginator->options(array(
					
					 'url' => $this->passedArgs,
					 
				));
				echo $this->element('admin/admin_pagination', array("paging_model_name"=>"".$model."", "total_title"=>"".$model."s")); ?>
				
			</td>
		</tr>
	</tfoot>
	<tbody>
			
		<?php
			$alt=0;
			foreach($data as $value){		 
		 ?>
		<tr <?php echo ($alt==0)?'class="alt-row"':''; $alt=!$alt;?>>
			<td><?php echo ($this->Form->checkbox(''.$model.'.id.', array('value'=>$value[''.$model.'']['id'], 'hiddenField'=>false ))); ?></td>
			<td>
			<b>
				<?php echo ($this->Html->link($this->General->wrap_long_txt($value['Buyer']['first_name'],0,50),array('action'=>'user_dispute_list','b',$value['Buyer']['id']),array('title'=>'View All Disputes')));?>
			</b></td>
			<td>
			<b>
				<?php echo ($this->Html->link($this->General->wrap_long_txt($value['Provider']['first_name'],0,50),array('action'=>'user_dispute_list','p',$value['Provider']['id']),array('title'=>'View All Disputes')));?>
			</b></td>
			<td>
			<b>
				<?php echo ($this->Html->link($this->General->wrap_long_txt($value[$model]['comment'],0,10),array('action'=>'view', $value[$model]['id']),array('title'=>'View Comment')));?>
			</b></td>
			<td><?php echo ($this->Html->link($this->Layout->Status($value[''.$model.'']['status']), array('action'=>'status',$value[''.$model.'']['id'],'token'=>$this->params['_Token']['key']), array('title'=>$value[''.$model.'']['status']==0?'activate':$value[''.$model.'']['status']==1?'deactivate':'activate')));?></td>	
			<td><?php echo ($this->Time->niceShort($value[$model]['created']));?></td>			
			<td>
				<!-- Icons -->
				 <?php 
				 //echo ($this->Html->link($this->Html->image('admin/pencil.png', array('title'=>'Edit','alt'=>'Edit')), array('controller'=>''.$controller.'', 'action'=>'edit', $value[''.$model.'']['id'],'token'=>$this->params['_Token']['key']), array('escape'=>false)));
				 echo "&nbsp;&nbsp;";
				 echo ($this->Html->link($this->Html->image('admin/cross.png', array('title'=>'Delete','alt'=>'Delete')), array('controller'=>''.$controller.'', 'action'=>'delete', $value[''.$model.'']['id'],'token'=>$this->params['_Token']['key']), array('escape'=>false, 'onclick'=>'javascript:return confirm_delete(this)')));
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