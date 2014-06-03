<?php 
echo $this->Html->script(array('calender/jquery-1.6.2.min','calender/jquery-ui.min','calender/jquery-ui-timepicker-addon','jquery/confirm','jquery/jquery.simplemodal'));
echo $this->Html->css(array('calender/jquery-ui','confirm'));
?>

<script>
var myWindow;

function openWin()
{
myWindow = window.open("http://development.ateam4adream.com/terms-of-service","myWindow","width=800,height=800");
 
}
</script>



<?php echo $this->element('Front/ajax_loading_effect'); ?>
<style>
	img.ui-datepicker-trigger  
	{
		float:right;
	}
</style>
<script type="text/javascript">

	function doSubmit()
	{
		if(document.getElementById('UserDetailTermCondition').checked==false)
		{
			alert('Please select terms and condition');
			return false;            
		}
		else
		{
			document.frm.submit();
			return true;
		}

	}
	
	
	jQuery(document).ready(function(){
		
		calender_data();
		
			if(jQuery(".user_type").is(':checked'))
			{
				if(jQuery(".user_type:checked").val() == '<?php echo Configure::read('App.Role.Buyer');?>')
				{
					jQuery(".disable_provider_both").attr('disabled',true);
					jQuery(".provider_both").hide();
				}
				if(jQuery(".user_type:checked").val() == '<?php echo Configure::read('App.Role.Provider');?>')
				{
					jQuery(".disable_provider_both").attr('disabled',false);
					jQuery(".provider_both").show();
				}
				if(jQuery(".user_type:checked").val() == '<?php echo Configure::read('App.Role.Both');?>')
				{
					jQuery(".disable_provider_both").attr('disabled',false);
					jQuery(".provider_both").show();
				}
			}
			
			
			
			jQuery(".user_type").change(function(){
			
				if(jQuery(this).is(':checked'))
				{
					if(jQuery(".user_type:checked").val() == '<?php echo Configure::read('App.Role.Buyer');?>')
					{
						jQuery(".disable_provider_both").attr('disabled',true);
						jQuery(".provider_both").hide();
					}
					if(jQuery(".user_type:checked").val() == '<?php echo Configure::read('App.Role.Provider');?>')
					{
						jQuery(".disable_provider_both").attr('disabled',false);
						jQuery(".provider_both").show();
					}
					if(jQuery(".user_type:checked").val() == '<?php echo Configure::read('App.Role.Both');?>')
					{
						jQuery(".disable_provider_both").attr('disabled',false);
						jQuery(".provider_both").show();
					}
				}
			});	
				
				
			jQuery(".account_type").change(function(){
	
				if(jQuery(this).is(':checked'))
				{
					
					if(jQuery(".account_type:checked").val() == '<?php echo PROVIDER_ACCOUNT_TYPE_INDIVIDUAL;?>')
					{
						jQuery("label#display_name").text('Display Name *');
						
					}
					else if(jQuery(".account_type:checked").val() == '<?php echo PROVIDER_ACCOUNT_TYPE_BUSINESS;?>')
					{
						jQuery("label#display_name").text('Company Name *');
					}
					
					
				}
			})
			
		
	
	<?php
	
		if( !empty($role_id) && ($role_id == Configure::read('App.Role.Provider') || $role_id == Configure::read('App.Role.Both')))
		{
		?>
			
			jQuery(".disable_provider_both").attr('disabled',false);
			jQuery(".provider_both").show();
		<?php	
			if(!empty($account_type) && $account_type == PROVIDER_ACCOUNT_TYPE_INDIVIDUAL)
			{
		?>
			
			jQuery("label#display_name").text('Display Name *');
		<?php	
			}
			elseif(!empty($account_type) && $account_type == PROVIDER_ACCOUNT_TYPE_BUSINESS)
			{
				
		?>
			jQuery("label#display_name").text('Company Name *');
		<?php
			}
			
		
		}
		elseif(!empty($role_id) && $role_id == Configure::read('App.Role.Buyer'))
		{
		?>
			jQuery(".disable_provider_both").attr('disabled',true);
			jQuery(".provider_both").hide();
		<?php
		}
		else
		{
		}
	
	?>
	
	
	/* jQuery("#UserHearAboutUs").change(function(){
	
		if(jQuery(this).val() != '' && jQuery(this).val()==13)
		{
			jQuery("#other_option").show();
			jQuery("#UserHearAboutUsOther").attr('disabled',false);
		}
		else
		{
			jQuery("#other_option").hide();
			jQuery("#UserHearAboutUsOther").attr('disabled',true);
		}
	
	
	})
	 */
	<?php
	/* if(!empty($hear_about_us) && $hear_about_us == 13)
	{ */
	?>
		/* jQuery("#other_option").show();
		jQuery("#UserHearAboutUsOther").attr('disabled',false); */
	<?php	
	/* }
	else
	{ */
	?>
		/* jQuery("#other_option").hide();
		jQuery("#UserHearAboutUsOther").attr('disabled',true); */
	<?php
	/* } */
	?>
	
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
    yearRange: '-100',showAnim: 'fold',showOn: 'both',buttonImageOnly: true, buttonImage: ''+SiteUrl+'/img/icons/cal.jpeg'
	});
        jQuery(".datepicker").datepicker("setDate" , new Date());
	}	
});	

 function myIP() {
    if (window.XMLHttpRequest) 
   xmlhttp = new XMLHttpRequest();
    else 
   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

    xmlhttp.open("GET","http://jsonip.appspot.com/",false);
    xmlhttp.send();

    hostipInfo = xmlhttp.responseText;
    obj = JSON.parse(hostipInfo);
	return obj.ip;
   /*  document.getElementById("IP").value=obj.ip;
    document.getElementById("ADDRESS").value=obj.address; */
}	
</script>
	<?php echo $this->element('ele_facebook_login');?>
	<?php echo $this->element('ele_linkdin_login') ?>
	<div class="left_sidebar">
      <?php echo $this->element('Front/ele_register_slogan'); ?>
    </div>
    <div class="right_sidebar">
	<?php //echo $this->Layout->sessionFlash(); ?>
<?php 
	$default_option = Configure::read('App.Role.Buyer');
	$default_text	= 'I Have A Dream';
			
	if(isset($this->request->params['pass'][0]) ){
		
		if($this->request->params['pass'][0] == Configure::read('App.Role.Provider'))
		{
			$default_option =Configure::read('App.Role.Provider');
			$default_text	= 'Join A Team';
		}
		elseif($this->request->params['pass'][0] == Configure::read('App.Role.Buyer'))
		{
			$default_option =Configure::read('App.Role.Buyer');
			$default_text	= 'I Have A Dream';
		}
	}

?>
	  <div class="cmpnsn_prgrsDV">	  	
        <div class="cmpnsn_prgrsnav" style="padding:0 0 3px 0;">
          <h2><a href="javascript:void(0);"><?php echo $default_text;?></a></h2>
        </div>
      </div>
      <div class="product_dscrpBOX" style="width:100%;">
        <h3>Create a Free Account</h3>
        <div class="compensation_frmDV">		
		<?php 			
			echo $this->Form->create('User',array('name'=>'frm', 'url' => array('controller' => 'users', 'action' => 'register',$default))); ?>          
            <ul class="RegFrmFild">
              <li>
                <label>Register As</label>
                <div class="compensation_frmrow_R register-page" style="padding: 6px 0 0;">
				<?php  
					echo ($this->Form->input('role_id', array('type'=>'radio', 'options'=>Configure::read('App.Roles'),'default'=>$default_option , 'div'=>false,'legend'=>false, 'label'=>false,'class'=>'chckBX chkbx user_type', 'style'=>'margin:0 6px 0 16px')));
				?>
				</div>
              </li>
            <li>
			<label>&nbsp;&nbsp;</label>
			 <div class="socialnet">
              <h4>Using social networks sign up</h4>
              <div class="socialnetIcon">
                <p><a href="javascript:void(0);" class="fb-login">
				<?php echo $this->Html->image('facebook.jpg',array('alt'=>'facebook'));?>
			</a><span>Or</span><a href="javascript:void(0);" class="linkdin_login">
			<?php echo $this->Html->image('in.jpg',array('alt'=>'linkedin'));?>			
			</a></p>
              </div>
              <div class="OrBotm"><span>Or Using Email Registration</span></div>
            </div>
			
			</li>
			<?php /* <li class="FloatLeFrm provider_both" style="line-height:30px;">
                <label>Account Type</label>
					<?php  echo ($this->Form->input('account_type', array('type'=>'radio', 'options'=>Configure::read('App.Provider.Account.Type'),'default'=>'1', 'div'=>false,'legend'=>false, 'label'=>false,'class'=>'chkbx disable_provider_both account_type', 'style'=>'margin:0 6px 0 16px')));?>
              </li>
			  <li class="FloatLeFrm provider_both">
                <label id="display_name">Display Name*</label>
				<?php  echo ($this->Form->input('display_name', array('div'=>false, 'label'=>false, "class" => "TxtFildReg disable_provider_both","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));?> 
              </li> */ ?>
              <li class="FloatLeFrm">
                <label>First Name*</label>
				<?php  echo ($this->Form->input('first_name', array('div'=>false, 'label'=>false, "class" => "TxtFildReg","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));?> 
              </li>
              <li class="FloatRiFrm">
                <label>Last Name*</label>
               <?php  echo ($this->Form->input('last_name', array('div'=>false, 'label'=>false, "class" => "TxtFildReg","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));?> 
              </li>
              <li>
                <label>User Name*</label>
               <?php  echo ($this->Form->input('username', array('div'=>false, 'label'=>false, "class" => "TxtFildReg","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));?> 
              </li>
              <li>
                <label>Password*</label>
               <?php  echo ($this->Form->input('password2', array('type'=>'password','div'=>false, 'label'=>false, "class" => "TxtFildReg","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));?> 
              </li>
              <li>
                <label>Repeat Password*</label>
                <?php  echo ($this->Form->input('password_confirm', array('type'=>'password','div'=>false, 'label'=>false, "class" => "TxtFildReg","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));?>
              </li>
              <li>
                <label>Email*</label>
                  <?php  echo ($this->Form->input('email', array('div'=>false, 'label'=>false, "class" => "TxtFildReg","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));?> 
              </li>
			  <?php /* <li>
                <label>Phone no*</label>
                  <?php  echo ($this->Form->input('phone_no', array('div'=>false, 'label'=>false, "class" => "TxtFildReg","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));?> 
              </li> */ ?>
			  <li>
                <label>Region*</label>				
                <span class="slct_rwndInPut">
				<?php echo ($this->Form->input('UserDetail.region_id', array('div'=>false, 'label'=>false,'empty'=>'-- Select Region --','options'=>$region,"class" => " slct_rwndInPutRi with_sml1","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));
						 				$this->Js->get('#UserDetailRegionId')->event('change',$this->Js->request(array('controller'=>'countries','action'=>'get_county_region'), array('update'=>'#location','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
				
					/*$this->Js->get('#UserDetailRegionId')->event('change',$this->Js->request(array('controller'=>'countries','action'=>'get_county_region'), array('update'=>'#update_country','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));*/
				?>               
                </span>
			  </li>
			  <div id="location">
	              <li>
		                <label>Country*</label>
		                <span class="slct_rwndInPut" id="update_country">
						<?php if (!empty($countries) && $countries!=''){
										
									echo ($this->Form->input('UserDetail.country_id', array('div'=>false, 'label'=>false, 'options'=>$countries ,"class" => "  slct_rwndInPutRi with_sml1","error" => array("wrap" =>EDITWRAP, "class" => "error-message",'empty'=>'-- Select Country --'))));
								}else{  
								
									echo ($this->Form->input('UserDetail.country_id', array('div'=>false, 'label'=>false,  'empty'=>'N/A',"class" => "  slct_rwndInPutRi with_sml1","error" => array("wrap" =>EDITWRAP, "class" => "error-message",'empty'=>'-- Select Country --'))));
								}
						$this->Js->get('#UserDetailCountryId')->event('change',$this->Js->request(array('controller'=>'states','action'=>'get_state_front'), array('update'=>'#State','async' => true,'method' => 'post', 'dataExpression'=>true, 'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
					   ?> 
						</span>					
					</li>
					<li  class="FloatLeFrm">
						<label>State*</label>
						<span class="slct_rwndInPut"  id="State">
						<?php if (!empty($states) && $states!=''){
										
									echo ($this->Form->input('UserDetail.state_id', array('div'=>false, 'label'=>false, 'options'=>$states ,"class" => " slct_rwndInPutRi with_sml1","error" => array("wrap" =>EDITWRAP, "class" => "error-message",'empty'=>'-- Select State --'))));
								}else{  
								
									echo ($this->Form->input('UserDetail.state_id', array('div'=>false, 'label'=>false,  'empty'=>'N/A',"class" => "  slct_rwndInPutRi with_sml1","error" => array("wrap" =>EDITWRAP, "class" => "error-message",'empty'=>'-- Select State --'))));
								}?>
						
		                </span>
	                </li>
             </div>
               
              
               <li>
                <label>City*</label>
                  <?php  echo ($this->Form->input('UserDetail.city', array('div'=>false, 'label'=>false, "class" => "TxtFildReg","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));?> 
              </li>
			 <?php /*  <li class="FloatLeFrm">
                <label>Zip/Postal Code*</label>
                  <?php  echo ($this->Form->input('zip', array('div'=>false, 'label'=>false, "class" => "TxtFildReg","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));?> 
              </li>		*/ ?>
				<?php
             /* <li class="FloatLeFrm">
                <label>Gender</label>
				<div class="compensation_frmrow_R">
				<?php  echo ($this->Form->input('gender', array('type'=>'radio', 'options'=>Configure::read('App.Sex'),'default'=>'m', 'div'=>false,'legend'=>false, 'label'=>false,'class'=>'chkbx')));?></div>
                
              </li> 
			   <li class="FloatLeFrm">
                <label>Date of Birth</label>
				
					<?php echo $this->Form->input('User.dob', array('type'=>'text','div'=>false,'readonly'=>true, 'label'=>false, "class" => "TxtFildReg datepicker","error" => array("wrap" =>EDITWRAP, "class" => "error-message")));?>                
              </li> */
			  ?>
			  <?php
			  /* <li>
                <label>Security Question*</label>				
                <span class="slct_rwndInPut">
				<?php  echo ($this->Form->input('security_question_id', array('div'=>false, 'label'=>false,'options'=>$security_question,'empty'=>'--Select Security Question--', "class" => "slct_rwndInPutRi with_sml1", 'div'=>false,"error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));?>	
				
                </span>
			  </li>
			  <li>
                <label>Answer*</label>
               <?php  echo ($this->Form->input('answer', array('div'=>false, 'label'=>false, "class" => "TxtFildReg","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));?> 
              </li>
			 <li  class="FloatLeFrm">
                <label>How did you hear about us*</label>
				<span class="slct_rwndInPut">
				<?php
						
				echo ($this->Form->input('hear_about_us', array('div'=>false, 'label'=>false, 'options'=>Configure::read('User.hearaboutOption') ,"class" => "slct_rwndInPutRi with_sml1",'empty'=>'-- Select --',"error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));
					?>
				
                </span>
              </li> 
			  <li id="other_option" style="display:none;">
                <label>Other*</label>
               <?php  echo ($this->Form->input('hear_about_us_other', array('div'=>false, 'label'=>false, "class" => "TxtFildReg","disabled"=>true,"error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));?> 
              </li>
			  */
			  ?>
              <li>
                <label>&nbsp;</label>
                 <?php  echo ($this->Form->input('UserDetail.term_condition', array('type'=>'checkbox',  'div'=>false,'legend'=>false, 'required'=>'true', 'value'=>'1' ,  'label'=>false,"error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));?>
                 
                <span>Click here to indicate you have read and agree to the ATeam4ADream <a href="javascript:void(0)" onclick='jQuery(".popup_view").toggle();'>Terms of use</a></span></li>
              <li>
                <label>&nbsp;</label>
                 <span class="search_btn_blu btn_marin_0">
                <input type="submit" class="search_btn_blu_ri" value="Submit" onclick="return doSubmit()"/>
                </span>
                
                </li>
            </ul>
			<?php echo $this->Form->end(); ?>
          
          
          <!--  Some Popup goes Here For   Stuff   -->
          	<div class='popup_view' style='display:none;'> 
          
          <div class="PoupWrp">
  <div class="PoupIn">
    <h2>Terms of use.</h2>
    <div class="PoupInFrm">
      <div class="items">
 
      
       <div class="row rw_width">
              
                	<? echo $terms ; ?>
          
      </div>
          <span class="Continue4Btn" style="float:right; margin:0 26px 5px 0;">
          <input type="button" name="" class="Continue4BtnRi" value="Close" onclick='jQuery(".popup_view").hide()'>
          </span>
       
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div> 



          
          
           </div> 
          <!--   End Popup Here   -->
          
        <script type='text/javascript'> 
        
        	jQuery(document).ready(function(){
        		 
        	 
        		
        	});
        
        
        
        </script>  
          
          
          
          
          
          
          
          
        </div>
      </div>
    </div>
	</div>
<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>	
