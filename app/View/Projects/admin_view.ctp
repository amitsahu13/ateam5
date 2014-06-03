<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		
		<h3 style="cursor: s-resize;"><?php echo $model;?>s</h3>
		
		<ul class="content-box-tabs">
			<li></li>
		</ul>
		
		<div class="clear"></div>
		
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		
		<div style="display: none;" class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
			
			
			<table id="admins">
				
				<thead>
					<tr>
						<th><?php echo $model;?></th>						
					</tr>	
				</thead>
			 
				<tfoot>
					<tr>
						<td colspan="2">
							<div class="bulk-actions align-left">
								
								<?php echo $this->Html->link("Back", array('action'=>'index'), array("class"=>"button", "escape"=>false));
								?>
								
							</div>
							
						</td>
					</tr>
				</tfoot>
			 
				<tbody>
					<tr>
					<?php
						if(!empty($data[$model]['project_image']))
						{ // pr($data); 
					?>
						<td>Project Photo</td>
						<td>
							<?php 
							
							$path = str_replace("{project_id}",$data[$model]['id'],PROJECT_IMAGE_SHOW_SMALL_PATH);
							echo $this->Html->image($path.'small_'.$data[$model]['project_image']);
							?>
						</td>
					<?php		
						}
					?>
					</tr>
					<tr>
						<td>Title</td>
						<td><?php echo ($data[''.$model.'']['title']);?></td>
					</tr>
					<tr>
						<td>User</td>
						<td><?php echo ($data['User']['username']);?></td>
					</tr>
					<tr>
						<td>Category</td>
						<td><?php echo ($data['Category']['name']);?></td>
					</tr>
					<tr>
						<td>Project Type</td>
						<td><?php echo ($data['ProjectType']['name']);?></td>
					</tr>
					
					<tr>
						<td>Project Status</td>
						<td><?php echo ($data['ProjectStatus']['name']);?></td>
					</tr>
					<tr>
						<td>Business Plan Level</td>
						<td><?php echo ($data['BusinessPlanLevel']['name']);?></td>
					</tr>
					<tr>
						<td>Project Manager Availability</td>
						<td><?php echo ($data['Availability']['name']);?></td>
					</tr>
					<tr>
						<td>Project Image Text</td>
						<td><?php echo ($data['Project']['project_image_text']);?></td>
					</tr>
					<tr>
						<td>Project Visibility</td>
						<td><?php echo ($data['ProjectVisibility']['name']);?></td>
					</tr>
					<tr>
						<td>Description</td>
						<td><?php echo ($data[''.$model.'']['description']);?></td>
					</tr>
					<!-- <tr>
						<td>Project Value Description</td>
						<td><?php //echo ($data[''.$model.'']['project_value_description']);?></td>
					</tr>
					<tr>
						<td>Project Business Plan</td>
						<td><?php  //echo $this->Html->link($data[''.$model.'']['business_plan_doc'],array('controller'=>$controller,'action'=>'download_file',$data[''.$model.'']['id']),array('escape'=>false));?></td>
					</tr> -->
					<tr>
						<td>Project Business Plan Doc</td>
						<td><?php  echo $this->Html->link($data['ProjectBusinessplanFile']['file_name'],array('controller'=>$controller,'action'=>'download_file',$data[''.$model.'']['id']),array('escape'=>false));?></td>
					</tr> 
					<tr>
						<td>Status</td>
						<td><?php echo ($data['Project']['status']);?></td>
					</tr>
					<tr>
						<td>Created</td>
						<td><?php echo ($data['Project']['created']);?></td>
					</tr>
					<tr>
						<td>Modified</td>
						<td><?php echo ($data['Project']['modified']);?></td>
					</tr>
					
				</tbody>
			</table>			
		</div> 		
	</div> <!-- End .content-box-content -->
	
</div> <!-- End .content-box -->
		