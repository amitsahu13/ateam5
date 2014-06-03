<?php
/**
 * Page
 *
 * PHP version 5
 *
 * @Skill Model
 *
 */
class Skill extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'Skill';

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
			'name'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Name is required'
				)
			)
		)
					
	);
	
	public function get_skills($type,$fields='*',$cond=array(),$order='Skill.id desc',$limit=999,$offset=0){
		$skills=$this->find($type,array('conditions'=>array('Skill.status'=>Configure::read('App.Status.active'),$cond),'fields'=>array($fields),'order'=>array($order),'offset'=>$offset,'limit'=>$limit));

		return $skills;
	}
	
	
	/*
	 *Statik Methods  Starts here  :
	 *pashkovdenis@gmail.com
	 *2014  
	 *
	 **/
	
	
	// retriave skills for a single  user   
	public static function getUserSkills($user_id  ){
		  $self = new self() ;
		   $string =  "";  
		  
		 $skills =  $self->query("SELECT DISTINCT skill_id FROM skills_users WHERE user_id ='{$user_id}' "); 
		foreach ($skills as $s){
			$s  = $self->find("first", array("conditions"=>array("id"=>$s["skills_users"]["skill_id"])));
			$string .=  ",".$s["Skill"]["name"];
			
		}
		
		
		$string =  ltrim($string, ",");
		if ($string!="")
		$string = ",".  $string ;
		return $string  ;   
	}
	
	
	
	
	
}