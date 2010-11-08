<?php
class MypageController extends AppController {

	var $name = 'Mypage';
	
	function index() {
		$this->set('navi', 'マイページ');
    }
}
?>