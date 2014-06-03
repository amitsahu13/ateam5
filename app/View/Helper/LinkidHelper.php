<?php
/*
 * pashkovdenis@gmail.com Get Some Link
 */

class LinkidHelper extends AppHelper {
	
	// getLinkID
	public function getLink($url) {
		$str = "https://www.linkedin.com/uas/oauth2/authorization?response_type=code&client_id=" . LINKID_API . "&state=ACEDFWEWF45453sdffef424&redirect_uri=" . urlencode ( $url );
		return $str;
	}
	
 
	public function checkAuthrorize($urlc ,$user='') {
		
		if (isset ( $_GET ["code"] ) && empty($_SESSION ["LINKID_TOKEN"]) ) {
					 
					
					$code = $_GET ["code"];
					$url = "https://www.linkedin.com/uas/oauth2/accessToken?grant_type=authorization_code";
		  			$myvars = "code={$_GET["code"]}&redirect_uri={$urlc}&client_id=" . LINKID_API . "&client_secret=" . LINKID_SECRET_KEY;
					$ch = curl_init ( $url );
					curl_setopt ( $ch, CURLOPT_POST, 1 );
					curl_setopt ( $ch, CURLOPT_POSTFIELDS, $myvars );
					curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
					curl_setopt ( $ch, CURLOPT_HEADER, 0 );
					curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
					$response = curl_exec ( $ch );
					$data = json_decode ( $response ); 
					$_SESSION["issent"] = 1 ;
					$_SESSION ["LINKID_TOKEN"] = $data->access_token; 
  					
					
					$this->resignID($user) ;
					
					
					
					
					
					
					header("Location:".$urlc); 
					die(); 
					 
	 
		}  
	 
	}
	
 
	/*
	 * Resign User Data  :    
	 *  pashkovdeni@gmail,
	 */
	public function resignID($userid) { 
		App::import("model","User") ;  
		
		 $email  =  "";  
		 $id= "" ; 
		 $first_name = "" ; 
		 $second_name =  "";  
		 
		 if (isset($_SESSION ["LINKID_TOKEN"]) &&  $_SESSION ["LINKID_TOKEN"]!=""){
		 	
 	  		$email   =  $this->getData("email_address") ; 
 	  		$id				 = $this->getData("id" ) ;
 	  		$first_name		 = $this->getData("first-name") ; 
 	  		$second_name 	 = $this->getData("last-name") ; 
 	  		$formatted_name  =  $this->getData("formatted-name");  
 	  		$summary 		 =  $this->getdate("summary");  
 	  		$picture 		 =  $this->getData("picture-url") ;  
 	  		$url  			 =     $this->getData("public-profile-url"); 
 	  		 

 	  		
 	  		
 	  		
	  		   //  Some Token  :   
	  	  if ($id   && $email &&  strstr($id, "token")==false){ 
 			 	 
	  	  		 $user = new User();   
 			 	 App::uses ( 'CakeEmail', 'Network/Email' ); 
 			 	 $email = new CakeEmail ( 'gmail' );
 			 	 $email->template ( 'default', "default" );
 			 	 $email->emailFormat ( 'html' );
 			 	 $loaded  =  $user->find("first" , array("conditions"=>array("id"=>$userid)));  
 			 	 $detail_user  =  $user->query("SELECT about_us FROM user_details  WHERE user_id='{$userid}'   ");  
 			 	 
 			 	  $email_site   = $user->query("SELECT value FROM  settings WHERE name='site_email' ") ; 
 			 	  			 	  
 			 	  $email->from ($email_site [0] ["settings"] ["value"] );
 			 	  $email->to (  User::getAdminEmail());
			   			 	  
 			 	  
 			  	$text =   EMAIL_LINKEDID. "<a  href='".SITE_URL."/admin/admin_linkid'>   View Details   </a> ";  
 			 	$text= str_replace("{id}", $id, $text) ;  
 			 	$text= str_replace("{user}", $first_name. " " . $second_name, $text) ;
 			   	$email->subject ( "New LINKID was Confirmed  "  );
 			   	
 			   	// Get  Additional Data :   
 			   	$text .="<hr>";  
 			   	$text.="
 			   			<dvi> 
 			   			<h3> <A href='{$url}'> {$loaded["User"]["username"]} </a> </h3>
 			   			<img src='{$picture}'/>  
 			   			<p>   About : {$detail_user[0]["user_details"]["about_us"]}  </p>  
 			   			<p>   First name :  {$first_name} </p>  
 			   			<p>   Second name : {$second_name} </p>   
 			   			<p>   Summary :  {$summary} </p>  
 			   		     
 			   			 <p>  Link  :  {$url}</p>  
 			   			 </div> 
 			   			" ;  
 			   	
 			   	$postitions_title  =  $this->getData("positions:(title)"); 
 			   	$postitions_summary  =  $this->getData("positions:(summary)"); 
 			   	$postitions_com  =  $this->getData("positions:(company)"); 
 			   	
 			   	
 			   	$postitions_title = explode("," ,  $postitions_title);  
 			   	$postitions_title =  join("<br>"  ,  $postitions_title);  
 			   	 
 			   	 
 			    $text .= "<p>Positions:  {$postitions_title}  </p> " ;  
 			    
 			    
 			     
 			    // Send   Text For   Email Stand  :   
 			    $email->send ( $text );
 			 	
 			 	
	  		 	$user->query("UPDATE users SET linkid='{$id}' ,  first_name='{$first_name}' ,  last_name='{$second_name}'   WHERE id ='{$userid}'   ") ; 
				echo "<script type='text/javascript'>   window. location.reload(false);   </script> ";
 		 }else{
 		 	unset($_SESSION ["LINKID_TOKEN"]) ;  
 		 	unset( $_SESSION ["LINKID_TOKEN"]) ; 
 		 	 
 		 }
 		 
 		 
		 }
	
		
	}
	
	
	
	
	
	
	
	/*
	 * Get Additiona data From  LinkId  Service  
	 * pashkovdenis@gmail.com  
	 * 2014  
	 * 
	 */
	
	private function getData($field){  
		$url = "https://api.linkedin.com/v1/people/~:({$field})?oauth2_access_token=" . $_SESSION ["LINKID_TOKEN"];
		return  strip_tags($this->getSslPage ( $url )); 
		
	}
	
	
	
	
	
	
	
	/*
	 * getSqlPage: 
	 * 
	 */
	private function getSslPage($url) {
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
		curl_setopt ( $ch, CURLOPT_HEADER, false );
		curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, false  );
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_REFERER, $url );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, TRUE );
		$result = curl_exec ( $ch );
		curl_close ( $ch );
		$result =  strip_tags($result);  
		$result = str_replace(" ", "", $result)  ; 
		$result = str_replace("\r\n", "", $result)  ;
		 return preg_replace('/^\s+|\n|\r|\s+$/m', '',$result);
	}
}

