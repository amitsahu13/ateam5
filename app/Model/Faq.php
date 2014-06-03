<?php
/**
 * Page
 *
 * PHP version 5
 *
 * @category Model
 *
 */
class Faq extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'Faq';

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
			'question'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Question is required'
					)
					),
			'answer'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Answer is required'
					)
					),
			'order'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Order is required'
					),
				'numeric'	=> array(
					'rule'	=> 	array('numeric'),
					'message' =>'Order should numric only.'					
					),
				'maxLength'=>array(
					'rule'	=> 	array('maxLength',10),
					'message' =>'Order should be 10 digit long.'	
					)
					,
				'noNegative' => array(
					'rule' => array('comparison', '>', 0),
					'message' => 'Order number must be positive.'
					)

					)
					)
					);

}