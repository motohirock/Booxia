<?php
class AgreementController extends AppController {

	var $name = 'Agreement';
	
	function index() {
		$this->set('navi', "ご利用規約");
	}
}
?>