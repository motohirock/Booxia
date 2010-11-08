<?php
class LoginController extends AppController {

	var $name = 'Login';
	
	function index() {
        $user_id = $this->params['form']['id'];
        $user_password = $this->params['form']['password'];
		
		$this->Session->write('id', $user_id);
    }
}
?>