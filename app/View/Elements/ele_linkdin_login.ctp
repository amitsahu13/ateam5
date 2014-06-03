<script type="text/javascript">
SiteUrl = '<?php echo SITE_URL; ?>';
</script>
<script type="text/javascript" src="http://platform.linkedin.com/in.js">
  api_key: <?=LINKID_API?>
  
  scope: r_basicprofile r_emailaddress
  authorize: true
</script>
<script type="text/javascript">
	function linkdin_login() {
		
		 var auth =  IN.User.isAuthorized();
		 if(!auth){
			 
			IN.User.authorize(onLinkedInAuth);
		 }else{
			 
			onLinkedInAuth()
		 }
	}

	function onLinkedInAuth() {
		IN.API.Profile("me").fields(["id", "firstName", "lastName","email-address", "headline", "pictureUrl","location","industry","positions:(company)","recommendationsReceived","skills"]).result(displayProfiles).error(displayProfilesErrors);
	}

	function displayProfiles(profiles) {		
		jQuery("#ajax_loading").show();
		var role = jQuery(".user_type:checked").val();
		  $.ajax({
				type:'POST',	
				url: SiteUrl+"/users/get_linkedin_data/"+role,
				data:profiles,
				beforeSend:function(xhr){									
				},
				success: function(data){
					if(data){
						jQuery('#login_box').html(data);
					}
					else
					{
						//window.location	=	SiteUrl+"/pages/link_login";
					}
				}
			});
	}
	function displayProfilesErrors(error) {
		profilesDiv = document.getElementById("profiles");
		profilesDiv.innerHTML = "<p>Oops!</p>";
		console.log(error);
	}
	
	jQuery(document).ready(function(){
		jQuery(".linkdin_login").live('click',function(){
			linkdin_login();
		});
	
	})	
</script>
<body>
<div id="profiles"></div>
</body>
</html>
