<?php 

// MANAGES INSTALLING AND UPDATING OF rocktree-CORE FILES
/* Create Plugin Core
-------------------------------------------------------------------------------- */
// checks to see if plugin core exists; creates it if it doesn't exist.
register_activation_hook( __FILE__, 'jade_load_rocktree_core' );
function jade_load_rocktree_core() { // IMPORTANT ::: THIS NEEDS TO HAVE PLUGIN PREFIX IN FUNCTION NAME
	$core = dirname(__FILE__);	
	$new_core_dir = dirname(dirname(__FILE__)) . '/rocktree-core';	
	if( !is_dir($new_core_dir) ) {		
		$new_file = $new_core_dir . '/rocktree-core.zip';		
		mkdir($new_core_dir);
		copy( $core . '/rocktree-core.zip', $new_file);		
		$zip = new ZipArchive();  
	    $x = $zip->open($new_file);  
	    if($x === true) {  
	        $zip->extractTo($new_core_dir);  
	        $zip->close();	          
	        unlink($new_file);  
	    } 
	    else die("There was a problem. Please try again!"); 
	}
}

/* Load Class Files
-------------------------------------------------------------------------------- */
// these files are loaded from the rocktree plugin core 
$rocktree_core = dirname(dirname(__FILE__)) . '/rocktree-core/rocktree-core';
if( is_dir( $rocktree_core ) ) {
	require_once( $rocktree_core . '/rock.php');
	require_once( $rocktree_core . '/gift-shop.php');
	require_once( $rocktree_core . '/plugin-update-checker/plugin-update-checker.php' );
}

?>