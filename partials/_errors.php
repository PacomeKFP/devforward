<?php
if(isset($errors) && count($errors) !=0 ){
			echo'<div class=" alert alert-danger error">
			<Button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ';
			for($i = 0; $i < count($errors); $i++){
				echo $errors[$i] . '<br>';
			}
			
							
			
			echo'</div>';
			//echo '<br><br><br><br>';
		
		} 