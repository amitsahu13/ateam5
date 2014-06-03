<?php
/**
 * State
 *
 * PHP version 5
 *
 * @category Model
 *
 */
class State extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'State';
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
         * Model associations: belongsTo
         *
         * @public  array
         * @access public
         */
        public  $belongsTo	=	array('Country');

        /**
         * Custom validation rulesets
         *
         * @public  array
         * @access public
         */
        public  $validationSets = array(
		'admin'	=>	array(
			'country_id' =>array(
				'rule' => 'notEmpty',
				'message' => 'Country is required'
				),
			'name'=>array(
				'isUnique'	=>	array(
					'rule'	=>	'isUnique',
					'message'	=>	'Name already exists.'
					),
				'checkAlphaNumericDashUnderscore'	=> array(
					'rule'	=> 	array('checkAlphaNumericDashUnderscore', 'name'),
					'message' =>'Name should contain only letters, numbers, dashes and spaces.'
				 ),
				'checkWhiteSpaces'	=> array(
					'rule'	=> 	array('checkWhiteSpace', 'name'),
					'message' =>'Name should not contain white spaces on left and right side of string.'
					),
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Name is required'
					)
					)
					)
					);

					/*
					 * get state list according to country id
					 * @param country id
					 * @return state list
					 */
					public function getStateList($country_id = null){
						$data	=	$this->find('list', array('conditions' => array(
											'State.country_id' => $country_id, 
											'State.status'=>Configure::read('App.Status.active')
						),
											'order' => array('State.name'=>'ASC')
						)
						);
						return $data;
					}

					public function getStateListFront($country_id = null){
						$data	=	$this->find('list', array('conditions' => array(
											'State.status'=>Configure::read('App.Status.active')
						),
											'order' => array('State.name'=>'ASC')
						)
						);
						return $data;
					}


					function getCountryList(){
						$data = $this->Country->find('list', array(
					'conditions' => array('Country.status'=>Configure::read('App.Status.active'))
						));
						return $data;
					}
}