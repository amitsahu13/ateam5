<script>
SiteUrl = '<?php echo SITE_URL; ?>';
</script>
<script type="text/javascript" src="http://platform.linkedin.com/in.js">
  api_key: 6wzylcc3cjb0
  scope: r_basicprofile r_emailaddress
  authorize: true
</script>

<script type="text/javascript">
  // 2. Runs when the JavaScript framework is loaded

	// 2. Runs when the viewer has authenticated

	function linkdin_validation() {
		 var auth =  IN.User.isAuthorized();
		 if(!auth){
			IN.User.authorize(onLinkedInAuth);
		 }else{
			onLinkedInAuth()
		 }
	}
	
	function onLinkedInAuth() {
		IN.API.Profile("me").fields(["id", "firstName", "lastName","email-address", "headline", "pictureUrl","location","industry","positions:(company)","recommendationsReceived","skills","public-profile-url"]).result(displayProfiles).error(displayProfilesErrors);
	}
	

	function displayProfiles(profiles) {
	jQuery("#ajax_loading").show();
	  $.ajax({
			type:'POST',	
			url: SiteUrl+"/users/linkdin_validation",
			data:profiles,
			beforeSend:function(xhr){									
			},
			success: function(data){
				if(data){
					jQuery("#ajax_loading").html(data);
					jQuery("#ajax_loading").hide();
				}
				else
				{
					
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
		jQuery("#linkdin_validation").live('click',function(){
			linkdin_validation();
		});
	
	})

	
</script>

<body>
<div id="profiles"></div>

</body>
</html>
