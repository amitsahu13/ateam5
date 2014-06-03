	<form method='POST'> 
		<h3>  Linkid  UnConfirmed Users :  </h3> 
		
			<table style='width:100%; '>  
				<thead> 
					<tr>  
						<td> Userid</td> 
						<td> Username</td> 
						<td> LinkIn id </td>
                        <td> Status </td>
						<td>  Approve </td>   
					</tr>
				
				</thead>
				
				<tbody> 
				
				<? foreach($users as $u):?> 
				 
				 
				 	<tr>  
						<td>  <?=$u["users"]["id"]?></td> 
						<td><A href="/users/user_public_view/<?=$u["users"]["id"]?>" > <?=$u["users"]["username"]?> </A>  </td>
						<td> <a href='https://www.linkedin.com/<?=$u["users"]["linkid"]?>'>  <?=$u["users"]["linkid"]?>  </a> </td> 
					    <td>   <?=($u["users"]["linkid_confirmed"]==1?"CONFIRMED":"NO")?></td>
							<td>  <input type='checkbox'  name='approve[<?=$u["users"]["id"]?>]'  value = '1'/>   </td>
					</tr> 
				 
				 
				 <? endforeach;?> 
				 
				</tbody>
			 </table>
			 
			 <button type='submit'>  Approve </button>
			 </form> 