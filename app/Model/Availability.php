<?php
/**
 * Page
 *
 * PHP version 5
 *
 * @ProjectManagerAvailability Model
 *
 */
class Availability extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'Availability';

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



		public function get_project_manager_availability(){
			$availabilities = $this->find('list',array('conditions'=>array('Availability.status'=>Configure::read('App.Status.active'))));
			return $availabilities;
		}
		
		public function get_availability_front(){
			$availabilities = $this->find('all',array('conditions'=>array('Availability.status'=>Configure::read('App.Status.active'))));
			return $availabilities;
		}

}