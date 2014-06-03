<?php echo $this->element("Front/ele_post_job_navigation"); ?>		
<div class="product_dscrpBOX" style="width:100%;">
	<h3><span class="round_bgTXT">3</span>Compensation</h3>
	<div class="compensation_frmDV">
	<?php
	echo $this->Form->create('Job',array('url'=>array('controller'=>'jobs','action'=>'job_compensation'),'type'=>'file'));
	echo $this->Form->hidden('id');
	?> 
	
	
	
	<!--  
		<div class="compensation_frmrow" >                    	
			<div class="compensation_frmrow_L">
				<p><label>Proposal<span>*</span></label></p>
			</div>
			<div class="compensation_frmrow_R">
				<p><span class="rwndInPut_TXTaria">
				<?php echo $this->Form->input('Job.proposal', array('div'=>false,'type'=>'textarea','label'=>false, "class" => "TXTaria_rwndInPutRi", "style"=>"width:338px;"));?>
				</span></p>
			</div>
        </div>  
        <div class="compensation_frmrow">
				<?php echo $this->element("Front/ele_upload_job_files");?>	
        </div>
         
         -->     
         
        
        
        
		
		<!--   
		<div class="compensation_frmrow">
                    	
			<div class="compensation_frmrow_L">
				<p><label>Availability<span>*</span></label></p>
			</div>
			<div class="compensation_frmrow_R">
			
				<span class="TXT_rwndInPut">
				<?php	echo $this->Form->input('Job.compensation_avalibility', array('div'=>false,'label'=>false, "class" => "TXT_rwndInPutRi"));?></span> <font>Hrs/Week</font>
			</div>
        </div>  
                    
		<div class="compensation_frmrow divider" style='display:none;'>			
			<div class="compensation_frmrow_L">
				<p><label>Estimated Duration<span>*</span></label></p>
			</div>
			<div class="compensation_frmrow_R">
				<span class="TXT_rwndInPut">
				<?php	echo $this->Form->input('Job.compensation_estimated_duration', array('div'=>false,'label'=>false, "class" => "TXT_rwndInPutRi"));?>
				</span> <font>Week</font>
			</div>
		</div> 
		--> 
		<!--    
		
                    
		<div class="compensation_frmrow">
			
			<div class="compensation_frmrow_L">
				<p><label>Reference Budget<span></span></label></p>
			</div>
			<div class="compensation_frmrow_R">
				<span class="TXT_rwndInPut"><?php echo $this->Form->input('Job.refrence_budget', array('div'=>false,'label'=>false, 'type'=>'text',  "class" => "TXT_rwndInPutRi"));?></span> <font>$</font>
			</div>
		</div> --> 
 
		<div class="compensation_frmrow">
			<div class="compensation_frmrow_R margin15_btm">
				<p>
  				</p>
			</div>
			<div class="compensation_frmrow_R" style="margin-bottom:5px;display:none;">
					<p>
					<?php echo $this->Form->input('Job.delayed_payment', array('div'=>false,'type'=>"checkbox",'label'=>false, "class" => "chckBX","style"=>"position:relative; top:8px; margin-left:20px;"));?>
				 
 					</p>
			</div>
			<div class="compensation_frmrow_R margin15_btm">
					<p><?php echo $this->Form->input('Job.contracter_percent', array('div'=>false,'type'=>"checkbox",'label'=>false, "class" => "chckBX","style"=>"position:relative; top:8px; margin-left:20px;"));?>
						<font> Future Earnings Sharing </font>
						<span class="TXT_rwndInPut" style="margin-left:34px;"><?php echo $this->Form->input('Job.future_value', array('div'=>false,'label'=>false, "class" => "TXT_rwndInPutRi"));?></span><font>%</font>
					</p>
			</div>
			<div class="compensation_frmrow_R margin15_btm">
					 
			</div>
			<div class="compensation_frmrow_R margin15_btm">
					<p>
					<?php echo $this->Form->input('Job.cofounder_percent', array('div'=>false,'type'=>"checkbox",'label'=>false, "class" => "chckBX","style"=>"position:relative; top:8px;margin-left:20px;"));?>
					
						<font> Cash Compensation </font>
						<span class="TXT_rwndInPut" style="margin-left:34px;">
						<?php echo $this->Form->input('Job.cash_value', array('div'=>false,'label'=>false, "class" => "TXT_rwndInPutRi"));?></span><font>$</font>
					</p>
			</div>
			<div class="compensation_frmrow_R margin15_btm">
			   <div class="smpl_calcu">
				 
				 
			   </div>
			   <div class="smpl_calcu" style='display:none;'>
					<a href="#">
					<?php
					echo $this->Html->image('advisory_calculater.png',array('title'=>'Advisory Calculator','alt'=>'Use Our Advisory Calculator'));
					?>
					</a>
					<span>Use Our Advisory Calculator</span>
			   </div>
			</div> 
			
			
			
         <script type='text/javascript'> 
						function goback(url){
						 	 window.history.go(-1); 
							 return false ; 
						}
					</script>
       
		 <div class="clear"></div>
          
				<div class="compensation_frmrow_L">&nbsp;</div><span style="float:left;" class="Continue4Btn"> 
				<input type="button" name="" class="Continue4BtnRi" value="Previous" onclick="goback('<?=Router::url(array( 'controller' => 'jobs','action' => 'job_timeline' , $job_id), true);?>');">
 				</span>
		 
                
			  <span class="Continue4Btn" style="float:right;" ><input type="submit" name="" class="Continue4BtnRi" value="Submit"></span>
			  
			  <span class="Continue4Btn" style="float:right;">
			  
			  <A class="Continue4BtnRi" href='/jobs/job_detail/<?=$job_id?>' class='publicview'  target="_blank"> Preview in public view </A>  
			  
			     
			  
			  
			  </span>
			</div> 
			
		 
			
		</div>
	 <?php
	echo $this->Form->end();
	?>
	</div>
</div>
<script type="text/javascript">

	jQuery(document).ready(function(){
	 
	 
		setInterval(function(){
			var  l  =  jQuery("#JobRefrenceBudget").val();  
		 
			if (l!="" &&   l!="0,00"){
				
				if (isNaN(parseInt(l))){
					
					 jQuery("#JobRefrenceBudget").css("border","1px solid red"); 
					 jQuery("#JobRefrenceBudget").attr("placeholder","Only Numbers"); 
					 jQuery("#JobRefrenceBudget").val("");
					
				}else{
					 jQuery("#JobRefrenceBudget").css("border","0px solid white");
				}
				
				
			} 
			
		},500); 
		
		
		
		
		
		
		
	 	jQuery("#JobCompensationAvalibility").change(function(){
	 	
	 		var d =  parseInt(jQuery(this).val()); 
	 		if (isNaN(d) ||  d<=0){
	 			jQuery(this).css("border","1px solid red");
	 			
	 			jQuery(this).attr("placeholder","Number required"); 
	 			
	 			jQuery(this).val(""); 
	 		
	 		}else{
	 		
	 			jQuery(this).css("border","0px solid red");
	 		}
	 	
	 	});
	 
	
	});



	jQuery(function(){		
		jQuery(".delete").live('click',function(){
		
			var id 		= 	jQuery(this).closest('li').attr('id');			
			jConfirm('Are you sure you want to delete this file?', 'Confirmation Dialog', function(r) {
				if(r == true)	{
					jQuery.ajax({
						type:"GET",
						url:"<?php echo Router::url(array('controller'=>'jobs', 'action'=>'delete_job_file')); ?>/"+ id,
						success : function(data) {
							jQuery('#fileattache').find('#'+id).remove();		
						},
						error : function() {
							jAlert('File could not be deleted. Please try again', 'Alert Dialog');
						},
					})
				}
			});
		});
		jQuery(".download").live('click',function(){
			var id 		= 	jQuery(this).closest('li').attr('id');			
			window.location = SiteUrl+"/jobs/download_job_file/"+ id;
		});
		
		
		jQuery(".delete_edit").live('click',function(){
			var id 		= 	jQuery(this).closest('li').attr('id');
			var job_data = 	jQuery(this).closest('li').attr('job-id');				
			jConfirm('Are you sure you want to delete this file?', 'Confirmation Dialog', function(r) {
				if(r == true)	{
					jQuery.ajax({
						type:"GET",
						url:"<?php echo Router::url(array('controller'=>'jobs', 'action'=>'delete_job_compensation_edit_file')); ?>/"+job_data+"/"+id,
						success : function(data) {
							jQuery('#fileattache').find('#'+id).remove();		
						},
						error : function() {
							jAlert('File could not be deleted. Please try again', 'Alert Dialog');
						},
					})
				}
			});
		});
		jQuery(".download_edit").live('click',function(){
			var id 		= 	jQuery(this).closest('li').attr('id');
			var job_data = 	jQuery(this).closest('li').attr('job-id');					
			window.location = SiteUrl+"/jobs/download_job_compensation_edit_file/"+job_data+"/"+id;
		});
	});	
</script>	
<?php
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
echo $this->Js->writeBuffer();
?>