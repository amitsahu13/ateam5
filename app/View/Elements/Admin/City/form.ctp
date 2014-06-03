<table border="0" class="Admin2Table" width="100%">					 
			  <tr>
				 <td valign="middle" class="Padleft26" width="20%">Country <span class="input_required">*</span></td>
				 <td><?php echo($this->Form->input('country_id', array('div'=>false, 'label'=>false, "class" => "Testbox5",'empty'=>'Select Country')));
				$this->Js->get('#CityCountryId')->event('change',$this->Js->request(array('controller'=>'states','action'=>'getStateList','model'=>'City'), array('update'=>'#updateState','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
				 ?>
				 </td>
			  </tr>	
			  <tr>
				 <td valign="middle" class="Padleft26">State <span class="input_required">*</span></td>
				 <td id="updateState"><?php echo($this->Form->input('state_id', array('div'=>false, 'label'=>false, "class" => "Testbox5", 'empty'=>'Select State')));?></td>
			  </tr>				  
			  <tr>
				 <td valign="middle" class="Padleft26">Name <span class="input_required">*</span></td>
				 <td><?php echo($this->Form->input('name', array('div'=>false, 'label'=>false, "class" => "Testbox5")));?></td>
			  </tr>	
			   <tr>
				 <td valign="middle" class="Padleft26">Status</td>
				 <td>
				 <?php echo($this->Form->input('status', array('options'=>Configure::read('Status'),'div'=>false, 'label'=>false, "class" => "TextBox5")));?>
				 </td>
			  </tr>	
			  <tr>
				<td>&nbsp;</td>
				<td>
					<div><?php echo($this->Form->submit('Submit', array('class' => 'submit_button')));?></div>
					<div class="cancel_button"><?php echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>'cities', 'action'=>'index'), array("title"=>"", "escape"=>false)); ?></div>
					
				</td>
			   </tr>
		</table>
		<?php
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
echo $this->Js->writeBuffer();
?>