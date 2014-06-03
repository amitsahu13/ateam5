<script type="text/javascript">
	jQuery(function(){		
		jQuery(".delete").live('click',function(){
			var id 		= 	jQuery(this).closest('li').attr('id');			
			jConfirm('Are you sure you want to delete this file?', 'Confirmation Dialog', function(r) {
				if(r == true)	{
					jQuery.ajax({
						type:"GET",
						url:"<?php echo Router::url(array('controller'=>'jobs', 'action'=>'delete_job_apply_file')); ?>/"+ id,
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
			window.location = SiteUrl+"/jobs/download_job_apply_file/"+ id;
		});
			
	});
</script>
<div class="right_sidebar">
      <div class="cmpnsn_prgrsDV">
        <div class="cmpnsn_prgrsnav" style="padding:0 0 3px 0;">
          <h2><a href="#">I Have A Dream</a></h2>
        </div>
      </div>
      <div class="product_dscrpBOX" style="width:100%;">
        <h3>Job Application Form</h3>
        <div class="compensation_frmDV">
          <!--<form action="" method="get"> -->
		  <?php echo $this->Form->create('JobBid',array('url'=>array('controller'=>'jobs','action'=>'apply_job',$this->params->pass[0]))); ?>
           <div class="compensation_frmrow">
                    	<?php   if(isset($this->params->pass[0]) && !empty($this->params->pass[0])){
								
									$pass = $this->params->pass[0];
								}else{
								$pass =  null  ; 
								}
						echo $this->Form->input('job_id',array('div'=>false,'type'=>'hidden','value'=>$pass, 'label'=>false, "class" => "TXTaria_rwndInPutRi"));    ?>
                    	<div class="compensation_frmrow_L">
                        	<p><label>Proposal</label></p>
                        </div>
                        <div class="compensation_frmrow_R">
                        	<p><span class="rwndInPut_TXTaria">
							<?php  echo $this->Form->input('proposal', array('div'=>false,'type'=>'textarea', 'label'=>false, "class" => "TXTaria_rwndInPutRi"));?>
							<!-- <textarea class="TXTaria_rwndInPutRi" name="" cols="" rows="" style="width:338px;"></textarea> -->
							
							</span></p>
                        </div>
                    </div>
            <div class="compensation_frmrow">
                    <?php	echo $this->element("Front/ele_job_file_attachement"); ?>
                    </div>
					
					
					
								
					
					 <div class="compensation_frmrow">
                    	
                    	<div class="compensation_frmrow_L">
                        	<p><label>Availability</label></p>
                        </div>
                        <div class="compensation_frmrow_R">
                        	<p><span class="TXT_rwndInPut">
							<?php  echo $this->Form->input('availability', array('div'=>false,'type'=>'text', 'label'=>false, "class" => "TXT_rwndInPutRi"));?>
							<!-- <input name="" type="text" class="TXT_rwndInPutRi" /> -->
							
							</span> <font>Hrs/Weeks</font></p>
                        </div>
                    </div>
					 <div class="compensation_frmrow">
                    	
                    	<div class="compensation_frmrow_L">
                        	<p><label>Estimated duration</label></p>
                        </div>
                        <div class="compensation_frmrow_R">
                        	<p><span class="TXT_rwndInPut">
							<?php  echo $this->Form->input('duration', array('div'=>false,'type'=>'text', 'label'=>false, "class" => "TXT_rwndInPutRi"));?>
							<!-- <input name="" type="text" class="TXT_rwndInPutRi" />  -->
							
							</span> <font>Weeks</font></p>
                        </div>
						
                    </div>
					
					<div class="clear"></div>
					<div  style="border-bottom: 1px solid #EBEBEB;margin-top: -15px"></div>
									
				    <div class="compensation_frmrow">
                         
                        <div class="compensation_frmrow_R margin15_btm">
                          
                          <h3 style="border-bottom: none;">  Relevant Experience </h3>
						  <span class="slct_rwndInPut">
                          		<select class="custom_dropdown slct_rwndInPutRi with_sml1" name='data[JobBid][experience]'>  
                          				<option value='student'>  Student  </option> 
                          				<option value='1 year'> 1 Year  </option> 
                          				<option value='2-3 years '> 2-3 Years  </option> 
                          				<option value='4-5 years'> 4-5 Years  </option> 
                          				<option value=' More than 5 Years'> More than 5 Years   </option> 
                          				<option value='More than 10 Year'>More than 10 Years</option> 
                            	</select>
							</span>
                         
                          
                        </div>
                        
                        
                        <!--  Future Sharing Stuff Here   -->
                     <div class="compensation_frmrow">
                    	
                    	<div class="compensation_frmrow_L">
                        	<p><label>Future Earning Sharing</label></p>
                        </div>
                        <div class="compensation_frmrow_R">
                        	<p><span class="TXT_rwndInPut">
							<?php  echo $this->Form->input('future_value', array('div'=>false,'type'=>'text', 'label'=>false, "class" => "TXT_rwndInPutRi"));?>
							<!-- <input name="" type="text" class="TXT_rwndInPutRi" /> -->
							
							</span> <font></font></p>
                        </div>
                    </div>
                    
                        
                       	 <div class="compensation_frmrow">
                    	
                    	<div class="compensation_frmrow_L">
                        	<p><label>Cash Compensation </label></p>
                        </div>
                        <div class="compensation_frmrow_R">
                        	<p><span class="TXT_rwndInPut">
							<?php  echo $this->Form->input('cash_value', array('div'=>false,'type'=>'text', 'label'=>false, "class" => "TXT_rwndInPutRi"));?>
							<!-- <input name="" type="text" class="TXT_rwndInPutRi" /> -->
							
							</span> <font></font></p>
                        </div>
                    </div> 
                        
                        <!--  End Future Sharing :  -->
                        
                        <div class="compensation_frmrow_R pad50top"> 
                          
                        <p> Per the <?php echo $this->Html->link('Terms of Service',array('controller'=>'pages','action'=>'view','static'=>'terms-of-service'),array('div'=>false,'lable'=>false,'escape'=>false)); ?>, I'll only receive compensations with ATeam 4 A Dream knowledge</p>
						<span class="Continue4Btn" style="float:right;" >
						  <?php  echo $this->Form->submit('Submit', array('class' => 'Continue4BtnRi','value'=>'Submit'));?>
						  <!-- <input type="button" name="" class="Continue4BtnRi" value="Submit"> -->
						  
						  </span>
                        </div>
                        
                    </div>
         <?php echo ($this->Form->end()); ?>
        </div>
      </div>
    </div>