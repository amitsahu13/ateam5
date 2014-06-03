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
						<th><?php echo $model." ".$data[''.$model.'']['title'];?></th>						
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
						<td>Job Title</td>
						<td><?php echo ($data[''.$model.'']['title']);?></td>
					</tr>
					
					<tr>
						<td>Project Title</td>
						<td><?php echo ($data['Project']['title']);?></td>
					</tr>
					<?php 
					if(!empty($data[$model]['sub_category_id']))
					{
					?>
					<tr>
						<td>Expertice Field</td>
						<td><?php echo ($data['Category']['name']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['JobSkill']))
					{
						$str='';
						foreach($data['JobSkill'] as $value)
						{
							$str.=$value['Skill']['name'].", ";
						}
					?>
					<tr>
						<td>Job Skills</td>
						<td><?php echo $str;?></td>
					</tr>
					<?php
					}
					?>
					<tr>
						<td>Job Description</td>
						<td><?php echo ($data[$model]['description']);?></td>
					</tr>
					
					<?php 
					if(!empty($data[$model]['compensation_id']))
					{
					?>
					<tr>
						<td>Job Compensation</td>
						<td><?php echo h($data['Compensation']['name']);?></td>
					</tr>
					<?php
					}
					?>
					
					<?php 
					if($data[$model]['type']==0)
					{
					?>
					<tr>
						<td>Job Hours</td>
						<td><?php echo h($data[$model]['type_option_value']." Hours");?></td>
					</tr>
						<?php 
						if(!empty($data[$model]['duration_id']))
						{
						?>
						<tr>
							<td>Job Duration</td>
							<td><?php echo h($data['Duration']['name']);?></td>
						</tr>
						<?php
						}
						?>
						<?php 
						if(!empty($data[$model]['hourly_rate_id']))
						{
						?>
						<tr>
							<td>Job Hourly Rate</td>
							<td><?php echo h($data['HourlyRate']['name']);?></td>
						</tr>
						<?php
						}
						?>
					<?php
					}
					else
					{
					?>
						<?php 
						if($data[$model]['type']==1)
						{
						?>
						<tr>
							<td>Reference Budget</td>
							<td><?php echo h($data['Budget']['name']);?></td>
						</tr>
						<?php
						}
						?>
					<?php
					}
					?>
					
					<?php 
					if(!empty($data[$model]['job_for_id']))
					{
					?>
					<tr>
						<td>Job For</td>
						<td><?php echo h($data['JobFor']['name']);?></td>
					</tr>
					<?php
					}
					?>
					
					
					<?php 
					if($data[$model]['location_type']==1)
					{
					?>
						<?php 
						if(!empty($data[$model]['region_id']))
						{
						?>
						<tr>
							<td>Job Region</td>
							<td><?php echo h($data['Region']['name']);?></td>
						</tr>
						<?php 
						}
						if(!empty($data[$model]['country_id']))
						{
						?>
						<tr>
							<td>Job Country</td>
							<td><?php echo h($data['Country']['name']);?></td>
						</tr>
						<?php
						}
						?>
						<?php 
						if(!empty($data[$model]['state_id']))
						{
						?>
						<tr>
							<td>Job State</td>
							<td><?php echo h($data['State']['name']);?></td>
						</tr>
						<?php
						}
						?>
						<?php 
						if(!empty($data[$model]['city']))
						{
						?>
						<tr>
							<td>Job City</td>
							<td><?php echo h($data[$model]['city']);?></td>
						</tr>
						<?php
						}
						?>
						<?php 
						if(!empty($data[$model]['zipcode']))
						{
						?>
						<tr>
							<td>Job Zipcode</td>
							<td><?php echo h($data[$model]['zipcode']);?></td>
						</tr>
						<?php
						}
						?>
					<?php
					}
					else
					{
					?>
						<?php 
						if($data[$model]['location_type']==0)
						{
						?>
						<tr>
							<td>Job Location</td>
							<td><?php echo "No Preference";?></td>
						</tr>
						<?php
						}
						?>
					<?php
					}
					?>
					<?php 
					if(!empty($data[$model]['expert_availability']))
					{
					?>
					<tr>
						<td>Job Availability</td>
						<td><?php echo($data['Availability']['name']);?></td>
					</tr>
					<?php
					}
					?>
					
					<?php 
					if($data[$model]['date_type']==0)
					{
					?>
					<tr>
						<td>Job Start</td>
						<td><?php echo "Immediately";?></td>
					</tr>
					<?php
					}
					else
					{
					?>
						<?php 
						if($data[$model]['date_type']==1 && !empty($data[$model]['start_date']) && !empty($data[$model]['end_date']))
						{
						?>
						<tr>
							<td>Job Start Date</td>
							<td><?php echo date('F d, Y',strtotime($data[$model]['start_date']));?></td>
						</tr>
						<tr>
							<td>Job End Date</td>
							<td><?php echo date('F d, Y',strtotime($data[$model]['end_date']));?></td>
						</tr>
						<?php
						}
						?>
					<?php
					}
					?>
				</tbody>
			</table>			
		</div> 		
	</div> <!-- End .content-box-content -->
	
</div> <!-- End .content-box -->
		