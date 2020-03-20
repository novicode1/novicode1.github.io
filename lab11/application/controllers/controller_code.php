<?php

class Controller_Code extends Controller
{

	function action_index()
	{
		$this->view->generate('code_view.php', 'template_view.php');
	}
}
