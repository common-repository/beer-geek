<?php

//error_reporting(E_ALL);
//@ini_set('display_errors', 1);

/*
Plugin Name: Beer Geek
URI: http://virtuousgiant.com/beer-geek
Description: Beer management for breweries and beer geeks. Easily add and manage beer data and metadata. 
Version: 1.0
Author: Virtuous Giant
Author URI: http://VirtuousGiant.com
License: GPL2
*/

define ('BG_PATH', plugin_dir_path(__FILE__));

global $bg_db_version;
$bg_db_version = '1.0';
$bg_db_prior_version = get_option('bg_db_version');

require BG_PATH.'/classes/class-beer_geek.php';

$beer_geek = new Beer_Geek;
?>