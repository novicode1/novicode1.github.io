<?php

class Controller_Poisk extends Controller
{

	function action_index()
	{
		$this->view->generate('poisk_view.php', 'template_view.php');
	}
}
