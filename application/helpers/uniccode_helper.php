<?php
if(!defined('BASEPATH')) exit('no file allowed');
if ( ! function_exists('imgRandom'))
{
    
  function uniccode($length = 15) {
	    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}
}