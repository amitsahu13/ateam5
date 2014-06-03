<?php 
echo $this->Html->script(array('calender/jquery-1.6.2.min','calender/jquery-ui.min','calender/jquery-ui-timepicker-addon'));
echo $this->Html->css(array('calender/jquery-ui'));
?>
<script type="text/javascript">
    
	
	jQuery(function($){	
		
		calender_data();
		function calender_data(){
			
				jQuery(".datepicker").datetimepicker({
					showSecond: false,
					showHour: false,
					showMinute: false,
					showSecond: false,
					showTime: false,
					showTimepicker:false,
					/* timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 5,
					stepSecond: 10, */
					beforeShow: function(input, inst)
					{	//input.offsetHeight
						inst.dpDiv.css({marginTop: -1 + 'px', marginLeft: input.offsetWidth + 'px'});
					},changeYear: true,dateFormat: 'yy-mm-dd',changeMonth: true, minDate: '-100Y',maxDate:new Date(2099,12,00),
					yearRange: '-100',showAnim: 'fold',showOn: 'both',buttonImageOnly: true, buttonImage: ''+SiteUrl+'/img/icons/icon_cle.png'
				});
            jQuery(".datepicker").datepicker("setDate" , new Date());
		}	
	 });
</script>
<style>
.ui-datepicker-trigger
{
	img.padding-top:40px;
}
</style>

<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

<?php 
	$ctr = 0;
	foreach($this->data as $setting){?>
	<?php 
		echo ($this->Form->input($ctr.'.Setting.id', array('value'=>$setting['Setting']['id'])));
		echo ($this->Form->hidden($ctr.'.Setting.type', array('value'=>$setting['Setting']['type'])));
	?><?php if($setting['Setting']['id']!=9){ ?> 
	<p>
		<?php
		$class="";	
		if($setting['Setting']['name'] == 'facebook_profile_date_validation' || $setting['Setting']['name'] == 'linkdin_profile_date_validation')
		{
			$class="datepicker";
			
		}
		else
		{
			$class="";
		}
		echo ($this->Form->input($ctr.'.Setting.value', array('value'=>$setting['Setting']['value'], 'div'=>false, 'type'=>'text', 'label'=>$setting['Setting']['label'].'*', "class" => "text-input medium-input $class")));
		echo ($this->Form->error($ctr.'.value',null, array('class'=>'input-notification error png_bg', 'wrap'=>'span')));
		?>
		<br><small><?php echo ($setting['Setting']['description']);?></small>		
	</p><?php } else{
	?>
	<p>
		<?php

		$class="";	
		if($setting['Setting']['name'] == 'facebook_profile_date_validation' || $setting['Setting']['name'] == 'linkdin_profile_date_validation')
		{
			$class="datepicker";
			
		}
		else
		{
			$class="";
		}	
		echo ($this->Form->input($ctr.'.Setting.value', array('value'=>$setting['Setting']['value'], 'div'=>false, 'label'=>$setting['Setting']['label'].'*', "class" => "text-input medium-input $class")));
		
		echo ($this->Form->error($ctr.'.value',null, array('class'=>'input-notification error png_bg', 'wrap'=>'span')));
		?>
		<br><small><?php echo ($setting['Setting']['description']);?></small>		
	</p>
	
	<?php } ?>
<?php
		$ctr++;
	}?>
	
	<p>
		<?php  echo ($this->Form->submit('Submit', array('class' => 'button', "div"=>false)));?>
		
		<?php echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>'admins', 'action'=>'dashboard'), array("class"=>"button", "escape"=>false)); ?>
		
	</p>
	
</fieldset>