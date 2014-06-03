<div class="compensation_frmrow">
	<div class="compensation_frmrow_L">
		<p><label>SubCategory<span></span></label></p>
	</div>
	<div class="compensation_frmrow_R">
		<p><span class="slct_rwndInPut">
		<!--<select class="slct_rwndInPutRi with_sml1" >
		  <option>Public View</option>
		</select>-->
		<?php  echo ($this->Form->input('Job.sub_category_id', array('div'=>false, 'label'=>false,'options'=>$sub_categories,'empty'=>'-- Select SubCategory --', "class" => "slct_rwndInPutRi with_sml1")));?> 
		</span>
		</p>
	</div>
</div>
<div class="compensation_frmrow">
	<div class="compensation_frmrow_L">
		<p><label>Required Skills</label></p>
	</div>
	<div class="compensation_frmrow_R">
	<div>
		<span class="rwndInPut_TXTaria">
		<?php  echo ($this->Form->input('skills_id', array('div'=>false, 'label'=>false,'options'=>$skills,'empty'=>'-- Select Skills --', "class" => "TXTaria_rwndInPutRi",'multiple'=>true)));?> 
		</span>
	</div>
	<div class="clear"></div>
		

	</div>
</div>