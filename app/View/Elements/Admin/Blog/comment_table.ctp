<?php
echo $this->Html->script('tooltip');
echo $this->Html->css('tooltip');
		//pr($this->params);
    if(!empty($data)){
			$this->ExPaginator->options = array('url' => $this->passedArgs);?>
		<table>
			<thead>
				<tr>	
					<th width="20px"><input name="chkbox_n" id="chkbox_id" type="checkbox" value="" class="check-all"/></th>
					<th><?php echo ($this->ExPaginator->sort('User.first_name', 'User Name'))?></th>
					<th><?php echo ($this->ExPaginator->sort(''.$modelc.'.comment', 'Comment'))?></th>
					<th><?php echo ($this->ExPaginator->sort(''.$modelc.'.status', 'Status'))?></th>
					<th><?php echo ($this->ExPaginator->sort('Comment.created', 'Created'))?></th>
					<th width="16px">Action</th>
				</tr>
			
			</thead>
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="bulk-actions align-left">
							<select name="data['<?php echo $modelc;?>']['action']" id="UserAction<?php echo ($defaultTab);?>">
								<option selected="selected" value="">Choose an action...</option>
								<option value="activate">Activate</option>
								<option value="deactivate">Deactivate</option>
								<option value="delete">Delete</option>
							</select>
							<?php echo ($this->Form->submit('Apply to selected', array('name'=>'activate', 'class'=>'button','div'=>false, 'type'=>'button', "onclick" => "javascript:return validateChk('".$modelc."','UserAction{$defaultTab}');")));?>
						
						</div>
						<?php 
						
						$this->Paginator->options(array(
							
							 'url' => $this->passedArgs,
							 
						));
						echo $this->element('admin/admin_pagination', array("paging_model_name"=>"".$modelc."", "total_title"=>"".$modelc."s")); ?>
					
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php
				$alt=0;
				foreach($data as $value){		 ?>
					<tr <?php echo ($alt==0)?'class="alt-row"':''; $alt=!$alt;?>>
						<td> 
							<?php echo ($this->Form->checkbox(''.$modelc.'.id.', array('value'=>$value[''.$modelc.'']['id'], 'hiddenField'=>false ))); ?>
						</td>
						<td>
							<b>
								<?php 
									//echo $this->General->wrap_long_txt($value['Comment']['title'],0,50);
								?>
								<?php //echo ($this->Html->link(ucfirst($value['User']['first_name']." ".$value['User']['last_name']),array('action'=>'view', $value['Comment']['id']),array('title'=>'View Details')));
								echo ucfirst($value['User']['first_name'])." ".ucfirst($value['User']['last_name']);
								?>
							</b>
						</td>
						<td>
							<b>
								<?php 
									//echo $this->General->wrap_long_txt($value['Comment']['title'],0,50);
								?>
								<span onmouseover="tooltip.pop(this,<?php echo "'#".$value['Comment']['id']."'";?>)">
									<?php echo ucfirst($this->General->wrap_long_txt($value['Comment']['comment'],0,15)."...") ;?>
								</span>
								<div style="display:none;">
									<div id="<?php echo $value['Comment']['id'];?>">
										<b><?php echo ucfirst($blog['Blog']['title']);?></b><br /><br />
										<?php echo $value['Comment']['comment'];?>
									</div>
								</div>
							</b>
						</td>
						<td>
							<?php echo ($this->Html->link($this->Layout->Status($value[''.$modelc.'']['status']), array('action'=>'comment_status',$value[''.$modelc.'']['id'],$blog_id,'token'=>$this->params['_Token']['key']), array('title'=>$value[''.$modelc.'']['status']==0?'activate':$value[''.$modelc.'']['status']==1?'deactivate':'activate')));?>
						</td>	
						<td>
							<?php echo ($this->Time->niceShort($value['Comment']['created']));?>
						</td>			
						<td>
							<!-- Icons -->
							 <?php 
							 //echo ($this->Html->link($this->Html->image('admin/pencil.png', array('title'=>'Edit','alt'=>'Edit')), array('controller'=>''.$controller.'', 'action'=>'edit', $value[''.$modelc.'']['id'],'token'=>$this->params['_Token']['key']), array('escape'=>false)));
							 //echo "&nbsp;&nbsp;";
							 echo ($this->Html->link($this->Html->image('admin/cross.png', array('title'=>'Delete','alt'=>'Delete')), array('controller'=>''.$controller.'', 'action'=>'comment_delete', $value[''.$modelc.'']['id'],$blog_id,'token'=>$this->params['_Token']['key']), array('escape'=>false, 'onclick'=>'javascript:return confirm_delete(this)')));
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