<?php if(!empty($data)){
		$this->ExPaginator->options = array('url' => $this->passedArgs);?>
<table>				
	<thead>
		<tr>
			<th width="20px"><input name="chkbox_n" id="chkbox_id" type="checkbox" value="" class="check-all"/></th>
			<th><?php echo ($this->ExPaginator->sort('Faq.question', 'Question'))?></th>
			<th><?php echo ($this->ExPaginator->sort('Faq.order', 'Order no'))?></th>
			<th><?php echo ($this->ExPaginator->sort('Faq.status', 'Status'))?></th>
			<th width="16px">Action</th>
		</tr>
		
	</thead>
 
	<tfoot>
			<tr>
			<td colspan="7">
				<div class="bulk-actions align-left">
					<select name="data['Faq']['action']" id="UserAction<?php echo ($defaultTab);?>">
						<option selected="selected" value="">Choose an action...</option>
						<option value="activate">Activate</option>
						<option value="deactivate">Deactivate</option>
						<option value="delete">Delete</option>
					</select>
					<?php echo ($this->Form->submit('Apply to selected', array('name'=>'activate', 'class'=>'button','div'=>false, 'type'=>'button', "onclick" => "javascript:return validateChk('Faq','UserAction{$defaultTab}');")));?>
					
				</div>
				<?php 
				
				$this->Paginator->options(array(
					
					 'url' => $this->passedArgs,
					 
				));
				echo $this->element('admin/admin_pagination', array("paging_model_name"=>"Faq", "total_title"=>"Faqs")); ?>
				
			</td>
		</tr>
	</tfoot>
	<tbody>
			
		<?php
			$alt=0;
			foreach($data as $value){		 
		 ?>
		<tr <?php echo ($alt==0)?'class="alt-row"':''; $alt=!$alt;?>>
			<td><?php echo ($this->Form->checkbox('Faq.id.', array('value'=>$value['Faq']['id'], 'hiddenField'=>false ))); ?></td>
			
			<td><b><?php 
				echo $this->Html->link($this->General->wrap_long_txt($value['Faq']['question'],0,50),array('controller'=>'faqs','action'=>'view',$value['Faq']['id']), array('class="read_more"'));
				?></b></td>	
				<td><b><?php echo $value['Faq']['order'];	?></b></td>					
			<td><?php echo ($this->Html->link($this->Layout->Status($value['Faq']['status']), array('action'=>'status',$value['Faq']['id'],'token'=>$this->params['_Token']['key']), array('title'=>$value['Faq']['status']==1?'deactivate':'activate')));?></td>			
			<td>
				<!-- Icons -->
				 <?php 
				 echo ($this->Html->link($this->Html->image('admin/pencil.png', array('title'=>'Edit','alt'=>'Edit')), array('controller'=>'faqs', 'action'=>'edit', $value['Faq']['id'],'token'=>$this->params['_Token']['key']), array('escape'=>false)));
				 echo "&nbsp;&nbsp;";
				 echo ($this->Html->link($this->Html->image('admin/cross.png', array('title'=>'Delete','alt'=>'Delete')), array('controller'=>'faqs', 'action'=>'delete', $value['Faq']['id'],'token'=>$this->params['_Token']['key']), array('escape'=>false, 'onclick'=>'javascript:return confirm_delete(this)')));
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