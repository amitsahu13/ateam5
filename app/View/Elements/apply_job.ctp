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
<!--div class="cmpnsn_prgrsDV">
	<div class="cmpnsn_prgrsnav" style="padding:0 0 3px 0;">
		<h2><a href="#">I Have A Dream</a></h2>
	</div>
</div-->
<h3>Job Application Form </h3>
<?if (isset($this->params->pass[0])):?> 
	<form action="/jobs/apply_job/<?=$this->params->pass[0]?>" id="JobBidJobDetailForm" method="post" accept-charset="utf-8" >
<?else:?> 
	<form action="/jobs/apply_job/" id="JobBidJobDetailForm" method="post" accept-charset="utf-8" >
<?endif;?>
	<div class="popup_fieldset top-mile">
		<?php if(isset($this->params->pass[0]) && !empty($this->params->pass[0])){ 
			 $pass =    $this->params->pass[0]; 
			}else{
				$pass= 0 ; 
			}
			echo $this->Form->input('job_id',array('div'=>false,'type'=>'hidden','value'=>$pass, 'label'=>false, "class" => "TXTaria_rwndInPutRi"));
		?>
		<label>Proposal*</label>
		<div class="popup_field">
			<?php  echo $this->Form->input('proposal', array('div'=>false,'type'=>'textarea', 'label'=>false, "class" => "textarea",    "style" => "min-height: 60px; height: 60px;", "required"=>"required"));?>
			<!-- <textarea class="TXTaria_rwndInPutRi" name="" cols="" rows="" style="width:338px;"></textarea> -->
		</div>
	</div>
	<div class="popup_fieldset">
		<?php	echo $this->element("Front/ele_job_file_attachement"); ?>
	</div>
	<div class="popup_fieldset">
		<label>Availability*<br/><font style="font-size: 11px; color: grey;">Hrs/Weeks</font></label>
		<div class="popup_field">
			<?php  echo $this->Form->input('availability', array('div'=>false,'type'=>'text', 'label'=>false, "class" => "input-text" , "required"=>"required"));?>
			<!-- <input name="" type="text" class="TXT_rwndInPutRi" /> -->
		</div>
	</div>
	<div class="popup_fieldset">
		<label>Estimated duration*<br/><font style="font-size: 11px; color: grey;">Weeks</font></label>
		<div class="popup_field">
			<?php  echo $this->Form->input('duration', array('div'=>false,'type'=>'text', 'label'=>false, "class" => "input-text", "required"=>"required"));?>
			<!-- <input name="" type="text" class="TXT_rwndInPutRi" />  -->
		</div>
	</div>							
	<div class="popup_fieldset">
		<label>Relevant Experience*</label>
		<div class="popup_field sets-1">
		<style>
			.popup_field.sets-1 .sbHolder {margin-left: 0;}
		</style>
			<select class="custom_dropdown slct_rwndInPutRi with_sml1" name='data[JobBid][experience]'>  
				<option value='student'>  Student  </option> 
				<option value='1 year'> 1 Year  </option> 
				<option value='2-3 years '> 2-3 Years  </option> 
				<option value='4-5 years'> 4-5 Years  </option> 
				<option value=' More than 5 Years'> More than 5 Years   </option> 
				<option value='More than 10 Year'>More than 10 Years</option> 
			</select>
		</div>
	</div>
							
	<!--  Future Sharing Stuff Here   -->
	<div class="popup_fieldset">
		<label>Future Earning Sharing  </label>
		<div class="popup_field">
			<?php  echo $this->Form->input('future_value', array('div'=>false,'type'=>'text', 'label'=>false, "class" => "input-text", "style" => "width: 90%;" ,"pattern"=>"\d*"));?>
			<font>%</font>
		</div>
	</div>
	<div class="popup_fieldset">
		<label>Cash Compensation  </label>
		<div class="popup_field">
			<?php  echo $this->Form->input('cash_value', array('div'=>false,'type'=>'text', 'label'=>false, "class" => "input-text", "style" => "width: 90%;" , "pattern"=>"\d*"));?>
			<font>$</font>
		</div>
	</div> 
							
	<!--  End Future Sharing :  -->
	<div class="popup_fieldset top-mile"> 
		<p> Per the <?php echo $this->Html->link('Terms of Service',array('controller'=>'pages','action'=>'view','static'=>'terms-of-service'),array('div'=>false,'lable'=>false,'escape'=>false)); ?>, I'll only receive compensations with ATeam 4 A Dream knowledge</p>
	</div>
	<div class="">
		<span class="Continue4Btn" style="float:right;" >
			<?php  echo $this->Form->submit('Submit', array('class' => 'Continue4BtnRi','value'=>'Submit'));?>
 		</span>
		<span class="continue_team js-ClosePopup Continue4Btn" style="cursor: pointer; float:right;">
			<span class="Continue4BtnRi">Cancel</span>
		</span>
		<div class="clear"></div>
	</div>
</form> 



<style>
input.info {display:none;}
</style>




 <!-- A validation  Are   -->

        <script type="text/javascript">
            jQuery(document).ready(function(){

                jQuery("#JobBidJobDetailForm").submit(function(){
                    var  field1  = jQuery("#proposal").val();
                    var  field2  = jQuery("#availability").val();
                    var  field3  = jQuery("#duration").val();
                    if (field1 !=""  &&  field2 !="" && field3!="")
                     return true;


                    jQuery("#proposal").css("border","1px solid red");
                    jQuery("#availability").css("border","1px solid red");
                    jQuery("#duration").css("border","1px solid red");

                    alert("Fill Required fields");


                    return false;
                });



            });
        </script>

 <!--  Validation Goes Here  -->   


