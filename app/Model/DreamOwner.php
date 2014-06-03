<?php
/**
 * Page
 *
 * PHP version 5
 *
 * @DreamOwner Model
 *
 */
class DreamOwner extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'DreamOwner';

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
			'add_dream_owner_valid'	=>	array(		
					'name'=>array(
							'notEmpty' => array(
							'rule' 		=> 'notEmpty',
							'message' 	=>	'Field is required.'
							)/* ,
							'check_unique'	=>	array(
								'rule'	=>	'isUnique',
								'message'	=>	'UserName already exists.'
							) */
					),
					'ownership_percentage'=>array(
							'notEmpty' => array(
								'rule' 		=> 'notEmpty',
								'message' 	=>	'Field is required.'
							),
							'numeric' => array(
								'rule' 		=> 'numeric',
								'message' 	=>	'Numeric values is required.'
							),
							'number' => array(
								'rule' => array('range', -1, 101),
								'message' 	=>	'Values must be 0 to 100.'
							)
					),							
					'job_direction_id'=>array(
						'notEmpty' => array(
								'rule' 		=> 'notEmpty',
								'message' 	=>	'Field is required.'
							)
					),							
					'dilution_id'=>array(
						'notEmpty' => array(
								'rule' 		=> 'notEmpty',
								'message' 	=>	'Field is required.'
							)
					)
			)
	);
	/* public function isUnique(){
		pr($this->data);
		die;
	
	}
	public function check_unique($data = array(), $field = null)
	{
		 
		$record = $this->find('all',array('conditions'=>array('DreamOwner.project_id'=>$this->data['DreamOwner']['project_id'],'DreamOwner.name'=>$this->data['DreamOwner']['name'],'DreamOwner.id'=>$this->data['DreamOwner']['id'])));
		
		
		if(!empty($record))
		{
			return true;
		}
		else
		{
			return false;
		}
		return true;
	}
	 */
}