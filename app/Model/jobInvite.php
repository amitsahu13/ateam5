<?php
App::uses ( 'CakeEmail', 'Network/Email' );

/*
 * JobInvite Simple Model  
 * pashkovdenis@gmail.com 
 * 2014   
 * 
 * 
 */

class jobInvite extends AppModel {
 
	public $name = 'jobInvite';
	public $useTable = 'job_invite'; 

	
	
	/*
	 * Send invite to user :   
	 * pashkovdenis@gmail.com  
	 * 2014  
	 * 
	 */

	public function sendInvite($from , $to ,  $job_id ,  $project){ 
		 if (empty($job_id) ||  empty($project) || $job_id=="N/A")
			return  false ;
		 
		 
		 
		App::import("model","SystemInbox") ; 
		App::import("model","Project") ; 
		App::import("model","Job")  ;  
		App::import("model","Workroom") ;

		$project_model   =new Project() ;  
		$job_model  = new Job()  ;  
		$project =  $project_model->find("first" ,  array("conditions"=>array("id"=>$project)))  ;  
		$job =    $job_model->find("first" , array("conditions"=>array("id"=>$job_id))) ; 
		$text =  INVITE_TO_USER_JOB ; 
		//   save All  :
		$this->saveAll([
					"job_id"=>$job_id, 
					"to_user" => $to["User"]["id"]
				]);
		//  Prepare Text
        $text =  str_replace( "{to_user}", $to["User"]["username"], $text)  ;
		$text =  str_replace( " {user}", $from["User"]["username"], $text)  ;


        //  Job Text Project :
        $text =  str_replace( " {project}",$job["Job"]["title"]."@".$project["Project"]["title"] , $text)  ;



        // Permanently create job  Workroom  For THat  user :
        $work = new Workroom ();
        $work->applyJob ( $job["Job"]["project_id"],  $to ["User"]["id"],  $job_id );
        // Server For   
          // Send invites :
        $url = Workroom::getJob($job_id) ;
 		$text =  "<a href='{$url}'>  {$text} </a> " ;
		SystemInbox::insert($to["User"]["id"], $text ) ; 	
		$email = new CakeEmail ( 'gmail' );
		$email->template ( 'default', "default" );
		$email->emailFormat ( 'html' );
		$email->from (  $from["User"]["email"] );
		$email->to ( $to ["User"] ["email"] );
		$email->subject ( "Job Invite" );
		$email->send ( $text ); 
		 
		return true;  
	}
	 
	 
	
	// Decline   Invitation  :  
	// pashkovdenis@gmail.com  
	//  2014   
	public function decline($user, $job_id){ 
		
		App::import("model","SystemInbox") ;
		App::import("model","Project") ;
		App::import("model","Job")  ; 
		App::import("model","User")  ; 
		$project_model   =new Project() ;
		$job_model  = new Job()  ;  
		$user_model =  new User()  ;   
		
		$job =    $job_model->find("first" , array("conditions"=>array("id"=>$job_id))) ; 
		$project =  $project_model->find("first" ,  array("conditions"=>array("id"=>$job["Job"]["project_id"])))  ;
 		$to  =  $user_model->find("first" , array("conditions"=>array("id"=>$job["Job"]["user_id"])));  
 		$from =  $user_model->find("first" , array("conditions"=>array("id"=>$user)));  
 		$text =  INVATION_DECLINED ; 

 		$this->query("DELETE FROM  job_invite WHERE job_id='{$job_id}' AND to_user='{$user}'  "); 
 		$text =    str_replace("{user}", $to["User"]["username"], $text)  ;
 		$text =   str_replace(" {to_user}", $from["User"]["username"], $text)  ;
 		$text =   str_replace(" {project}", $project["Project"]["title"]."@". $job["Job"]["title"], $text)  ;
 		 
 		$text =  "<a href='".SITE_URL."projects/public_view/{$project["Project"]["id"]}'>  {$text} </a> " ;
 		SystemInbox::insert($to["User"]["id"], $text ) ;
 		
 		$email = new CakeEmail ( 'gmail' );
 		$email->template ( 'default', "default" );
 		$email->emailFormat ( 'html' );
 		$email->from (  $from["User"]["email"] );
 		$email->to ( $to ["User"] ["email"] );
 		$email->subject ( "Job Invite Declined" );
 		$email->send ( $text );
		
		return true; 
	}
	
	
	// check if it is invited :  
	public static function isInvited($user , $jb){
		 $self =  new self()  ;
		 $c = $self->find("count" , array("conditions"=>array("job_id"=>$jb, "to_user"=>$user))); 
		 if ($c>0) 
		 	return true ;  
		return false ; 
	}
	
	
	// Get PRojectIds  For  User   
	public static function getProjectIds($user){
		$self =  new self()  ;  
		App::import("model" ,  "Job") ;  
		$job_model  =  new Job() ; 
		$ids = []; 
		$jobs = [] ;  
		
		$list = $self->find("all", array("conditions"=>array("to_user"=>$user))) ; 
		
		foreach($list as $job_id){
			$id  =  $job_model->find("first",  array("conditions"=>array("id"=>$job_id["jobInvite"]["job_id"]))) ;
			$ids[]  =  $id["Job"]["project_id"]; 
		 }
		
		
		return $ids; 
		
	}
	  
	
	//  Return Job Ids 
	public static function getJobsForProject( $project_id, $user){ 
		 $self =  new self()  ; 
		 $result  =  [];   
		 App::import("model" ,  "Job") ;
		 $job_model  =  new Job() ;  
		 $list = $self->find("all", array("conditions"=>array("to_user"=>$user))) ; 
		 
		foreach($list as $job_id){
			$id  =  $job_model->find("first",  array("conditions"=>array("id"=>$job_id["jobInvite"]["job_id"]))) ;
			 if  ($id["Job"]["project_id"]== $project_id){
			 	$result[] = $id ; 
			  }
		 } 
		 
		 
		 
		return $result ;   
	}
	  
	
	 // getInvited  
	 public static function  getInvited($user){
	 	$self =  new self()  ;
	 	$result  =  [];
	 	App::import("model" ,  "Job") ;
	 	$job_model  =  new Job() ;
	 	$list = $self->find("all", array("conditions"=>array("to_user"=>$user))) ;
	 		 //  
	 	foreach($list as $job_id){
	 		$result[] = $job_id["jobInvite"]["job_id"] ;  
	 		
	 	}
	 	
		return $result; 
	}
	 
	
	
}