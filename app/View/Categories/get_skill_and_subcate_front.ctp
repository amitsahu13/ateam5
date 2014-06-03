 
<div class="compensation_frmrow">
	<div class="compensation_frmrow_L">
		<p><label>Required Skills</label></p>
	</div>
	<div class="compensation_frmrow_R">
	<div>
		<span class="rwndInPut_TXTaria">
		<?php  echo ($this->Form->input('Skill.Skill', array('div'=>false, 'label'=>false,'options'=>$skills,'empty'=>'-- Select Skills --', "class" => "TXTaria_rwndInPutRi",'multiple'=>true)));?> 
		</span>
	</div>
	<div class="clear"></div>
		

	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
$(".custom_dropdown").selectbox();

	});
</script>