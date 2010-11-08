<?php
class NewsController extends AppController {

	var $name = 'News';
	
	function index() {
		$this->set('navi', "ニュースとトピックス");
	}
}
?>