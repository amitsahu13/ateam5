<div class="compensation_frmrow_R">
	<p><span class="slct_rwndInPut">
	<?php 
	if(!empty($states))
	{
	echo ($this->Form->input('state_id', array('name'=>'data[Job][state_id]','div'=>false, 'label'=>false,'empty'=>'-- Select State --','options'=>$states, "class" => "slct_rwndInPutRi with_sml1 custom_dropdown")));
		
	}
	else{
	  echo ($this->Form->input('state_id', array('name'=>'data[Job][state_id]','div'=>false, 'label'=>false,'empty'=>'N/A','options'=>$states, "class" => "slct_rwndInPutRi with_sml1 custom_dropdown")));
			
	}
	?>
	</span>
	</p>
</div>
<script type="text/javascript">
$(document).ready(function(){
$(".custom_dropdown").selectbox();

	});
</script>
