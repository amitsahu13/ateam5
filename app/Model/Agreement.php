<?php
/**
* Page
*
* PHP version 5
*
* @category Model
*
*/
class Agreement extends AppModel{
	/**
	* Model name
	*
	* @public  string
	* @access public
	*/
	public  $name = 'Agreement';

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
	
	public function get_agreement_list()
	{
		$data = $this->find('all',array('conditions'=>array('Agreement.status'=>Configure::read('App.Status.active'))));
		return $data;
	}
}