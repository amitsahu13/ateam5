<?php
/**
 * Feedback
 *
 * PHP version 5
 *
 * @FeedbackType Model
 *
 */
class Feedback extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'Feedback';

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
					),
			'email'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Email is required'
					),
				'email' => array(
					'rule' 		=> 'email',
					'message' 	=>	'Email is not valide'
					)
					)
					,'description'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Description is required'
					)
					)
					)
					);

}