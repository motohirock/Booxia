<?php
class BookController extends AppController {

	var $name = 'Book';
	
	function index() {
		$this->set('navi', "本棚");
	}
}
?>