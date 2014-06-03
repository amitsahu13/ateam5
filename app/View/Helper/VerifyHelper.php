<?php
/*
 * Display Verify iocns   
 * pashkovdenis@gmail.com  
 * 2013 Rommie   
 * 
 */
class VerifyHelper  extends AppHelper {
	
	  
	
	 
			public function getVerifyHTML($user){
					App::import("model",  "User") ;   
		 			$user_model  =  new User() ;  
		  			$user_row =$user_model->find("first",  array( "conditions" => array("id"=>$user)  ));  
		  		     $html  =  '
				    		<ul class="confirmed">
					    		     <li class="map     '.($user_row["User"]["country_confirmed"]!="0"?"active":''  ).' "   title="  '.($user_row["User"]["country_confirmed"]!="0"?"Location Verified":''  ).' "      >  			 </li>
				    		 		 <li class="msg   activemsg active" title="Email Verified">		 </li> 
									 <li class="phone       '.($user_row["User"]["phone_confirmed"]!="0"?"active":'' ).'   "  title="'.($user_row["User"]["phone_confirmed"]!="0"?"Phone Verified":'' ).'">  					</li>
		  						     <li  class="user     '.($user_row["User"]["linkid_confirmed"]==1?"active":'' ).'     "  title="'.($user_row["User"]["linkid_confirmed"]==1?"Social Media Verified":'' ).'" >						</li>
		      					</ul>
				    		';  
				 	 return $html;   
			 	}
	
	
	
	
	
	
	
}
 