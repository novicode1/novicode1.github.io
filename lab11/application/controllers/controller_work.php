<?php

class Controller_Work extends Controller
{

	function action_index()
	{
		$this->view->generate('work_view.php', 'template_view.php');
	}
}
 