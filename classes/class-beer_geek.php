<?php
class Beer_Geek {

	function __construct() {
		$this->autoload();
		new BG_Admin();
	}

	function autoload() {
		require ('admin/class-bg_admin.php');
	}
}
?>