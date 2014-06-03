<?php
/*
 * Popup Invite Validate
 */
class InvitepopupController extends AppController {
	public $helpers = array (
			'General',
			'Html',
			"Verify" 
	);
	var $controller = 'invitepopup';
	private $HTML;
	private $minLevels = 0;
	public function beforeFilter() {
		parent::beforeFilter ();
		
		$this->Auth->allow ( 'fromemail' );
		
		$this->loadModel ( "Settings" );
		$this->loadModel ( "ValidationLevel" );
		$this->loadModel ( "User" );
		$this->loadModel ( "Job" );
		$this->loadModel ( "Project" );
		
		$this->minLevels = $this->ValidationLevel->find ( "all", array (
            "conditions" => array (
                "status" => "1"
            )
        ) );

		$this->autoRender = false;
	}
	
	/*
	 * Get Popup Controller Check Users Levels To complete Stack
	 */
	public function getVerifyHTML($user) {
		App::import ( "model", "User" );
		$user_model = new User ();
		$user_row = $user_model->find ( "first", array (
				"conditions" => array (
						"id" => $user 
				) 
		) );
		$html = ' 			<ul class="confirmed">
					    		     <li class="map ' . ($user_row ["User"] ["country_confirmed"] != "0" ? 'active' : null) . '        ">  			 </li>
				    		 		 <li class="msg active" ></li>
									 <li class="phone ' . ($user_row ["User"] ["phone_confirmed"] != "0" ? 'active' :null ) . '"></li>
		  						    <li class="user ' . ($user_row ["User"] ["linkid"] != "" ? 'active' : null ) . '"></li>
		      					</ul>
				    		';
		
		return $html;
	}








    /*
     * Get Popup For Invitation
     *
     */






	public function getpopup($leader, $expert, $work) {
		$leader_user = $this->User->find ( "first", array (
				"conditions" => array (
						"User.id" => $leader 
				) 
		) );
		$expert_user = $this->User->find ( "first", array (
				"conditions" => array (
						"User.id" => $expert 
				) 
		) ); 
		
		$leader_mathc = 0;

        //Test validation
        $is_valid = true;


        foreach ($this->minLevels as $valid_type)
        {

            echo  $valid_type['ValidationLevel']['slug'] .  "<br> ";
            switch ($valid_type['ValidationLevel']['slug'])
            {


                case 'mail_validation':
                {
                    if (($leader_user["User"]['status']!='1')
                        || ($expert_user["User"]['status']!='1')
                    )
                    {
                        $is_valid = false;
                    }

                    break;
                }

                case 'call_validation':
                {
                    if (($leader_user["User"]['phone_confirmed']!='1')
                        || ($expert_user["User"]['phone_confirmed']!='1')
                    )
                    {
                        $is_valid = false;
                    }
                    break;
                }

                case 'ip_validation':
                {
                    //  ip Validate :  What is   Ip Validation   ?



                    break;
                }


                case 'bank_account_validation':
                {
                    //There are not bank_account_validation data in user. Nothing to do
                    break;
                }


                case 'passport_validation':
                {
                    //There are not passport_validation data in user. Nothing to do
                    break;
                }

                case 'address_validation':
                {
                    if ($leader_user ["User"] ["country_confirmed"] !=1 ||  $expert_user ["User"] ["country_confirmed"]!=1)
                        $is_valid =false;

                    break;
                }

                case 'call_validation':
                {
                    if ($leader_user ["User"] ["phone_confirmed"]!=1 || $expert_user ["User"] ["phone_confirmed"]!=1)
                        $is_valid=  false;

                    break;
                }

                case 'Linkid':
                {

                    if (($leader_user["User"]['linkid_confirmed']!='1')
                        || ($expert_user["User"]['linkid_confirmed']!='1')
                    )
                    {
                        $is_valid = false;
                    }
                    break;
                }
           }
        }

		
		if ( $is_valid) {
			// Show DEfault Popup
			$this->HTML = "
   				 			<h3>  Add to Team</h3><div class='popup_invite_content'>
   				 		 
									<table style='margin: 0 auto;'>
										<tr>
											<td style='text-align: right; padding-right: 10px;'>{$leader_user["User"]["username"]} validations</td>
											<td>" . $this->getVerifyHTML ( $leader ) . "</td>
										</tr>
										<tr>
											<td style='text-align: right; padding-right: 10px;'>{$expert_user["User"]["username"]} validations</td>
											<td>" . $this->getVerifyHTML ( $expert ) . "</td>
										</tr>
									</table>
   				 			 		<div>  <div class='popup_invite_content_left'> </div>     </div>
   				 					<div><div class='popup_invite_content_left'></div>     </div>
													  <p> You have both passed minimum validations
																Please continue to Terms definitions  </p>  
   				 							 		 	   <a  href='javascript:void(0)'  class='continue_team'>   Define Terms </a> 
														   <div class='clear'></div>
														   </div>
	   				 			 ";
		} else {
			$this->HTML = "
   				 	<div class='popup_invite_heading'><h3>  Add to Team   	<a href='javascript:void(0);' onclick='jQuery(\".popup_invite_deffault\").hide();'> Close  </a>  </h3>
   				
   				 	</div> 
   				 	
   				 	 <div class='popup_invite_content'>
   				 	<div><div class='popup_invite_content_left'> {$leader_user["User"]["username"]} validations</div>   " . $this->getVerifyHTML ( $leader ) . "  </div>
   				 	<div><div class='popup_invite_content_left'> {$expert_user["User"]["username"]} validations</div>   " . $this->getVerifyHTML ( $expert ) . "  </div>
   				 	 	<p>We allow users to sign contracts only after they pass minimum validation.
											Please complete the process and come back soon
												Please Use the following quick links </p>   
						   <a href='" . Router::url ( "/Invitepopup/redirecttocheck/{$work}", true ) . "'><img src='/img/authenticate.png' alt='authenticate'></a>
 						   <a href='" . Router::url ( "/Invitepopup/notifyexpert/{$expert}/{$work}", true ) . "'><img src='/img/authenticate.png' alt='authenticate'><!--  {$expert_user["User"]["username"]}--> </a></div>
   			   		";
		}
		$this->render2 ();
	}
	
	// Reddirect to the
	public function redirecttocheck($workid) {
		$this->Session->write ( "work_back", $workid );
		$this->redirect ( "/users/userinfo_authenticate/" );
	}
	
	// Send Email To Notify
	public function notifyexpert($id, $workid) {
		$expert = $this->User->find ( "first", array (
				"conditions" => array (
						"User.id" => $id 
				) 
		) );
		$leader_user = $this->User->find ( "first", array (
				"conditions" => array (
						"User.id" => $this->Auth->user ( "id" ) 
				) 
		) );
		$job = $this->Job->find ( "first", array (
				"conditions" => array (
						"id" => $workid 
				) 
		) );
		$pro = $this->Project->find ( "first", array (
				"conditions" => array (
						"id" => $job ["Job"] ["project_id"] 
				) 
		) );
		$link = SITE_URL . Router::url ( array (
				"controller" => "Invitepopup",
				"action" => "fromemail",
				$id 
		) );
		$link = str_replace ( "///", "", $link );
		$text = " <p>  In order to proceed in teaming-up for   {$job["Job"]["title"]} @ {$pro["Project"]["title"]}   you should complete your authentication process   </p> 
 			 			<p>  <A href='{$link}'>   Authenticate yourself   </a>     </p>   
   			
   		";
		$email = new CakeEmail ( 'gmail' );
		$email->template ( 'default', "default" );
		$email->emailFormat ( 'html' );
		$email->from ( $leader_user ["User"] ["email"] );
		$email->to ( $expert ["User"] ["email"] );
		$email->subject ( " Teaming-up for   {$job["Job"]["title"]} @ {$pro["Project"]["title"]}  " );
		if ($email->send ( $text )) {
			// insert into DataBase So user Will Login :
			$this->User->query ( "INSERT INTO  send_auth_request  SET expert_id='{$this->Auth->user("id")}' ,  user_id='{$id}'  " );
			$this->Session->setFlash ( __ ( 'Email Sent .' ), 'default', array (
					"class" => "success" 
			) );
			
			$this->redirect ( "/jobs/job_detail/" . $workid );
		}
	}
	public function fromemail($user_id) {
		$user = $this->User->find ( "first", array (
				"conditions" => array (
						"User.id" => $user_id 
				) 
		) );
		$text = " User  {$user["User"]["username"]}  Has recived Your   authenticate request ";
		$experts = $this->User->query ( "SELECT  *  FROM  send_auth_request WHERE user_id = '{$user_id}'  " );
		foreach ( $experts as $ex ) {
			$expert = $this->User->find ( "first", array (
					"conditions" => array (
							"User.id" => $ex ["send_auth_request"] ["expert_id"] 
					) 
			) );
			$email = new CakeEmail ( 'gmail' );
			$email->template ( 'default', "default" );
			$email->emailFormat ( 'html' );
			$email->from ( $user ["User"] ["email"] );
			$email->to ( $expert ["User"] ["email"] );
			$email->subject ( "  Expert  {$user["User"]["username"]}  has accept you Authenticate request.  " );
			$email->send ( "  Expert  {$user["User"]["username"]}  has accept you Authenticate request.  " );
			
			$this->User->query ( "DELETE FROM  send_auth_request WHERE id = ' {$ex["send_auth_request"]["id"]}'   " );
		}
		
		if ($this->Auth->user ( "id" ) == "")
			$this->Session->write ( "afterlogin", "/users/userinfo_authenticate/" );
		$this->redirect ( "/users/userinfo_authenticate/" );
	} 
	
	
	
	private function render2() {
		echo "<div class='popup_invite_deffault popup' >  
   				 		{$this->HTML}
   			 	</div>
   				";
   				 		exit;  
	}
}