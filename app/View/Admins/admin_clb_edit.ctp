<h3>  Edit Record  :   </h3> 



 
 	<form method='post'>   
 	
 	 	 <input type='hidden' name='id'   value='<?=$r->id?>' />
 		  <p>  Title  <input type='text' name='title'   value='<?=$r->title?>'   /> </p>   
 		  <p>  Link  <input type='text' name="link" value='<?=$r->link?>'  /> </p>    
 		
 		
 		
 		  <p> Explanation : </p> 
 		  <textarea name='expl'><?=$r->explain?></textarea>
 		
 		
 		
 	 
 		  <p>  Example  : </p> 
 		  <textarea name='example'><?=$r->example?></textarea>  
 		  
 		  
 		  <div style="display:none;"> 
 		  <p> Type :  </p>    
 		  
 		  Project   
 		  <input type='radio'  name='type'  value='1'  <?=($r->type==1?'checked':null)?> >  job  
 		  <input type='radio'  <?=($r->type==2?'checked':null)?>   name='type'  value='2'> 
 		  </div> 
 		  
 		 
 	
 	<button type='submit'>   Update  </button>
 		 
 	</form>
 	
 	
 	