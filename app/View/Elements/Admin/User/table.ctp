<?php
	if(!empty($data)){
	
		$this->ExPaginator->options = array('url' => $this->passedArgs);
?>
<table class="wordwrap">
				
	<thead>
		<tr>
			<th width="20px"><input name="chkbox_n" id="chkbox_id" type="checkbox" value="" class="check-all"/></th>
		<!-- <th>Image</th> -->
			<th><?php echo ($this->ExPaginator->sort('User.first_name', 'Name'));?></th>
			<th><?php echo ($this->ExPaginator->sort('User.username', 'Username'));?></th>
			<th><?php echo ($this->ExPaginator->sort('User.email', 'Email'));?></th>
			<th><?php echo ($this->ExPaginator->sort('UserDetail.city', 'City'));?></th>
			<th><?php echo ($this->ExPaginator->sort('UserDetail.country_id', 'Country'));?></th>
			<!-- <th><?php //echo ($this->ExPaginator->sort('UserDetail.all_validations', 'All Validations'));?></th> 
			<th><?php //echo ($this->ExPaginator->sort('UserDetail.involved_violation', 'Involved Violation'));?></th>
			<th><?php //echo ($this->ExPaginator->sort('UserDetail.involved_disputes', 'Involved Disputes'));?></th> -->
			<th><?php echo ($this->ExPaginator->sort('User.created', 'Created'))?></th>
			<th><?php echo ($this->ExPaginator->sort('User.status', 'Status'))?></th>
			<th width="76px">Action</th>
		</tr>
		
	</thead>
 
	<tfoot>
		<tr>
			<td colspan="6<?php //echo ($this->params['pass'][0]=='artist' ? '9' : '8'); ?>">
				<div class="bulk-actions align-left">
					<select name="data['User']['action']" id="UserAction<?php echo ($defaultTab);?>">
						<option selected="selected" value="">Choose an action...</option>
						<option value="activate">Activate</option>
						<option value="deactivate">Deactivate</option>
						<option value="delete">Delete</option>
					</select>
					<?php echo ($this->Form->submit('Apply to selected', array('name'=>'activate', 'class'=>'button','div'=>false, 'type'=>'button', "onclick" => "javascript:return validateChk('User','UserAction{$defaultTab}');")));?>
					<br><br>
					<a href="http://www.highprogrammer.com/cgi-bin/uniqueid/mrzpr" target="_blank">click here</a> for passport validation
					
				</div>
				
				<?php 
				
				$this->Paginator->options(array(
					
					 'url' => $this->passedArgs,
					 
				));
				echo $this->element('admin/admin_pagination', array("paging_model_name"=>"User", "total_title"=>"Users")); ?>
				
			</td>
		</tr>
	</tfoot>
 
	<tbody>
			
		<?php
			$alt=0;
			//pr($data);
			foreach($data as $value){	
//pr($value);			
		 ?>
		<tr <?php echo ($alt==0)?'class="alt-row"':''; $alt=!$alt;?>>
			<td><?php echo ($this->Form->checkbox('User.id.', array('value'=>$value['User']['id'], 'hiddenField'=>false ))); ?></td>
		<!--	<td>
			<?php
			//echo $this->General->user_picture($value['User']['id'], $value['User']['image'], 'SMALL');
			?>
			</td> -->
			<td><b><a href="javascript:void(0);"><?php echo $value['User']['first_name'].' '.$value['User']['last_name'];?></a><?php 
			
			//echo ($this->Html->link($value['User']['first_name'].' '.$value['User']['last_name'],array('action'=>'view', $value['User']['id']),array('title'=>'View Details')));?></b></td>
			<td><?php echo ($value['User']['username']);?></td>
			<td><?php echo ($value['User']['email']);?></td>
			<td><?php echo ($value['UserDetail']['city']);?></td>
			<td><?php echo ($value['UserDetail']['Country']['name']);?></td>
			
			<!-- <td><b><?php /*
				$flag=0;
				if($value['UserDetail']['mail_validation']==1)
				{
					$flag=1;
					echo "MA, ";
				}
				if($value['UserDetail']['ip_validation']==1)
				{
					$flag=1;
					echo "IP, ";
				}
				if($value['UserDetail']['bank_account_validation']==1)
				{
					$flag=1;
					echo "BA, ";
				}
				if($value['UserDetail']['passport_validation']==1)
				{
					$flag=1;
					echo "PA, ";
				}
				if($value['UserDetail']['address_validation']==1)
				{
					$flag=1;
					echo "AD, ";
				}
				if($value['UserDetail']['call_validation']==1)
				{
					$flag=1;
					echo "PH.";
				}
				if(!$flag)
				{
					echo "None";
				}
				?></b>
			</td>
			
			<td><b><?php 
				if($value['UserDetail']['involved_violation']>0)
				{
					if($value['User']['role_id'] == Configure::read('App.Role.Buyer'))
					{
						$type = 'b';
					}
					elseif($value['User']['role_id'] == Configure::read('App.Role.Provider'))
					{
						$type = 'p';
					}
					else
					{
						$type='a';
					}
					echo $value['UserDetail']['involved_violation'];
					echo " ";
					echo $this->Html->link("View", array('controller'=>'violations','action'=>'user_violation_list',$type,$value['User']['id']), array("class"=>"button", "escape"=>false,'title'=>'View All','style'=>'text-decoration:none;'));
				}
				else
				{
					echo "None";
				}	
				?>
				</b></td>
			<td><b><?php 
				if($value['UserDetail']['involved_disputes']>0)
				{		
					if($value['User']['role_id'] == Configure::read('App.Role.Buyer'))
					{
						$type = 'b';
					}
					elseif($value['User']['role_id'] == Configure::read('App.Role.Provider'))
					{
						$type = 'p';
					}
					else
					{
						$type='a';
					}
					echo $value['UserDetail']['involved_disputes'];
					echo " ";
					echo $this->Html->link("View", array('controller'=>'disputes','action'=>'user_dispute_list',$type,$value['User']['id']), array("class"=>"button", "escape"=>false,'title'=>'View All','style'=>'text-decoration:none;'));
				}
				else
				{
					echo "None";
				}*/
				?></b>
			</td> -->
			<td><?php echo ($this->Time->niceShort(strtotime($value['User']['created'])));?></td>
			<td><?php echo ($this->Html->link($this->Layout->userStatus($value['User']['status']), array('action'=>'status',$value['User']['id'],'token'=>$this->params['_Token']['key']), array('title'=>$value['User']['status']==0?'activate':$value['User']['status']==1?'deactivate':'activate')));?></td>
		  	<td> 
				<!-- Icons -->
				<?php 
					echo ($this->Html->link($this->Html->image('admin/pencil.png', array('title'=>'Edit','alt'=>'Edit')), array('controller'=>'users', 'action'=>'edit', $value['User']['id']), array('escape'=>false)));
				?>
				<?php 
					echo ($this->Html->link($this->Html->image('admin/cross.png', array('title'=>'Delete','alt'=>'Delete')), array('controller'=>'users', 'action'=>'delete', $value['User']['id'],'token'=>$this->params['_Token']['key']), array('escape'=>false, 'onclick'=>'javascript:return confirm_delete(this)')));
				?>
				<?php 
					echo ($this->Html->link($this->Html->image('admin/hammer_screwdriver.png', array('title'=>'Change Password','alt'=>'Change Password')), array('controller'=>'users', 'action'=>'change_password', $value['User']['id']), array('escape'=>false)));
				?>
			</td> 
		</tr>
		<?php
		  }
		 ?>
		
	</tbody>
	
</table>
<?php
	}
	else{
		echo ($this->element('admin_flash_info',array('message'=>'NO RESULTS FOUND')));
	}
?>