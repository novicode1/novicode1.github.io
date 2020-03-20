<?php

class Controller_Show extends Controller
{

	function action_index()
	{
		$this->view->generate('show_view.php', 'template_view.php');
	}
}
