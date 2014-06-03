<?php
/**
* Page
*
* PHP version 5
*
* @Compensation Model
*
*/
class JobBid extends AppModel{
	/**
	* Model name
	*
	* @public  string
	* @access public
	*/
	public  $name = 'JobBid'; 

	
	public static $STAUS_LIST = array(
			
			1 => "Posted Job Ad", 
			2 => "Job in progress" , 
			3 => "Job in Progress" ,
			4 => "Applied Job Ad" , 
			5 => "Job Completed."
 	); 
	

	/**
	* Behaviors used by the Model
	*
	* @public  array
	* @access public
	*/
	public  $actsAs = array(
	'Multivalidatable'
	);


	/**
		* Custom validation rulesets
		*
		* @public  array
		* @access public
		*/ 
	
	
	
	public  $validationSets = array(
		'admin'	=>	array(		
			'proposal'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'proposal is required'
				)
			),
			'availability'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'availability is required'
				)
			),
			'duration'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'duration is required'
				)
			),
		 
			 
		  
		)
	);
	
	
	// get Job   Status 
	public static function getStatus($id ,$user_id = 1 ){
		$model  = new self() ;  
		App::import("model", "Workroom")  ; 
		
		if (Workroom::isJobClosed($id, $user_id)) 
		  return  Workroom::isJobClosed($id, $user_id) ; 
		
		
		if ($id){
			$stus = 0 ;  
			$dat=  $model->find("all",array("conditions"=>array("job_id"=>$id)));  
			 foreach($dat as $re){
			 	 if ($re["JobBid"]["status"]> $stus  && $stus !=2 ) 
			 	 	$stus = $re["JobBid"]["status"];  
			   } 
			       
			 	$team=  $model->query("SELECT COUNT(*) as c FROM teamup_jobs WHERE job_id='{$id}' ") ; 
			    if ($team[0][0]["c"]>0) 
			    	return 3 ; 
			     return $stus ; 
		} 
		
	
		return 0 ;  
	}
	
	
	
	

	function get_compensation_list(){
		$compensations = $this->find('list',array('conditions'=>array('Compensation.status'=>Configure::read('App.Status.active'))));
		return $compensations;
	}
	
	function get_compensation_front(){
		$compensations = $this->find('all',array('conditions'=>array('Compensation.status'=>Configure::read('App.Status.active'))));
		return $compensations;
	}
	
	
	
	
	
	
	/*
	 * Static method    
	 * 2014  
	 * pashkovdenis@gmail.com  
	 * 
	 */
	 
	
	public static function  getAdditional($id){ 
		    $self = new self();   
		    App::import("model","Duration"); 
		    $dur  = new Duration() ;   
		    $row =    $self->find("first",["conditions"=>["JobBid.id"=>$id]]);  
		    
		$data =  [
			"dur"=>  ( $row["JobBid"]["duration"]), 
			"av"=>  $row["JobBid"]["availability"], 
			"ex"=> $row["JobBid"]["experience"],   
			"cash"=> $row["JobBid"]["cash_value"], 
			"future"=>$row["JobBid"]["future_value"] 
		];
		
		
		
		
		return $data ;   
		
		
	}
	
	
	
	//  get an id of  job  :   
	public static function getJobBidId($user_id  ,  $job_id){
		$self =   new self();   
		$lont   =  $self->find("first",   ["conditions"=>["job_id"=>$job_id,"user_id"=>$user_id]] );  
		return  $lont["JobBid"]["id"];  
		
	}
	
	
	
	
	
	
	
	
	
}