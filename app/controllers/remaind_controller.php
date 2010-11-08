<?php
class RemaindController extends AppController {

	var $name = 'Remaind';
	
	function index() {
		$this->set('navi', "パスワード再設定");
	}
}
?>