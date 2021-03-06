<?php
/**
 * Page
 *
 * PHP version 5
 *
 * @ProjectMilestone Model
 *
 */
class ProjectMilestone extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'ProjectMilestone';

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
		'add_project_milestone'	=>	array(		
			'title'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Field is required.'
					)
					),'description'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Field is required.'
					)
					),'date'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Field is required.'
					)
			)
		)
	);

}