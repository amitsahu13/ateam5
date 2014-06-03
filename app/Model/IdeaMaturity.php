<?php
/**
 * Page
 *
 * PHP version 5
 *
 * @IdeaMaturity Model
 *
 */
class IdeaMaturity extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'IdeaMaturity';

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

}