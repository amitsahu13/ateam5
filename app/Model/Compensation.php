<?php
/**
* Page
*
* PHP version 5
*
* @Compensation Model
*
*/
class Compensation extends AppModel{
	/**
	* Model name
	*
	* @public  string
	* @access public
	*/
	public  $name = 'Compensation';

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

	function get_compensation_list(){
		$compensations = $this->find('list',array('conditions'=>array('Compensation.status'=>Configure::read('App.Status.active'))));
		return $compensations;
	}
	
	function get_compensation_front(){
		$compensations = $this->find('all',array('conditions'=>array('Compensation.status'=>Configure::read('App.Status.active'))));
		return $compensations;
	}
}