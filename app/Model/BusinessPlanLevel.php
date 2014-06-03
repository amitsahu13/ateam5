<?php
/**
* Page
*
* PHP version 5
*
* @BusinessPlanLevel Model
*
*/
class BusinessPlanLevel extends AppModel{
	/**
	* Model name
	*
	* @public  string
	* @access public
	*/
	public  $name = 'BusinessPlanLevel';

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
	
	
	function get_business_plan_front(){
		$business_plans = $this->find('all',array('conditions'=>array('BusinessPlanLevel.status'=>Configure::read('App.Status.active'))));
		return $business_plans;
	}

}