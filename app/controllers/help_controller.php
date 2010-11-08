<?php
class HelpController extends AppController {

	var $name = 'Help';
	
	function index() {
		$this->set('navi', "ヘルプ");
	}
}
?>