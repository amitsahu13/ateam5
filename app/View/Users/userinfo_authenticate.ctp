<?php
echo $this->element('Front/ele_authenticate_navigation');
?>
<div class="product_dscrpBOX" style="width:100%;">
    <h3><span class="round_bgTXT">1</span>User Info</h3>
    <div class="compensation_frmDV compensation_frmDV">
        <?php echo $this->Form->create('User',array('url' => array('controller' => 'users', 'action' => 'userinfo_authenticate'),'type'=>'file'));
        echo $this->Form->hidden('id');

        ?>
        <label class="padding_left">Please review and update details as appear in your passport:</label>
        <ul class="RegFrmFild RegFrmFild ">

            <li>
                <label class="with_sml1_lbl">First Name</label>
                <?php echo $this->Form->input('first_name', array('div'=>false, 'label'=>false, "class" => "TxtFildReg"));?>
            </li>
            <li>
                <label class="with_sml1_lbl">Last Name</label>
                <?php echo $this->Form->input('last_name', array('div'=>false, 'label'=>false, "class" => "TxtFildReg"));?>
            </li>
            <li>

                <label class="with_sml1_lbl">Date of Birth</label>


	<span class="slct_rwndInPut" style="margin-left: 14px;">
		<?php echo $this->Form->input('UserDetail.birth_date', array('div'=>false, 'label'=>false, "class" => "dob age datepicker slct_rwndInPutRi with_sml1 dateBox", "style" => "width: 176px !important;"));?>
	</span>


                <?php
echo $this->Html->script(array( 'calender/jquery-ui.min','calender/jquery-ui-timepicker-addon'));
                echo $this->Html->css(array('calender/jquery-ui'));
                ?>
                <script type='text/javascript'>


                    function calender_data(){

                        jQuery(".datepicker").datetimepicker({
                            showSecond: false,
                            showHour: false,
                            showMinute: false,
                            showSecond: false,
                            showTime: false,
                            showTimepicker:false,
                            timeFormat:'YY-mm-dd',
                            /* timeFormat: 'hh:mm:ss',
                             stepHour: 1,
                             stepMinute: 5,
                             stepSecond: 10, */
                            beforeShow: function(input, inst)
                            {	//input.offsetHeight
                                inst.dpDiv.css({marginTop: -1 + 'px', marginLeft: input.offsetWidth + 'px'});
                            },changeYear: true,dateFormat: 'yy-mm-dd',changeMonth: true, minDate: '-100Y',maxDate:new Date(2099,12,00),
                            yearRange: '-100',showAnim: 'fold',showOn: 'both',buttonImageOnly: true, buttonImage: ''+SiteUrl+'/img/icons/icon_cle.png'
                        });
 
                    }


                    jQuery(document).ready(function(){
                        calender_data();

                    });


                </script>



                <span id="messgeError" style="color:red;font-family:arial;font-size: 12px;"></span>
            </li>
            <li>
                <label class="with_sml1_lbl" style="margin-top:-7px;">Gender</label>
                <?php  echo ($this->Form->input('UserDetail.gender', array('type'=>'radio', 'options'=>Configure::read('App.Sex'),'default'=>'m', 'div'=>false,'legend'=>false,'label'=>false,'style'=>'width:40px;float:none;margin-top:0px;')));?>
            </li>


            <li>
                <label class="with_sml1_lbl" style="margin-top:-7px;">Change Password: </label>
            </li>

            <li>  <label class="with_sml1_lbl" style="margin-top:-7px;"> Old Password : </label>  <input type='password'  class='TxtFildReg' name='old_password'  />        </li>
            <li>  <label class="with_sml1_lbl" style="margin-top:-7px;"> New Password : </label>  <input type='password' class='TxtFildReg'  name='new_password'    />        </li>
            <li>  <label class="with_sml1_lbl" style="margin-top:-7px;"> Repeat  Password : </label>  <input type='password'  class='TxtFildReg'  name='new2_password'   />        </li>


            <!--  Register As    Both   -->



            <?  if ($this->Session->read('Auth.User.role_id') != 5 ) : ?>
            <li>
            <label class="with_sml1_lbl" style="margin-right:23px;">Register As : </label>
                <div class="compensation_frmrow_R register-page" style="padding: 6px 0 0;">



                 Leader
                <input type='radio'  class="chckBX chkbx user_type" style="margin:0 6px 0 16px" value="3"   <?=($this->Session->read('Auth.User.role_id')==3)?'checked':''?>  name='register'  value='3' />




                Expert
                <input type='radio'   class="chckBX chkbx user_type" style="margin:0 6px 0 16px" value="3"  name='register'  <?=($this->Session->read('Auth.User.role_id')==4)?'checked':''?>  value='4' />


                Both
                <input type='radio'  class="chckBX chkbx user_type" style="margin:0 6px 0 16px" value="3"   <?=($this->Session->read('Auth.User.role_id')==5)?'checked':''?>  name='register'  value='5' />

            <?endif;?>






                </div>
            </li>

        </ul>













        <div class="clear"></div>
        <div class="btm_nextbtnDV margin_top" style="margin-bottom: 0;">
            <span class="Continue4Btn" style="float:right; margin: 0;"><input type="submit" name="" class="Continue4BtnRi col SignUpBtn" value="Approve"></span>
   <span class="Continue4Btn" style="float:right;" ><?php
			echo $this->Html->link('Next',array('controller'=>'users','action'=>'social_media_authenticate'),array('class'=>'Continue4BtnRi'));
			?></span>
            <div class="clear"></div>
        </div>





        <?php
	 echo $this->Form->end();
        ?>
    </div>
</div>
<script type="text/javascript">
    $(".SignUpBtn").live('click',function(){
        var currentTime 	= new Date();
        var currmonth 		= currentTime.getMonth() + 1;
        var currday 		= currentTime.getDate();
        var curryear 		= currentTime.getFullYear();
        var userfirstname 	= jQuery('#UserFirstName').val();
        var userlasttname 	= jQuery('#UserLastName').val();
        var useremail2 		= jQuery('#UserEmail2').val();
        var UserEmail3 		= jQuery('#UserEmail3').val();
        var UserPassword2 	= jQuery('#UserPassword2').val();
        var useryear 		= jQuery('#UserBirthYear').val();
        var usermonth 		= jQuery('#UserBirthMonth').val();
        var userday 		= jQuery('#UserBirthDay').val();
        var yeardiff 		= curryear - useryear;
        var monthdiff 		= currmonth - usermonth;
        var daydiff 		= currday - userday;

        if(usermonth == 4 || usermonth == 6 || usermonth == 9 || usermonth == 11)
        {
            if(userday==31)
            {
                jQuery("#messgeError").html('Date Should Be Less Than 31.');
                return false;
            }
        }

        if(usermonth == 2)
        {
            if(userday>28)
            {
                if(useryear%4!=0 || userday>29)
                {
                    jQuery("#messgeError").html('Date Should Be Less Than 29.');
                    return false;
                }
            }
        }
        if(curryear == useryear)
        {
            if(usermonth <= currmonth)
            {
                if(currday < userday)
                {
                    jQuery("#messgeError").html('Date Should Be Less Than Today.');
                    return false;
                }
            }
            else
            {
                jQuery("#messgeError").html('Month Should Be Less Or Equal To Current Month.');
                return false;
            }
        }
    });
</script>