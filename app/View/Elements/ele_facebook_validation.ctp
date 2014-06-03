<div id="fb-root"></div>
<script type="text/javascript">
	window.fbAsyncInit = function() {FB.init({appId: '434004490016458', status: true, cookie: true, xfbml: true});};
	(function() {
	var e = document.createElement('script');
	e.type = 'text/javascript';
	e.src = document.location.protocol +'//connect.facebook.net/en_US/all.js';
	e.async = true;
	document.getElementById('fb-root').appendChild(e);
	}()); 

	function init(){
	window.fbAsyncInit = function() { FB.init({appId: '434004490016458', status: true, cookie: true, xfbml: true});};
	} 

</script>

	
<script type="text/javascript">
function facebook_validation()
{
	
	//jQuery("#ajax_loading").show();
	open_box();
	FB.login(function(response) {
			
			if (response.authResponse) {
				var access_token = response.authResponse.accessToken;
				
				//alert(role);return false;
				FB.api('/me/friends',function(response) {
					response['access_token']= access_token;
					<?php 
					//if($session->check('Auth.User.id')){?> 
						
							jQuery.ajax({
							  type:'POST',
							  url: '<?php echo Configure::read('App.SiteUrl');?>'+"/users/facebook_validation/",
							  data:response,
							  success: function(data){
								  if(data){
									
										//jQuery('#facebook_validation_box').html(data);
										jQuery("#login_box").html(data);
										
										//jQuery("#ajax_loading").hide();
										
								  }
							  }
							});
							
						<?php
					//}?>
				});
			}
			else
			{
				//jQuery("#ajax_loading").hide();
				 jQuery.modal.close();
			}
		} , {scope:'email'});
		
}		
	
	jQuery(document).ready(function(){
		jQuery("#facebook_validation").live('click',function(){
			init();
			facebook_validation();
		});
	
	})

	


	
</script>

<div id = "login_box" >
<div id="ajax_loading" class="ajax_login_box">
	
<?php echo $this->Html->image('facebook_loading_.gif',array('title'=>'loading image','class'=>'ajax_login_box_image'));?>
</div>
</div>	 