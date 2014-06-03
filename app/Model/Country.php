<?php
/**
 * Country
 *
 * PHP version 5
 *
 * @category Model
 *
 */
class Country extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'Country';
	/* public $hasMany = array(
	 'State' => array(
	 'className'  => 'State',
	 'conditions' => array('State.status' => '1'),
	 'order'      => 'State.created DESC'
	 )
	 ); */

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
				'isUnique'	=>	array(
					'rule'	=>	'isUnique',
					'message'	=>	'Name already exists.'
					),
				'checkWhiteSpaces'	=> array(
					'rule'	=> 	array('checkWhiteSpace', 'name'),
					'message' =>'Name should not contain white spaces on left and right side of string.'					
					),
				'alpha'	=>	array(
					'rule'	=>	'/^[A-Za-z]/',
					'message'	=>	'Only alphabetical letters allowed.'
					),
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Name is required'
					)
					),
			'region_id'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Region is required'
				)
			),
			'country_flag'	=>	array(
				'extension'	=>	array(
					'rule' =>  array('extension', array('gif', 'jpeg', 'png', 'jpg')),
					'message'     => 'Extension must be gif, jpeg, png, jpg',
					'allowEmpty'=> true				
				),
				'icon_size'	=> array(
					'rule' =>  array('icon_size','country_flag','16','13'),
					'message' => 'Size must be 16*13'		
				)
			),
			'code'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Code is required'
					),
				'isUnique'	=>	array(
					'rule'	=>	'isUnique',
					'message'	=>	'Code already exists.'
					),
				'checkWhiteSpaces'	=> array(
					'rule'	=> 	array('checkWhiteSpace', 'code'),
					'message' =>'Code should not contain white spaces on left and right side of string.'					
					),
				'alpha'	=>	array(
					'rule'	=>	'/^[A-Z]{2}$/',
					'message'	=>	'Only 2 Capital letters.'
					)

					)
					)
					);

					/*
					 * get all country list
					 */
					function getCountryList(){

						$data = $this->find('list', array(
			'conditions' => array('Country.status'=>Configure::read('App.Status.active')),
			'recursive'=>1,
			'joins'=>array(
						array('table' => 'states',
						'alias' => 'State',
						'conditions' => array(
						'State.country_id = Country.id'
						),
						'type'=>'INNER'
						)

						)
						)
						);

						return $data;
					}

					function getCountryListFront(){

						$data = $this->find('list', array(
			'conditions' => array('Country.status'=>Configure::read('App.Status.active'))
						)
						);

						return $data;
					}

					function getCountryListByRegionId($id){
						$data = $this->find('list', array(
			'conditions' => array('Country.region_id'=>$id,'Country.status'=>Configure::read('App.Status.active'))
						)
						);

						return $data;
					}

					/*check unique id */
					function uniqueId($field){
						$this->id = $field;
						return !$this->exists();
					}

					public function get_countries($type,$fields=NULL,$cond=array(),$order='Country.id desc',$limit=999,$offset=0){
						$countries=$this->find($type,array('conditions'=>array('Country.status'=>Configure::read('App.Status.active'),$cond),'fields'=>$fields,'order'=>array($order),'offset'=>$offset,'limit'=>$limit));
						return $countries;
					}

					public function paginateCount($conditions = null, $recursive = 0, $extra = array()) {
						$parameters = compact('conditions');
						$this->recursive = $recursive;
						$count = $this->find('count', array_merge($parameters, $extra));

						if (isset($extra['group'])) {

							$count = $this->getAffectedRows();

						}
						return $count;
					}

					public function paginate($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) {
						if(empty($order)){
							$order = array($extra['passit']['sort'] => $extra['passit']['direction']);
						}
						if(isset($extra['group'])){
							$group = $extra['group'];
						}
						if(isset($extra['joins'])){
							$joins = $extra['joins'];
						}
						return $this->find('all', compact('conditions', 'fields', 'order', 'limit', 'page', 'recursive', 'group', 'joins'));
					}
					
					 public function icon_size($data = array(),$field = NULL,$width=NULL,$height=NULL){
					 //pr($data); die;
						if(!empty($data[$field]['tmp_name']))
						{
						
							$imageSize = @getimagesize($data[$field]['tmp_name']);
							//pr($imageSize);die;
							$actualWidth  = $imageSize[0];
							$actualHeight = $imageSize[1];
							if($actualWidth >$width || $actualHeight >$height)
							{
								return false;
							}
						}
						return true;
					}
					


}