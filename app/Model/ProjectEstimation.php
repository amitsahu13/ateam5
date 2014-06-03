<?php
/**
 * Page
 *
 * PHP version 5
 *
 * @ProjectEstimation Model
 *
 */
class ProjectEstimation extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'ProjectEstimation';

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
		'add_project_estimation'=>	array(		
					'timeline'=>array(
						'notEmpty' => array(
						'rule' 		=> 'notEmpty',
						'message' 	=> 'Field is required.'
						)
					)
				)
				);

}