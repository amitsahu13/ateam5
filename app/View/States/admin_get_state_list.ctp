<label>State*</label>
<?php 
// pr($this->request->params); die;
	if(!empty($states)){
		echo $this->Form->input("User.state_id", array("div" => false, "label" => false, 'empty'=>'-- Select State --', 'options'=>$states, "class" => "text-input medium-input",'empty'=>'---Select State---'));
	}else{
		echo $this->Form->input("User.state_id", array("div" => false, "label" => false, "class" => "text-input medium-input",'empty'=>'---Select State---'));	
	}
	?>

