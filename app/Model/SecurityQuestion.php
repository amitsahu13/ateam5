<?php
/**
 * Page
 *
 * PHP version 5
 *
 * @SecurityQuestion Model
 *
 */
class SecurityQuestion extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'SecurityQuestion';

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

					public function getSequrityQuestionListForUserRegistraion()
					{
						$data = $this->find('list',array('conditions'=>array('SecurityQuestion.status'=>Configure::read('App.Status.active'))));
						return $data;
					}

}