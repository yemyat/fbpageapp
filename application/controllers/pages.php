<?php

class Pages_Controller extends Base_Controller {

	// Get started screen
	public function action_index()
	{
		// code here..

		return View::make('pages.index');
	}

	public function action_fangate()
	{
		// code here..
		return View::make('pages.fangate');
	}

}
