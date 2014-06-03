<?php
if($id%2==0)
{
?>
<script>
/* alert('even'); */
var row_id = '<?php echo $row_id; ?>';
	
	jQuery("#"+row_id).fadeTo("slow", 0.5, function(){
			jQuery(this).css("background-color:FFFF99");
                 jQuery(this).remove(); 
             });
</script>
<?php
}
else
{
?>
<script>
/* alert('odd'); */
var row_id = '<?php echo $row_id; ?>';
	
	jQuery("#"+row_id).fadeTo("slow", 0.5, function(){ 
             jQuery(this).slideUp("slow", function() { 
			 jQuery(this).css("background-color:FFFF99");
                jQuery(this).remove();
             });
         });

</script>
<?php
}
?>
<?php
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
echo $this->Js->writeBuffer();
die;
?>