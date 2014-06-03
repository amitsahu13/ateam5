<div class="right_sidebar">
        	<h2> Pay With Paypal :   
            	       
            </h2>
            <div class="product_dscrpBOX">
            	 <img src='http://www.sonoma.com.au/assets/Uploads/paypal-big2.png' width='200px'/> 
            	 <p> Proceed Payment With Paypal Text :  Price  <?=PAYPAL_PRICE_AUTH?>$</p> 

            	 <hr>  

            	 <?=$this->Paypal->getForm( PAYPAL_PRICE_AUTH , $user_id,  $type )?>



            </div>
           
        </div> 

        <!-- Script Goes Here  -->  


        <script type='text/javascript'> 
                jQuery(document).ready(function(){
                    setInterval(function(){
                        jQuery.get("/paypal/checkAuthPayment",function(data){
                                if (data == "true") 
                                     window.location = "/users/userinfo_authenticate"; 

                        });
                    }, 3000) ;

                });


        </script> 
