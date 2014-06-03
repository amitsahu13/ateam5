<?php
/**
 * Page
 *
 * PHP version 5
 *
 * @JobFor Model
 *
 */
class Duration extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'Duration';

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
					function get_duration_list(){
						$durations = $this->find('list',array('Duration.status'=>Configure::read('App.Status.active'),'order'=>array('Duration.id'=>'ASC')));
						return $durations;
					}
}