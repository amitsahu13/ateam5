<?php
$siteFolder               	= dirname(dirname(dirname($_SERVER['SCRIPT_NAME'])));
$site_url =  "http://" . $_SERVER['HTTP_HOST'] . $siteFolder;
define('SITEURL', $site_url);
define('EDITWRAP','div');


define('PROJECT_DIR', "img/projects");


//project temp image folder
define('PROJECT_DIR_TEMP', "img/project_temp/image");
define('PROJECT_TEMP_ORIGINAL_DIR', PROJECT_DIR_TEMP."/Original/");
define('PROJECT_TEMP_BIG_DIR', PROJECT_DIR_TEMP."/Big/");
define('PROJECT_TEMP_THUMB_DIR_232_232', PROJECT_DIR_TEMP."/Thumb/");
define('PROJECT_TEMP_SMAll_DIR', PROJECT_DIR_TEMP."/Small/");

define('PROJECT_TEMP_VIEW_THUMB_DIR_232', "project_temp/image/Thumb/");

//project temp file folder
define('PROJECT_DIR_TEMP_FILE', "img/project_temp/file");
define('PROJECT_TEMP_THUMB_DIR_FILE', PROJECT_DIR_TEMP_FILE."/Thumb/");
define('PROJECT_TEMP_THUMB_DIR_FILE_VIEW', "project_temp/file/Thumb/");


/*********Path for user images upload*************************************/
define("USER_GENERAL_DIR_PATH", "img/users/default/");
define("USER_FOLDER", "img/users/");
define("USER_PROFILE_IMAGE_BIG", "img/users/{user_id}/images/profile/big/");
define("USER_PROFILE_IMAGE_ORIGINAL", "img/users/{user_id}/images/profile/original/");
define("USER_PROFILE_IMAGE_SMALL", "img/users/{user_id}/images/profile/small/");
define("USER_PROFILE_IMAGE_THUMB", "img/users/{user_id}/images/profile/thumb/");
define("USER_PROFILE_IMAGE_SMALL_50_50", "img/users/{user_id}/images/profile/small_50_50/");
/*********Path for user portfolio images upload*************************************/
define("USER_PORTFOLIO_IMAGE_ORIGINAL", "img/users/{user_id}/images/portfolio/original/");
define("USER_PORTFOLIO_IMAGE_THUMB", "img/users/{user_id}/images/portfolio/thumb/");

define("USER_PORTFOLIO_IMAGE_SHOW_ORIGINAL", "users/{user_id}/images/portfolio/original/");
define("USER_PORTFOLIO_IMAGE_SHOW_THUMB", "users/{user_id}/images/portfolio/thumb/");

define("USER_PORTFOLIO_WIDTH_THUMB",114);
define("USER_PORTFOLIO_HEIGHT_THUMB", 84);

define("USER_IMAGE_WIDTH_BIG", 400);
define("USER_IMAGE_HEIGHT_BIG", 300);
define("USER_IMAGE_WIDTH_THUMB", 232);
define("USER_IMAGE_HEIGHT_THUMB", 173);
define("USER_IMAGE_WIDTH_SMALL", 123);
define("USER_IMAGE_HEIGHT_SMALL", 90);
define("USER_IMAGE_WIDTH_SMALL_50_50", 50);
define("USER_IMAGE_HEIGHT_SMALL_50_50", 50);

/*********Path for user resume doc upload*************************************/
define("USER_RESUME_ORIGINAL", "img/users/{user_id}/images/resume/");


/*********Path for user images upload end*************************************/

/*********Path for user images show*************************************/
define("USER_SHOW", "users/");
define("USER_PROFILE_IMAGE_SHOW_BIG", "users/{user_id}/images/profile/big/");
define("USER_PROFILE_IMAGE_SHOW_ORIGINAL", "users/{user_id}/images/profile/original/");
define("USER_PROFILE_IMAGE_SHOW_SMALL", "users/{user_id}/images/profile/small/");
define("USER_PROFILE_IMAGE_SHOW_THUMB", "users/{user_id}/images/profile/thumb/");
define("USER_PROFILE_IMAGE_SHOW_SMALL_50_50", "users/{user_id}/images/profile/small_50_50/");
define("user_edit_image_thumb_path","users/{user_id}/images/profile/thumb/");
/*********Path for user images show end*************************************/

/*********Path for project images upload*************************************/
define("PROJECT_PLAN_PATH_DEFAULT", "img/projects/default");
define("PROJECT_PLAN_PATH_FOLDER", "img/projects/");
define("PROJECT_PLAN_PATH", "img/projects/{project_id}/plan/");
define("PROJECT_IMAGE_BIG_PATH", "img/projects/{project_id}/image/Big/");
define("PROJECT_IMAGE_THUMB_PATH", "img/projects/{project_id}/image/Thumb/");
define("PROJECT_IMAGE_SMALL_PATH", "img/projects/{project_id}/image/Small/");
define("PROJECT_IMAGE_ORIGINAL_PATH", "img/projects/{project_id}/image/Original/");
/*********Path for project images upload end*************************************/

// blog file upload path define by kanhaiya start
// Date 17-aprial-13
define("BLOG_IMAGE_BIG_PATH", "img/blog/Big/");
define("BLOG_IMAGE_THUMB_PATH", "img/blog/Thumb/");
define("BLOG_IMAGE_SMALL_PATH", "img/blog/Small/");
define("BLOG_IMAGE_ORIGINAL_PATH", "img/blog/Original/");

define("BLOG_IMAGE_SMALL", "blog/Small/");
define("BLOG_IMAGE_BIG", "blog/Big/");
define("BLOG_IMAGE_THUMB", "blog/Thumb//");

define("BLOG_IMAGE_WIDTH_BIG", 718);
define("BLOG_IMAGE_HEIGHT_BIG", 478);
define("BLOG_IMAGE_WIDTH_THUMB", 95);
define("BLOG_IMAGE_HEIGHT_THUMB", 71);
define("BLOG_IMAGE_WIDTH_SMALL", 232);
define("BLOG_IMAGE_HEIGHT_SMALL",172);

// blog end 
/*********Path for project business plan files upload*************************************/

define("PROJECT_BUSINESS_PLAN_PATH_FOLDER", "img/projects/{project_id}/business_plan/");


/*********Path for project images show*************************************/
define("PROJECT_SHOW", "projects/");
define("PROJECT_IMAGE_SHOW_BIG_PATH", "projects/{project_id}/image/Big/");
define("PROJECT_IMAGE_SHOW_THUMB_PATH", "projects/{project_id}/image/Thumb/");
define("PROJECT_IMAGE_SHOW_SMALL_PATH", "projects/{project_id}/image/Small/");
define("PROJECT_IMAGE_SHOW_ORIGINAL_PATH", "projects/{project_id}/image/Original/");
/*********Path for project images show end*************************************/

/*********Size for project images upload*************************************/
define("PROJECT_IMAGE_WIDTH_BIG", 400);
define("PROJECT_IMAGE_HEIGHT_BIG", 300);
define("PROJECT_IMAGE_WIDTH_THUMB", 232);
define("PROJECT_IMAGE_HEIGHT_THUMB", 171);
define("PROJECT_IMAGE_WIDTH_SMALL", 123);
define("PROJECT_IMAGE_HEIGHT_SMALL",90);
/*********Size for project images end*************************************/


/*********Path for job attachements upload*************************************/
define("JOB_ATTACHEMENT_PATH_DEFAULT", "img/jobs/default");
define("JOB_ATTACHEMENT_PATH", "img/jobs/");
define("JOB_ATTACHEMENT_PATH_FOLDER", "img/jobs/{job_id}/job_attachements");

//job attachements file folder


/*********Path for job files upload*************************************/
define("JOB_FILES_PATH_DEFAULT", "img/jobs/default");
define("JOB_FILES_PATH", "img/jobs/");
define("JOB_FILES_PATH_FOLDER", "img/jobs/{job_id}/job_files");
define("JOB_ATTACHEMENTS_PATH_FOLDER", "img/jobs/{job_id}/job_attachements/");

/*********Path for job bid temp files upload*************************************/
define('JOB_APPLY_DIR_TEMP_FILE', "img/job_apply_temp/file");
define('JOB_APPLY_TEMP_THUMB_DIR_FILE', JOB_APPLY_DIR_TEMP_FILE."/Thumb/");
define('JOB_APPLY_TEMP_THUMB_DIR_FILE_VIEW', "job_apply_temp/file/Thumb/");

/*********Path for job bid files upload*************************************/
define("JOB_BID_PATH_DEFAULT", "img/job_bid_file/default");
define("JOB_BID_PATH", "img/job_bid_file/");
define("JOB_BID_PATH_FOLDER", "img/job_bid_file/{job_id}/bid_files");
define("JOB_BID_PATH_DEFAULT_BIDFILES", "img/job_bid_file/default/bid_files");

/*********Path for slider images upload*************************************/
define("SLIDER_UPLOAD_PATH", "img/sliders/");
/*********Path for slider images upload end*************************************/

/*********Path for slider images show*************************************/
define("SLIDER_SHOW_PATH", "sliders/");
/*********Path for slider images show end*************************************/
/*********Size for slider images upload*************************************/
define("SLIDER_IMAGE_WIDTH",963);
define("SLIDER_IMAGE_HEIGHT",594);
define("SLIDER_SHOULD_BE", "Image size should be greater or equal to ".SLIDER_IMAGE_WIDTH." * ".SLIDER_IMAGE_HEIGHT);
/*********Size for project images end*************************************/
define("CONTRACT_FORM_PATH_DEFAULT", "contract_form/default");
define("CONTRACT_FORM_PATH_FOLDER", "contract_form/");
define("CONTRACT_FORM_PATH", "contract_form/{form_id}/");
/*************** Constant for static page **********/
define("HOW_IT_WORKS",1);
define("ABOUT_TEAM",2);
define("HELP",3);
define("STAY_IN_TOUCH",4);
define("RESOURCES",5); 
define("PROJECT_TYPE",1);
define("JOB_TYPE",2);
//project temp image folder
define('FLAG_DIR_TEMP', "img/country_flags/");
define("FLAG_DIR_TEMP_PATH", "country_flags/"); 


///  LinkID  connections  :  
define( "LINKID_TOKEN" ,  "08b51563-9736-4df2-acb2-a54cda9426c5"   ); 
define("LINKID_SECRET",  "75e8f226-a6fa-4a6b-9f46-ce0c477f6c3a" );  
define("LINKID_API", "77tig7p9d7sx4n") ; 
define("LINKID_SECRET_KEY",  "Rjjam0V8tkonMOSk");
define("GEOURL", "http://geoip.maxmind.com/e?l=qz38TxWEN81T&i="  ); 
// Twilio Accounts    



define("TWILIO_ID",  "ACf4f4569100fe3e69c1b474b67c7ca5cd") ;  
define("TWILIO_TOKEN",  "2c6d4a06d383fe93139fc135b6a53501"); 
define("TWILIO_NUMBER",  "+13024070923"); 
 

define("CLOSED_COLOR",  "grey");



 		 define("TEAMUP_SEND" ,            "User   {user}  Wants   to  create TEam Up With You For  Job  {jobname}    " ); 
 		 define("TEAMUP_APPROVED",         "User Agree with Teamup request " );
   		 define("CONFIRM_MILESTONE",       "User  {user}    Has Confirmed   {title}     {desc}   {comment}  {date}" );
		 define("ADMIN_MILESTONE_CLOSED",  "Leader has Confirmed   that   Milestone {name} was closed. {comment}  ");
		 define("USER_AGREE_WITH_CHANGES" ,"User  {user}  agree with your  changes"); 
		 define("ADMIN_HAS_MADE_CHANGES",  "Leader   has made changes to Milestone  please confirm them"); 

		 
		 
// Fine   :  
define("EMAIL_JOBAPPLIED" , " Hello  {user} has applied  for  {job} " );  
define("EMAIL_LINKEDID",  	"New Link ID was   connect With {user} : {id}");  
define ("CONTRACTS", 		serialize (array (


   "Min/Max Hours a Week"=>"Specify minimum or maximum expected Working Hours per week ",
   "Min/Max supplied material"=>"Specify minimum or maximum expected Pages,Designs ",
   "Min/Max Options"=>"Specify minimum or maximum Options for the supplied material to choose from", 
   "Min/Max Revisions"=>"Specify minimum or maximum Revisions for the supplied material",  
   "Bug Fixing" => "  Define who is in charge of bug fixing and for how long " ,   
   "Maintainance and ongoing Support" => "After the product is ready, what is the expected support ",  
   "Ownership of Social Media Contacts" => "Any social media contacts, including
   followers  or  friends,  that are acquired through accounts (including, but not limited to email addresses, blogs, Twitter, Facebook, Youtube, or other social media networks) used or created on behalf of Side    are the property of Side    ." ,   
    "Additional Editing and" =>  "Specify what happens if additional editing and changes are required "  ,   
  	"Reporting" => "Specify progress reporting scheme (e.g. for Marketing : Trafic,Revenues…) "  ,  
  	"Geographic Area" =>  "Specify if any provision is limited to a specific geographical area" ,   
  	"Reproduction" =>  "Specify any provision on reproducing copies of received material" ,  
  	"Proceeds sharing End Date" =>  "Specify an end Date for Profit/Revenue Share" ,  
  	"Proceeds sharing Buy-Out Option" => "Specify a buy-out option and compensation (Enables the leader to stop paying revenues before the “End-Date” on his own decision but with compensation)" , 
  	 "Custom Term" => "" ,   
  
)));


define("TEAMUP_TEXT", 		"Some Team text");   

// PRedefined textx 
define("JOB_APPLY_TEXT", 		 	  "  you've got new application for  ") ;
define("JOB_APPROVED_TEAM",			  "  your application  was approved for job  "); 
define("EXPERT_PLEASE_READ",	      "  please check and approve terms of contract for job  ");
define("LEADER_EXPERT_HAS_CONFIRM",   "  terms of the contract were approved for  ");
define("EXPERT_TERMS_OF_CONTRACT" ,   "  terms of the contract were updated please check and approve it for "); 
define("LEADER_TERMS_2" ,			  "  terms of the contract  were approved by expert  for  ");
define("LEADER_CLOSED", 			  "  new milestone  reported as completed ");
define("MILE_STONE_HAS_BEEN_CLOSED",  "Milestone {name} has been closed. ");
 

// FeedBack Consta  
define("LEAVE_FEEDBACK_EXPERT" , "Hi  {from}  Please leave you feedback about  your  expirience working with {user}  {project}." ); 
define("LEAVE_FEEDBACK_LEADER" , "Hi {from}   Please leave you feedback  for the  {user}  by  {project} " ); 
define("LEAVE_FEEDBACK_SEND" , " Hi {user}  user  has leave feedback from  last Job {job} "); 
 
//  PAYPEL  AUTH DATA 
define("PAYPAL_PF_USER",  ""); 
define("PAYPAL_PF_VENDOR" , ""); 
define("PAYPAL_PF_PARTHER", ""); 
define("PAYPAL_PF_PASSWROD",  "");  

define("PAYPAL_PF_MODE", "TEST"); 
define("PAYPAL_PF_HOST" , "https://pilot-payflowpro.paypal.com/"); // For test Pilot  



// price 
define("PAYPAL_PRICE_AUTH", 10);


// User added To  Workroom  : 
define("LEADER_ADDED_YOU_WORKROOM", "Hi {username} Leader has added you  into workroom  {workroom} "); 

// Site Email  Constant Address   :   
define("SITE_EMAIL", "site@fullservice.co.il") ; 



// Remove ChatRoom  :  
define("REMOVE_CHAT_ROOM_1", "Chatroom will be deleted after approval by the second part? "); 
define("REMOVE_CHAT_ROOM_2", " This Chatroom was closed by  ");   
define("REMOVE_CHAT_ROOM_REQUEST",    " Hi {username} user {leader} wants to remove  Chatroom   {room}    "  ); 

define("REMOVE_CHAT_ROOM_REQUEST2",    " Hi {username} user {leader}  has closed chatroom  {room}    "  );
  
define("WORKROOM_DENIED", "Sorry you dont have access to  this workroom "); 
define("WORKROOM_WAS_DISABLED_FOR_EXPERT", "Hello {user} unfortionaly  leader has banned you For   workroom  {room} ");
define("WORKROOM_WAS_ENABLED_FOR_EXPERT", "Hello {user}   leader has  Approved  you For   workroom  {room} ");
 
// Check Percent  
define("PLEASE_CHECK_PERCENT", "Percent total has to be - 100% "); 


/*
 * Expert or   Both   job invite Constants  
 * 2014 
 * 
 */
define("INVITE_POPUP_EXPERT" , "Select Project And job "); 

//  
define("MILISTONE_REQ", "you have to create at least one milestone");  
//   
	
define("INVITE_TO_USER_JOB" , "hi {to_user}, {user}  invited you to team-up  in the  project  {project} ") ;
define("INVATION_DECLINED" ,  "Hi {user},     your invitation to  {to_user}  for  {project} project was declined. ") ; 


// Social Login  Values   :   
define("FACEBOOK_APP_ID", "1406985332888486");


define("JOB_CHANGED_MESSAGE",  "Hello  {username}   the job Details Has benn  Cahnge {job} "); 




