<?php 
echo $this->Html->script(array('jquery/jquery-ui.min','jquery/jquery-ui-timepicker-addon'),true);
echo $this->Html->css(array('calender/jquery-ui'),true);
?>

<?php 
$type_hourly='';$type_fixed='style="display:none;"';$location='style="display:none;"';$percent='style="display:none;"';$start_dt='style="display:none;"';$end_dt='style="display:none;"';$own_range='style="display:none;"';$range_hourly='';$range_fixed='style="display:none;"';$houry='style="display:none;"';
$budget_min_max ='style="display:none;"';
$hourly_min_max ='style="display:none;"';
if(!empty($this->data['Job'])){
	
	if(isset($this->data['Job']['type']) && $this->data['Job']['type']==1){	
		$type_fixed='';
		$type_hourly='style="display:none;"';
		
	}
	if(isset($this->data['Job']['budget_id']) && $this->data['Job']['budget_id']==9)
	{
		$budget_min_max ='style="display:block;"';
		$hourly_min_max ='style="display:none;"';
	}
	elseif(isset($this->data['Job']['hourly_rate_id']) && $this->data['Job']['hourly_rate_id']==10)
	{
		$budget_min_max ='style="display:none;"';
		$hourly_min_max ='style="display:block;"';
	}
	if(isset($this->data['Job']['location_type']) && $this->data['Job']['location_type']==1){
		$location='';
	}
	
	
	if(isset($this->data['Job']['date_type']) && $this->data['Job']['date_type']==1){
		$start_dt='';
		$end_dt='';
	}
	
}
?>
<fieldset class="column-left"> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
	<?php  echo ($this->Form->input('id'));
	?>				
	<p>
		<?php  echo ($this->Form->input('title', array('div'=>false, 'label'=>'Title*', "class" => "text-input medium-input")));?> 
		
	</p>
	<?php /*
	<p>
		<?php  echo ($this->Form->input('job_identification_no_no', array('div'=>false, 'label'=>'Job identification no*', "class" => "text-input medium-input")));?> 
		
	</p> */ ?>
	
	<p>
		<?php
		if($this->params['action']=='admin_add'){
			echo ($this->Form->input('project_id', array('div'=>false, 'label'=>'Project*','empty'=>'-- Select Project --', "class" => "text-input medium-input")));		
		}
		else
		{
			echo ($this->Form->hidden('project_id'));
		}
		
		?> 
	</p>
	<p>
		<?php
		echo ($this->Form->input('category_id', array('div'=>false, 'label'=>'Category*','empty'=>'-- Select Category --', "class" => "text-input medium-input")));		
			$this->Js->get('#JobCategoryId')->event('change',$this->Js->request(array('controller'=>'categories','action'=>'admin_get_skill_and_Subcate_project'), array('update'=>'#Update_skill','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
		?> 
	</p>
	
	<div  class="contractor-field sub_cat" id="Update_skill">
		<p>
			<?php  echo ($this->Form->input('sub_category_id', array('div'=>false, 'label'=>'Expertise Field*','options'=>$sub_categories,'empty'=>'-- Select Category First --', "class" => "text-input medium-input")));?> 
		</p>
		
		<p>
			<?php
			if($this->params['action']=='admin_edit'){
				$pro_skill=array();
				if(!empty($this->data['JobSkill'])){
					foreach($this->data['JobSkill'] as $user_skills){
						$pro_skills[]=$user_skills['skill_id'];
					}
				}
				else{
				$pro_skills[]='No Skill Selected';
				}
				
				
				echo $this->Form->input('JobSkill.][skill_id]', array(
					'legend' => '',
					'type' => 'select',
					'id'=>'stateselect',
					'options'=>$skills,
					'separator' => '',
					'label' =>'Skills',
					'multiple'=>true,
					'class'=>'select_skill medium-input',
					'default'=>$pro_skills
					)
				);
				
			}
			else {
				$pro_skill=array();
				if(!empty($this->data['JobSkill'])){
					foreach($this->data['JobSkill'] as $user_skills){
						$pro_skills[]=$user_skills['skill_id'];
					}
				}
				else{
					$pro_skills[]='No Skill Selected';
				}
				
				
				echo $this->Form->input('JobSkill.][skill_id]', array(
					'legend' => '',
					'type' => 'select',
					'id'=>'stateselect',
					'options'=>$skills,
					'separator' => '',
					'label' =>'Skills',
					'multiple'=>true,
					'class'=>'select_skill medium-input',
					'default'=>$pro_skills
					)
				);
			}
			echo ($this->Form->hidden('Job.skill', array('div'=>false, 'label'=>false, "class" => "text-input medium-input",'error'=>false)));
			echo ($this->Form->error('Job.skill', array('div'=>false, 'label'=>false, "class" => "text-input medium-input")));
			?> 
		</p>
	</div>
	
	<p>
		<?php  echo ($this->Form->input('description', array('div'=>false, 'label'=>'Description*', "class" => "text-input medium-input")));?> 
	</p>
	
	<p>
		<?php  echo ($this->Form->input('compensation_id', array('div'=>false, 'label'=>'Compensation*','empty'=>'-- Select Compensation --', "class" => "text-input medium-input")));?>
	</p>
	
	<p>
		<?php  echo ($this->Form->input('type', array('div'=>false, 'label'=>'Job Type*','type'=>'radio'/* , "class" => "text-input small-input" */, 'default'=>0,'options'=>Configure::read('App.JobType'),'onchange'=>'change_type(this.value);', 'legend'=>'Job Types')));?> 
		
	</p>
	
	<p class="fixed" <?php echo $type_fixed;?>>
		<?php  echo ($this->Form->input('budget_id', array('div'=>false, 'label'=>'Reference Budget*','empty'=>'-- Select Budget Range --', "class" => "text-input medium-input",'onchange'=>'onBudgetRateChange(this.value)')));?>
	</p>
	
	<div class="budget_div" <?php echo $budget_min_max;?> >
		<p class="budget_min">
			<?php  echo ($this->Form->input('budget_min_rate', array('div'=>false, 'label'=>'Minimum Budget Rate*',"class" => "text-input small-input")));?>
		</p>
		
		<p class="budget_max">
			<?php  echo ($this->Form->input('budget_max_rate', array('div'=>false, 'label'=>'Maximum Budget Rate*',"class" => "text-input small-input")));?>
		</p>
	</div>
	
	<div class="hourly" <?php echo $type_hourly;?> >
	<p>
		<?php  echo ($this->Form->input('type_option_value', array('div'=>false, 'label'=>false,'error'=>false,'style'=>'width:15% !important', "class" => "text-input small-input")));?>
	hours/week for
		<?php  echo ($this->Form->input('duration_id', array('div'=>false, 'label'=>false/* 'Type Option Value*' */,'empty'=>'-- Select Duration --','error'=>false, "class" => "text-input small-input",'options'=>$duration,'style'=>'width:40% !important;')));?>
	<?php echo $this->Form->error('type_option_value').'<br>';?>
	<?php echo '<br>'.$this->Form->error('duration_id');?>	
	</p>
	
	<p>
		<?php  echo ($this->Form->input('hourly_rate_id', array('div'=>false, 'label'=>'Reference Hourly Rate*','empty'=>'-- Select Hourly Budget --', "class" => "text-input medium-input",'onchange'=>'onHourlyRateChange(this.value)')));?>
	</p>
	
	<div class="hourly_div" <?php echo $hourly_min_max;?> >
		<p class="hourly_min">
			<?php  echo ($this->Form->input('hourly_min_rate', array('div'=>false, 'label'=>'Minimum Hourly Rate*',"class" => "text-input small-input")));?>
		</p>
	
		<p class="hourly_max">
			<?php  echo ($this->Form->input('hourly_max_rate', array('div'=>false, 'label'=>'Minimum Hourly Rate*',"class" => "text-input small-input")));?>
		</p>
	</div>
	
	</div>
</fieldset>
	<fieldset class="column-right">
<? /*
	<p>
		<?php  echo ($this->Form->input('location_type', array('div'=>false, 'label'=>'Location type*', "class" => "text-input medium-input")));?>
	</p> */ ?>
	
	<p>
		<?php  echo ($this->Form->input('job_for_id', array('div'=>false, 'label'=>'Job for*', 'options'=>$job_fors,'empty'=>'-- Select Duration --', "class" => "text-input medium-input")));?>
	</p>
	<?php 
	
	if($this->params['action']=='admin_edit'){?>
			<?php  echo ($this->Form->hidden('jo_doc_hidden', array('div'=>false,'value'=>$this->request->data['Job']['job_doc'],"class" => "text-input small-input")));?> 
		<p>
			<?php  echo $this->Html->link($this->request->data['Job']['job_doc'],array('controller'=>'projects','action'=>'download_file',$this->request->data['Job']['id']),array('escape'=>false));?> 
		
		</p>
	<?php
	}
	?>
	
	
	<p>
		<?php  echo ($this->Form->input('job_doc', array('div'=>false,'type'=>'file', 'label'=>'Job Plan Doc', "class" => "text-input small-input")));?> 
		
	</p>
	
	<p>
		<?php  echo ($this->Form->input('location_type', array('type'=>'radio', 'options'=>Configure::read('Job.Location.Type'),'onchange'=>'onLocationChange(this.value)', 'default'=>0, 'div'=>false, 'legend'=>'Job Location')));?> 
	</p>
	<?php  /*
	<div class="percent_telecommute" <?php echo $percent;?>>
	<p>
		<?php  echo ($this->Form->input('percent_telecommute', array('type'=>'radio', 'options'=>Configure::read('Project.Location.Telecommute'), 'default'=>0, 'div'=>false, 'label'=>'Percent Telecommute')));?> 
	</p>
	</div> */ 
	?>
	<div class="location" <?php echo $location;?>>
		<p>
			<?php 
			echo ($this->Form->input('region_id', array('div'=>false, 'label'=>'Region*','empty'=>'-- Select Region --', "class" => "text-input medium-input"))); 
			$this->Js->get('#JobRegionId')->event('change',$this->Js->request(array('controller'=>'countries','action'=>'admin_get_county'), array('update'=>'#update_location','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));?>
		</p>
		<div id="update_location">
		<p>
			<?php
			echo ($this->Form->input('country_id', array('div'=>false, 'label'=>'Country*','empty'=>'-- Select Country --', "class" => "text-input medium-input",'options'=>$countries)));
			$this->Js->get('#country_id')->event('change',$this->Js->request(array('controller'=>'states','action'=>'admin_get_state'), array('update'=>'#update_state','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
			?> 
			
		</p>
		<div id="update_state">
		<p>
			<?php  echo ($this->Form->input('state_id', array('div'=>false, 'label'=>'State*','empty'=>'-- Select State --', "class" => "text-input medium-input",'options'=>$states)));?> 
			
		</p>
		</div>
		</div>
	<p>
		<?php  echo ($this->Form->input('city', array('div'=>false, 'label'=>'City*', "class" => "text-input medium-input")));?> 
	</p>
	
	<p>
		<?php  echo ($this->Form->input('zipcode', array('div'=>false, 'label'=>'Zip/Postal code*', "class" => "text-input medium-input")));?> 
	</p>
		
	</div>

	<p>
		<?php  echo ($this->Form->input('expert_availability', array('div'=>false, 'label'=>'Expert availability*', "class" => "text-input medium-input",'empty'=>'-- Select Availability --','options'=>$projectManagerAvailabilities)));?>
	</p>
<?php /* 
	<p>
		<?php  echo ($this->Form->input('city', array('div'=>false, 'label'=>'City*', "class" => "text-input medium-input")));?>
	</p>
<?php /* 
	<p>
		<?php  echo ($this->Form->input('date_type', array('div'=>false, 'label'=>'Date Type*', "class" => "text-input medium-input")));?>
	</p> */ ?>
	<p>
		<?php  echo ($this->Form->input('date_type', array('type'=>'radio', 'options'=>Configure::read('Project.Start.Date'),'onchange'=>'onDateChange(this.value)', 'default'=>0, 'div'=>false, 'legend'=>'Choose Date')));?> 
	</p>
	<p class="start_date" <?php echo $start_dt;?>>
		<?php  echo ($this->Form->input('start_date', array('readonly'=>'readonly','type'=>'text','div'=>false, 'label'=>'Start Date', "class" => "text-input medium-input dateClass")));?> 
	</p>
	<p class="start_date" <?php echo $end_dt;?>>
		<?php  echo ($this->Form->input('end_date', array('readonly'=>'readonly', 'type'=>'text', 'div'=>false, 'label'=>'End Date', "class" => "text-input medium-input dateClass")));?> 
	</p>
	<p>
		<?php  echo ($this->Form->input('posting_visibility', array('type'=>'radio', 'options'=>Configure::read('Job.Visibility'),'default'=>0, 'div'=>false, 'legend'=>'Job Post Visibility')));?> 
	</p>
	<p>
		<label>Status</label>
		<?php  echo ($this->Form->input('status', array('options'=>Configure::read('Status'),'div'=>false, 'label'=>false, "class" => "medium-input")));?> 
	</p>
	<p>
		<?php  echo ($this->Form->submit('Submit', array('class' => 'button', "div"=>false)));?>
		
		<?php echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>''.$controller.'', 'action'=>'index'), array("class"=>"button", "escape"=>false)); ?>
		
	</p>
	
</fieldset>
<script type="text/javascript">
	jQuery(document).ready(function(){
		/* jQuery(".dateClass").datetimepicker({
			showSecond: true,
			timeFormat: 'hh:mm:ss',
			minDate: '0',
			stepMinute: 1,
			stepHour: 1,
			stepSecond: 10,beforeShow: function(input, inst)
			{	//input.offsetHeight
				inst.dpDiv.css({marginTop: -1 + 'px', marginLeft: input.offsetWidth + 'px'});
			},changeYear: true,dateFormat: 'yy-mm-dd',showAnim: 'fold',showOn: 'both',buttonImageOnly: true, buttonImage: ''+SiteUrl+'/img/icons/cal.jpeg'
		}); */
		
		$("#JobStartDate").datetimepicker({        
            showOn: 'both',
            buttonImageOnly: true,
			buttonImage: ''+SiteUrl+'/img/icons/cal.jpeg',
            //buttonText: 'Click here (date)',
			changeYear: true,dateFormat: 'yy-mm-dd',showAnim: 'fold',
			showSecond: true,
			timeFormat: 'hh:mm:ss',
			minDate: '0',
			stepMinute: 1,
			stepHour: 1,
			stepSecond: 10,beforeShow: function(input, inst)
			{	//input.offsetHeight
				inst.dpDiv.css({marginTop: -1 + 'px', marginLeft: input.offsetWidth + 'px'});
			},
            onSelect: function (dateText, inst) {
                 var $endDate = $('#JobStartDate').datetimepicker('getDate');
                 $endDate.setDate($endDate.getDate() + 1);
                 $('#JobEndDate').datetimepicker('setDate', $endDate).datetimepicker("option", 'minDate', $endDate);
            },
            onClose: function (dateText, inst) {
                //$("#StartDate").val($("#JobStartDate").val());
            }
        });

        $("#JobEndDate").datetimepicker({
            dateFormat: 'dd-mm-yy',
            showOn: 'both',
            buttonImageOnly: true,
            buttonImage: ''+SiteUrl+'/img/icons/cal.jpeg',
			changeYear: true,dateFormat: 'yy-mm-dd',showAnim: 'fold',
			showSecond: true,
			timeFormat: 'hh:mm:ss',
			minDate: '0',
			stepMinute: 1,
			stepHour: 1,
			stepSecond: 10,beforeShow: function(input, inst)
			{	//input.offsetHeight
				inst.dpDiv.css({marginTop: -1 + 'px', marginLeft: input.offsetWidth + 'px'});
			},
            onClose: function (dateText, inst) {
                //$("#EndDate").val($("#tbEndDate").val());
            }
			
        });
		/* if($('#JobStartDate').val()!=''){
		var $endDate = $('#JobStartDate').datetimepicker('getDate');
		$endDate.setDate($endDate.getDate() + 1);
		$('#JobEndDate').datetimepicker('setDate', $endDate).datetimepicker("option", 'minDate', $endDate);
		} */
			
	});
	function onDateChange(value){
		if(value==0){
			$('.start_date').slideUp();
		}else if(value==1){
			$('.start_date').slideDown();
		}
	}
	function change_type(value){
	
		if(value==0){
			$('.fixed').slideUp();
			$('.hourly').slideDown();
			$("#JobBudgetId").val('').attr('selected',true);
			$('.budget_div').slideUp();
		}else if(value==1){
			$('.hourly').slideUp();
			$('.fixed').slideDown();
			$("#JobHourlyRateId").val('').attr('selected',true);
			$('.hourly_div').slideUp();
		}
	}
	function onLocationChange(data){
		if(data==0){
			$('.location').slideUp();
		}else if(data==1){
			$('.location').slideDown();
		}
	}
	
	function onBudgetRateChange(data){
		if(data==9){
			$('.budget_div').slideDown();
			$('.budget_min').attr('disabled',false);
			$('.budget_max').attr('disabled',false);
		}
		else
		{
			$('.budget_div').slideUp();
			$('.budget_min').attr('disabled',true);
			$('.budget_max').attr('disabled',true);
		}
	}
	
	function onHourlyRateChange(data){
		if(data==10){
			$('.hourly_div').slideDown();
			$('.hourly_min').attr('disabled',false);
			$('.hourly_max').attr('disabled',false);
		}
		else
		{
			$('.hourly_div').slideUp();
			$('.hourly_min').attr('disabled',true);
			$('.hourly_max').attr('disabled',true);
		}
	}
	
</script>
<?php
if($this->params['action']=='admin_add')
{
?>
<script>
value = $("#JobHourlyRateId").val();
if(value=='')
{
	//$("#JobHourlyRateId").val('6').attr('selected',true);
	$("select#JobHourlyRateId").eq('6').prop('selected',true);
}
</script>
<?php
}
?>
<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>	