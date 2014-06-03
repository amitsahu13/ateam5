<?php
/**
* Category
*
* PHP version 5
*
* @category Model
*
*/
class Category extends AppModel{
	/**
	* Model name
	*
	* @public  string
	* @access public
	*/
	public  $name = 'Category';

	/**
	* Behaviors used by the Model
	*
	* @public  array
	* @access public
	*/
	public  $actsAs = array(
	'Multivalidatable','Tree'
	);

	public  $belongsTo = array(
		'Parent'=>array(
			'className'=>'Category',
				'foreignKey'=>'parent_id',
				'fields'=>array('name')
		)
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
	'message'	=>	'Name is already exists.'
	),
	'checkWhiteSpaces'	=> array(
	'rule'	=> 	array('checkWhiteSpace', 'name'),
	'message' =>'Name should not contain white spaces on left and right side of string.'					
	),
	'notEmpty' => array(
	'rule' 		=> 'notEmpty',
	'message' 	=>	'Name is required'
	),
	'isUnique' => array(
	'rule' 		=> array('checkAlreadyExist', 'name'),
	'message' 	=>	'Category is already exist.'
	)
	),
	'type_for'=>array(
	'notEmpty' => array(
	'rule' 		=> 'notEmpty',
	'message' 	=>	'Category For is required'
	)
	)
	)
	);
	/*
					* get all category list
					*/
	function parentsList(){
		$data = $this->find('list', array(
		'conditions' => array('Category.status'=>Configure::read('App.Status.active')),
		'conditions'=>array('parent_id'=>0,'type_for'=>Configure::read('App.Category.Project')),
		'order'=>array('Category.name ASC')
		));
		return $data;
	}

	function groupList(){
		$data = $this->find('list', array(
		"fields" => array("Category.id", "Category.name", "Parent.name"),
		"joins" => array(
		array(
		"table" => "categories",
		"alias" => "Parent",
		"type" => "INNER",
		"conditions" => array("Parent.id = Category.parent_id")
		)
		),
		"order" => array('Category.id ASC') // whatever ordering you want
		));

		return $data;
	}

	function get_category_list(){
		$categories = $this->find('list',array('conditions'=>array('Category.status'=>Configure::read('App.Status.active'))));
		return $categories;
	}

	public function get_categories($type,$fields='*',$cond=array(),$order='Category.id desc',$limit=999,$offset=0){
		$categories=$this->find($type,array('conditions'=>array('Category.status'=>Configure::read('App.Status.active'),$cond),'fields'=>array($fields),'order'=>array($order),'offset'=>$offset,'limit'=>$limit));

		return $categories;
	}

	public function getCategory($id,$type){

		$data = $this->find($type, array(
		'conditions' => array('Category.status'=>Configure::read('App.Status.active'),'id'=>$id),
		'order'=>array('Category.name ASC'),
		'fields'=>array('parent_id')
		
		));
		return $data;
	}

	public function getSubCategory($id,$type){

		$data = $this->find($type, array(
		'conditions' => array('Category.status'=>Configure::read('App.Status.active'),'Category.parent_id'=>$id),
		'order'=>array('Category.name ASC'),
		'fields'=>array('parent_id')
		
		));
		return $data;
	}

	public function displayCategoryTree($pid,$level)
	{
		global $res;

		$blank = "";

		/* for($i=0; $i< $level; $i++)
						$blank   .=  "__"; */

		$parents = $this->find('list' , array('conditions' => array('Category.parent_id' => $pid,'Category.status'=>Configure::read('App.Status.active'))));

		/* if(!empty($parents))
						$level++;

						foreach($parents as $value)
						{
						$res[$value['Category']['id']]	= $blank.$value['Category']['name'];
						$this->displayCategoryTree($value['Category']['id'],$level);
						} */

		return $parents;
		//return $res;
	}

	public function displayOnlyCategoryFront(){
		$mainCat = $this->find('list',array('conditions'=>array('Category.parent_id'=>0,'Category.status'=>Configure::read('App.Status.active'))));
		$mainReturnArray = array();
		foreach($mainCat as $k=>$v){
			$subCat = array();
			$subCat = $this->find('list',array('conditions'=>array('Category.parent_id'=>$k)));
			
			
			$mainReturnArray[$k][$v]  = $subCat;
		}
		return $mainReturnArray;
	}

	public function displayCategoryTreeFront($pid,$level,$conditions)
	{
		global $res;

		$blank = "";	$class='';

		for($i=0; $i< $level; $i++)
		$blank   .=  "__";

		$parents = $this->find('all' , array('conditions' => array('Category.parent_id' => $pid,'Category.status'=>Configure::read('App.Status.active'),$conditions)));
		if($pid==0){
			$class="parent_cat";
		}else
		{
			$class="child_cat";
		}

		if(!empty($parents))
		$level++;
		$id='';
		foreach($parents as $value)
		{
			if($value['Category']['parent_id']==0){
				$id=$value['Category']['id'];
			}else{
				$id=$value['Category']['parent_id'];
			}
			//$res[$value['Category']['id']]	= $blank.'<span class="'.$class.'" id="'.$class.''.$id.'">'.$value['Category']['name'].'</span>';
			$res[$value['Category']['id']]	= $blank.$value['Category']['name'];
			$this->displayCategoryTreeFront($value['Category']['id'],$level,$conditions);
		}

		return $res;
	}

	public function checkAlreadyExist()
	{
		$data = array();
		$data = $this->find('first',array('conditions'=>array('Category.name'=>$this->data['Category']['name'],'Category.type_for'=>$this->data['Category']['type_for'],)));
		if(empty($data))
		{

			return true;
		}
		else
		{
			return false;
		}
	}


	public function get_project_job_child_category_lists($parent_id,$type_for)
	{
		$child_categories = $this->find('list',array('conditions'=>array('Category.parent_id'=>$parent_id,'Category.type_for'=>$type_for,'status'=>Configure::read('App.Status.active'))));
		return $child_categories;
	}


	public function get_job_skills($cat=0)
	{
		$job_skills =array();
		$this->Behaviors->attach('Containable');
		$this->bindModel(array('hasMany'=>array('Skill'=>array('conditions'=>array('status'=>Configure::read('App.Status.active')),'fields'=>array('id','name'),'order'=>array('name'=>'Asc')))),false);
		$this->contain('Skill');
		$data =  $this->find('all',array('conditions'=>array('Category.parent_id'=>0,'Category.type_for'=>JOB_TYPE,'Category.status'=>Configure::read('App.Status.active')),'fields'=>array('Category.name','Category.type_for')));

		if ($cat!=0) 
		$data =  $this->find('all',array('conditions'=>array('Category.parent_id'=>0,  'Category.id'=>$cat,   'Category.type_for'=>JOB_TYPE,'Category.status'=>Configure::read('App.Status.active')),'fields'=>array('Category.name','Category.type_for')));
		 
		
		if(!empty($data))
		{
			foreach($data as $skill_key=>$skill_val)
			{
				if(!empty($skill_val['Skill']))
				{
					foreach($skill_val['Skill'] as $k=>$v)
					{
						$job_skills[$v['id']] = $v['name'];
					}
				}
			}
		}

		return 	$job_skills;

	}
	
	public function get_project_skills()
	{
		$job_skills =array();
		$this->Behaviors->attach('Containable');
		$this->bindModel(array('hasMany'=>array('Skill'=>array('conditions'=>array('status'=>Configure::read('App.Status.active')),'fields'=>array('id','name'),'order'=>array('name'=>'Asc')))),false);
		$this->contain('Skill');
		$data =  $this->find('all',array('conditions'=>array('Category.parent_id'=>0,'Category.type_for'=>PROJECT_TYPE,'Category.status'=>Configure::read('App.Status.active')),'fields'=>array('Category.name','Category.type_for')));

		if(!empty($data))
		{
			foreach($data as $skill_key=>$skill_val)
			{
				if(!empty($skill_val['Skill']))
				{
					foreach($skill_val['Skill'] as $k=>$v)
					{
						$job_skills[$v['id']] = $v['name'];
					}
				}
			}
		}

		return 	$job_skills;

	}


	public function get_project_job_parent_category_lists($type_for)
	{
		$child_categories = $this->find('list',array('conditions'=>array('Category.parent_id'=>0,'Category.type_for'=>$type_for,'status'=>Configure::read('App.Status.active'))));
		return $child_categories;
	}

	
	public function get_combination_project_job_parent_category_lists2()
	{
		/*  $this->Behaviors->attach('Containable'); */
		$categories = $this->find('all',array('conditions'=>array('Category.status'=>Configure::read('App.Status.active'),'Category.parent_id'=>0),'fields'=>array('Category.id','Category.parent_id','Category.type_for','Category.name'),'order'=>'Category.name'));
		$return = array();
		if(!empty($categories))
		{
	
			foreach($categories as $key=>$value)
			{
				if($value['Category']['type_for'] == Configure::read('App.Category.Project'))
				{
					$return['Project Categories'][$value['Category']['id']] = $value['Category']['name'];
				}
				 
			}
		}
		return $return;
	}
	
	public function get_combination_project_job_parent_category_lists()
	{
		/*  $this->Behaviors->attach('Containable'); */
		$categories = $this->find('all',array('conditions'=>array('Category.status'=>Configure::read('App.Status.active'),'Category.parent_id'=>0),'fields'=>array('Category.id','Category.parent_id','Category.type_for','Category.name'),'order'=>'Category.name'));
		$return = array();
		if(!empty($categories))
		{

			foreach($categories as $key=>$value)
			{
				if($value['Category']['type_for'] == Configure::read('App.Category.Project'))
				{
					$return['Project Categories'][$value['Category']['id']] = $value['Category']['name'];
				}
				else
				{
					$return['Job Categories'][$value['Category']['id']] = $value['Category']['name'];
				}
			}
		}
		return $return;
	}
	
	
	function get_categories_front($type_for=0)
	{
		$this->unbindModel(array('belongsTo'=>array('Parent')),false);
		$this->bindModel(array(
				'hasMany'=>array(
					'Child'=>array(
						'className'=>'Category',
						'foreignKey'=>'parent_id',
						'conditions'=>array('parent_id != '=>0),
						'fields'=>array('Child.name','Child.id')
					)
				)
		
		),false);
		$data = $this->find('all',array('conditions'=>array('Category.type_for'=>$type_for,'Category.status'=>Configure::read('App.Status.active'),'Category.parent_id'=>0),'fields'=>array('Category.name','Category.id')));
		return $data;
	}
	
	
	function get_parent_categories_front($type_for=0)
	{
		$this->unbindModel(array('belongsTo'=>array('Parent')),false);
		
		$data = $this->find('all',array('conditions'=>array('Category.type_for'=>$type_for,'Category.status'=>Configure::read('App.Status.active'),'Category.parent_id'=>0),'fields'=>array('Category.name','Category.id')));
		return $data;
	}
	
	
	

}