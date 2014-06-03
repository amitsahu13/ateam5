<?php 
/*
 * Paypal Helper  Will Generate request For   our needs   :   
 * 2014   
 * 
 * 
 * 
 */
 
class PaypalHelper extends AppHelper{ 
 
	
	
	
	 /*
	  * ______________________
	  * Create Forma Response  
	  * 2014@
	  * ______________________ 
	  */
	public function getForm($total=0, $user_id=0,  $type=1 ){
		$resp =  "";  
		$secureToken  = uniqid('',  true);  
		$postData  =  "USER=".  PAYPAL_PF_USER. 
					  "&VENDOR=".PAYPAL_PF_VENDOR. 
					  "&PARTNER=". PAYPAL_PF_PARTHER. 
					  "&PWD=".PAYPAL_PF_PASSWROD. 
					  "&CREATESECURETOKEN=Y".  
					  "&SECURETOKENID=" .$secureToken .
					  "&TRXTYPE=S". 
					  "&AMT=" .$total ; 
		
		 $ch= curl_init(); 
		 curl_setopt($ch, CURLOPT_URL ,  PAYPAL_PF_HOST) ; 
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER ,   true) ;
		 curl_setopt($ch, CURLOPT_POST ,    true) ; 
		 curl_setopt($ch, CURLOPT_POSTFIELDS ,    $postData) ; 
		 $resp =  curl_exec($ch )  ; 
		 if (!$resp)
		 	$resp =  "Empty Reponse";
 		 parse_str($resp, $arr) ;  
	 
		 if ($arr["RESULT"] != 0 ) 
		 	$resp = "RETURNED Bad result " . $arr["RESPMSG"]; 
		 else{
		 	 $resp =  " 
		 	      <iframe src='https://payflowlink.paypal.com?MODE=".PAYPAL_PF_MODE."&SECURETOKEN={$arr["SECURETOKEN"]}&SECURETOKENID={$secureToken}' width='490px'  height='564px'  border='0'  frameborder='0' allowtransparency='true' >   
		 	      </iframe>  "; 
		  }
		 return $resp ;  
		
	}
	
 	
	// Other Stack :   
		
	
	
	
	
}
 