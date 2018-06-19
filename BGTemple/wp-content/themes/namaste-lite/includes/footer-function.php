<?php

/*********Footer Function**************/
if(!function_exists("namaste_foot")){
	function namaste_foot(){
		do_action("namaste_foot");
	}
}
add_action("wp_footer","namaste_foot",20);

?>
