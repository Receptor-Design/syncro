<?php
// Define the path to the /inc directory
$inc_dir = __DIR__ . '/inc/';

// Check if the directory exists
if (is_dir($inc_dir)) {
    
    // Open the directory and read each file
    foreach (glob($inc_dir . '*.php') as $file) {
        
        // Require each PHP file in the /inc directory
        require_once $file;
    }
}
?>