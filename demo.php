<?php
function loadOption ($array){
	$html ='<option value="">Please select...</option>';
   	foreach($array as $key => $values){
		   $html.='<option value="'.$key.'">'.$values.'</option>';
	   }
	   return $html;
}
?>