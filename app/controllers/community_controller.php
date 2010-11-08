<?php
class CommunityController extends AppController {

	var $name = 'Community';
	
	function index() {
		$this->set('navi', "コミュニティ");
	}
}
?>