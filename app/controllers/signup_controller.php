<?php
class SignupController extends AppController {

	var $name = 'Signup';
	
	function index() {
		$this->set('navi', "新規登録");
	}
}
?>