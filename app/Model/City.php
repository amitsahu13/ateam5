<?php
/**
 * City
 *
 * PHP version 5
 *
 * @category Model
 *
 */
class City extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'City';

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
        public  $belongsTo	=	array('Country', 'State');

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
			'state_id' =>array(
				'rule' => 'notEmpty',
				'message' => 'State is required'
				),
			'name'=>array(
				'isUnique'	=>	array(
					'rule'	=>	'isUnique',
					'message'	=>	'Name is already exists.'
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

					function getCityList($state_id = null){
						$data	=	$this->find('list', array('conditions' => array(
											'City.state_id' => $state_id,
											'City.status'=>Configure::read('App.Status.active')
						),
											'order' => array('City.name'=>'ASC')
						));
						return $data;
					}
					function getName($id = null){
						$data =  $this->read(null, $id);
						return $data['City']['name'];
					}
}
?>