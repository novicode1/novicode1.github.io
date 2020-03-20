<?php

class Controller_success extends Controller
{

	function action_index()
	{
		$this->view->generate('success_view.php', 'template_view.php');
	}

}
