<?php
class AboutController extends AppController {

	var $name = 'About';
	
	function index() {
		$this->set('navi', "Booxiaとは");
	}
}
?>