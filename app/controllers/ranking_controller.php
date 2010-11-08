<?php
class RankingController extends AppController {

	var $name = 'Ranking';
	
	function index() {
		$this->set('navi', "ランキング");
	}
}
?>