<style>
.ui-multiselect {
	width: 225px !important;
}
</style>



<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		
		<h3 style="cursor: s-resize;">Add a new User</h3>
		
		<ul class="content-box-tabs">
			<li>* required fields</li> <!-- href must be unique and match the id of target div -->
			
		</ul>
		
		<div class="clear"></div>
		
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		
		<div style="display: block;" class="" id="tab2">
			
			<?php
				$this->Layout->sessionFlash();			  
			?>
				
			<?php 
			echo $this->Form->create('User', 
				array('url' => array('controller' => 'users', 'action' => 'admin_add'),
				'type'=>'file',
			'inputDefaults' => array(
				'error' => array(
					'attributes' => array(
						'wrap' => 'span',
						'class' => 'input-notification error png_bg'
					)
				)
			)
			));
			
			
			echo $this->element('Admin/User/ele_user_admin_form');
			
			?>
				
								
				
			<?php
				echo ($this->Form->end());
			?>	
			
		</div> <!-- End #tab2 -->        
		
	</div> <!-- End .content-box-content -->
	
</div> <!-- End .content-box -->
<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>	
<script type="text/javascript">
	/*$(document).ready(function(){ alert('sd');
	var buyer = '<?php echo Configure::read('App.Role.Buyer'); ?>';
	var provider = '<?php echo Configure::read('App.Role.Provider'); ?>';
	var both = '<?php echo Configure::read('App.Role.Both'); ?>';
	//var individual = '<?php echo PROVIDER_ACCOUNT_TYPE_INDIVIDUAL ?>';
	//var business = '<?php echo PROVIDER_ACCOUNT_TYPE_BUSINESS ?>';
	//var role_id = '<?php echo $role_id ;?>';
	//var account_type = '<?php echo $account_type ;?>';
		$(".role_type").change(function(){
		alert('hi');
			if($(".role_type:checked").val() == buyer)
			{
				
				$(".provider_account_type").hide();
				$(".buyer_account_type").show()
				$(".provider_account_type_status").attr('disabled',true);
				$(".buyer_account_type_status").attr('disabled',false);
			}
			if($(".role_type:checked").val() == provider)
			{
				$(".provider_account_type").show();
				$(".buyer_account_type").hide()
				$(".provider_account_type_status").attr('disabled',false);
				$(".buyer_account_type_status").attr('disabled',true);
			}
			if($(".role_type:checked").val() == both)
			{
				$(".provider_account_type").show();
				$(".buyer_account_type").show()
				$(".provider_account_type_status").attr('disabled',false);
				$(".buyer_account_type_status").attr('disabled',false);
			}
		
		});
		
		 $("#UserAccountType").change(function(){
		
			if($(this).val()==individual)
			{
				$(".account_type label").text('Display name');
			}
			if($(this).val()==business)
			{
				$(".account_type label").text('Company name');
			}
		
		
		});
 
	});*/
	$(document).ready(function(){
		var buyer = '<?php echo Configure::read('App.Role.Buyer'); ?>';
		var provider = '<?php echo Configure::read('App.Role.Provider'); ?>';
		var both = '<?php echo Configure::read('App.Role.Both'); ?>';
		$("#UserDetailAccountType").change(function(){
			
			if($(this).val() == 1)
			{
				$("label[for='UserDetailDisplayName']").text('Display name');
			}
			if($(this).val() == 2)
			{ 
				$("label[for='UserDetailDisplayName']").text('Company name');
			}
		
		
		});
		if($(".role_type:checked").val() == provider)
		{
			$(".leadership").hide();
			$("#UserDetailLeadershipCategoryId").attr('disabled',true);
		}
		$(".role_type").change(function(){
			
			if($(".role_type:checked").val() == buyer)
			{	$(".provider_account_type").hide();
				$(".provider_account_type_status").attr('disabled',true);
				$(".leadership").show();
				$("#UserDetailLeadershipCategoryId").attr('disabled',false);
				$(".expertise").hide();
				$("#UserDetailExpertiseCategoryId").attr('disabled',true);
			}
			if($(".role_type:checked").val() == provider)
			{
				$(".provider_account_type").show();
				$(".provider_account_type_status").attr('disabled',false);
				$(".leadership").hide();
				$("#UserDetailLeadershipCategoryId").attr('disabled',true);
				$(".expertise").show();
				$("#UserDetailExpertiseCategoryId").attr('disabled',false);
			}
			if($(".role_type:checked").val() == both)
			{
				$(".provider_account_type").show();
				$(".provider_account_type_status").attr('disabled',false);
				$(".leadership").show();
				$("#UserDetailLeadershipCategoryId").attr('disabled',false);
				$(".expertise").show(); 
				$("#UserDetailExpertiseCategoryId").attr('disabled',false);
				
			}
			
	});
	});
</script>
				