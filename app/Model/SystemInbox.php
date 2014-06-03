<?php
 
 /*
  * Handle  System inbox  Messages   For   Users   
  * 2013  
  * This  messages  Will  addapt to  users   :   
  */

class SystemInbox extends AppModel {

	public $name = 'SystemInbox';
	public $useTable = 'system_inbox';
	public $actsAs = array (
			'Multivalidatable' 
	);
	 
	
	
 	 // Insert  logs    :  
	public static function   insert($to_user, $text='',  $job_id='', $project_id=''){
		$self  = new self() ;  
		$self->saveAll(array(
				"to_user"=>$to_user, 
				"text"=>$text ,  
				"date"=>strftime ( "%Y-%m-%d %H:%M:%S", time() ) ,  
				"job_id"=>$job_id, 
				"project_id"=>$project_id, 
		 )); 
		 $self->increaselog($to_user); 
	 }
	 
	 
	 
	// Increase Logs  :  
	private function increaselog($user){
	 	$c =   $this->query("SELECT COUNT(*) as c  FROM chat_logs WHERE user_id='{$user}' ");
		if ($c[0][0]["c"] ==0)
			$this->query("INSERT INTO chat_logs SET user_id='{$user}'  ,  count='1'  ") ;
		else
			$this->query("UPDATE chat_logs SET count=count+1 WHERE  user_id='{$user}' ") ;
	}
	
	
	
	
}
 