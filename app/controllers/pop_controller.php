<?php
class PopController extends AppController {

	var $name = 'Pop';
	
	function index() {
		$this->set('navi', "ポップ");
	}
}
?>