<?php if(!empty($data)){
		$this->ExPaginator->options = array('url' => $this->passedArgs);?>
<table class="wordwrap">
				
	<thead>
		<tr>
			<th width="20px"><!--<input name="chkbox_n" id="chkbox_id" type="checkbox" value="" class="check-all" />--></th>
			<th><?php echo ($this->ExPaginator->sort('User.username', 'Admin name'))?></th>
			<th><?php echo ($this->ExPaginator->sort('User.first_name', 'First Name'))?></th>
			<th><?php echo ($this->ExPaginator->sort('User.last_name', 'Last Name'))?></th>
			<th width="200px"><?php echo ($this->ExPaginator->sort('User.email', 'Email'))?></th>
			<!--<th width="100px"><?php //echo ($this->ExPaginator->sort('User.created', 'Created on'))?></th>-->
			<!--<th width="100px"><?php //echo ($this->ExPaginator->sort('User.modified', 'Modified on'))?></th>-->
			<th width="70px"><?php //echo ($this->ExPaginator->sort('User.status', 'Status'))?></th>
			<th width="56px">Action</th>
		</tr>
		
	</thead>
	
	<tfoot>
		<tr>
			<td colspan="7">
			<?php
			
				/* <div class="bulk-actions align-left">
					<select name="data['User']['action']" id="AdminAction<?php echo ($defaultTab);?>">
						<option selected="selected" value="">Choose an action...</option>
						<option value="activate">Activate</option>
						<option value="deactivate">Deactivate</option>
						<option value="delete">Delete</option>
					</select>
					<?php echo ($this->Form->submit('Apply to selected', array('name'=>'activate', 'class'=>'button','div'=>false, 'type'=>'button', "onclick" => "javascript:return validateChk('User','AdminAction{$defaultTab}');")));?>
					
				</div> */
				?>
				<?php 
				
				$this->Paginator->options(array(
					
					 'url' => $this->passedArgs,
					 
				));
				echo $this->element('admin/admin_pagination', array("paging_model_name"=>"User", "total_title"=>"Admins")); ?>
				
			</td>
		</tr>
	</tfoot>
	
	<tbody>
			
		<?php
			$alt=0;
			foreach($data as $value){		 
		 ?>
		<tr <?php echo ($alt==0)?'class="alt-row"':''; $alt=!$alt;?>>
			<td><?php 
			/* if($value['User']['role_id'] == Configure::read('App.Role.SubAdmin'))
			{
				echo ($this->Form->checkbox('User.id.', array('value'=>$value['User']['id'], 'hiddenField'=>false )));
			} */
			?></td>
			<td><b><a href="javascript:void(0);"><?php echo $value['User']['username'];?></a><?php //echo ($this->Html->link($value['User']['username'],array('action'=>'view', $value['User']['id']),array('title'=>'View Details')));?></b></td>
			
			<td><?php echo ($value['User']['first_name']);?></td>
			<td><?php echo ($value['User']['last_name']);?></td>
			<td><?php echo ($value['User']['email']);?></td>
			<?php
			/* <td><?php echo ($this->Time->niceShort_new(strtotime($value['User']['created'])));?></td>
			<td><?php 
			 if(!empty($value['User']['modified'])){
				echo ($this->Time->niceShort_new(strtotime($value['User']['modified'])));
			 }
			?></td> */
			?>
			<td><?php 
			/* if($value['User']['role_id'] == Configure::read('App.Role.Admin'))
			{
				$output = '';
				if ($value['User']['status'] == 1) 
				{
				  $output = 'Active';
				} else if ($value['User']['status'] == 0) {
				   $output = 'Inactive';
					}
					echo $output;
			}		
			if($value['User']['role_id'] == Configure::read('App.Role.SubAdmin'))
			{
				echo ($this->Html->link($this->Layout->status($value['User']['status']), array('action'=>'status',$value['User']['id'],'token'=>$this->params['_Token']['key']), array('title'=>$value['User']['status']==0?'activate':$value['User']['status']==1?'deactivate':'activate')));
			}	 */
		
			?></td>
			<td>
				<!-- Icons -->
				 <?php 
					echo ($this->Html->link($this->Html->image('admin/pencil.png', array('title'=>'Edit','alt'=>'Edit')), array('controller'=>'admins', 'action'=>'edit', $value['User']['id']), array('escape'=>false)));
				?>
				<?php 
					if($value['User']['role_id'] == Configure::read('App.Role.SubAdmin'))
					{
					echo ($this->Html->link($this->Html->image('admin/cross.png', array('title'=>'Delete','alt'=>'Delete')), array('controller'=>'admins', 'action'=>'delete', $value['User']['id'],'token'=>$this->params['_Token']['key']), array('escape'=>false, 'onclick'=>'javascript:return confirm_delete(this)')));
					}
				?>
				<?php 
					echo ($this->Html->link($this->Html->image('admin/hammer_screwdriver.png', array('title'=>'Change Password','alt'=>'Change Password')), array('controller'=>'admins', 'action'=>'change_password', $value['User']['id']), array('escape'=>false)));
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