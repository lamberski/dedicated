<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dedicated_CMS_Session extends Controller_CMS {

	public function action_login()
	{
		if (Auth::instance()->logged_in('admin'))
		{
			$this->request->redirect(Route::get('cms-index')->uri());
		}

		if ($this->request->method() == Request::POST)
		{
			if (Auth::instance()->login(Arr::get($_POST, 'username'), Arr::get($_POST, 'password')))
			{
				Hint::set('info', __('cms.welcome'), array(':project_name' => Settings::get('project_name')));

				$this->request->redirect(Route::get('cms-index')->uri());
			}
		}
	}

	public function action_logout()
	{
		if (Auth::instance()->logged_in('admin'))
		{
			Auth::instance()->logout();
		}

		$this->request->redirect(Route::get('cms-index')->uri());
	}

}