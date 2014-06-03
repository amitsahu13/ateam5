<?php
/* 
Here we are define some configs variable for site uses.

***************** SITE SETTING *********************/
$siteFolder               	= dirname(dirname(dirname($_SERVER['SCRIPT_NAME'])));
$config['App.SiteUrl'] 		= 'http://' . $_SERVER['HTTP_HOST'].$siteFolder;
$config['App.SiteName'] 	= 'ATeam4ADream';
$config['Site.title'] 		= 'ATeam4ADream';
$site_url 					=  "http://" . $_SERVER['HTTP_HOST'] . $siteFolder;
$config['App.AdminMail']  	= "test@octalsoftware.com";

define('SITE_URL',$site_url);
/*FOR PAGING*/
$config['App.PageLimit']  	= 10;
$config['App.AdminPageLimit'] = 20;

/*FOR GENERAL STATUS*/
$config['App.Status.inactive']	= 0;
$config['App.Status.active'] 	= 1;
$config['App.Status.delete'] 	= 2;

define('FileSizeLimit', 1024);

$config['User.hearaboutOption'] = array(1=>'Blog', 2=>'Conference', 3=>'Coworker', 4=>'Facebook', 5=>'Freind', 6=>'Linkedin', 7=>'Online Advertisement', 8=>'Online News Article', 9=>'Social Media Site', 10=>'TV/Radio/Print', 11=>'Twitter', 12=>'Websearch Engine', 13=>'Other');

$config['Project.Start.Date']	= array(0=>'Immediately', 1=>'Choose Start On');

$config['Job.Visibility']		= array(0=>'Public-Visible to everyone', 1=>'Private - Only experts I invite can respond');

$config['Project.Timeline']		= array(0=>'Today', 1=>'Year 1', 2=>'Year 2', 3=>'Year 3', 4=>'Year 4', 5=>'Year 5');

$config['Project.Dilution']		= array(1=>'Dilutable', 2=>'Non-Dilutable');

$config['App.MaxFileSize'] 		= FileSizeLimit * 1024;

$config['Status']          		= array(1=>'Active',0=>'Inactive');

$config['CategoryType']         = array(1=>'Project',2=>'Job');
$config['App.Category.Project']	= 1;
$config['App.Category.Job'] 	= 2;

$config['App.Name.Visiblity'] 					= array(1=>'Public',3=>'Hidden - show only username ');
$config['App.Image.Visiblity'] 					= array(1=>'Public',2=>'Hidden',3=>'Private');
$config['App.ProjectDescription.Visiblity'] 	= array(1=>'Public',2=>'Hidden',3=>'Private');
/***************** CONFIG VARIABLES FOR USER **************/

$config['App.Role.Admin']      	= 1;
$config['App.Role.SubAdmin']    = 2;
$config['App.Role.Buyer']      	= 3;
$config['App.Role.Provider']    = 4;
$config['App.Role.Both']      	= 5;

/**************** job status variable ************/
$config['App.Job.Active']      	= 1;
$config['App.Job.Awarded']      	= 2;
$config['App.Job.Completed']      	= 3;
$config['App.Job.Disputed']      	= 4;
$config['App.Job.Closed']      	= 5;
$config['App.Job.Cancelled']      	= 6;

/**************** job status title************/
define('ACTIVE_JOB','Posted Job Ad');
define('AWARDED_JOB','Job in Progress');
define('COMPLETE_JOB','Completed Job');

$config['App.Expert.Available'] = array(1=>'Full Time',2=>'Part Time');

$config['App.Roles'] = array(3=>'Leader',4=>'Expert',5=>'Both');

$config['App.Provider.Account.Type'] = array(1=>'Individual',2=>'Business');


$config['App.Sex']      = array('m'=>'Male','f'=>'Female');

define('PROVIDER_ACCOUNT_TYPE_INDIVIDUAL',1);
define('PROVIDER_ACCOUNT_TYPE_BUSINESS',2);

$config['App.JobType'] = array(0=>'Hourly', 1=>'Fixed');
$config['App.FeesType'] = array(0=>'Free', 1=>'Paid');

$config['App.RatingType'] = array(1=>'Leader', 2=>'Expert');


$config['Job.Location.Type']=array(0=>'No Prefrence', 1=>'Prefered'/* ,2=>'Percent Telecommute' */);

$config['Self.Rate']=array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10);
$config['App.Days'] = array("1" => 1,"2" => 2,"3" => 3,"4" => 4,"5" => 5, "6" => 6,"7" => 7,"8" => 8, "9" => 9,"10" => 10,"11" => 11, "12" => 12,"13" => 13,"14" => 14,"15" => 15, "16" => 16,"17" => 17,"18" => 18,"19" => 19,"20" => 20,"21" => 21,"22" => 22,"23" => 23,
"24" => 24,"25" => 25,"26" => 26,"27" => 27,"28" => 28,"29" => 29,"30" => 30,"31" => 31);

$config['App.Month'] = array(1 => "January",2 => "February",3 => "March",4 => "April",5 => "May",6 => "June",7 => "July",8 => "August",9 => "September",10 => "October",11 => "November",12 => "December");

$yearArray = array();	
for($year = 2000; $year >=1950;$year--){
	$yearArray[$year]	= $year;
}
$config['App.Year']     = $yearArray;

$config['App.InsideExperience']	= array(1=>'Rookie', 2=>'One Project', 3=>'More Then One Project');
$config['App.OutsideExperience']= array(1=>'Rookie Leader ', 2=>'One Project-Successful', 3=>'One Project-Unsuccessful', 4=>'More Then One Project Project-Some Successful', 5=>'More Then One Project Project-No Success So Far');




