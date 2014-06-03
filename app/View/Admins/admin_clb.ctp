 <h3> List of  Collaborations :  <?php echo ($this->Html->link('Create ', array('controller'=>'admins', 'action'=>'clb_create'), array('class'=>'nav-top-item no-submenu ')));?>  </h3>
 <hr>  
 
 <form method='post'> 
    <Table style='width:100%'>   
      <thead>  
       
       	<tr>   
       		
       		 <td>   id </td>   
       		 <td>   Title </td>   
       		 <td>   Expanation :</td>   
       		 <td>   Example    :   </td>   
       		 <td>  Link :   </td>  
       		 <td>  type  </td>  
       		 
       		 <td>  Edit </td>  
       		    
       		   
       	
        </tr>  
       
       </thead>  
    
    
    	<tbody>  
    	
    	<? foreach($list as $r):?>  
    	
    	 <tr>   
       		  <td>   <?=$r->id?> </td>   
       		 <td>   <?=$r->title?>  </td>   
       		 <td>    <?=$r->explain?></td>   
       		 <td>    <?=$r->example?>    </td>   
       		 <td>  <?=$r->link?>   </td>  
       		 <td>  <? if ($r->type==1) 
							 echo "project"  ; 
								else 
								echo "job"; ?>  </td>  
       		 <td>    </td>     
       		 
       		 
       		 <td>  <?php echo ($this->Html->link('Edit  ', array('controller'=>'admins', 'action'=>'clb_edit' , $r->id ), array('class'=>'nav-top-item no-submenu ')));?>  </td>
       	  </tr>   
        
        
        
    	
    	<?endforeach;?> 
    	</tbody>
    
    
    </Table> 
   
    </form> 
    