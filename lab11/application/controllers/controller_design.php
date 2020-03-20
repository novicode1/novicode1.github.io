<?php

class Controller_Design extends Controller
{

	function action_index()
	{
		$this->view->generate('design_view.php', 'template_view.php');
	}
}
