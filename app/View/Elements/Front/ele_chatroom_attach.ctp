



<div class="add_attachment3" id="addAttach">
    <a href="javascript:void(0)" id="upload_file22">Add Attachment</a>
</div>


<div class="popup_field">

    <div class="clear"></div>

    <div id="placement-examples" class="add_edit_upld">
        <ul id="fileattache">

        </ul>
    </div>

</div>



<?php echo $this->Html->script(array('ajaxuploadimage/ajaxupload'));?>
<script type="text/javascript">

    jQuery(document).ready(function(){



        //code for uploading job image starts here
        var btnUpload=jQuery('#upload_file22');
        var status=jQuery('#status');
        var i = 0;

        new AjaxUpload(btnUpload, {

            action: '<?php echo(SITE_URL);?>/Workrooms/chatattach/<?=$room?>',

            //Name of the file input box
            name: 'data[JobFileTemp][job_file]',
            id:'job_file',
            onSubmit: function(file, ext){

                if (! (ext && /^(doc|pdf|docx|xls|txt|jpg|png|zip)$/.test(ext))){
                    // check for valid file extension
                    $('#status2').text('Only Doc, Pdf ,Docx ,xls or txt files are allowed.').addClass('errorTxt');
                    return false;
                }

                $('#status2').html('<img src="<?php echo(SITE_URL); ?>/img/ajax-loader_2.gif"/>');
                //status.text('Uploading...');
            },

            onComplete: function(file, response){

                //On completion clear the status
                // status.text('');
                $('#status2').html('');
                //Add uploaded file to list
                var myimageresponse = response.split('|');
                //alert(myimageresponse);
                if(myimageresponse[0]==="success"){

                    $('#fileattache').append('<li id='+myimageresponse[2]+'>'+myimageresponse[1]+'<div class="edit_deletBX"> <input type="button" value="" class="delete" id="east"><input type="hidden" name="data[JobBidFile]['+i+'][job_bid_file]" value="'+myimageresponse[1]+'"/></div></li>');
                }else{
                    $('<li></li>').appendTo('#files').text(file).addClass('errorTxt');
                }
                i++;
                // Remove file  uploaded  :
                jQuery(".delete").click(function(){
                    var id  =  jQuery(this).parent().parent().attr("id")  ;
                    jQuery.get("<?php echo(SITE_URL);?>/Workrooms/removechatfile/"+id);
                    jQuery(this).parent().parent().hide("slow");
                });




            }
        });

        //  Delete Clicked :







    });


    String.prototype.trim = function() {
        return this.replace(/^\s+|\s+$/g,"");
    }
    // code for uploading user image end here


</script>