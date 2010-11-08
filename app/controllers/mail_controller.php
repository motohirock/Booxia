<?php
class MailController extends AppController {

	var $name = 'Mail';
	
	function index() {
		$this->set('navi', "お問い合わせ");
	}
}
?>