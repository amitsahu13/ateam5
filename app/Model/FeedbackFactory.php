<?php
/*
 * FeedBack Factory :  
 * 2013   
 * Model Provides Feedback Functionality :  
 
 * 
 */
App::uses ( 'CakeEmail', 'Network/Email' );
 class FeedbackFactory  extends AppModel { 
	
	var $useTable  = false; 
	var $jobModel  = null ;
	var $userModel  = null ; 
	var $prokectModel = null  ;  
	var $table_name  = "feedback_requests"; 
	var $email  ;  
	 
	public function __construct(){ 
		App::import("model" ,"User")  ; 
		App::import("model" ,  "Job")  ;  
		App::import("model",  "Project") ; 
		$this->jobModel = new Job();  
		$this->userModel = new User();  
		$this->prokectModel=  new Project() ;  
	    $this->email= new CakeEmail ( 'gmail' );
	    $this->email->template ( 'default', "default" );
	    $this->email->emailFormat ( 'html' );  }
	 
	    
  	// insert and Send REuest  to the users :  
	public static function  addRequest($user_id  ,  $to_user ,      $job_id ,$title='' ){
		$self =  new self();
        App::import("model","SystemInbox")  ;
        $job = $self->jobModel->find("first" , array("conditions"=>array("id"=>$job_id)));
		$project  =    $self->prokectModel->find("first",  array("conditions"=>array("id"=>$job["Job"]["project_id"])));

		$user_to =      $self->userModel->find("first" ,  array("conditions"=>array("id"=> $to_user)));  
		$user_from  =   $self->userModel->find("first" ,  array("conditions"=>array("id"=> $user_id)));

		$text = str_replace("{from}", $user_to["User"]["username"], $title) ; 
		$text = str_replace("{user}", $user_from["User"]["username"], $text) ; 
		$text = str_replace("{project}", $job["Job"]["title"]."@".$project["Project"]["title"]  , $text) ;
		$url  = SITE_URL. "/users/user_public_view/". $user_id."?feedback=1";
		$title =  $job["Job"]["title"]."@".$project["Project"]["title"] ; 
		$self->query("INSERT INTO  {$self->table_name}  SET from_user='{$user_id}'  ,  to_user='{$to_user}' , title='{$title}' , job_id = '{$job_id}' ") ;
        // insert into  System inbox :
        $text.= "<a href='{$url}'>  Leave Feedback </a>   ";
 		$self->email->from($user_from["User"]["email"]) ;
		$self->email->to($user_to["User"]["email"])  ;  
		$self->email->subject("Please leave feedback ") ;
		$self->email->send($text) ;
        SystemInbox::insert($to_user, $text ,$job_id )  ;

 }
	
	// Check if  we need to  leave feedback for  that user   :   
	public static function needPopup($user_id){
		$self =  new self() ; 
		$c =  $self->query("SELECT COUNT(*) as c FROM  feedback_requests WHERE from_user = '{$user_id}'  ") ; 
		if ($c[0][0]["c"] > 0) 
			return true ;  	
		 	return false ;  
	}
	 
	 
	public static   function  getList($user_id){
		 $self =  new self() ;  
	  	 $data =  array();  
		 $list =  $self->query("SELECT title, job_id FROM  feedback_requests WHERE from_user = '{$user_id}'  "); 
		  foreach($list as $l) 
		 	$data[$l["feedback_requests"]["job_id"]] =   $l["feedback_requests"]["title"] ; 
		  return $data ; 
	}
	


     /*
      * Create Feed From  Current User Feed  :
      * Team4Dream Project :
      * 2014
      */

	public static function checkFeedback($user_id){ 
    	  App::import("model","SystemInbox") ;
		 $self  = new self() ;
	  	 $feeed   =  $self->query("SELECT * FROM feedback_requests  WHERE job_id = '{$_POST["job_id"]}' AND  from_user = '{$user_id}'  ") ;
		 $tech_skill = count($_POST["skill"]);
		 $com_skill = count($_POST["coom"]);
		 $creat_skill = count($_POST["crea"]);
		 $time_skill = count($_POST["time"]);
		 $comment  = mysql_escape_string( $_POST["comment"]) ;
		 $req  =  $feeed[0]["feedback_requests"] ;
 		 $text =  LEAVE_FEEDBACK_SEND ;
  		 $to_user  = $self->userModel->find("first" , array("conditions"=>array("id"=> $req["to_user"]  )));
		 $from  =   $self->userModel->find("first" , array("conditions"=>array("id"=> $user_id ))); 
		 $job  = $self->jobModel->find("first" , array("conditions"=>array("id"=> $_POST["job_id"]  ))); 
		 $text =  str_replace("{user}",  $to_user["User"]["username"], $text)  ; 
		 $text =  str_replace("{job}",  $job["Job"]["title"], $text)  ;
		 if  ($user_id ==  $job["Job"]["user_id"])
		 $self->query("INSERT INTO user_feedbacks SET receiver_id = '{$req["to_user"]}'  , leader='1' ,  sender_id='{$user_id}', job_id='{$_POST["job_id"]}' ,  tech_skill='{$tech_skill}' , com_skill = '{$com_skill}' , creat_skill = '{$creat_skill}' , time_skill = '{$time_skill}' ,  comment= '{$comment}'      ");
         else 
      	 $self->query("INSERT INTO user_feedbacks SET receiver_id = '{$req["to_user"]}'  , sender_id='{$user_id}', job_id='{$_POST["job_id"]}' ,  tech_skill='{$tech_skill}' , com_skill = '{$com_skill}' , creat_skill = '{$creat_skill}' , time_skill = '{$time_skill}' ,  comment= '{$comment}'      ");
   	     $last =   $self->query("SELECT id FROM  user_feedbacks ORDER BY  id  DESC LIMIT 1 ") ;
		 $feedback   =   $self->generateHTML( $last[0]["user_feedbacks"]["id"]) ; 
		 $text.= $feedback; 
		 $self->query("DELETE FROM  feedback_requests WHERE id ='{$req["id"]}'  ") ; 
		 $self->email->from($from["User"]["email"]) ;
		 $self->email->to($to_user["User"]["email"])  ;
		 $self->email->subject("New feedback") ;
		 $self->email->send($text) ;
  		// SystemInbox::insert($req["to_user"] , $text, $_POST["job_id"]) ;



	}
	 
	
	
	
	
	
	 // Generate  Single Line   Feedback  :   
	 private function generateHTML($id){
		$str = "<div >  "; 
		$feed  = $this->query("SELECT * FROM  user_feedbacks WHERE id = '{$id}' "  ) ; 
		 
			$feed_back  = $feed[0]["user_feedbacks"];  
			
			$str.="<p> Technical Skills :{$feed_back["tech_skill"]}   </p> " ; 
			$str.="<p> Communication :   {$feed_back["com_skill"]} </p> " ;
			$str.="<p> Creativity  :     {$feed_back["creat_skill"]} </p> " ;
			$str.="<p> Timeline :        {$feed_back["time_skill"]} </p> " ;
			$str.="<p> Comment :         {$feed_back["comment"]}</p> " ; 
		 
		 $str.= "</div> "; 
		return $str;  
	 }
	
	
	 //  Get List Of Feedback for  current User  
	 public function getFedback($user ,  $leader = false ){
	 	$data =  array(); 
	 	
	 	
	 	
	 	return $data ; 
	 }
	 
	 
	 
	 
	 
}
 