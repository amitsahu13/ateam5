<?php 
echo $this->Html->script(array('multiselect/jquery.multiselect'),true);
echo $this->Html->css(array('multiselect/jquery.multiselect'),true);
?>
<script type="text/javascript">
$(function(){
	var warning = $(".message");
	
	$(".select_skill").multiselect({ 
		//header: "Choose Multiple Skill!",
		multiple:true,
		click: function(e){
			warning.addClass("success").removeClass("error").html("Check a few boxes.");
			/* if( $(this).multiselect("widget").find("input:checked").length > 2 ){
				warning.addClass("error").removeClass("success").html("You can only check two checkboxes!");
				return false;
			} else {
				warning.addClass("success").removeClass("error").html("Check a few boxes.");
			} */
			
		}
	});
	
		$('.ui-multiselect').addClass('validate[required]');
		
		$('.Login2Btn').click(function(){
			//function to print the value of each checked checkboxes
			var size=$(".ui-multiselect-checkboxes :checked").size();
			
			if(size > 0){
				$('.ui-multiselect').removeClass('validate[required]');
			}else{
				$('.ui-multiselect').addClass('validate[required]');
			}
		});
		
		$(".ui-multiselect-checkboxes, .ui-multiselect-all, .ui-multiselect-none").live('click',function() {
			//function to print the value of each checked checkboxes
			var size=$(".ui-multiselect-checkboxes :checked").size();
			if(size > 0){
				$('.ui-multiselect').removeClass('validate[required]');
			}else{
				$('.ui-multiselect').addClass('validate[required]');
			}
		});
			/* $(":checked").each(function() {
			  alert('ds');
			});
			*/
});
</script>
<?php
if(!empty($categories))
{
?>
	<p>
		<?php  echo ($this->Form->input('sub_category_id', array('name'=>'data['.$model.'][sub_category_id]','div'=>false, 'label'=>'Expertise Field*','empty'=>'-- Select Expertise Field --','options'=>$categories, "class" => "text-input medium-input validate[required]")));
		
		$this->Js->get('#sub_category_id')->event('change',$this->Js->request(array('controller'=>'categories','action'=>'get_skill_and_Subcate_project'), array('update'=>'#skill_id','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
		?> 
	</p>
<?php
}
else{?>
	<p>
		<?php  echo ($this->Form->input('sub_category_id', array('name'=>'data['.$model.'][sub_category_id]','div'=>false, 'label'=>'Expertise Field*','empty'=>'-- Not Found --', "class" => "text-input medium-input validate[required]")));
		?> 
	</p>
<?php 	
}

if(!empty($skills))
{
?>
	<p>
	 <label><?php echo $model=='Job'?'Skills':'Request specific skills or groups <span class="optional">(optional)</span>'; ?></label>
		<?php  
		echo($this->Form->input(''.$model.'Skill][][skill_id]', array(
						'legend' => '',
						'type' => 'select',
						'id'=>'stateselect',
						'options'=>$skills,
						'separator' => '',
						'label' =>false,
						'multiple'=>true,
						'class'=>'select_skill'
						)));
		?> 
	</p>
<?php 
	echo $this->Form->hidden(''.$model.'.skill');
}else{ ?>
	<p>
	 <label><?php echo $model=='Job'?'Skills':'Request specific skills or groups <span class="optional">(optional)</span>'; ?></label>
		<?php  
		echo($this->Form->input(''.$model.'Skill][][skill_id]', array(
						'legend' => '',
						'type' => 'select',
						'id'=>'stateselect',
						//'options'=>$skills,
						'separator' => '',
						'label' =>false,
						'multiple'=>true,
						'class'=>'select_skill'
						)));
		?> 
	</p>
<?php 
	echo $this->Form->hidden(''.$model.'.skill');
}	
?>
<?php
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
echo $this->Js->writeBuffer();
?>	