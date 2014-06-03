<script type="text/javascript">
$(function() {
	// placement examples
	$('#north').powerTip({placement: 'n'});
	$('#east').powerTip({placement: 'e'});
	$('#south').powerTip({placement: 's'});
	$('#west').powerTip({placement: 'w'});
	$('#north-west').powerTip({placement: 'nw'});
	$('#north-east').powerTip({placement: 'ne'});
	$('#south-west').powerTip({placement: 'sw'});
	$('#south-east').powerTip({placement: 'se'});

	// mouse follow examples
	$('#mousefollow-examples div').powerTip({followMouse: true});

	// mouse-on examples
	$('#mouseon-examples div').data('powertipjq', $([
		'<p><b>Here is some content</b></p>',
		'<p><a href="http://stevenbenner.com/">Maybe a link</a></p>',
		'<p><code>{ placement: \'e\', mouseOnToPopup: true }</code></p>'
	].join('\n')));
	$('#mouseon-examples div').powerTip({
		placement: 'e',
		mouseOnToPopup: true
	});

	// api examples
	$('#api-open').on('click', function() {
		$.powerTip.showTip($('#mouseon-examples div'));
	});
	$('#api-close').on('click', function() {
		$.powerTip.closeTip();
	});
});
</script>    
<script>
$(document).ready(function() {
	$('.tble_list table tr:nth-child(odd)').addClass('odd');
	$('.tble_list table tr:nth-child(even)').addClass('even');
});
</script>
		<div class="right_sidebar">
        	<h2><a href="#">My WorkRooms</a>
            	<a href="#" class="show_hide">Available Workrooms<span class="arwblk"></span></a>
                <div class="slidingDiv">
                    	<ul>
                        	<li><a href="#">Create a room</a></li>
                            <li><a href="#" class="act">Another room</a></li>
                            <li><a href="#">Other workroom</a></li>
                            <li><a href="#">Other workroom</a></li>
                        </ul>
                </div>                
            </h2>
            <div class="product_dscrpBOX">
            	<h3>Job Name@Project Name or Project Name</h3>
                <div class="product_dscrpBOX_left">
                	<div class="product_dscrpBOX_left_img">
						<div>
							<span>Guys, just a push and we are</span> <br />
							<span>out there!</span>
						</div>
						<?php echo $this->Html->image('pro_img1.png',array('title'=>"product-image", "alt"=>"product-image"));?>
					</div>
                    <div class="product_dscrpBOX_left_discrpsn">
                    	<ul>
                        	<li><span class="flg"></span>Next Mileastone: <a href="#" class="edit"></a></li>
                            <li>Release 1 Integration</li>
                            <li>Date: 28.2.13</li>
                        </ul>
                    </div>
                </div>
                <div class="product_dscrpBOX_ryt">
                	<ul>
                    	<li>Projct's/Job's workroom:</li>
                        <li class="skyblue">Sagi Meller</li>
                        <li class="skyblue">Leader 2</li>
                        <li class="pink">Expert 1 <span class="exprt_smbl"></span></li>
                        <li class="pink">Expert no. 2 <span class="exprt_smbl"></span></li>
                        <li class="pink">Expert 3 <span class="exprt_smbl"></span></li>
                        <li class="pink">Expert no. 4 <span class="exprt_smbl"></span></li>
                        <li class="grey">Another Expert 5 <span class="exprt_smbl2"></span></li>
                        <li class="grey">Expert 6 <span class="exprt_smbl2"></span></li>
                    </ul>
                    <div class="gst_DV">
                    	<a href="#" class="add_guest">Add Guest</a>
                        <a href="#" class="vdio_chat">Video Chat</a>
                    </div>
                </div>
            </div>
            <div class="product_jobfiles">
            	<h5>Project/Job Files:</h5>
                <div class="add_edit_scrl" id="placement-examples">
                	<ul>
                    	<li>Attachment 1  
                        	<div class="edit_deletBX">
                                <input type="button" id="north-west" class="download" value="" title="" />
                                <input type="button" id="north-east" class="info" value="" title="more info" />
                                <input type="button" id="east" class="delete" value="" title="delete item}" />
                        	</div>
                        </li>
                        <li>Attachment 1  
                        	<div class="edit_deletBX">
                                <input type="button" id="north-west" class="download" value="" title="" />
                                <input type="button" id="north-east" class="info" value="" title="more info" />
                                <input type="button" id="east" class="delete" value="" title="delete item}" />
                        	</div>
                        </li>
                        <li>Attachment 1  
                        	<div class="edit_deletBX">
                                <input type="button" id="north-west" class="download" value="" title="" />
                                <input type="button" id="north-east" class="info" value="" title="more info" />
                                <input type="button" id="east" class="delete" value="" title="delete item}" />
                        	</div>
                        </li>
                        <li>Attachment 1  
                        	<div class="edit_deletBX">
                                <input type="button" id="north-west" class="download" value="" title="" />
                                <input type="button" id="north-east" class="info" value="" title="more info" />
                                <input type="button" id="east" class="delete" value="" title="delete item}" />
                        	</div>
                        </li>
                        <li>Attachment 1  
                        	<div class="edit_deletBX">
                                <input type="button" id="north-west" class="download" value="" title="" />
                                <input type="button" id="north-east" class="info" value="" title="more info" />
                                <input type="button" id="east" class="delete" value="" title="delete item}" />
                        	</div>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
		<div class="right_sidebar_2">
        	<div class="post_cmntDV">
            	<textarea name="" cols="" rows="" class="txtaria"></textarea>
            </div>
            <div class="post_cmnt_row">
            	<div class="add_attachment">
					<a href="#" >Add Attament</a>                
                </div>
				<button class="post_msg_btn"></button>
            </div>
            
            <div class="tble_list">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="23%"><span class="who">Who</span></td>
                    <td width="61%"><span class="what">What</span></td>
                    <td width="16%"><span class="when">When</span></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><span class="blue">You:</span></td>
                    <td align="left" valign="top"><p>Text - a small tab on your toolbar. It will remain static and available as 
your user browses through the different pages of your site, meaning 
they can get back to chatting whenever they want. they can get back 
to chatting whenever they want.
						<a href="#"><span>1</span> attachment</a>
					</p>
					</td>
                    <td align="left" valign="top"><code>1 min. ago</code></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><span class="pink">Provider's name:</span></td>
                    <td align="left" valign="top"><p>Text - a small tab on your toolbar.</p>
					</td>
                    <td align="left" valign="top"><code>6 min. ago</code></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><span class="pink">Provider's name2:</span></td>
                    <td align="left" valign="top"><p>Text - a small tab on your toolbar. It will remain static and available as 
your user browses through. they get back to whenever they want.
						<a href="#"><span>3</span> attachment</a>
                        </p>
					</td>
                    <td align="left" valign="top"><code>2 hrs. ago</code></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><span class="blue">You:</span></td>
                    <td align="left" valign="top"><p>Text - a small tab on your toolbar. It will remain static and available as 
your user browses through the different pages of your site, meaning 
they can get back to chatting whenever they want. they can get back 
to chatting whenever they want.</p>
					</td>
                    <td align="left" valign="top"><code>Octber 24, 2012</code></td>
                  </tr>
            	</table>
            </div>            
        </div>