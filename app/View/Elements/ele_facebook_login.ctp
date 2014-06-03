<div id="fb-root"></div>
<script type="text/javascript">
	window.fbAsyncInit = function() {FB.init({appId: '<?=FACEBOOK_APP_ID?>', status: true, cookie: true, xfbml: true});};
	(function() {
	var e = document.createElement('script');
	e.type = 'text/javascript';
	e.src = document.location.protocol +'//connect.facebook.net/en_US/all.js';
	e.async = true;
	document.getElementById('fb-root').appendChild(e);
	}()); 

	function init(){
	window.fbAsyncInit = function() { FB.init({appId: '<?=FACEBOOK_APP_ID?>', status: true, cookie: true, xfbml: true});};
	} 

</script>

	
<script type="text/javascript">
function do_login()
{
	
	//jQuery("#ajax_loading").show();
	open_box();
	FB.login(function(response) {
			
			if (response.authResponse) {
				var access_token = response.authResponse.accessToken;
				var role = jQuery(".user_type:checked").val();
				//alert(role);return false;
				FB.api('/me',function(response) {
					response['access_token']= access_token;
					<?php 
					//if($session->check('Auth.User.id')){?> 
						
							jQuery.ajax({
							  type:'POST',
							  url: '<?php echo Configure::read('App.SiteUrl');?>'+"/users/get_facebook_data/"+role,
							  data:response,
							  success: function(data){
								  if(data){
										jQuery('#login_box').html(data);
										
								  }
							  }
							});
							
						<?php
					//}?>
				});
			}
			else
			{
				 jQuery.modal.close();
			}
		} , {scope:'email'});
		
}		
	
	jQuery(document).ready(function(){
		jQuery(".fb-login").live('click',function(){ 
			 
			init();
			do_login();
		});
	
	})

	
 
	
</script>

<div id = "login_box" >
<div id="ajax_loading" class="ajax_login_box">
	
<?php echo $this->Html->image('facebook_loading_.gif',array('title'=>'loading image','class'=>'ajax_login_box_image'));?>
</div>
</div>	