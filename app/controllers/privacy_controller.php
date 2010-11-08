<?php
class PrivacyController extends AppController {

	var $name = 'Privacy';
	
	function index() {
		$this->set('navi', "プライバシーポリシー");
	}
}
?>