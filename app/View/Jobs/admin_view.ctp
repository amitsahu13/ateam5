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
			 
				
			 
				<tbody>
					<tr>	<?php //pr($data);	?>
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
					if(!empty($data['Availability']['name']))
					{
					?>
					<tr>
						<td>Job Availability</td>
						<td><?php echo ($data['Availability']['name']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['Job']['proposal']))
					{
					?>
					<tr>
						<td>Proposal</td>
						<td><?php echo ($data['Job']['proposal']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['Job']['compensation_avalibility']))
					{
					?>
					<tr>
						<td>Compensation Avalibility</td>
						<td><?php echo ($data['Job']['compensation_avalibility']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['Job']['compensation_estimated_duration']))
					{
					?>
					<tr>
						<td>Compensation Estimated Duration</td>
						<td><?php echo ($data['Job']['compensation_estimated_duration']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['Job']['refrence_budget']))
					{
					?>
					<tr>
						<td>Refrence Budget</td>
						<td><?php echo ($data['Job']['refrence_budget']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['Job']['look_contracter']))
					{
					?>
					<tr>
						<td>Look Contracter</td>
						<td><?php echo ($data['Job']['look_contracter']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['Job']['delayed_payment']))
					{
					?>
					<tr>
						<td>Delayed Payment</td>
						<td><?php echo ($data['Job']['delayed_payment']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['Job']['delayed_payment_money']))
					{
					?>
					<tr>
						<td>Delayed Payment Money</td>
						<td><?php echo ($data['Job']['delayed_payment_money']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['Job']['contracter_percent']))
					{
					?>
					<tr>
						<td>Contracter Percent</td>
						<td><?php echo ($data['Job']['contracter_percent']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['Job']['contracter_percent_value']))
					{
					?>
					<tr>
						<td>contracter_percent_value</td>
						<td><?php echo ($data['Job']['contracter_percent_value']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['Job']['look_cofounder']))
					{
					?>
					<tr>
						<td>Look Cofounder</td>
						<td><?php echo ($data['Job']['look_cofounder']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['Job']['cofounder_percent']))
					{
					?>
					<tr>
						<td>Cofounder Percent</td>
						<td><?php echo ($data['Job']['cofounder_percent']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['Job']['cofounder_percent_value']))
					{
					?>
					<tr>
						<td>Cofounder Percent Value</td>
						<td><?php echo ($data['Job']['cofounder_percent_value']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['Category']['Parent']['name']) && isset($data['Category']['Parent']['name']))
					{
					?>
					<tr>
						<td>Job Category</td>
						<td><?php echo ($data['Category']['Parent']['name']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['Category']['name']))
					{
					?>
					<tr>
						<td>Job Sub Category</td>
						<td><?php echo ($data['Category']['name']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['User']['first_name']) && !empty($data['User']['last_name']))
					{
					?>
					<tr>
						<td>User</td>
						<td><?php echo ($data['User']['first_name'].' '.$data['User']['last_name']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['Region']['name']))
					{
					?>
					<tr>
						<td>Job Target Region</td>
						<td><?php echo ($data['Region']['name']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['Country']['name']))
					{
					?>
					<tr>
						<td>Job Target Country</td>
						<td><?php echo ($data['Country']['name']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['State']['name']))
					{
					?>
					<tr>
						<td>Job Target State</td>
						<td><?php echo ($data['State']['name']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['Job']['city ']))
					{
					?>
					<tr>
						<td>Job Target City</td>
						<td><?php echo ($data['Job']['city']);?></td>
					</tr>
					<?php
					}
					?>
					<?php 
					if(!empty($data['Job']['status']))
					{
					?>
					<tr>
						<td>Status</td>
						<td><?php echo ($data['Job']['status']);?></td>
					</tr>
					<?php
					}
					?>
					
					<?php 
						if(!empty($data['Job']['start_date']) && !empty($data[$model]['end_date']))
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
						<?php //pr($data['JobAttachment']);
						if(!empty($data['JobAttachment']))
						{
						?>
						<tr>
							<td>Job Attachments</td>
							<td><?php $JobAttach =""; $count =0;
								foreach($data['JobAttachment'] as $JobAttachment){
									$count++;
									$JobAttach = $JobAttach.$this->Html->link($JobAttachment['file_name'],array('controller'=>'Jobs','action'=>'download_attachment',$data[''.$model.'']['id'],$JobAttachment['file_name']),array('escape'=>false)).',';
								}
								$JobAttachstr = substr($JobAttach,0,-1);
								if($count == 0 || $count == 1 ){
									echo $JobAttachstr;
								}
								else{
									echo $JobAttachstr.'.';
								}
								
								?>
							     
							</td>
						</tr>
						<?php
						}
						?>
						<?php //pr($data['JobFile']);
						if(!empty($data['JobFile']))
						{
						?>
						<tr>
							<td>Job Files</td>
							<td><?php $JobF =""; $count =0;
								foreach($data['JobFile'] as $JobFile){
									$count++;
									$JobF = $JobF.$this->Html->link($JobFile['file_name'],array('controller'=>'Jobs','action'=>'download_file',$data[''.$model.'']['id'],$JobFile['file_name']),array('escape'=>false)).',';
								}
								
								$JobFilestr = substr($JobF,0,-1);
								if($count == 0 || $count == 1 ){
									echo $JobFilestr;
								}
								else{
									echo $JobFilestr.'.';
								}
								
								?>
							     
							</td>
						</tr>
						<?php
						}
						?>
						</tbody>
					</table>
					
				
			    <table border = "1" style="width:44%!important;margin: 0 317px">
			
				<tr>
				<td></td>
				<td style="font-weight:bold;font-size:150%">Job Milestone</td>
				<td></td>

				</tr>
				<tr>
				<td>Title</td>
				<td>Description</td>
				<td>Date</td>

				</tr>
			<?php foreach($data['JobMilestone'] as $jobMilestone) {?>
					<tr>
					<td><?php echo $jobMilestone['title']; ?> </td>
					<td><?php echo $jobMilestone['description']; ?> </td>
					<td><?php echo $jobMilestone['date']; ?> </td>
					</tr>
			<?php } ?>
			
				</table>
				<table>
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
				</table>
				
			
		</div> 		
	</div> <!-- End .content-box-content -->
	
</div> <!-- End .content-box -->
		