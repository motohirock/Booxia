<?php
class SearchController extends AppController {

	var $name = 'Search';
	
	function index() {
		$this->set('navi', "検索ページ");
	}
}
?>