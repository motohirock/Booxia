<?php
class ReviewController extends AppController {

	var $name = 'Review';
	
	function index() {
		$this->set('navi', "レビュー");
	}
}
?>