<?php
/**
 * Page
 *
 * PHP version 5
 *
 * @JobFor Model
 *
 */
class JobFor extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'JobFor';

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
					function get_job_fors_list(){
						$projects = $this->find('list',array('JobFor.status'=>Configure::read('App.Status.active')));
						return $projects;
					}
}