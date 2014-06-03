<?php
/**
 * Page
 *
 * PHP version 5
 *
 * @Region Model
 *
 */
class Region extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'Region';

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
								'message' 	=>	'Region is required'
								),
								'isUnique' => array(
									'rule' 		=> 'isUnique',
									'message' 	=>	'Region is already exist.'
									)
							)
					)
				);

	public function getResionListForUserRegistraion()
	{
		$data = $this->find('list',array('conditions'=>array('Region.status'=>Configure::read('App.Status.active'))));
		return $data;
	}

}