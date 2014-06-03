<?php
/**
 * Page
 *
 * PHP version 5
 *
 * @WorkingStatus Model
 *
 */
class WorkingStatus extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'WorkingStatus';

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

	public function getWorkingStatus(){
		$working_status = $this->find('list',array('conditions'=>array('WorkingStatus.status'=>Configure::read('App.Status.active'))));
		return $working_status;
	}
	
	public function getAllWorkingStatus(){
		$working_status = $this->find('all',array('conditions'=>array('WorkingStatus.status'=>Configure::read('App.Status.active'))));
		return $working_status;
	}

}