<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

function unset_userdata_except($keep_items = array()) {
    // Get CodeIgniter instance
    $CI =& get_instance();
    
    // Load session library
    $CI->load->library('session');
    
    // Get all session data
    $session_data = $CI->session->all_userdata();
    
    // Loop through session data
    foreach ($session_data as $key => $value) {
        // Check if the key is not in the keep_items array
        if (!in_array($key, $keep_items)) {
            // Unset session data
            $CI->session->unset_userdata($key);
        }
    }
}