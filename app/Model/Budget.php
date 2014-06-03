<?php
/**
 * Page
 *
 * PHP version 5
 *
 * @Budget Model
 *
 */
class Budget extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'Budget';

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

					function get_budget_list(){
						$budgets = $this->find('list',array('conditions'=>array('Budget.status'=>Configure::read('App.Status.active'))));
						return $budgets;
					}

}