<?php
class LogoutController extends AppController {

	var $name = 'Logout';
	
	function index() {
		$this->set('navi', 'ログアウト');
		$this->Session->delete('id');
		$this->Session->destroy();
    }
}
?>