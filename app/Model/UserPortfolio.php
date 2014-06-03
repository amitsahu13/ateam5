<?php
/**
 * UserPortfolio
 *
 * PHP version 5
 *
 * @UserPortfolio Model
 *
 */
class UserPortfolio extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'UserPortfolio';
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
		'overview_detail'	=>	array(
			'title'=>array(
				'notEmpty'	=>	array(
					'rule'	=>	'notEmpty',
					'message'	=>	'Title is required.'
					)
					),
				
				
			
			'category_id'=>array(
				'notEmpty'	=>	array(
					'rule'	=>	'notEmpty',
					'message'	=>	'Category is required.'
					)
					),
		
		
					),
					);
}