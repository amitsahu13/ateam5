<?php
echo $this->Html->script('tooltip');
echo $this->Html->css('tooltip');
?>
<?php if(!empty($data)){
		$this->ExPaginator->options = array('url' => $this->passedArgs);?>
<table>				
	<thead>
		<tr>
			<th width="20px"><input name="chkbox_n" id="chkbox_id" type="checkbox" value="" class="check-all"/></th>
			<th><?php echo ($this->ExPaginator->sort(''.$model.'.name', 'Name'))?></th>
			<th><?php echo ($this->ExPaginator->sort(''.$model.'.email', 'Email'))?></th>
			<th><?php echo ($this->ExPaginator->sort(''.$model.'.inquiry', 'Inquiry'))?></th>
			<th><?php echo ($this->ExPaginator->sort(''.$model.'.created', 'Date'))?></th>
			<th width="16px">Action</th>
		</tr>
		
	</thead>
 
	<tfoot>
			<tr>
			<td colspan="7">
				<div class="bulk-actions align-left">
					<select name="data['<?php echo $model;?>']['action']" id="UserAction<?php echo ($defaultTab);?>">
						<option selected="selected" value="">Choose an action...</option>
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
			
			<td><b><?php 
				echo $value[''.$model.'']['name'];
				?></b>
			</td>
			<td><b><?php 
				echo $value[''.$model.'']['email'];
				?></b>
			</td>
			<td>
			<b>
				 <span onmouseover="tooltip.pop(this,<?php echo "'#".$value[''.$model.'']['id']."'";?>)">
				 <?php echo ucfirst($this->General->wrap_long_txt($value[''.$model.'']['inquiry'],0,15)."...") ;?>
				 </span>
				<div style="display:none;">
					<div id="<?php echo $value[''.$model.'']['id'];?>">
						<b><?php echo ucfirst($value[''.$model.'']['name']);?></b><br /><br />
						<?php echo $value[''.$model.'']['inquiry'];?>
					</div>
				</div>
			</b>
			</td>
			<td><?php echo ($this->Time->niceShort(strtotime($value[''.$model.'']['created'])));?></td>	
			<td>
				<!-- Icons -->
				 <?php 
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